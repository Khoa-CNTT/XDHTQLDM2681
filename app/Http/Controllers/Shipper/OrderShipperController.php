<?php

namespace App\Http\Controllers\Shipper;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderShipperController extends Controller
{
    public function ordershipper()
    {
        return view('Shipper.page.order');
    }
    public function orderhistoryshipper()
    {
        return view('Shipper.page.orderhistory');
    }
    public function detailhistory()
    {
        return view('Shipper.page.detailhistory');
    }
    public function acceptOrder($orderId)
    {
        $order = Order::where('id', $orderId)
            ->where('is_cancel', false)
            //->where('status', 'Chế  biến xong , chờ shipper đến nhận ')
            ->first();

        if (!$order) {
            return response()->json(['message' => 'Đơn hàng không tồn tại hoặc không thể nhận'], 400);
        }

        $order->status = 'Đã nhận';
        $order->driver_id = auth()->id();
        $order->save();

        return response()->json(['message' => 'Đơn hàng đã được nhận'], 200);
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
}
