<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Mail\RestaurantApproved;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
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

        if ($restaurant && !$restaurant->approved) {

            $restaurant->approved = true;
            $restaurant->save();

            $randomPassword = Str::random(8);

            $username = strstr($restaurant->email, '@', true);

            // Tạo user mới
            $user = User::create([
                'username' => $username,
                'email' => $restaurant->email,
                'password' => bcrypt($randomPassword),
                'PhoneNumber' => $restaurant->PhoneNumber,
                'Address' => $restaurant->location->Address,
                'location_id' => $restaurant->location_id,
            ]);

            Mail::to($restaurant->email)->send(new RestaurantApproved($restaurant, $username, $randomPassword));

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }
}
