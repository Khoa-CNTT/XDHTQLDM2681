@extends('Client.Share.master')
@section('content')
<section class="my__account--section section--padding">
    <div class="container">
        <div class="my__account--section__inner border-radius-10 d-flex">
            <div class="account__left--sidebar">
                <h2 class="account__content--title h3 mb-20">Hồ sơ của tôi</h2>
                <p style="font-size: 16px; margin-bottom: 20px;">Xin chào, {{ Auth::user()->username }}!</p>
                <ul class="account__menu">
                    <li class="account__menu--list @if(request()->is('client/dashboard')) active @endif">
                        <a href="/client/dashboard">Lịch sử đặt món</a>
                    </li>
                    <li class="account__menu--list @if(request()->is('client/address')) active @endif">
                        <a href="/client/address">Địa chỉ</a>
                    </li>
                    <li class="account__menu--list @if(request()->is('client/information')) active @endif">
                        <a href="/client/information">Thông tin tài khoản</a>
                    </li>
                    <li class="account__menu--list">
                        <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <a href="{{ route('logout') }}">Đăng xuất</a>
                        </form>
                    </li>
                </ul>
            </div>
            @yield('settingaccount_content')
        </div>
    </div>
</section>
@endsection
