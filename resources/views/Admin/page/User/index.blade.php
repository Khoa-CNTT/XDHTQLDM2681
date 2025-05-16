@extends('Admin.share.master')

@section('noi_dung')
    <div class="container py-4">
        <div class="card shadow rounded-4">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded-top-4">
                <h4 class="mb-0">Danh sách người dùng</h4>
                <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#createUserModal">+ Thêm mới</button>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-hover table-bordered text-center align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Tên tài khoản</th>
                                <th>Email</th>
                                <th>Quyền</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                                            <tr>
                                                                <td>{{ $user->username }}</td>
                                                                <td>{{ $user->email }}</td>
                                                                <td>
                                                                    @foreach($user->roles as $role)
                                                                        <span class="badge bg-secondary">{{ $role->name }}</span>
                                                                    @endforeach
                                                                </td>
                                                               <td>
                                    <!-- Nút mở modal sửa -->
                                    <button type="button" class="btn btn-warning btn-sm text-center" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->id }}">

                                    <i class="fa-solid fa-pen-to-square text-center"></i>
                                    </button>

                                    <!-- Modal sửa -->
                                    <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="editUserModalLabel{{ $user->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <form method="POST" action="{{ route('users.update', $user->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editUserModalLabel{{ $user->id }}">Cập nhật người dùng</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label">Họ và tên</label>
                                                            <input type="text" name="fullname" class="form-control" value="{{ $user->fullname }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Tên người dùng</label>
                                                            <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Email</label>
                                                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Chọn quyền:</label>
                                                            <div class="row">
                                                                @foreach($roles as $role)
                                                                    <div class="col-md-6">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" name="role_ids[]"
                                                                                id="role_edit_{{ $role->id }}_{{ $user->id }}"
                                                                                value="{{ $role->id }}"
                                                                                {{ $user->roles->contains($role->id) ? 'checked' : '' }}>
                                                                            <label class="form-check-label" for="role_edit_{{ $role->id }}_{{ $user->id }}">
                                                                                {{ $role->name }}
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                        <button type="submit" class="btn btn-success">Cập nhật</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Nút xóa -->

                                    <!-- Nút mở modal xóa -->
                                    <button type="button" class="btn btn-danger btn-sm text-center" data-bs-toggle="modal"
                                        data-bs-target="#deleteUserModal{{ $user->id }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                    <!-- Modal xác nhận xóa -->
                                    <div class="modal fade" id="deleteUserModal{{ $user->id }}" tabindex="-1"
                                        aria-labelledby="deleteUserModalLabel{{ $user->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteUserModalLabel{{ $user->id }}">Xác nhận xóa người dùng</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Bạn có chắc chắn muốn xóa người dùng <strong>{{ $user->username }}</strong>?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>


                                                            </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-muted">Không có người dùng nào.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Thêm người dùng mới -->
    <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header bg-primary text-white rounded-top-4">
                    <h5 class="modal-title" id="createUserModalLabel">Thêm người dùng mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="username" class="form-label">Tên người dùng</label>
                            <input type="text" id="username" name="username"
                                class="form-control @error('username') is-invalid @enderror"
                                value="{{ old('username') }}" placeholder="Nhập tên người dùng" required>
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Họ và tên</label>
                            <input type="text" id="fullname" name="fullname" class="form-control @error('fullname') is-invalid @enderror"
                                value="{{ old('fullname') }}" placeholder="Nhập tên người dùng" required>
                            @error('fullname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" placeholder="Nhập email" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" id="password" name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Nhập mật khẩu" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Chọn quyền:</label>
                            <div class="row">
                                @foreach($roles as $role)
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="role_ids[]"
                                                id="role{{ $role->id }}" value="{{ $role->id }}"
                                                {{ (collect(old('role_ids'))->contains($role->id)) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="role{{ $role->id }}">
                                                {{ $role->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @error('role_ids')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-success px-4">Thêm mới</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Giữ modal mở nếu có lỗi -->
    @if ($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const modal = new bootstrap.Modal(document.getElementById('createUserModal'));
                modal.show();
            });
        </script>
    @endif
@endsection
