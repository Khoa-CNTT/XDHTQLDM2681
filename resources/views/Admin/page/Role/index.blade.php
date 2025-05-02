@extends('Admin.share.master')

@section('noi_dung')
    <div class="container py-4 d-flex justify-content-center">
        <div class="col-lg-10 col-md-12">
            <div class="card shadow rounded-4">
                <div
                    class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded-top-4">
                    <h4 class="mb-0">Quản lý quyền</h4>
                    <a href="{{ route('roles.create') }}" class="btn btn-light btn-sm">+ Thêm quyền mới</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle text-center">
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
                                            <a href="{{ route('roles.edit', $role->id) }}"
                                                class="btn btn-sm btn-warning me-1">Sửa</a>
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Bạn có chắc muốn xóa quyền này không?')">Xóa</button>
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
@endsection
