@extends('Shipper.share.master')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">👤 Quản lý Thông tin Cá nhân</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('shipper.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="text-center mb-4">
                        @if($shipper->avatar)
                            <img src="{{ asset($shipper->avatar) }}" alt="Avatar" class="rounded-circle" width="120"
                                height="120">
                        @else
                            <img src="{{ asset('default-avatar.png') }}" alt="Avatar" class="rounded-circle" width="120"
                                height="120">
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="fullname" class="form-label">Họ và Tên</label>
                        <input type="text" name="fullname" id="fullname" class="form-control"
                            value="{{ old('fullname', $shipper->fullname) }}" >
                    </div>
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Tên Tài khoản</label>
                        <input type="text" name="username" id="username" class="form-control"
                            value="{{ old('username', $shipper->username) }}" >
                    </div>


                    <div class="mb-3">
                        <label for="phonenumber" class="form-label">Số điện thoại</label>
                        <input type="text" name="phonenumber" id="phonenumber" class="form-control"
                            value="{{ old('phonenumber', $shipper->phonenumber) }}" >
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input type="text" name="address" id="address" class="form-control"
                            value="{{ old('address', $shipper->address) }}">
                    </div>

                    <div class="mb-3">
                        <label for="avatar" class="form-label">Ảnh đại diện (nếu muốn đổi)</label>
                        <input type="file" name="avatar" id="avatar" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-success w-100">💾 Cập nhật Thông tin</button>
                </form>
            </div>
        </div>
    </div>
@endsection
