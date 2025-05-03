<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offers;
use App\Models\Role;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        // $offers = Offers::with('roles')->get();
        $offers = Offers::all();
        return view('Admin.page.Offer.index',compact('offers'));
    }
    public function store(Request $request)
    {
        // Kiểm tra validation
        $request->validate([
            'title' => 'required|string',
            'discount_value' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|boolean',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,bmp,tiff|max:10240',
        ]);

        // Nếu có file hình ảnh, tiến hành lưu ảnh
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/image/offer');
        }

        // Tạo đối tượng offer với các giá trị đã được validate
        $offer = Offers::create([
            'title' => $request->input('title'),
            'discount_value' => $request->input('discount_value'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'status' => $request->boolean('status'),
            'description' => $request->input('description'),
            'image' => $imagePath,
        ]);

        return redirect()->route('offer.index')->with('success', 'Khuyến mãi đã được tạo');
    }
    public function edit($id)
    {
        $offer = Offers::findOrFail($id);
        return response()->json($offer);
    }
    public function update(Request $request)
    {
    $offer = Offers::findOrFail($request->input('offer_id'));
    $offer->title = $request->input('title');
    $offer->discount_value = $request->input('discount_value');
    $offer->start_date = $request->input('start_date');
    $offer->end_date = $request->input('end_date');
    $offer->description = $request->input('description');
    $offer->status = $request->input('status');

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('public/image/offer');
        $offer->image = $imagePath;
    }

    $offer->save();

    return redirect()->route('offer.index')->with('success', 'Khuyến mãi đã được cập nhật');
    }
    public function delete($id)
    {
    // Tìm khuyến mãi theo ID
    $offer = Offers::findOrFail($id);

    // Xóa khuyến mãi
    $offer->delete();

    // Quay lại danh sách với thông báo thành công
    return redirect()->route('offer.index')->with('success', 'Khuyến mãi đã được xóa');
    }
    public function changeStatus($id)
    {
    $offer = Offers::findOrFail($id);
    $offer->status = !$offer->status; // Đảo trạng thái
    $offer->save();

    return response()->json([
        'status' => $offer->status,
        'message' => 'Trạng thái đã được cập nhật',
    ]);
    }

}
