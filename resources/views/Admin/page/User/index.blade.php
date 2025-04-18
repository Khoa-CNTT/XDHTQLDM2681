@extends('Admin.share.master')

@section('noi_dung')
<h2>Danh sách người dùng</h2>
<a href="{{ route('users.create') }}">Thêm mới</a>
<table>
    <tr>
        <th>Tên</th>
        <th>Email</th>
        <th>Quyền</th>
        <th>Hành động</th>
    </tr>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @foreach($user->roles as $role)
                    {{ $role->name }}
                @endforeach
            </td>
            <td>
                <a href="{{ route('users.edit', $user->id) }}">Sửa</a>
                <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display:inline;">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Xóa không?')">Xóa</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection
