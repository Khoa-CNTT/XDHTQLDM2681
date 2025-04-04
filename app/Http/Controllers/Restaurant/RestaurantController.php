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


        //dd($request->all());
         //dd($request->hasFile('logo'));
        if ($request->hasFile('logo')) {
            $get_image = $request->file('logo');
            $path = public_path("image/logo");
            // dd($path) ;
            $get_image_name = $get_image->getClientOriginalName(); // Lấy tên gốc của ảnh
            $name_image = pathinfo($get_image_name, PATHINFO_FILENAME); // Lấy tên ảnh mà không có đuôi
            $new_image = $name_image . rand(0, 999) . "." . $get_image->getClientOriginalExtension(); // Tạo tên ảnh mới
            $get_image->move($path, $new_image); // Di chuyển ảnh vào thư mục

            // Lưu đường dẫn ảnh vào cơ sở dữ liệu
            $logoPath = "image/foods/" . $new_image;
            // dd(
            //     $logoPath);
        } else {
            return response()->json(['success' => false, 'message' => 'Không có file ảnh để tải lên.'], 400);
        }

        // Lưu địa chỉ (Location)
        try {
            $location = Location::create([
                'City' => $request->tinh, // Thay vì $request->city
                'District' => $request->quan, // Thay vì $request->district
                'Ward' => $request->phuong, // Thay vì $request->ward
                'Address' => $request->detailedAddress, // Thay vì $request->address
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Không thể lưu địa chỉ. Lỗi: ' . $e->getMessage()], 500);
        }
        // dd($location);
        if ($request->hasFile('business_license')) {
            // Lưu vào thư mục 'public/image/restaurant'
            $businessLicensePath = $request->file('business_license')->store('image/restaurant/giayphep', 'public');
        } else {
            $businessLicensePath = null; // Nếu không có ảnh, giữ giá trị null
        }

        try {
            $restaurant = Restaurant::create([
                'name' => $request->shopName,
                'email' => $request->email,
                'PhoneNumber' => $request->phoneNumber,
                'business_type' => $request->businessType,
                'description' => $request->productDescription, // Sửa lại theo đúng tên trường
                'logo' => isset($logoPath) ? $logoPath : null, // Lưu đường dẫn ảnh vào cơ sở dữ liệu
                'business_license' => $businessLicensePath,
                'status' => false,
                'location_id' => $location->id, // Lưu ID địa chỉ
                'approved' => false, // Chờ duyệt
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Không thể lưu thông tin nhà hàng. Lỗi: ' . $e->getMessage()], 500);
        }
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
