@extends('Shipper.share.master')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">🔒 Đổi Mật Khẩu</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('shipper.updatePassword') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="current_password" class="form-label">Mật khẩu hiện tại</label>
                        <input type="password" name="current_password" id="current_password" class="form-control" >
                    </div>

                    <div class="mb-3">
                        <label for="new_password" class="form-label">Mật khẩu mới</label>
                        <input type="password" name="new_password" id="new_password" class="form-control" >
                    </div>

                    <div class="mb-3">
                        <label for="new_password_confirmation" class="form-label">Xác nhận mật khẩu mới</label>
                        <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                            class="form-control" >
                    </div>

                    <button type="submit" class="btn btn-primary w-100">🔄 Cập nhật Mật khẩu</button>
                </form>
            </div>
        </div>
    </div>
@endsection
