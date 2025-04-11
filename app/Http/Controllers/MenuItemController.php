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
    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $results = MenuItem::where('title', 'like', '%' . $query . '%')->get();
        } else {
            $results = MenuItem::all();
        }

        return view('Client.page.Menu.index', compact('results'));
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
