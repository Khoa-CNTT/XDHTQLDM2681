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
        $results = MenuItem::all();
        $products = MenuItem::take(3)->get();
        $food_like = MenuItem::skip(4)->take(4)->get();

        $decilious_foods = MenuItem::with('restaurant.location')->skip(1)->take(12)->get();

        $categories = Category::all();

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
