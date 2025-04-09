<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\ResisterUserRequest;
use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\updateinformationRequest;

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
        $user = auth()->user();
        return view("Client.page.Account.Information",compact('user'));
    }
    public function updateinformation(updateinformationRequest $request)
    {

        $user = auth()->user(); 
        // Cập nhật thông tin người dùng
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->PhoneNumber = $request->input('PhoneNumber');
        $user->Address = $request->input('Address');
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        // Lưu thông tin đã cập nhật vào cơ sở dữ liệu
        $user->save();
    
        // Trả về thông báo thành công và chuyển hướng về trang thông tin người dùng
        return redirect()->route('account.information')->with('success', 'Your profile has been updated successfully.');
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
    public function showForgetPasswordForm()
      {
         return view('Client.page.Account.forgetPassword');
      }

      /**
       * Write code on Method
       *
       * @return response()
       */
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // Kiểm tra email có trong bảng users không
        $user = DB::table('users')->where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email này chưa đăng ký tài khoản.']);
        }

        $token = Str::random(64);

        // Thay vì insert, dùng updateOrInsert để tránh lỗi trùng lặp
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            ['token' => $token, 'created_at' => now()]
        );

        // Gửi email đặt lại mật khẩu
        Mail::send('Client.page.Account.Emails.forgetPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Đặt lại mật khẩu của bạn');
        });

        return back()->with('message', 'Chúng tôi đã gửi email đặt lại mật khẩu!');
    }





      public function showResetPasswordForm($token)
      {
         return view('Client.page.Account.forgetPasswordLink', ['token' => $token]);
      }


      public function submitResetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:password_reset_tokens',
              'password' => 'required|string|min:6|confirmed',
              'password_confirmation' => 'required'
          ]);

          $updatePassword = DB::table('password_reset_tokens')
                              ->where([
                                'email' => $request->email,
                                'token' => $request->token
                              ])
                              ->first();

          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }

          $user = User::where('email', $request->email)
                      ->update(['password' => bcrypt($request->password)]);

          DB::table('password_reset_tokens')->where(['email'=> $request->email])->delete();

          return redirect('/account/login')->with('message', 'Thay đổi mật khẩu thành công');
      }
    public function actionLogout()
    {
        Auth::guard('web')->logout(); // Đăng xuất user
        toastr()->success("Đã đăng xuất thành công!");
        return redirect('/account/login'); // Chuyển hướng về trang login
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
