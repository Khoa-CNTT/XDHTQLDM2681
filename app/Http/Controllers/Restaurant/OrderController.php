<?php

namespace App\Http\Controllers\Restaurant;

use App\Events\OrderAccepted;
use App\Events\OrderReady;
use App\Events\OrderRejected;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function order()
    {
        $user = Auth::guard('web')->user();

        $restaurant = Restaurant::where('email', $user->email)->first();

        if ($restaurant) {
            $restaurantId = $restaurant->id;

            $orders = Order::where('restaurant_id', $restaurantId)
                ->with('orderDetails.menuItem')->get();



            return view('Restaurant.page.Order.order', [
                'orders' => $orders,
                'restaurantId' => $restaurantId
            ]);
        }

        return redirect()->route('home')->with('error', 'Không tìm thấy nhà hàng!');
    }
    public function Vieworder($id)
    {
        $order = Order::with(['orderDetails.menuItem', 'user'])->findOrFail($id);

        $restaurantId = $order->restaurant_id;

        return view('Restaurant.page.Order.show', compact('order', 'restaurantId'));
    }

    public function accept($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'đang chuẩn bị';
        $order->save();

        broadcast(new OrderAccepted($order)); // Gửi sự kiện

        return back()->with('success', 'Đã nhận đơn!');
    }


    public function reject($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'đã từ chối';
        $order->is_cancel = true;
        $order->save();
        broadcast(new OrderRejected($order));

        return back()->with('success', 'Đã từ chối đơn hàng.');
    }

    public function ready($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'Chế biến xong ,chờ shipper đến nhận ';
        $order->save();
        broadcast(new OrderReady($order))->toOthers();
        return back()->with('success', 'Đơn đã sẵn sàng cho shipper.');
    }
    public function shipping($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'Đang giao';
        $order->save();

        return back()->with('success', 'Shipper đã nhận đơn và đang giao hàng.');
    }
}
