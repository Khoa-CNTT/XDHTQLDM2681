@extends('Admin.share.master')

@section('noi_dung')
    <h1>Tên quyền</h1>
    <a href="{{ route('roles.create') }}" class="btn btn-primary">Thêm quyền mới</a>
    <table class="table">
        <thead>
            <tr>

                <th>Tên quyền</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>
                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">Sửa</a>

                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
