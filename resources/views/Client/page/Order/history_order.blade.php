@extends('Client.Share.master')
@section('content')

    <main class="main__content_wrapper">

        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <h1 class="breadcrumb__content--title text-white mb-25">My Account</h1>
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a class="text-white"
                                        href="index.html">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">My Account</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- my account section start -->
        <section class="my__account--section section--padding">
            <div class="container">
                <p class="account__welcome--text">Xin chào, {{ Auth::user()->username }}</p>
                <div class="my__account--section__inner border-radius-10 d-flex">
                    <div class="account__left--sidebar">
                        <h2 class="account__content--title h3 mb-20">My Profile</h2>
                        <ul class="account__menu">
                            <li class="account__menu--list active"><a href="my-account.html">Dashboard</a></li>
                            <li class="account__menu--list"><a href="my-account-2.html">Addresses</a></li>
                            <li class="account__menu--list"><a href="wishlist.html">Wishlist</a></li>
                            <li class="account__menu--list"><a href="{{ route('logout') }}">Log Out</a></li>
                        </ul>
                    </div>
                    <div class="account__wrapper">
                        <div class="account__content">
                            <h2 class="account__content--title h3 mb-20">Lịch sử đơn hàng</h2>
                            <div class="account__table--area">
                                <table class="account__table">
                                    <thead class="account__table--header">
                                        <tr class="account__table--header__child">
                                            <th class="account__table--header__child--items">Mã đơn hàng</th>
                                            <th class="account__table--header__child--items">Ngày đặt</th>
                                            <th class="account__table--header__child--items">Trạng thái đơn hàng</th>
                                            {{-- <th class="account__table--header__child--items">Fulfillment Status</th> --}}
                                            <th class="account__table--header__child--items">Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody class="account__table--body mobile__none">
                                        @foreach ($orders as $order)
                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items">#{{ $order->id }}</td>
                                                <td class="account__table--body__child--items">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                                <td class="account__table--body__child--items">{{ $order->status }}</td>
                                                {{-- <td class="account__table--body__child--items">{{ $order->fulfillment_status }}</td> --}}
                                                <td class="account__table--body__child--items">{{ number_format($order->total_amount) }} đ</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tbody class="account__table--body mobile__block">
                                        @foreach ($orders as $order)
                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items">
                                                    <strong>Order</strong>
                                                    <span>#{{ $order->id }}</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Date</strong>
                                                    {{-- <span>{{ $order->date->format('F j, Y') }}</span> --}}
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Payment Status</strong>
                                                    <span>{{ $order->payment_status }}</span>
                                                </td>
                                                {{-- <td class="account__table--body__child--items">
                                                    <strong>Fulfillment Status</strong>
                                                    <span>{{ $order->fulfillment_status }}</span>
                                                </td> --}}
                                                <td class="account__table--body__child--items">
                                                    <strong>Total</strong>
                                                    <span>${{ $order->total_amount }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- my account section end -->

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

    </main>
@endsection
