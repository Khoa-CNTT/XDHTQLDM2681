<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationUpdateRequest;
use App\Http\Requests\updateinformationRequest;
use App\Http\Requests\UserOtpRequest;
use App\Mail\OTPMail;
use App\Models\Location;
use App\Models\Role;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\ResisterUserRequest;
use App\Models\Account;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view("Client.page.Account.Dashboard", compact('orders'));
    }
    public function address()
    {
        $user = Auth::user();

        $location = Location::find($user->location_id);
        return view('Client.page.Account.Address', compact('location', 'user'));
    }
    public function information()
    {
        $user = Auth::user();
        return view("Client.page.Account.Information",compact('user'));
    }
    public function updateinformation(updateinformationRequest $request)
    {
        $user = Auth::user();

        $fields = ['fullname', 'username', 'email', 'PhoneNumber', 'Address' ];

        foreach ($fields as $field) {
            if ($request->filled($field) && $request->input($field) !== $user->$field) {
                $user->$field = $request->input($field);
            }
        }

        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return redirect()->route('account.information')->with('success', 'Thông tin tài khoản đã được cập nhật thành công.');
    }




    public function actionLogin(UserLoginRequest $request)
    {
        //dd($request->all());
        $credentials = [
            'username' => $request->username_client,
            'password' => $request->password_client,
        ];

        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::user();

            $adminRole = Role::where('name', 'admin')->first();
            $customerRole = Role::where('name', 'Khách hàng')->first();

            if ($adminRole && $user->roles->contains($adminRole->id)) {
                return redirect('/admin/roles');
            } elseif ($customerRole && $user->roles->contains($customerRole->id)) {
                return redirect('/');
            } else {
                Auth::logout();
                return redirect('/account/login')->with('error', 'Bạn không có quyền truy cập.');
            }
        } else {
            return redirect('/account/login')->with('error', 'Sai tên đăng nhập hoặc mật khẩu.');
        }
    }

    public function actionRegister(ResisterUserRequest $request)
    {



        if (User::where('username', $request->username)->exists()) {

            return redirect('/account/register');
        }
        if (User::where('email', $request->email)->exists()) {

            return redirect('/account/register');
        }
        $otp = rand(100000, 999999);
        Session::put('otp', $otp);
        Session::put('register_data', $request->all());
        Mail::to($request->email)->send(new OTPMail($otp));




         return redirect()->route('verify.otp_client')->with('success', 'Mã OTP đã được gửi đến email của bạn!');
    }
    public function showOTPForm()
    {
        return view('Client.page.Account.Emails.verify_otp');
    }



    public function verifyOTP(UserOtpRequest $request)
    {
        if (Session::get('otp') == $request->otp) {
            $data = Session::get('register_data');

            if (!$data) {
                return back()->with('error', 'Dữ liệu đăng ký không hợp lệ. Vui lòng đăng ký lại.');
            }

            $user = User::create([
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);

            $role = Role::where('name', 'Khách hàng')->first();

            if ($role) {
                $user->roles()->attach($role->id);
            }

            Auth::guard('web')->login($user);

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
    // UserController.php


    /**
     * Update the specified resource in storage.
     */


    public function update(LocationUpdateRequest $request)
    {
        $request->validate([
            'City' => 'required|string|max:100',
            'District' => 'required|string|max:100',
            'Ward' => 'required|string|max:100',
            'Address' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        $fullAddress = $request->Address . ', ' . $request->Ward . ', ' . $request->District . ', ' . $request->City;

        $lat = null;
        $lon = null;

        try {
            $response = Http::withHeaders([
                'User-Agent' => 'CallFood/1.0 (longkolp16@gmail.com)'
            ])->get('https://nominatim.openstreetmap.org/search', [
                'q' => $fullAddress,
                'format' => 'json',
                'limit' => 1
            ]);

            $data = $response->json();

            if ($response->successful() && !empty($data)) {
                $lat = $data[0]['lat'] ?? null;
                $lon = $data[0]['lon'] ?? null;
            } else {
                Log::warning('Không tìm được tọa độ cho địa chỉ: ' . $fullAddress);
            }
        } catch (\Exception $e) {
            Log::error('Lỗi khi lấy tọa độ: ' . $e->getMessage());
        }

        if ($user->location_id) {
            $location = Location::find($user->location_id);
            if ($location) {
                $location->update([
                    'City' => $request->City,
                    'District' => $request->District,
                    'Ward' => $request->Ward,
                    'Address' => $request->Address,
                    'Latitude' => $lat,
                    'Longitude' => $lon,
                    'restaurant_id'=> 0,
                ]);
            }
        } else {
            $location = Location::create([
                'City' => $request->City,
                'District' => $request->District,
                'Ward' => $request->Ward,
                'Address' => $request->Address,
                'Latitude' => $lat,
                'Longitude' => $lon,
                'restaurant_id' => 0,
            ]);
            $user->location_id = $location->id;
            $user->save();
        }

        return back()->with('success', 'Địa chỉ đã được cập nhật');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        //
    }
}
