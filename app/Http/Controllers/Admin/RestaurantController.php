<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Mail\RestaurantApproved;
use Illuminate\Support\Facades\Mail;
class RestaurantController extends Controller
{

    public function index()
    {
        // Lấy tất cả nhà hàng và địa điểm tương ứng
        $restaurants = Restaurant::with('location')->get();

        // Trả về view và truyền dữ liệu cho view
        return view('Admin.page.Restaurant.index', compact('restaurants'));
    }
    public function approve($id)
    {
        $restaurant = Restaurant::find($id);
        if ($restaurant) {
            // Cập nhật trạng thái phê duyệt
            $restaurant->approved = true;
            $restaurant->save();

            // Gửi email thông báo phê duyệt
            Mail::to($restaurant->email)->send(new RestaurantApproved($restaurant));

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }
}
