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
        if (Auth::guard('driver_auth')->check()) {
            if (Auth::guard('driver_auth')->user()->is_approved == 0) {
                return redirect()->route('shipper.home')->with('error', 'Bạn không đủ quyền vào trang này');
            }
        } else {
            return redirect()->route('shipper.login')->with('error', 'Vui lòng đăng nhập để truy cập');
        }

        return $next($request);
    }
}
