<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Driver;
use App\Models\MenuItem;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getNearby(Request $request)
    {
        $lat = $request->lat;
        $lon = $request->lon;
        $radius = 100;

        $results = DB::table('locations')
            ->join('restaurants', 'locations.restaurant_id', '=', 'restaurants.id')
            ->select(
                'restaurants.id as restaurant_id',
                'restaurants.name',
                'restaurants.description',
                'restaurants.logo',
                'locations.Address',
                'locations.City',
                'locations.District',
                'locations.Ward',
                'locations.Latitude',
                'locations.Longitude',
                DB::raw("(
                    6371 * acos(
                        cos(radians(?)) * cos(radians(locations.Latitude)) *
                        cos(radians(locations.Longitude) - radians(?)) +
                        sin(radians(?)) * sin(radians(locations.Latitude))
                    )
                ) AS distance")
            )
            ->setBindings([$lat, $lon, $lat])
            ->having('distance', '<=', $radius)
            ->orderBy('distance')
            ->get();

        return response()->json($results);
    }
    public function Nearby(Request $request){
        $sort = $request->input('sort');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $district = $request->input('district');

        $resultsQuery = MenuItem::query();

        if ($minPrice && $maxPrice) {
            $resultsQuery->whereBetween('Price', [(float)$minPrice, (float)$maxPrice]);
        } elseif ($minPrice) {
            $resultsQuery->where('Price', '>=', (float)$minPrice);
        } elseif ($maxPrice) {
            $resultsQuery->where('Price', '<=', (float)$maxPrice);
        }
        // Lọc theo Quận/Huyện
        if (!empty($district)) {
            $resultsQuery->whereHas('restaurant.locations', function ($query) use ($district) {
                $query->where('District', $district);
            });
        }

        switch ($sort) {
            case 'newness':
                $resultsQuery->orderBy('created_at', 'desc');
                break;
            case 'price_asc':
                $resultsQuery->orderBy('Price', 'asc');
                break;
            case 'price_desc':
                $resultsQuery->orderBy('Price', 'desc');
                break;
            default:
                $resultsQuery->latest();
        }

        $results = $resultsQuery->paginate(13);
        $restaurants_item = Restaurant::get();
        $products = MenuItem::take(4)->get();
        $categories = Category::all();


        $relatedItems = [];
        if ($products->count() > 0) {
            $firstCategoryId = $products->first()->category_id;
            $relatedItems = MenuItem::where('category_id', $firstCategoryId)
                ->where('id', '!=', $products->first()->id)
                ->take(5)
                ->get();
        }

        // Trả về view với các dữ liệu cần thiết
        return view('client.page.restaurant.nearby', compact('restaurants_item', 'results', 'categories', 'products', 'relatedItems'));
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
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Driver $driver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Driver $driver)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        //
    }
}
