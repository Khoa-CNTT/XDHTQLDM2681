<?php

namespace App\Http\Controllers\Shipper;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginDriverSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountShipperController extends Controller
{
    public function loginshipper()
    {
        return view('Shipper.page.login');
    }
    public function actionloginshipper(LoginDriverSeeder $request){
        $credentials = $request->only('email', 'password');
    //    dd($credentials);
        if (Auth::guard('driver_auth')->attempt($credentials)) {
            toastr()->success("Đã đăng nhập thành công!");
            return redirect('/shipper/home');
        }

        toastr()->error("Tài khoản hoặc mật khẩu không đúng!");
        return redirect('/account/login');
    }
}
