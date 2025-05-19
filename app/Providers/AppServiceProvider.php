<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }

        $categories = Category::with(['menuItems.restaurant'])->get();

        View::composer('Client.Share.header', function ($view) use ($categories) {
            $cartItemCount = 0;
            $cartItems = collect(); // Mặc định rỗng
            $cartTotal = 0;

            if (Auth::check()) {
                $cart = Cart::where('user_id', Auth::id())->first();
                if ($cart) {
                    $cartItems = $cart->cartItems()->with('menuItem')->get();
                    $cartItemCount = $cartItems->sum('cart_quantity');
                    $cartTotal = $cartItems->sum(function ($item) {
                        return $item->cart_price * $item->cart_quantity;
                    });
                }
            }

            $view->with('categories', $categories)
                ->with('cartItemCount', $cartItemCount)
                ->with('cartItems', $cartItems)
                ->with('cartTotal', $cartTotal);
        });
    }
}
