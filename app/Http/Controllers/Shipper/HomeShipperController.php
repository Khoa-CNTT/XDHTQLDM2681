<?php

namespace App\Http\Controllers\Shipper;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class HomeShipperController extends Controller
{
    public function status(){
        return view('Shipper.page.Notice.status');
    }
    public function homeshipper(Request $request)
    {
        $shipper = Auth::guard('driver_auth')->user();

        $now = Carbon::now();

        // Các mốc thời gian
        $timeFilters = [
            '1_day'   => $now->copy()->subDay(),
            '3_days'  => $now->copy()->subDays(3),
            '1_week'  => $now->copy()->subWeek(),
            '1_month' => $now->copy()->subMonth(),
            '1_year'  => $now->copy()->subYear(),
        ];

        $statistics = [];

        foreach ($timeFilters as $key => $startDate) {
            $orders = Order::where('driver_id', $shipper->id)
                ->where('status', 'Đã thanh toán')
                ->get();

            $totalOrders = $orders->count();
            $totalIncome = $orders->sum(function ($order) {
                return $order->delivery_fee * 0.8;
            });

            $statistics[$key] = [
                'total_orders' => $totalOrders,
                'total_income' => $totalIncome,
            ];
        }

        return view('Shipper.page.index', compact('shipper', 'statistics'));
    }


    public function updateStatus(Request $request)
    {
        $shipper = Auth::guard('driver_auth')->user();

        if ($shipper) {
            $shipper->is_active = $request->has('is_active') ? (bool)$request->is_active : false;
            $shipper->save();

            return response()->json(['message' => 'Trạng thái đã được cập nhật']);
        }

        return response()->json(['message' => 'Không tìm thấy shipper'], 401);
    }
   public function getNearbyOrders(Request $request)
{
    $lat = $request->input('lat');
    $lon = $request->input('lon');

    if (!$lat || !$lon) {
        return response()->json(['message' => 'Không nhận được vị trí từ trình duyệt'], 400);
    }

    $radius = 50; // km

    // Lấy các nhà hàng + vị trí trong phạm vi
    $nearbyRestaurants = DB::table('locations')
        ->join('restaurants', 'locations.restaurant_id', '=', 'restaurants.id')
        ->select(
            'restaurants.*',
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
        ->having('distance', '<=', $radius)
        ->get();

    $restaurantIds = $nearbyRestaurants->pluck('id');

        $orders = Order::whereIn('restaurant_id', $restaurantIds)
            ->where('is_cancel', 0)
            ->where('status', '!=', 'đã thanh toán')
            ->where('status', '!=', 'đã từ chối')
            ->whereIn('status', [
            'Chế biến xong ,chờ shipper đến nhận ',
                'Đã nhận',
            'Đã đến điểm lấy, đang giao cho khách',
                'Đã thanh toán'
            ])
            ->with([
                'orderDetails.menuItem',
                'user.location',
                'restaurant.locations'
            ])
            ->orderBy('created_at', 'desc')
            ->get();


        // Thêm dữ liệu nhà hàng gần vào mỗi đơn hàng
        $orders->transform(function ($order) use ($nearbyRestaurants) {
        $restaurantInfo = $nearbyRestaurants->firstWhere('id', $order->restaurant_id);
        $order->restaurant_info = $restaurantInfo;
        return $order;
    });

    // Trả về thông tin
    return response()->json([
        'orders' => $orders,
        'user_position' => [
            'lat' => $lat,
            'lon' => $lon
        ]
    ]);
}

}
