@extends('Admin.share.master')

@section('noi_dung')
    <div class="container py-4 d-flex justify-content-center">
        <div class="col-lg-10 col-md-12">
            <div class="card shadow rounded-4">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded-top-4">
                <h4 class="mb-0">Quản lý quyền</h4>
                <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#createRoleModal">+ Thêm quyền
                    mới</button>
            </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-hover align-middle text-center">
                            <thead class="table-secondary">
                                <tr>
                                    <th scope="col">Tên quyền</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning me-1" data-bs-toggle="modal"
                                            data-bs-target="#editRoleModal{{ $role->id }}"><i class="fa-solid fa-pen-to-square"></i></button>

                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Bạn có chắc muốn xóa quyền này không?')"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                                @if($roles->isEmpty())
                                    <tr>
                                        <td colspan="2" class="text-muted">Chưa có quyền nào.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach($roles as $role)
        <!-- Modal chỉnh sửa quyền -->
        <div class="modal fade" id="editRoleModal{{ $role->id }}" tabindex="-1"
            aria-labelledby="editRoleModalLabel{{ $role->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 shadow">
                    <div class="modal-header bg-warning text-dark rounded-top-4">
                        <h5 class="modal-title" id="editRoleModalLabel{{ $role->id }}">Chỉnh sửa quyền</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('roles.update', $role->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name{{ $role->id }}" class="form-label">Tên quyền</label>
                                <input type="text" name="name" id="name{{ $role->id }}" class="form-control"
                                    value="{{ $role->name }}" required>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal Thêm quyền -->
    <div class="modal fade" id="createRoleModal" tabindex="-1" aria-labelledby="createRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header bg-primary text-white rounded-top-4">
                    <h5 class="modal-title" id="createRoleModalLabel">Tạo quyền mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên quyền</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Nhập tên quyền..." value="{{ old('name') }}" >
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Tạo quyền</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    @if ($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const modal = new bootstrap.Modal(document.getElementById('createRoleModal'));
                modal.show();
            });
        </script>
    @endif

@endsection
