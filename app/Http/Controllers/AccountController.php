<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserOtpRequest;
use App\Mail\OTPMail;
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
use Illuminate\Support\Facades\Session;

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


    public function actionLogin(UserLoginRequest $request)
    {
        // dd($request->all());
        // $request->email, $request->password
        $check =  Auth::guard('web')->attempt([
            'username'     => $request->username_client,
            'password'  => $request->password_client
        ]);
        // dd($check);
        if ($check) {
            return redirect('/');
        } else {
            return redirect('/account/login');
        }
    }
    public function actionRegister(ResisterUserRequest $request)
    {


        if (User::where('username', $request->username)->exists()) {

            return redirect('/account/register');
        }
        $otp = rand(100000, 999999);
        Session::put('otp', $otp);
        Session::put('register_data', $request->all()); // Lưu dữ liệu đăng ký tạm thời
        Mail::to($request->email)->send(new OTPMail($otp));




         return redirect()->route('verify.otp_client')->with('success', 'Mã OTP đã được gửi đến email của bạn!');
    }
    public function showOTPForm()
    {
        return view('Client.page.Account.Emails.verify_otp');
    }

    public function verifyOTP(UserOtpRequest $request)
    {
        // dd($request->all());


        if (Session::get('otp') == $request->otp) {
            // Lấy dữ liệu đăng ký từ Session
            $data = Session::get('register_data');
          // dd($data);
            // Kiểm tra dữ liệu có tồn tại không
            if (!$data) {
                return back()->with('error', 'Dữ liệu đăng ký không hợp lệ. Vui lòng đăng ký lại.');
            }

            $user = User::create([
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);

            //dd($user);

            Auth::guard('web')->login($user);

            // Xóa OTP và dữ liệu đăng ký trong session sau khi xác thực thành công
            Session::forget(['otp', 'register_data']);

            return redirect('account/login')->with('success', 'Xác thực thành công! Tài khoản của bạn đã được tạo.');
        }

        return back()->withErrors(['otp' => 'Mã OTP không hợp lệ. Vui lòng thử lại.'])->withInput();
    }





    //xử lý quên mật khẩu

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
