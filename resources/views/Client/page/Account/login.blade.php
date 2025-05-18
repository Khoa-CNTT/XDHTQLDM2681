@extends('Client.Share.master')
@section('content')

    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title text-white mb-25">Tài khoản</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items"><a class="text-white" href="/">Trang chủ</a>
                            </li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">Tài khoản</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- Start login section  -->
    <div class="login__section section--padding mb-80">
        <div class="container">
            <div class="login__section--inner">



                <div class="row row-cols-md-2 row-cols-1">
                    <div class="col">
                        <div class="account__login">
                            <div class="account__login--header mb-25">
                                <h2 class="account__login--header__title h3 mb-10">Đăng nhập</h2>
                                <p class="account__login--header__desc">Nếu bạn đã có tài khoản hãy đăng nhập ở đây.</p>
                            </div>
                            <div class="account__login--inner">

                                {{-- Thông báo lỗi bằng SweetAlert2 --}}
                                @if (session('error'))
                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                    <script>
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Lỗi!',
                                            text: '{{ session('error') }}',
                                            confirmButtonText: 'OK'
                                        });
                                    </script>
                                @endif

                                <form action="/account/actionlogin" method="POST">
                                    @csrf
                                    <label>
                                        <input class="account__login--input" placeholder="Tên tài khoản" type="text" name="username_client">
                                        @error('username_client')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </label>
                                    <label>
                                        <input class="account__login--input" placeholder="Mật khẩu" type="password" name="password_client">
                                        @error('password_client')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </label>
                                    <button class="account__login--btn btn" type="submit">Đăng nhập</button>
                                </form>
                                <p class="text-end mt-2"><a href="{{ route('forget.password.get') }}">Quên mật khẩu</a></p>
                                <div class="account__login--divide">
                                    <span class="account__login--divide__text">hoặc</span>
                                </div>
                                <div class="account__social d-flex justify-content-center mb-15">
                                    <a class="account__social--link facebook" target="_blank"
                                        href="{{ route('auth.facebook') }}">Facebook</a>
                                    <a class="account__social--link google" target="_blank" href="{{ route('auth.google') }}">Google</a>
                                </div>
                                <p class="account__login--signup__text">
                                    Nếu chưa có tài khoản?
                                    <a href="{{ route('register') }}">Tạo tài khoản mới</a>
                                </p>
                            </div>
                        </div>
                    </div>


                    <div class="col">
                        <div class="account__login register">
                            <div class="account__login--header mb-25">
                                <h2 class="account__login--header__title h3 mb-10">Đăng ký</h2>
                                <p class="account__login--header__desc">đăng ký tài khoản mới</p>
                            </div>
                            <div class="account__login--inner">
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <label>
                                        <input class="account__login--input" name="username" placeholder="Tên tài khoản"
                                            type="text">
                                        @error('username')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </label>

                                    <label>
                                        <input class="account__login--input" name="email" placeholder="Email Address"
                                            type="email">
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </label>

                                    <label>
                                        <input class="account__login--input" name="password" placeholder="Mật khẩu mới"
                                            type="password">
                                        @error('password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </label>

                                    <label>
                                        <input class="account__login--input" name="password_confirmation"
                                            placeholder="Mật khẩu lặp lại" type="password">
                                    </label>

                                    <button class="account__login--btn btn mb-10" type="submit">Đăng ký</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- End login section  -->

    <!-- Start shipping section -->

    <!-- End shipping section -->
@endsection
