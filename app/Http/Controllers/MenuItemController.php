<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants_item = Restaurant::get();
        $results = MenuItem::all();
        $products = MenuItem::take(4)->get();
        $categories = Category::all();

        //dd($products);
        return view('Client.page.Menu.index',compact('restaurants_item','results','categories'));
    }
    public function detail($id)
    {
        // Lấy chi tiết món ăn theo ID
        $menuItem = MenuItem::with(['category', 'restaurant'])
            ->where('id', $id)
            ->firstOrFail(); // Nếu không tìm thấy sẽ trả về lỗi 404

        // Trả về view với dữ liệu món ăn
        return view('Client.page.Menu.detail', compact('menuItem'));
    }
    public function homeres($id)
    {
          $restaurant = Restaurant::findOrFail($id);
         $results = MenuItem::where('restaurant_id', $id)->get();

          $products = MenuItem::where('restaurant_id', $id)
        ->latest()
        ->take(4)
        ->get();
           $categories = Category::all();

         return view('Client.page.Menu.homeres', compact('restaurant', 'results', 'products', 'categories'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $restaurants_item = Restaurant::get();
        $categories = Category::take(5)->get();
        $products = MenuItem::take(4)->get();
        $relatedItems = [];
        if ($products->count() > 0) {
            $firstCategoryId = $products->first()->category_id;
            $relatedItems = MenuItem::where('category_id', $firstCategoryId)
                ->where('id', '!=', $products->first()->id)
                ->take(5)
                ->get();
        }
        // Tìm kiếm sản phẩm dựa trên từ khóa
        $results = MenuItem::where('Title_items', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->orWhere('Price', 'like', '%' . $query . '%')
            ->paginate(9);
            //dd($results) ; // Phân trang 9 sản phẩm mỗi trang

        return view('Client.page.Menu.index', compact('restaurants_item', 'results', 'categories', 'products', 'relatedItems'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuItem $menuItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuItem $menuItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MenuItem $menuItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuItem $menuItem)
    {
        //
    }
}
