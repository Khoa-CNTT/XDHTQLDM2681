<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Xác Thực OTP</title>
</head>

<body>
    <h2>Nhập Mã OTP</h2>

    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <form method="POST" action="{{ route('verify.otp.submit_client') }}">
        @csrf
        <label for="otp">Mã OTP:</label>
        <input type="text" name="otp" >
        <button type="submit">Xác Thực</button>
    </form>
</body>

</html>
