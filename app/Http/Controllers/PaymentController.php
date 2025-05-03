<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    public function vnpay($amount)
    {
        $vnpayUrl = $this->generateVnpayUrl($amount);
        return redirect()->away($vnpayUrl);
    }

    private function generateVnpayUrl($amount)
    {
        $vnp_TmnCode = 'NJJ0R8FS'; // Mã website (TmnCode) được cấp bởi VNPay
        $vnp_HashSecret = 'BYKJBHPPZKQMKBIBGGXIYKWYFAYSJXCW'; // Chuỗi bí mật được cấp bởi VNPay
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html"; // Sử dụng URL test hoặc production tùy môi trường
        $vnp_ReturnUrl = route('payment.vnpay.callback');
        $vnp_TxnRef = uniqid(); // Mã giao dịch duy nhất
        $vnp_OrderInfo = "Thanh toán đơn hàng";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $amount * 100; // VNPay yêu cầu nhân 100
        $vnp_Locale = 'vn';
        $vnp_BankCode = '';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => now()->format('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_ReturnUrl,
            "vnp_TxnRef" => $vnp_TxnRef
        );

        if ($vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_SecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
        $vnp_Url .= "?" . $query . 'vnp_SecureHash=' . $vnp_SecureHash;

        return $vnp_Url;
    }
    public function vnpayCallback(Request $request)
    {
        $vnp_ResponseCode = $request->input('vnp_ResponseCode');

        if ($vnp_ResponseCode == '00') {
            $user = Auth::user();
            $orders = Order::with(['restaurant', 'orderDetails.menuItem'])
                ->where('user_id', $user->id)
                ->orderBy('order_date', 'desc')
                ->get();

            return view('client.page.order.tracking', compact('orders'));
        } else {

            return view('payment.failed');
        }
    }
}
