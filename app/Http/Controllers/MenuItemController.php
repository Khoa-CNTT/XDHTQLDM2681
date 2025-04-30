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
    public function index(Request $request)
    {
        $sort = $request->input('sort');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $district = $request->input('district');

        $resultsQuery = MenuItem::where('approved', true);


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
        $products = MenuItem::where('approved', true)->take(4)->get();
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
        return view('Client.page.Menu.index', compact('restaurants_item', 'results', 'categories', 'products', 'relatedItems'));
    }



    public function detail($id)
    {
        $menuItem = MenuItem::with(['category', 'restaurant.locations']) // eager load đến location
            ->where('id', $id)
            ->firstOrFail();
        //return response()->json($menuItem);

        return view('Client.page.Menu.detail', compact('menuItem'));
    }

    public function homeres(Request $request, $id, $category_id = null)
{
    $restaurant = Restaurant::findOrFail($id);

    $sort = $request->input('sort');

    $resultsQuery = MenuItem::where('restaurant_id', $id)
                        ->where('approved', true);


    if ($category_id) {
        $resultsQuery->where('category_id', $category_id);
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
            $resultsQuery->orderBy('created_at', 'desc');
            break;
    }

    $results = $resultsQuery->get();

    $categories = Category::whereIn('id', function ($query) use ($id) {
        $query->select('category_id')
              ->from('menu_items')
              ->where('restaurant_id', $id)
              ->groupBy('category_id');
    })->get();

    return view('Client.page.Menu.homeres', compact('restaurant', 'results', 'categories', 'category_id'));
}



    public function search(Request $request)
    {
        $query = $request->input('query');
        $sort = $request->input('sort');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $district = $request->input('district');

        $resultsQuery = MenuItem::where('approved', true);

        // Lọc theo quận
        if (!empty($district)) {
            $resultsQuery->whereHas('restaurant.location', function ($query) use ($district) {
                $query->where('District', $district);
            });
        }

        // Lọc theo từ khóa
        if (!empty($query)) {
            $resultsQuery->where(function ($q) use ($query) {
                $q->where('Title_items', 'like', '%' . $query . '%')
                    ->orWhere('Price', 'like', '%' . $query . '%');
            });
        }

        // Lọc theo giá
        if ($minPrice && $maxPrice) {
            $resultsQuery->whereBetween('Price', [(float)$minPrice, (float)$maxPrice]);
        } elseif ($minPrice) {
            $resultsQuery->where('Price', '>=', (float)$minPrice);
        } elseif ($maxPrice) {
            $resultsQuery->where('Price', '<=', (float)$maxPrice);
        }

        // Sắp xếp kết quả
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

        // Lấy kết quả tìm kiếm
        $results = $resultsQuery->paginate(13);

        // Dữ liệu phụ
        $restaurants_item = Restaurant::get();
        $categories = Category::take(5)->get();
        $products = MenuItem::where('approved', true)->take(4)->get();


        // Gợi ý món ăn liên quan
        $relatedItems = [];
        if ($products->count() > 0) {
            $firstCategoryId = $products->first()->category_id;
            $relatedItems = MenuItem::where('category_id', $firstCategoryId)
                ->where('id', '!=', $products->first()->id)
                ->take(5)
                ->get();
        }

        return view('Client.page.Menu.index', compact(
            'restaurants_item',
            'results',
            'categories',
            'products',
            'relatedItems'
        ));
    }
    public function category($id)
    {
        $categories = Category::all(); // giữ nguyên sidebar
    $category = Category::findOrFail($id);

    // Đổi từ get() sang paginate()
    $results = MenuItem::where('category_id', $id)
                   ->where('approved', true)
                   ->paginate(12);


    // Dữ liệu phụ (tùy bạn có dùng không)
    $restaurants_item = Restaurant::get();
    $products = MenuItem::where('approved', true)->take(4)->get();


    $relatedItems = [];
    if ($products->count() > 0) {
        $firstCategoryId = $products->first()->category_id;
        $relatedItems = MenuItem::where('category_id', $firstCategoryId)
            ->where('id', '!=', $products->first()->id)
            ->take(5)
            ->get();
    }
    return view('Client.page.Menu.index', compact(
        'categories',
        'category',
        'results',
        'restaurants_item',
        'products',
        'relatedItems'
    ));
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
