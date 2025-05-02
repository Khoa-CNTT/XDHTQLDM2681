<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('web')->check()) {
            // Nếu chưa đăng nhập → redirect đến trang login cho nhà hàng
            return redirect('/restaurant/login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }

        $user = Auth::guard('web')->user();

        $isRestaurant = $user->roles()->where('name', 'nhà hàng')->exists();

        if ($isRestaurant) {
            return redirect('/restaurant/menu_items');
        }

        return $next($request); // Nếu không phải nhà hàng, tiếp tục request
    }
}
