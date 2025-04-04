@extends('Client.Share.master')
@section('content')

    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title text-white mb-25">Account Page</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">Account Page</span></li>
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
                                    <h2 class="account__login--header__title h3 mb-10">Login</h2>
                                    <p class="account__login--header__desc">Login if you area a returning customer.</p>
                                </div>
                                <div class="account__login--inner">
                                    <form action="/account/actionlogin" method="POST">
                                        @csrf
                                        <label>
                                            <input class="account__login--input" placeholder="Email Address" type="email" name="email">
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </label>
                                        <label>
                                            <input class="account__login--input" placeholder="Password" type="password" name="password">
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </label>
                                        <button class="account__login--btn btn" type="submit">Đăng nhập</button>
                                    </form>
                                    <div class="account__login--divide">
                                        <span class="account__login--divide__text">OR</span>
                                    </div>
                                    <div class="account__social d-flex justify-content-center mb-15">
                                        <a class="account__social--link facebook" target="_blank"
                                            href="{{ route('auth.facebook') }}">Facebook</a>
                                        <a class="account__social--link google" target="_blank"
                                            href="{{ route('auth.google') }}">Google</a>
                                        <a class="account__social--link twitter" target="_blank"
                                            href="{{ route('auth.facebook') }}">Twitter</a>
                                    </div>
                                    <p class="account__login--signup__text">Don,t Have an Account? <button
                                            type="submit">Sign up now</button></p>
                                            <p><a href="{{ route('forget.password.get') }}">Quên mật khẩu</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="account__login register">
                                <div class="account__login--header mb-25">
                                    <h2 class="account__login--header__title h3 mb-10">Create an Account</h2>
                                    <p class="account__login--header__desc">Register here if you are a new customer</p>
                                </div>
                                <div class="account__login--inner">
                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <label>
                                            <input class="account__login--input" name="username" placeholder="Username" type="text"
                                                >
                                        </label>
                                    @error('username')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror


                                        <label>
                                            <input class="account__login--input" name="email" placeholder="Email Address" type="email"
                                               >
                                        </label>
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror

                                        <label>
                                            <input class="account__login--input" name="password" placeholder="Password" type="password">
                                        </label>
                                        @error('password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror

                                        <label>
                                            <input class="account__login--input" name="password_confirmation" placeholder="Confirm Password"
                                                type="password">
                                        </label>

                                        <button class="account__login--btn btn mb-10" type="submit">Submit & Register</button>

                                        <div class="account__login--remember position__relative">
                                            <input class="checkout__checkbox--input" id="check2" type="checkbox" required>
                                            <span class="checkout__checkbox--checkmark"></span>
                                            <label class="checkout__checkbox--label login__remember--label" for="check2">
                                                I have read and agree to the terms & conditions</label>
                                        </div>
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
    <section class="shipping__section2 shipping__style3">
        <div class="container">
            <div class="shipping__section2--inner shipping__style3--inner d-flex justify-content-between">
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img class="display-block" src="assets/img/other/shipping1.png" alt="shipping img">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Shipping</h2>
                        <p class="shipping__items2--content__desc">From handpicked sellers</p>
                    </div>
                </div>
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img class="display-block" src="assets/img/other/shipping2.png" alt="shipping img">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Payment</h2>
                        <p class="shipping__items2--content__desc">Visa, Paypal, Master</p>
                    </div>
                </div>
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img class="display-block" src="assets/img/other/shipping3.png" alt="shipping img">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Return</h2>
                        <p class="shipping__items2--content__desc">30 day guarantee</p>
                    </div>
                </div>
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img class="display-block" src="assets/img/other/shipping4.png" alt="shipping img">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Support</h2>
                        <p class="shipping__items2--content__desc">Support every time</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End shipping section -->
@endsection
