<?php

namespace App\Http\Controllers\Shipper;

use App\Events\OrderOnTheWay;
use App\Events\OrderPaid;
use App\Events\ShipperAcceptedOrder;
use App\Events\ShipperLocationUpdated;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OrderShipperController extends Controller
{
    public function ordershipper()
    {
        $orders=Order::get();
        return view('Shipper.page.order', compact('orders'));
    }
    public function orderhistoryshipper()
    {
        $shipper = auth('driver_auth')->user();
        $orders = Order::where('driver_id', $shipper->id)
            ->whereIn('status', ['Đã thanh toán', 'Đã từ chối', 'Đã nhận', 'Đã đến điểm lấy, đang giao cho khách'])  // Lọc trạng thái
            ->get();

        return view('Shipper.page.orderhistory', compact('orders'));
    }
    public function detailHistory($orderId)
    {
        $order = Order::with(['user', 'driver', 'orderDetails.menuItem'])->findOrFail($orderId);

        return view('Shipper.page.detailhistory', compact('order'));
    }


    public function acceptOrder($orderId)
    {
        $order = Order::with(['restaurant.locations', 'driver'])
            ->where('id', $orderId)
            ->where('is_cancel', false)
            ->first();

        if (!$order) {
            return response()->json(['message' => 'Đơn hàng không tồn tại hoặc không thể nhận'], 400);
        }

        $shipper = auth('driver_auth')->user();

        $existingOrder = Order::where('driver_id', $shipper->id)
            ->where('status', 'Đã đến điểm lấy, đang giao cho khách')
            ->first();

        if ($existingOrder) {
            return response()->json(['message' => 'Bạn không thể nhận đơn mới khi đang giao đơn khác'], 400);
        }

        if ($order->status === 'Đã nhận') {
            return response()->json(['message' => 'Đơn hàng đã được nhận bởi shipper khác'], 400);
        }

        $order->status = 'Đã nhận';
        $order->driver_id = $shipper->id;
        $order->save();

        $order->load('driver');

        $restaurant = $order->restaurant;
        $shipperInfo = $order->driver;

        // Phát sự kiện cho nhà hàng
        if ($restaurant && $shipperInfo) {
            event(new ShipperAcceptedOrder(
                $restaurant->id,
                "Shipper {$shipperInfo->fullname} (SĐT: {$shipperInfo->phonenumber}) đã nhận đơn hàng #{$order->id}.",
                $order->id
            ));
        }

        $location = $restaurant->locations->first();

        $latitude = $shipper->latitude;
        $longitude = $shipper->longitude;

        if ($location) {
            event(new ShipperLocationUpdated(
                $latitude,
                $longitude,
                $location->Latitude,
                $location->Longitude,
                $order->id
            ));
        }

        return response()->json([
            'message' => 'Đã nhận đơn và thông báo đến nhà hàng',
            'restaurant_latitude' => $location ? $location->Latitude : null,
            'restaurant_longitude' => $location ? $location->Longitude : null,
            'order_id' => $order->id,
        ]);
    }
    public function updateShipperLocation(Request $request, $orderId)
    {    // tọa độ của shipper đang đứng
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        //dd($latitude, $longitude);
        $order = Order::find($orderId);

        if ($order) {
            $restaurant = $order->restaurant;
            $restaurantLatitude = $restaurant->locations->first()->Latitude;
            $restaurantLongitude = $restaurant->locations->first()->Longitude;
            //dd($latitude, $longitude, $restaurantLatitude, $restaurantLongitude, $orderId);
            //event(new ShipperLocationUpdated($latitude, $longitude, $restaurantLatitude, $restaurantLongitude, $orderId));

            event(new ShipperLocationUpdated($latitude, $longitude, $restaurantLatitude, $restaurantLongitude, $orderId));
            //dd($latitude, $longitude );
        }

        return response()->json(['message' => 'Vị trí shipper đã được cập nhật']);
    }




    // Từ chối đơn
    public function cancelOrder($orderId)
    {
        $order = Order::find($orderId);

        if (!$order) {
            return response()->json(['message' => 'Đơn hàng không tồn tại'], 404);
        }


        $order->status = 'Đã từ chối';  // Trạng thái từ chối đơn
        $order->save();

        return response()->json(['message' => 'Đơn hàng đã bị từ chối'], 200);
    }
    // Đang đến điểm lấy
    public function onTheWay($orderId)
    {

        $order = Order::where('id', $orderId)
            ->where('is_cancel', false)
            ->first();




        $order->status = 'Đã đến điểm lấy, đang giao cho khách';
        $order->save();
        event(new OrderOnTheWay($order));

        return response()->json(['message' => 'Đơn hàng đang trên đường đến điểm lấy'], 200);
    }


    public function updatePaymentStatus($id)
    {
        $order = Order::where('id', $id)
            ->where(function ($query) {
                $query->where('status', 'Đã đến điểm lấy, đang giao cho khách')
                    ->orWhere('status', 'Đã nhận');
            })
            ->where('is_cancel', false)
            ->first();

        if (!$order) {
            return response()->json(['message' => 'Không thể cập nhật. Đơn hàng chưa đến điểm lấy hoặc đã bị hủy.'], 400);
        }

        $order->is_payment = true;
        $order->status = "Đã giao thành công";
        $order->save();

        // Phát event tới khách và nhà hàng
        event(new OrderPaid($order));

        return response()->json(['message' => 'Cập nhật thanh toán thành công']);
    }

    public function profile()
    {
        $shipper = Auth::guard('driver_auth')->user();
        return view('Shipper.page.profile.index', compact('shipper'));
    }

    public function updateProfile(Request $request)
    {
        $shipper = Auth::guard('driver_auth')->user();

        $request->validate([
            'fullname' => 'required|string|max:255',
            'phonenumber' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $shipper->fullname = $request->fullname;
        $shipper->username = $request->username;
        $shipper->phonenumber = $request->phonenumber;
        $shipper->address = $request->address;

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/avatars'), $filename);

            $shipper->avatar = 'uploads/avatars/' . $filename;
        }

        $shipper->save();

        return redirect()->back()->with('success', 'Cập nhật thông tin thành công!');
    }
    public function changePassword()
    {
        $shipper = Auth::guard('driver_auth')->user();
        return view('Shipper.page.Profile.change_password', compact('shipper'));
    }

    public function updatePassword(Request $request)
    {
        $shipper = Auth::guard('driver_auth')->user();

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ], [
            'current_password.required' => 'Vui lòng nhập mật khẩu cũ.',
            'new_password.required' => 'Vui lòng nhập mật khẩu mới.',
            'new_password.min' => 'Mật khẩu mới tối thiểu 6 ký tự.',
            'new_password.confirmed' => 'Xác nhận mật khẩu mới không khớp.',
        ]);

        // --- Đúng nè ---
        if (!Hash::check($request->current_password, $shipper->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu cũ không đúng']);
        }

        // --- Mã hóa mật khẩu mới bằng bcrypt ---
        $shipper->password = bcrypt($request->new_password);
        $shipper->save();

        return redirect()->back()->with('success', 'Đổi mật khẩu thành công!');
    }

}
