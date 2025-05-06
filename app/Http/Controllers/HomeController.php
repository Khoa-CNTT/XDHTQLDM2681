<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Home;
use App\Models\MenuItem;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{

    $restaurants_item = Restaurant::get();
        $results = MenuItem::where('approved', true)->take(12)->get(); // Hoặc lấy toàn bộ nếu muốn
        $categories = Category::with(['menuItems' => function ($query) {
            $query->where('approved', true);
        }])->get();


        // Món ăn được đánh giá cao nhất
        $products = MenuItem::where('approved', true)
            ->withAvg('ratings', 'rating')
            ->orderByDesc('ratings_avg_rating')
            ->take(7)
            ->get();

        // Món đang giảm giá
        $food_like = MenuItem::where('approved', true)
            ->whereColumn('OldPrice', '>', 'Price')
            ->take(7)
            ->get();

        // Món ăn đặc sắc ngẫu nhiên (hoặc bạn muốn lấy theo vị trí địa lý,…)
        $decilious_foods = MenuItem::with('restaurant.locations')
            ->where('approved', true)
            ->inRandomOrder()
            ->take(12)
            ->get();

    return view('Client.page.home', compact('restaurants_item', 'results', 'categories', 'products', 'food_like', 'decilious_foods'));
}






    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Home $home)
    {
        //
    }
}
