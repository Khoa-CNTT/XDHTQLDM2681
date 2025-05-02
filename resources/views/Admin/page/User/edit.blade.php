@extends('Admin.share.master')

@section('noi_dung')
<div class="container d-flex justify-content-center">
    <div class="col-md-8 col-lg-6 col-12">
        <div class="card shadow rounded-4 mt-4">
            <div class="card-header bg-primary text-white text-center rounded-top-4">
                <h4 class="mb-0">{{ isset($user) ? 'Cập nhật người dùng' : 'Thêm người dùng mới' }}</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}">
                    @csrf
                    @if(isset($user)) @method('PUT') @endif

                    <div class="mb-3">
                        <label for="username" class="form-label">Tên người dùng</label>
                        <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $user->username ?? '') }}" required>
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email ?? '') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    @if(!isset($user))
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Chọn quyền:</label>
                        <div class="row">
                            @foreach($roles as $role)
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="role_ids[]" id="role{{ $role->id }}"
                                            value="{{ $role->id }}"
                                            {{ (isset($user) && $user->roles->contains($role->id)) || (is_array(old('role_ids')) && in_array($role->id, old('role_ids'))) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="role{{ $role->id }}">
                                            {{ $role->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @error('role_ids')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success px-4">{{ isset($user) ? 'Cập nhật' : 'Thêm mới' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
