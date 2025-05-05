<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Rating;
use App\Models\Restaurant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // app/Http/Controllers/RestaurantController.php
    public function getRestaurantInfo()
    {
        $user = Auth::guard('web')->user();

        $restaurant = Restaurant::where('email', $user->email)->first();

        if (!$restaurant) {
            return redirect()->route('restaurant.login')->with('error', 'Nhà hàng không tồn tại.');
        }

        // Truy xuất thông tin vị trí liên kết
        $location = $restaurant->location;

        return view('Restaurant.page.Account.info', compact('restaurant', 'location'));
    }

    //hàm thay đổi thời gian mở cửa và đóng cửa
    public function toggleStatus(Request $request)
    {
        $restaurant = Restaurant::find($request->restaurant_id);

        if (!$restaurant) {
            return response()->json(['success' => false, 'message' => 'Nhà hàng không tồn tại.']);
        }

        $restaurant->status = $request->status;
        $restaurant->save();

        return response()->json(['success' => true, 'message' => 'Trạng thái đã được cập nhật.']);
    }

    public function EditRestaurantInfo()
    {
        $user = Auth::guard('web')->user();

        $restaurant = Restaurant::where('email', $user->email)->first();

        if (!$restaurant) {
            return redirect()->route('restaurant.login')->with('error', 'Nhà hàng không tồn tại.');
        }

        //dd($restaurant);
        $locations = Location::all();

        return view('Restaurant.page.Account.edit', compact('restaurant', 'locations'));
    }
    public function updateRestaurantInfo(Request $request)
    {
        //dd($request->all());
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'PhoneNumber' => 'required|string|max:15',
        //     'status' => 'required|string|max:50',
        //     'start_time' => 'required|date_format:H:i',
        //     'end_time' => 'required|date_format:H:i',
        //     'business_type' => 'required|string|max:100',
        //     'description' => 'nullable|string',
        //     'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'business_license' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'location_id' => 'required|exists:locations,id',
        // ]);

        $user = Auth::guard('web')->user();
        $restaurant = Restaurant::where('email', $user->email)->first();

        if (!$restaurant) {
            return redirect()->route('login.restaurant')->with('error', 'Nhà hàng không tồn tại.');
        }

        $dataToUpdate = $request->only([
            'name',
            'PhoneNumber',
            'status',
            'start_time',
            'end_time',
            'business_type',
            'description',
            'location_id',
        ]);

        // Xử lý upload logo
        if ($request->hasFile('logo')) {
            $logoFile = $request->file('logo');
            $logoName = pathinfo($logoFile->getClientOriginalName(), PATHINFO_FILENAME);
            $logoExtension = $logoFile->getClientOriginalExtension();
            $logoNewName = $logoName . rand(0, 999) . '.' . $logoExtension;
            $logoFile->move(public_path('image/logo'), $logoNewName);
            $dataToUpdate['logo'] = $logoNewName;
        }


        if ($request->hasFile('business_license')) {
            $licenseFile = $request->file('business_license');
            $licenseName = pathinfo($licenseFile->getClientOriginalName(), PATHINFO_FILENAME);
            $licenseExtension = $licenseFile->getClientOriginalExtension();
            $licenseNewName = $licenseName . rand(0, 999) . '.' . $licenseExtension;
            $licenseFile->move(public_path('image/restaurant'), $licenseNewName);

            $dataToUpdate['business_license'] = $licenseNewName;
        }

        $restaurant->update($dataToUpdate);

        return redirect()->route('restaurant.info')->with('success', 'Thông tin nhà hàng đã được cập nhật.');
    }
    public function index(Request $request)
    {
        // Xác thực và lấy thông tin nhà hàng
        $user = Auth::guard('web')->user();

        if (!$user || !$user->roles->contains('name', 'Nhà hàng')) {
            return redirect()->route('login.restaurant')->with('error', 'Bạn không có quyền truy cập.');
        }

        $restaurant = Restaurant::where('email', $user->email)->first();

        if (!$restaurant) {
            return redirect()->back()->with('error', 'Không tìm thấy nhà hàng.');
        }

        $restaurantId = $restaurant->id;

        // Thống kê theo thời gian hôm nay / tháng / năm
        $today = Carbon::today();
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;

        $dailyOrders = Order::where('restaurant_id', $restaurantId)
            ->whereDate('order_date', $today)
            ->where('is_cancel', 0)
            ->count();

        $dailyRevenue = Order::where('restaurant_id', $restaurantId)
            ->whereDate('order_date', $today)
            ->where('is_cancel', 0)
            ->sum('total_amount');

        $monthlyRevenue = Order::where('restaurant_id', $restaurantId)
            ->whereMonth('order_date', $month)
            ->whereYear('order_date', $year)
            ->where('is_cancel', 0)
            ->sum('total_amount');

        $yearlyRevenue = Order::where('restaurant_id', $restaurantId)
            ->whereYear('order_date', $year)
            ->where('is_cancel', 0)
            ->sum('total_amount');

        // Thống kê theo khoảng thời gian (biểu đồ)
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        $chartData = [];

        if ($fromDate && $toDate) {
            // B1: Khởi tạo mảng ngày mặc định doanh thu = 0
            $from = Carbon::parse($fromDate);
            $to = Carbon::parse($toDate);
            while ($from->lte($to)) {
                $chartData[$from->format('Y-m-d')] = 0;
                $from->addDay();
            }

            // B2: Lấy dữ liệu doanh thu thực tế
            $orders = Order::where('restaurant_id', $restaurantId)
                ->whereBetween('order_date', [$fromDate, $toDate])
                ->select(DB::raw('DATE(order_date) as date'), DB::raw('SUM(total_amount) as revenue'))
                ->groupBy(DB::raw('DATE(order_date)'))
                ->orderBy('date')
                ->get();

            // B3: Gán dữ liệu doanh thu vào mảng đã khởi tạo
            foreach ($orders as $order) {
                $chartData[$order->date] = $order->revenue;
            }
        }

        // Top món ăn bán chạy
        $topItems = OrderDetail::select('menu_item_id', DB::raw('SUM(quantity_ordered) as total_sold'))
            ->whereHas('order', function ($query) use ($restaurantId) {
                $query->where('restaurant_id', $restaurantId)->where('is_cancel', 0);
            })
            ->groupBy('menu_item_id')
            ->orderByDesc('total_sold')
            ->with('menuItem')
            ->take(5)
            ->get();

        // Đánh giá từ khách hàng
        $ratings = Rating::whereHas('order', function ($q) use ($restaurantId) {
            $q->where('restaurant_id', $restaurantId);
        })->with('order')->latest()->take(10)->get();

        // Thống kê tình trạng đơn hàng
        $orderStatusCounts = Order::where('restaurant_id', $restaurantId)
            ->select('status', DB::raw('COUNT(*) as count'))
            ->groupBy('status')
            ->get();

        return view('Restaurant.page.Report.index', compact(
            'restaurant',
            'dailyOrders',
            'dailyRevenue',
            'monthlyRevenue',
            'yearlyRevenue',
            'topItems',
            'ratings',
            'orderStatusCounts',
            'chartData',
            'fromDate',
            'toDate'
        ));
    }
}
