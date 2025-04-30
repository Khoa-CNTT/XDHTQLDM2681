<?php

namespace App\Http\Controllers\Admin;
use App\Models\Restaurant;
use App\Models\MenuItem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function index(Request $request)
{
    $restaurants = Restaurant::all();
    $allMenuItems = MenuItem::all(); // tất cả món ăn
    $menuItems = collect(); // mặc định trống

    if ($request->has('restaurant_id')) {
        $menuItems = MenuItem::where('restaurant_id', $request->restaurant_id)->get();
    }

    return view('Admin.page.MenuItem.index', compact('restaurants', 'menuItems', 'allMenuItems'));
}
public function approve($id)
{
    $menuItem = MenuItem::find($id);
    
    // Kiểm tra món ăn có tồn tại không
    if (!$menuItem) {
        return response()->json(['message' => 'Món ăn không tồn tại!'], 400);
    }

    // Kiểm tra nếu món ăn đã được phê duyệt
    if ($menuItem->approved) {
        return response()->json(['message' => 'Món ăn đã được phê duyệt rồi!'], 400);
    }

    // Thực hiện phê duyệt món ăn
    $menuItem->approved = true;
    $menuItem->save();

    // Trả về phản hồi thành công
    return response()->json(['message' => 'Món ăn đã được phê duyệt!'], 200);
}




}
