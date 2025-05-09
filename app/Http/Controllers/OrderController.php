<?php

namespace App\Http\Controllers;

use App\Events\OrderCanceledByCustomer;
use App\Events\OrderCreated;
use App\Http\Requests\CheckoutRequest;
use App\Models\Cart;
use App\Models\Location;
use App\Models\MenuItem;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $user = Auth::user();

        $cart = Cart::with(['cartItems.menuItem'])->where('user_id', $user->id)->first();

        $userInfo = [
            'name' => $user->username ?? '',
            'phone' => $user->PhoneNumber ?? '',
            'address' => '',
        ];

        $lat = null;
        $lon = null;

        if ($user->location_id) {
            $location = Location::find($user->location_id);
            if ($location) {
                $fullAddress = $location->Address . ', ' . $location->Ward . ', ' . $location->District . ', ' . $location->City;
                $userInfo['address'] = $fullAddress;
                $lat = $location->Latitude;
                $lon = $location->Longitude;
            }
        }

        $restaurantDistances = [];

        if ($cart && $lat && $lon) {
            $restaurantDistances = DB::table('cart_details')
                ->join('menu_items', 'cart_details.menu_item_id', '=', 'menu_items.id')
                ->join('restaurants', 'menu_items.restaurant_id', '=', 'restaurants.id')
                ->join('locations', 'restaurants.id', '=', 'locations.restaurant_id')
                ->where('cart_details.cart_id', $cart->id)
                ->select(
                    'restaurants.name as restaurant_name',
                    'locations.Address',
                    'locations.Ward',
                    'locations.District',
                    'locations.City',
                    'locations.Latitude',
                    'locations.Longitude',
                    DB::raw("(
                    6371 * acos(
                        cos(radians($lat)) * cos(radians(locations.Latitude)) *
                        cos(radians(locations.Longitude) - radians($lon)) +
                        sin(radians($lat)) * sin(radians(locations.Latitude))
                    )
                ) AS distance")
                )
                ->groupBy(
                    'restaurants.name',
                    'locations.Address',
                    'locations.Ward',
                    'locations.District',
                    'locations.City',
                    'locations.Latitude',
                    'locations.Longitude'
                )
                ->get();

            foreach ($restaurantDistances as $restaurant) {
                $distance = $restaurant->distance;

                $baseFee = 12000;
                $extraFeePerKm = 5000;
                $maxBaseKm = 3;

                if ($distance <= $maxBaseKm) {
                    $restaurant->shipping_fee = $baseFee;
                } else {
                    $extraDistance = ceil($distance - $maxBaseKm);
                    $restaurant->shipping_fee = $baseFee + ($extraDistance * $extraFeePerKm);
                }
            }
        }
        $totalShippingFee = $restaurantDistances ? $restaurantDistances->sum('shipping_fee') : 0;
        $productTotal = $cart ? $cart->amount : 0;
        $finalTotal = $productTotal + $totalShippingFee;
        // Tính thời gian chuẩn bị món ăn lâu nhất trong giỏ
        $maxPrepTime = 0;
        if ($cart) {
            foreach ($cart->cartItems as $item) {
                $prepTime = $item->menuItem->preparation_time ?? 0;
                $maxPrepTime = max($maxPrepTime, $prepTime);
            }
        }

        // Tính thời gian giao hàng (dựa vào khoảng cách xa nhất)
        $maxDeliveryTime = 0;
        if (!empty($restaurantDistances)) {
            foreach ($restaurantDistances as $restaurant) {
                $distance = $restaurant->distance ?? 0;
                $deliveryTime = ceil(($distance / 30) * 60); // Tính theo tốc độ 30km/h
                $maxDeliveryTime = max($maxDeliveryTime, $deliveryTime);
            }
        }

        // Tổng thời gian phục vụ
        $totalServiceTime = $maxPrepTime + $maxDeliveryTime + 10;




        return view('Client.page.Order.index', compact(
            'cart',
            'userInfo',
            'restaurantDistances',
            'totalShippingFee',
            'finalTotal',
            'productTotal',
            'totalServiceTime'
        ));

    }
    public function checkout(CheckoutRequest $request)
    {
        $user = Auth::user();
        $cart = Cart::with(['cartItems.menuItem'])->where('user_id', $user->id)->first();
        $location = $user->location;

        $paymentMethod = $request->input('payment_method', 'cod'); // Mặc định là COD

        $userChanged = false;
        if ($request->username && $request->username !== $user->username) {
            $user->username = $request->username;
            $userChanged = true;
        }
        if ($request->PhoneNumber && $request->PhoneNumber !== $user->PhoneNumber) {
            $user->PhoneNumber = $request->PhoneNumber;
            $userChanged = true;
        }
        if ($userChanged) $user->save();



        $lat = $location->Latitude ?? null;
        $lon = $location->Longitude ?? null;

        $itemsByRestaurant = $cart->cartItems->groupBy(function ($item) {
            return $item->menuItem->restaurant_id;
        });

        DB::beginTransaction();
        try {
            $orderIds = [];

            foreach ($itemsByRestaurant as $restaurantId => $items) {
                $restaurantLocation = Location::where('restaurant_id', $restaurantId)->first();
                $restaurantLat = $restaurantLocation->Latitude ?? 0;
                $restaurantLon = $restaurantLocation->Longitude ?? 0;

                $distance = 6371 * acos(
                    cos(deg2rad($lat)) * cos(deg2rad($restaurantLat)) *
                        cos(deg2rad($restaurantLon) - deg2rad($lon)) +
                        sin(deg2rad($lat)) * sin(deg2rad($restaurantLat))
                );

                $baseFee = 12000;
                $extraFeePerKm = 5000;
                $maxBaseKm = 3;

                $shippingFee = $distance <= $maxBaseKm
                    ? $baseFee
                    : $baseFee + (ceil($distance - $maxBaseKm) * $extraFeePerKm);

                $productTotal = collect($items)->sum(fn($item) => $item->cart_quantity * $item->cart_price);
                $finalTotal = $productTotal + $shippingFee;


                $maxPrepTime = $items->max(function ($item) {
                    return $item->menuItem->preparation_time ?? 0;
                });

                // Tính thời gian giao hàng theo khoảng cách (với tốc độ 30km/h)
                $deliveryTime = ceil(($distance / 30) * 60);

                // Tổng thời gian phục vụ = chuẩn bị + giao hàng + 10 phút buffer
                $totalServiceTime = $maxPrepTime + $deliveryTime + 10;

                $order = Order::create([
                    'user_id' => $user->id,
                    'restaurant_id' => $restaurantId,
                    'driver_id' => null,
                    'total_amount' => $finalTotal,
                    'is_payment' => $paymentMethod === 'cod', // true nếu COD, false nếu VNPay
                    'status' => 'xác nhận món',
                    'order_date' => now(),
                    'delivery_fee' => $shippingFee,
                    'note' => null,
                    'requested_delivery_datetime' => now()->addMinutes($totalServiceTime),
                    'payment_method' => $paymentMethod, // lưu COD hoặc VNPAY
                ]);

                $orderIds[] = $order->id;

                foreach ($items as $cartItem) {
                    OrderDetail::create([
                        'order_id' => $order->id,
                        'menu_item_id' => $cartItem->menu_item_id,
                        'quantity_ordered' => $cartItem->cart_quantity,
                        'sell_price' => $cartItem->cart_price,
                    ]);

                    $menuItem = $cartItem->menuItem;
                    if ($menuItem->Quantity >= $cartItem->cart_quantity) {
                        $menuItem->Quantity -= $cartItem->cart_quantity;
                        $menuItem->save();
                    } else {
                        DB::rollBack();
                        return redirect()->route('cart.index')->with('error', 'Số lượng món ăn không đủ!');
                    }
                }

                event(new OrderCreated($order));
            }

            $cart->cartItems()->delete();
            $cart->delete();

            DB::commit();

            if ($paymentMethod === 'vnpay') {
                session(['vnpay_order_ids' => $orderIds]);

                $totalAmount = Order::whereIn('id', $orderIds)->sum('total_amount');

                return redirect()->route('payment.vnpay', ['amount' => $totalAmount]);
            }

            return redirect()->route('order.tracking')->with('success', 'Đặt hàng thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Lỗi khi đặt hàng: ' . $e->getMessage());
            return redirect()->route('cart.index')->with('error', 'Có lỗi xảy ra khi đặt hàng: ' . $e->getMessage());
        }
    }

    public function ordertracking()
    {
        $user = Auth::user();
        $orders = Order::with(['restaurant', 'orderDetails.menuItem'])
            ->where('user_id', $user->id)
            ->whereIn('status', [
                'xác nhận món',
            'đang chuẩn bị',
            'Chế biến xong ,chờ shipper đến nhận ',
            'Đã nhận',
            'Đã đến điểm lấy, đang giao cho khách',
        ])
            ->orderBy('order_date', 'desc')
            ->get();

        return view('Client.page.Order.tracking', compact('orders'));
    }












    public function historyOrder()
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view('Client.page.Order.history_order', compact('orders'));
    }
    public function cancel(Order $order)
    {
        $notCancellableStatuses = [
            'xác nhận món',
            'Chế biến xong ,chờ shipper đến nhận',
            'Đã nhận',
            'Đã đến điểm lấy, đang giao cho khách',
        ];

        if (in_array($order->status, $notCancellableStatuses)) {
            return back()->with('error', 'Không thể hủy đơn ở trạng thái hiện tại.');
        }

        $order->update([
            'status' => 'Đã từ chối',
            'is_cancel' => true,
        ]);

        event(new OrderCanceledByCustomer($order->restaurant_id, $order->id));

        return back()->with('success', 'Đơn hàng đã được hủy.');
    }





    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
