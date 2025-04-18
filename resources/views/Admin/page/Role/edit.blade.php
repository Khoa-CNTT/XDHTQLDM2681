@extends('Admin.share.master')

@section('noi_dung')

        <h1>Chỉnh sửa</h1>
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Tên quyền</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}" >
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>

@endsection
