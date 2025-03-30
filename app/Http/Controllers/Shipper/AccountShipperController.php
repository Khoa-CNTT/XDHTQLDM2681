<?php

namespace App\Http\Controllers\Shipper;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginDriverSeeder;
use App\Http\Requests\RegisterShipperRequest;
use App\Models\Driver;
use Illuminate\Http\Request;
use App\Mail\OTPMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;


class AccountShipperController extends Controller
{
    public function loginshipper()
    {

        return view('Shipper.page.Account.login');
    }
    public function actionloginshipper(LoginDriverSeeder $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Debug dữ liệu đầu vào
        //dd($credentials, Auth::guard('driver_auth')->attempt($credentials));

        if (Auth::guard('driver_auth')->attempt($credentials)) {
            toastr()->success("Đã đăng nhập thành công!");
            return redirect('/');
        } else {
            toastr()->error("Tài khoản hoặc mật khẩu không đúng!");
            return redirect('/account/login');
        }
    }
    public function registershipper()
    {

        return view('Shipper.page.Account.register');
    }
    public function actionregistershipper(RegisterShipperRequest $request)
    {
         //dd($request->all());



        // Tạo mã OTP
        $otp = rand(100000, 999999);
        Session::put('otp', $otp);
        Session::put('register_data', $request->all()); // Lưu dữ liệu đăng ký tạm thời
         //dd("Email: " . $request->email, "OTP: " . $otp);
        // Gửi OTP qua email
        Mail::to($request->email)->send(new OTPMail($otp));

        return redirect()->route('verify.otp')->with('success', 'Mã OTP đã được gửi đến email của bạn!');
    }

    public function showOTPForm()
    {
        return view('Shipper.page.Email.verify_otp');
    }

    public function verifyOTP(Request $request)
    {
        $request->validate(['otp' => 'required|numeric']);

        if (Session::get('otp') == $request->otp) {
            // Lấy dữ liệu đăng ký từ Session
            $data = Session::get('register_data');

            // Kiểm tra dữ liệu có tồn tại không
            if (!$data) {
                return back()->with('error', 'Dữ liệu đăng ký không hợp lệ. Vui lòng đăng ký lại.');
            }

            // Tạo tài khoản mới với mật khẩu mặc định "123456"
            Driver::create([
                'username'      => $data['username'],
                'password'      => bcrypt('123456'), // Mật khẩu mặc định
                'email'         => $data['email'],
                'address'         => $data['address'],
                'phonenumber'   => $data['phonenumber'],
                'fullname'      => $data['fullname'],
                'dateofbirth'   => $data['dateofbirth'] ?? null,
                'vehicle_type'  => $data['vehicle_type'] ?? null,
                'license_plate' => $data['license_plate'] ?? null,
                'id_card'       => $data['id_card'] ?? null,
            ]);

            // Xóa OTP và dữ liệu đăng ký trong session sau khi xác thực thành công
            Session::forget(['otp', 'register_data']);

            return redirect()->route('login.shipper')->with('success', 'Xác thực thành công! Tài khoản của bạn đã được tạo. Mật khẩu mặc định là 123456.');
        }

        return back()->with('error', 'Mã OTP không đúng, vui lòng thử lại.');
    }
}
