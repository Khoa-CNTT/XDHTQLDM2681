@extends('Admin.share.master')

@section('noi_dung')
    <form method="POST" action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}">
        @csrf
        @if(isset($user)) @method('PUT') @endif

        <input name="username" placeholder="Username" value="{{ $user->username ?? '' }}">
        <input name="email" placeholder="Email" value="{{ $user->email ?? '' }}">
        @if(!isset($user)) <input name="password" placeholder="Password" type="password"> @endif

        <label>Chọn quyền:</label>
        @foreach($roles as $role)
            <input type="checkbox" name="role_ids[]" value="{{ $role->id }}" {{ isset($user) && $user->roles->contains($role->id) ? 'checked' : '' }}>
            {{ $role->name }}
        @endforeach

        <button type="submit">{{ isset($user) ? 'Cập nhật' : 'Thêm' }}</button>
    </form>



@endsection
