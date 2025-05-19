<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/account/login')->with('error', 'Bạn cần đăng nhập để truy cập trang quản trị.');
        }

        if (!Auth::user()->is_admin) {
            return redirect('/')->with('error', 'Bạn không có quyền truy cập trang quản trị.');
        }
        return $next($request);
    }
}
