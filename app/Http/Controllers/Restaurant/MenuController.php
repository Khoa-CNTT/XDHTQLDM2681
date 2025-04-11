<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMenuRequest;
use App\Models\Category;
use App\Models\MenuItem;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // Hàm thêm món ăn
    public function create()
    {
        $categories = Category::all();
        $restaurants = Restaurant::all();
        return view('restaurant.page.menu.create', compact('categories', 'restaurants'));
    }

    public function store(CreateMenuRequest $request)
    { //dd($request->all());


        $menuItem = new MenuItem();

        $menuItem->restaurant_id = $request->restaurant_id;
        $menuItem->category_id = $request->category_id;
        $menuItem->Title_items = $request->Title_items;
        $menuItem->Price = $request->Price;

        $menuItem->Quantity = $request->Quantity;
        $menuItem->Status = $request->Status;
        $menuItem->description = $request->description;
        if ($request->hasFile('Image')) {
            $get_image = $request->file('Image');
            $path = "public/image/foods";
            $get_image_name = $get_image->getClientOriginalName();
            $name_image = current(explode(".", $get_image_name));
            $new_image = $name_image . rand(0, 999) . "." . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);

            $menuItem->Image = $new_image;
        } else {
           $menuItem->Image =$menuItem->getOriginal('Image');
        }

        $menuItem->save();

        return redirect('/restaurant/menu_items')->with('success', 'Món ăn đã được thêm thành công!');
    }

    // Hàm xem danh sách món ăn
    public function index()
    {
        $menuItems = MenuItem::with('category', 'restaurant')->get();
        return view('restaurant.page.menu.index', compact('menuItems'));
    }

    // Hàm sửa món ăn
    public function edit($id)
    {
        $menuItem = MenuItem::findOrFail($id);
        $categories = Category::all();
        $restaurants = Restaurant::all();
        return view('restaurant.page.menu.edit', compact('menuItem', 'categories', 'restaurants'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
            'category_id' => 'required|exists:categories,id',
            'Title_items' => 'required|string|max:255',
            'Price' => 'required|numeric',
            'Image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'Quantity' => 'required|integer',
            'Status' => 'required|in:0,1',
            'description' => 'nullable|string',
        ]);

        $menuItem = MenuItem::findOrFail($id);
        $menuItem->restaurant_id = $request->restaurant_id;
        $menuItem->category_id = $request->category_id;
        $menuItem->Title_items = $request->Title_items;
        $menuItem->Price = $request->Price;

        $menuItem->Quantity = $request->Quantity;
        $menuItem->Status = $request->Status;
        $menuItem->description = $request->description;

        if ($request->hasFile('Image')) {
            $get_image = $request->file('Image');
            $path = "public/image/foods";
            $get_image_name = $get_image->getClientOriginalName();
            $name_image = current(explode(".", $get_image_name));
            $new_image = $name_image . rand(0, 999) . "." . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);

              $menuItem->Image = $new_image;
        } else {
              $menuItem->Image =   $menuItem->getOriginal('Image');
        }
        $menuItem->save();


        return redirect('/restaurant/menu_items')->with('success', 'Món ăn đã được cập nhật thành công!');
    }

    // Hàm xóa món ăn
    public function destroy($id)
    {
        $menuItem = MenuItem::findOrFail($id);
        $menuItem->delete();

        return redirect('/restaurant/menu_items')->with('success', 'Món ăn đã được xóa thành công!');
    }
}
