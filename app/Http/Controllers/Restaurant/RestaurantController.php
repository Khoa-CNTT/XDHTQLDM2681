<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRestaurantRequest;
use App\Mail\NewRestaurantNotification;
use App\Models\Location;
use App\Models\Restaurant;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function store(RegisterRestaurantRequest $request)
    {
        // Xử lý ảnh logo
        if (!$request->hasFile('logo')) {
            return response()->json(['success' => false, 'message' => 'Không có file logo để tải lên.'], 400);
        }
        $logoFile = $request->file('logo');
        $logoName = pathinfo($logoFile->getClientOriginalName(), PATHINFO_FILENAME);
        $logoExtension = $logoFile->getClientOriginalExtension();
        $logoNewName = $logoName . rand(0, 999) . '.' . $logoExtension;
        $logoFile->move(public_path('image/logo'), $logoNewName); // Di chuyển ảnh vào thư mục public/image/logo

        // Xử lý ảnh giấy phép kinh doanh
        if (!$request->hasFile('business_license')) {
            return response()->json(['success' => false, 'message' => 'Không có file giấy phép kinh doanh để tải lên.'], 400);
        }
        $licenseFile = $request->file('business_license');
        $licenseName = pathinfo($licenseFile->getClientOriginalName(), PATHINFO_FILENAME);
        $licenseExtension = $licenseFile->getClientOriginalExtension();
        $licenseNewName = $licenseName . rand(0, 999) . '.' . $licenseExtension;
        $licenseFile->move(public_path('image/restaurant'), $licenseNewName); // Di chuyển ảnh vào thư mục public/image/restaurant

        // Lưu địa chỉ
        try {
            $location = Location::create([
                'City' => $request->tinh,
                'District' => $request->quan,
                'Ward' => $request->phuong,
                'Address' => $request->detailedAddress,
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Không thể lưu địa chỉ. Lỗi: ' . $e->getMessage()], 500);
        }

        // Lưu thông tin nhà hàng
        try {
            $restaurant = Restaurant::create([
                'name' => $request->shopName,
                'email' => $request->email,
                'PhoneNumber' => $request->phoneNumber,
                'business_type' => $request->businessType,
                'description' => $request->productDescription,
                'logo' => $logoNewName, // Chỉ lưu tên file
                'business_license' => $licenseNewName, // Chỉ lưu tên file
                'status' => false,
                'location_id' => $location->id,
                'approved' => false,
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Không thể lưu thông tin nhà hàng. Lỗi: ' . $e->getMessage()], 500);
        }

        // Gửi email thông báo
        Mail::to('longkolp16@gmail.com')->send(new NewRestaurantNotification($restaurant));

        return response()->json(['success' => true, 'message' => 'Đăng ký thành công! Hãy chờ duyệt.']);
    }



















    public function pendingRestaurants()
    {
        $restaurants = Restaurant::where('approved', false)->get();
        return view('admin.pending_restaurants', compact('restaurants'));
    }

    // Duyệt nhà hàng
    public function approve($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->approved = true;
        $restaurant->save();

        return redirect()->route('admin.restaurants')->with('success', 'Nhà hàng đã được duyệt!');
    }
}
