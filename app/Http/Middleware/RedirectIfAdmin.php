<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('web')->check()) {
            // Nếu chưa đăng nhập → redirect đến trang login cho tài khoản (admin, shipper)
            return redirect('/account/login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }

        $user = Auth::guard('web')->user();

        $isAdmin = $user->roles()->where('name', 'admin')->exists();

        if ($isAdmin) {
            return redirect('/admin/restaurant/index');
        }

        return $next($request); // Nếu không phải admin, tiếp tục request
    }
}
