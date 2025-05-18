<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class ClientController extends Controller
{
    /**
     * Display client dashboard
     */
    public function dashboard()
    {
        $user = Auth::user();
        return view('client.dashboard', compact('user'));
    }

    /**
     * Display client profile
     */
    public function profile()
    {
        $user = Auth::user();
        return view('client.profile', compact('user'));
    }

    /**
     * Display client orders
     */
    public function orders()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)
                      ->with(['restaurant', 'orderDetails'])
                      ->latest()
                      ->get();
        return view('client.orders', compact('orders'));
    }
} 