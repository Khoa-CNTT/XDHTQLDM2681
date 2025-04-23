@extends('Client.Share.master')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card shadow rounded-4 p-4" style="width: 100%; max-width: 400px;">
            <h4 class="text-center mb-4">Xác Thực Mã OTP</h4>

            {{-- Hiển thị lỗi validate --}}
            @if ($errors->has('otp'))
                <div class="alert alert-danger text-center">
                    {{ $errors->first('otp') }}
                </div>
            @endif

            {{-- Hiển thị flash message nếu có --}}
            @if(session('error'))
                <div class="alert alert-danger text-center">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('verify.otp.submit_client') }}">
                @csrf

                <div class="mb-3">
                    <label for="otp" class="form-label">Nhập mã OTP đã gửi:</label>
                    <input type="text" name="otp" id="otp" class="form-control " value="{{ old('otp') }}"
                        placeholder="Nhập mã OTP">
                </div>

                <button type="submit" class="btn btn-primary w-100 ">Xác Thực</button>
            </form>
        </div>
    </div>
@endsection
