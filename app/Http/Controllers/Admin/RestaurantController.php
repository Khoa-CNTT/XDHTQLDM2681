<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Mail\RestaurantApproved;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class RestaurantController extends Controller
{

    public function index()
    {

        $restaurants = Restaurant::with('locations')->get();

        return view('Admin.page.Restaurant.index', compact('restaurants'));
    }

    public function approve($id)
    {
        $restaurant = Restaurant::with('locations')->find($id);

        if ($restaurant && !$restaurant->approved) {

            $restaurant->approved = true;
            $restaurant->save();

            $randomPassword = Str::random(8);
            $username = strstr($restaurant->email, '@', true);

            $firstLocation = $restaurant->locations->first();

            $user = User::create([
                'username' => $username,
                'email' => $restaurant->email,
                'password' => bcrypt($randomPassword),
                'PhoneNumber' => $restaurant->PhoneNumber,
                'Address' => optional($firstLocation)->Address,
                'location_id' => optional($firstLocation)->id,
            ]);

            $role = Role::where('name', 'nhà hàng')->first();
            if ($role) {
                DB::table('user_roles')->insert([
                    'user_id' => $user->id,
                    'role_id' => $role->id,
                ]);
            }

            Mail::to($restaurant->email)->send(new RestaurantApproved($restaurant, $username, $randomPassword));

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }
}
