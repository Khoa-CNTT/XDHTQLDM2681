<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ShipperRegistrationApproveNotification;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ShipperController extends Controller
{
    public function getPendingDrivers()
    {
        $drivers = Driver::whereDate('created_at', '>=', now()->subDays(7)) // chỉ lấy các driver đăng ký trong vòng 7 ngày
            ->get();

        return view('Admin.page.Shipper.index', compact('drivers'));
    }


    public function approveDriver(Driver $driver)
    {
        // Kiểm tra nếu đã quá 7 ngày thì báo không đăng ký thành công
        if ($driver->created_at->diffInDays(now()) > 7) {
            return redirect()->route('admin.pending_drivers')->with('error', 'Đăng ký của bạn đã hết thời gian xét duyệt. Vui lòng đăng ký lại lần sau.');
        }

        $driver->is_active = true;  // giả sử trạng thái "approved" là phê duyệt
        $driver->save();

        Mail::to($driver->email)->send(new ShipperRegistrationApproveNotification($driver));

        return redirect()->route('admin.pending_drivers')->with('success', 'Tài khoản đã được phê duyệt và thông báo đã được gửi qua email.');
    }
}
