<?php

namespace App\Http\Controllers\Admin;
use App\Mail\MenuItemApproved;
use App\Models\Restaurant;
use App\Models\MenuItem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


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

        if (!$menuItem) {
            return response()->json(['message' => 'Món ăn không tồn tại!'], 400);
        }

        if ($menuItem->approved == true) {
            return response()->json(['message' => 'Món ăn đã được phê duyệt rồi!'], 400);
        }

        $menuItem->approved = true;
        $menuItem->save();

        $restaurant = Restaurant::find($menuItem->restaurant_id);

        if ($restaurant) {
            Mail::to($restaurant->email)->send(new MenuItemApproved($menuItem));
        }

        // Trả về phản hồi thành công
        return response()->json(['message' => 'Món ăn đã được phê duyệt và thông báo đã được gửi!'], 200);
    }
}





