<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function login()
    {

        return view('Restaurant.page.Account.login');
    }
    public function actionLogin(Request $request)
    {
        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::user();
            //dd($user);

            $hasRestaurantRole = $user->roles()->where('name', 'Nhà hàng')->exists();

            if ($hasRestaurantRole) {
                return redirect('/restaurant/menu_items');
            } else {
                Auth::logout();
                return redirect('/')->with('error', 'Bạn không có quyền truy cập khu vực nhà hàng.');
            }
        } else {
            return redirect('/restaurant/login')->with('error', 'Sai tên đăng nhập hoặc mật khẩu.');
        }
    }
}
