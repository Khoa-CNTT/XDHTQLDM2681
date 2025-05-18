@extends('Client.Share.master')

@section('noi_dung')
    <div class="container text-center mt-5">
        <h2>💰 Thanh toán bằng Bitcoin (Demo)</h2>
        <p>Đây là mô phỏng thanh toán bằng Bitcoin. Không cần gửi tiền.</p>
        <img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=bitcoin:1DemoBitcoinAddressXYZ123" alt="QR Bitcoin">

        <p><strong>Địa chỉ ví:</strong> 1DemoBitcoinAddressXYZ123</p>
        <a href="/" class="btn btn-primary mt-3">Về trang chủ</a>
    </div>
@endsection
