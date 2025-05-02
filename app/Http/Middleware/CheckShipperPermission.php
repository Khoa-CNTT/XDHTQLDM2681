<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckShipperPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('driver_auth')->check()) {
            if ($request->routeIs('login.shipper') || $request->routeIs('login.shipper')) {
                return $next($request); // Cho phép vào trang login
            }

            return redirect()->route('login.shipper')->with('error', 'Vui lòng đăng nhập để truy cập');
        }

        return $next($request);
    }
}
