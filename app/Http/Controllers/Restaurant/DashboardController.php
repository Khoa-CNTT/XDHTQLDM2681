<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
