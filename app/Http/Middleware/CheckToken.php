<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

use function Flasher\Toastr\Prime\toastr;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $check = Auth::guard("web")->check();
        if ($check) {
            return $next($request);
        } else {
            toastr()->error("Yêu cầu phải đăng nhập!");
            return redirect('/account/login');
        }
    }
//     public function handle($request, Closure $next, ...$guards)
// {
//     if (Auth::guard()->guest()) {
//         if ($request->ajax() || $request->wantsJson()) {
//             return response('Unauthorized.', 401);
//         } else {
//             // Hiển thị thông báo yêu cầu đăng nhập mà không chuyển hướng
//             return back()->with('message', 'Vui lòng đăng nhập để tiếp tục.');
//         }
//     }

    // return $next($request);
// }
}
