<body>
    <h2>Nhập Mã OTP</h2>




    {{-- Hiển thị lỗi validate --}}
    @if ($errors->has('otp'))
        <p style="color: red;">{{ $errors->first('otp') }}</p>
    @endif

    <form method="POST" action="{{ route('verify.otp.submit_client') }}">
        @csrf
        <label for="otp">Mã OTP:</label>
        <input type="text" name="otp" value="{{ old('otp') }}">
        <button type="submit">Xác Thực</button>
    </form>
</body>
