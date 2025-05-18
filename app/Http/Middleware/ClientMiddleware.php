<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ClientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/account/login')->with('error', 'Bạn cần đăng nhập để tiếp tục.');
        }

        // Kiểm tra role client đơn giản
        if (Auth::user()->role !== 'client') {
            Auth::logout();
            return redirect('/account/login')->with('error', 'Bạn không có quyền truy cập vào trang này.');
        }

        return $next($request);
    }
}
