<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Restaurant;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;

class ThongkeController extends Controller
{

    public function index(Request $request)
    {
        $from = Carbon::parse($request->input('from_date', now()->toDateString()))->startOfDay();
        $to   = Carbon::parse($request->input('to_date', now()->toDateString()))->endOfDay();

        // Hoán đổi nếu cần
        if ($from->gt($to)) {
            [$from, $to] = [$to, $from];
        }

        $query = Order::whereBetween('order_date', [$from, $to]);

        $totalOrders  = $query->count();
        $totalRevenue = (clone $query)->where('is_cancel', 0)->sum('total_amount');

        // Dùng CarbonPeriod để tạo danh sách ngày an toàn
        $days = collect(CarbonPeriod::create($from, $to));

        $chartData = $days->map(fn($day) => [
            'date'    => $day->format('Y-m-d'),
            'orders'  => Order::whereDate('order_date', $day)->count(),
            'revenue' => Order::whereDate('order_date', $day)
                ->where('is_cancel', 0)
                ->sum('total_amount'),
        ]);

        //dd($chartData);

        // Thống kê nổi bật
        $dailyOrders = Order::whereDate('order_date', Carbon::today())->count();
        $monthlyOrders = Order::whereMonth('order_date', Carbon::now()->month)->count();
        $yearlyOrders = Order::whereYear('order_date', Carbon::now()->year)->count();
        $dailyRevenue = Order::whereDate('order_date', Carbon::today())->sum('total_amount');
        $monthlyRevenue = Order::whereMonth('order_date', Carbon::now()->month)->sum('total_amount');
        $yearlyRevenue = Order::whereYear('order_date', Carbon::now()->year)->sum('total_amount');

        // Top bán chạy nhất
        $topMenuItems = OrderDetail::select('menu_item_id', DB::raw('SUM(quantity_ordered) as total'))
            ->groupBy('menu_item_id')->orderByDesc('total')->with('menuItem')->take(5)->get();
        $topRestaurants = Order::select('restaurant_id', DB::raw('COUNT(*) as total'))
            ->groupBy('restaurant_id')->orderByDesc('total')->with('restaurant')->take(5)->get();
        $topDrivers = Order::select('driver_id', DB::raw('COUNT(*) as total'))
            ->whereNotNull('driver_id')->groupBy('driver_id')->orderByDesc('total')->with('driver')->take(5)->get();

        // Thời gian giao hàng trung bình và tỷ lệ huỷ
        $avgDeliveryTime = Order::whereNotNull('delivery_date')->whereNotNull('order_date')
            ->select(DB::raw('AVG(TIMESTAMPDIFF(MINUTE, order_date, delivery_date)) as avg_minutes'))->value('avg_minutes');
        $cancelRate = Order::count() ? round(Order::where('is_cancel', true)->count() / Order::count() * 100, 2) : 0;

        // Tổng số người dùng đang hoạt động
        $totalCustomers = User::count();
        $totalRestaurants = Restaurant::where('approved',1)->count();
        $totalDrivers = Driver::where('is_active',1)->count();

        return view('Admin.page.thong-ke.index', compact(
            'from',
            'to',
            'totalOrders',
            'totalRevenue',
            'chartData',
            'dailyOrders',
            'monthlyOrders',
            'yearlyOrders',
            'dailyRevenue',
            'monthlyRevenue',
            'yearlyRevenue',
            'topMenuItems',
            'topRestaurants',
            'topDrivers',
            'avgDeliveryTime',
            'cancelRate',
            'totalCustomers',
            'totalRestaurants',
            'totalDrivers'
        ));

    }
}
