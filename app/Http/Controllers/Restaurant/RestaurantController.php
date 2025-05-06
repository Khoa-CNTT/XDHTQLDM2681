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
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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
        $logoFile->move(public_path('image/logo'), $logoNewName);

        if (!$request->hasFile('business_license')) {
            return response()->json(['success' => false, 'message' => 'Không có file giấy phép kinh doanh để tải lên.'], 400);
        }
        $licenseFile = $request->file('business_license');
        $licenseName = pathinfo($licenseFile->getClientOriginalName(), PATHINFO_FILENAME);
        $licenseExtension = $licenseFile->getClientOriginalExtension();
        $licenseNewName = $licenseName . rand(0, 999) . '.' . $licenseExtension;
        $licenseFile->move(public_path('image/restaurant'), $licenseNewName);

        // Lưu thông tin nhà hàng
        try {
            $restaurant = Restaurant::create([
                'name' => $request->shopName,
                'email' => $request->email,
                'PhoneNumber' => $request->phoneNumber,
                'business_type' => $request->businessType,
                'description' => $request->productDescription,
                'logo' => $logoNewName,
                'business_license' => $licenseNewName,
                'status' => false,
                'approved' => false,
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Không thể lưu thông tin nhà hàng. Lỗi: ' . $e->getMessage()], 500);
        }

        // Lưu chi nhánh duy nhất của nhà hàng
        $fullAddress = $request->detailedAddress . ', ' . $request->phuong . ', ' . $request->quan . ', ' . $request->tinh;
         //dd($fullAddress);
        $lat = null;
        $lon = null;

        try {
            $response = Http::withHeaders([
                'User-Agent' => 'CallFood/1.0 (longkolp16@gmail.com)'
            ])->get('https://nominatim.openstreetmap.org/search', [
                'q' => $fullAddress,
                'format' => 'json',
                'limit' => 1
            ]);

            $data = $response->json();
            //dd($data);

            if ($response->successful() && !empty($data)) {
                $lat = $data[0]['lat'] ?? null;
                $lon = $data[0]['lon'] ?? null;
            } else {
                Log::warning('Không tìm được tọa độ cho địa chỉ: ' . $fullAddress);
            }
        } catch (\Exception $e) {
            Log::error('Lỗi khi lấy tọa độ: ' . $e->getMessage());
        }

        // Lưu thông tin chi nhánh vào bảng locations
        try {
            $location = Location::create([
                'City' => $request->tinh,
                'District' => $request->quan,
                'Ward' => $request->phuong,
                'Address' => $request->detailedAddress,
                'Latitude' => $lat,
                'Longitude' => $lon,
                'restaurant_id' => $restaurant->id,  // Liên kết địa chỉ với nhà hàng
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Không thể lưu địa chỉ. Lỗi: ' . $e->getMessage()], 500);
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
