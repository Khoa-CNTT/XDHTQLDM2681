<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\ResisterUserRequest;
use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $check = Auth::guard('web')->check();
        if ($check) {
            return redirect('/');
        } else {
            return view("Client.page.Account.login");
        }
    }
    public function dashboard()
    {
        return view("Client.page.Account.Dashboard");
    }
    public function address()
    {
        return view("Client.page.Account.Address");
    }
    public function information()
    {
        return view("Client.page.Account.Information");
    }


    public function actionLogin(UserLoginRequest $request)
    {
        // dd($request->all());
        // $request->email, $request->password
        $check =  Auth::guard('web')->attempt([
            'email'     => $request->email,
            'password'  => $request->password
        ]);
        // dd($check);
        if ($check) {
            toastr()->success("Đã đăng nhập thành công!");
            return redirect('/');
        } else {
            toastr()->error("Tài khoản hoặc mật khẩu không đúng!");
            return redirect('/account/login');
        }
    }
    public function actionRegister(ResisterUserRequest $request)
    {
        if (User::where('email', $request->email)->exists()) {
            toastr()->error("Email đã được sử dụng!");
            return redirect('/account/register');
        }

        if (User::where('username', $request->username)->exists()) {
            toastr()->error("Tên tài khoản đã tồn tại!");
            return redirect('/account/register');
        }

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        Auth::guard('web')->login($user);

        toastr()->success("Đăng ký thành công!");
        return redirect('/');
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        //
    }
}
