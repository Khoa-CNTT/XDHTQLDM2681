<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Models\Offers;
use App\Models\Restaurant;
use App\Models\Role;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offers::with('restaurants')->paginate(10);

        return view('Admin.page.Offer.index', compact('offers'));
    }

    public function create()
    {
        $restaurants = Restaurant::all();
        return view('Admin.page.Offer.create', compact('restaurants'));
    }

    public function store(CreateOfferRequest $request)
    {

        $data=$request->all();
        //dd($data);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('offers', 'public');
        }


        $offer = Offers::create($data);
        //dd($offer);

        if (!$data['is_global'] && $request->filled('restaurant_ids')) {
            $offer->restaurants()->sync($data['restaurant_ids']);
        }

        return redirect()->route('offers.index')->with('success', 'Tạo khuyến mãi thành công');
    }

    public function edit(Offers $offer)
    {
        $restaurants = Restaurant::all();
        $selectedRestaurants = $offer->restaurants->pluck('id')->toArray();
        return view('Admin.page.Offer.edit', compact('offer', 'restaurants', 'selectedRestaurants'));
    }

    public function update(UpdateOfferRequest $request, Offers $offer)
    {

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('offers', 'public');
        }

        $offer->update($data);

        if (!$data['is_global']) {
            $offer->restaurants()->sync($data['restaurant_ids'] ?? []);
        } else {
            $offer->restaurants()->detach();
        }

        return redirect()->route('offers.index')->with('success', 'Cập nhật thành công');
    }

    public function destroy(Offers $offer)
    {
        $offer->delete();
        return redirect()->route('offers.index')->with('success', 'Đã xoá khuyến mãi');
    }
    public function show(Offers $offer)
    {
        return view('admin.offers.show', compact('offer'));
    }

}
