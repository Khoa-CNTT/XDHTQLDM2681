<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        //dd(env('GOOGLE_REDIRECT'));
         return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Kiểm tra xem user có trong database hay chưa
            $user = User::where('google_id', $googleUser->getId())
                ->orWhere('email', $googleUser->getEmail())
                ->first();

            if ($user) {
                // Nếu user đã tồn tại nhưng chưa có google_id thì cập nhật
                if (!$user->google_id) {
                    $user->update(['google_id' => $googleUser->getId()]);
                }

                Auth::login($user);
            } else {
                // Nếu user chưa tồn tại, tạo mới
                $user = User::create([
                    'username' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt('123456dummy') // Dùng bcrypt thay vì encrypt
                ]);

                Auth::login($user);
            }

            return redirect('/'); // Điều hướng về trang chủ nếu đăng nhập thành công

        } catch (Exception $e) {
            Log::error('Google login error: ' . $e->getMessage());
            return redirect('/account/login')->with('error', 'Đăng nhập Google thất bại, vui lòng thử lại.');
        }
    }
}
