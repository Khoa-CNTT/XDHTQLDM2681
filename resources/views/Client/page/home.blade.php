@extends('Client.Share.master')
@section('content')
        <!-- Start slider section -->


        @include('Client.Share.slider', ['products' => $products]) <!-- End slider section -->

        <!-- Start categories product section -->
        <section class="product__section product__categories--section section--padding">
            <div class="container">
                <div class="section__heading text-center mb-40">
                    <span class="section__heading--subtitle">Nhà hàng gần đây</span>
                    <h2 class="section__heading--maintitle">HOT</h2>
                </div>
                <div class="product__section--inner product__swiper--activation swiper">
                    <div class="swiper-wrapper">
                        @foreach ($food_like as $restaurant)
                            <div class="swiper-slide">
                                <div class="product__items product__bg">
                                    <div class="product__items--thumbnail">
                                        <a class="product__items--link"   href="{{ route('menu.item.detail', ['id' => $restaurant->id]) }}">
                                            <img class="product__items--img" src="{{ asset('public/image/foods/' . $restaurant->Image) }}"
                                                alt="{{$restaurant->Title_items}}">
                                            <div
                                                class="product__categories--content d-flex justify-content-between align-items-center">
                                                <div class="product__categories--content__left">
                                                    <h3 class="product__categories--content__maintitle">{{$restaurant->Title_items}}</h3>
                                                    {{ number_format($restaurant->Price, 0, ',', '.') }} đ
                                                </div>

                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                    <div class="swiper__nav--btn swiper-button-next"></div>
                    <div class="swiper__nav--btn swiper-button-prev"></div>
                </div>
            </div>
        </section>
        <!-- Nút nhắn tin -->
        <!-- Nút nhắn tin -->
        <div class="hotline-phone-ring-wrap">
            <div class="hotline-phone-ring youtube1" id="chat-toggle-btn">
                <div class="hotline-phone-ring-circle"></div>
                <div class="hotline-phone-ring-circle-fill"></div>
                <div class="hotline-phone-ring-img-circle">
                    <a href="javascript:void(0);"><i class="fas fa-comment-dots"></i></a>
                </div>
            </div>
        </div>
        <style>
            .hotline-phone-ring-wrap {
                position: fixed;
                bottom: 120px;
                right: 20px;
                z-index: 9999;
            }

            .hotline-phone-ring {
                position: relative;
                background-color: #d90000;
                width: 50px;
                height: 50px;
                border-radius: 50%;
                cursor: pointer;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
                display: flex;
                align-items: center;
                justify-content: center;
                animation: pulse-ring 2s infinite;
            }

            .hotline-phone-ring i {
                color: white;
                font-size: 20px;
            }

            @keyframes pulse-ring {
                0% {
                    transform: scale(1);
                    opacity: 1;
                }

                100% {
                    transform: scale(1.2);
                    opacity: 0.6;
                }
            }

            /* Ẩn viền động nếu không thích */
            .hotline-phone-ring-circle,
            .hotline-phone-ring-circle-fill {
                display: none;
            }
        </style>



        <!-- Overlay khi mở chat -->
        <div id="chat-overlay" class="chat-overlay"></div>



        <!-- End categories product section -->

        <!-- Start product section -->
        <section class="product__section section--padding pt-0">
            <div class="container">
                <div class="section__heading text-center mb-25">
                    <span class="section__heading--subtitle">thực đơn gần đây</span>
                    <h2 class="section__heading--maintitle">THỰC ĐƠN MỚI NHẤT</h2>
                </div>
                <ul class="product__tab--one product__tab--btn d-flex justify-content-center mb-35">
                    <li class="product__tab--btn__list active" data-toggle="tab" data-target="#product_all">All</li>
                    @foreach ($categories as $category) <!-- Lặp qua biến $categories -->
                        <li class="product__tab--btn__list" data-toggle="tab" data-target="#product_{{$category->id}}">
                            {{$category->title}} <!-- Đảm bảo rằng bạn đang truy cập đúng thuộc tính của $category -->
                        </li>
                    @endforeach


                </ul>
                <div class="tab_content">
                    <div id="product_all" class="tab_pane active show">
                        <div class="product__section--inner">
                            <div class="row row-cols-lg-4 row-cols-md-3 row-cols-2 mb--n28">
                                @foreach($results as $result)
                                    <div class="col md-28">
                                        <div class="product__items ">
                                            <div class="product__items--thumbnail">
                                                <a class="product__items--link"
                                                    href="{{ route('menu.item.detail', ['id' => $result->id]) }}">
                                                    <img class="product__items--img product__primary--img"
                                                        src="{{ asset('public/image/foods/' . $result->Image) }}" alt="product-img">
                                                    <img class="product__items--img product__secondary--img"
                                                        src="{{ asset('public/image/foods/' . $result->Image) }}" alt="product-img">
                                                </a>
                                                <div class="product__badge">
                                                    <span class="product__badge--items sale">Đang bán</span>
                                                </div>
                                                <ul class="product__items--action">
                                                    <li class="product__items--action__list">
                                                        <a class="product__items--action__btn" href="wishlist.html">
                                                            <svg class="product__items--action__btn--svg"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                <path
                                                                    d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                    fill="none" stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="32" />
                                                            </svg>
                                                            <span class="visually-hidden">Wishlist</span>
                                                        </a>
                                                    </li>
                                                    <li class="product__items--action__list">
                                                        <a class="product__items--action__btn" data-open="modal1"
                                                            href="javascript:void(0)">
                                                            <svg class="product__items--action__btn--svg"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                <path
                                                                    d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                    fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                    stroke-width="32" />
                                                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                    stroke-miterlimit="10" stroke-width="32"
                                                                    d="M338.29 338.29L448 448" />
                                                            </svg>
                                                            <span class="visually-hidden">Quick View</span>
                                                        </a>
                                                    </li>
                                                    <li class="product__items--action__list">
                                                        <a class="product__items--action__btn" href="compare.html">
                                                            <svg class="product__items--action__btn--svg"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="32"
                                                                    d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                                <path
                                                                    d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                    fill="none" stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="32" />
                                                            </svg>
                                                            <span class="visually-hidden">Compare</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product__items--content text-center">
                                                <a href="{{ route('cart.add', $result->id) }}" class="add__to--cart__btn">+ Thêm vào
                                                    giỏ</a>
                                                <h3 class="product__items--content__title h4"><a
                                                        href="product-details.html">{{$result->Title_items}}</a></h3>
                                                <div class="product__items--price">
                                                {{ number_format($result->Price, 0, ',', '.') }} đ
                                                    {{-- <span class="old__price">$59.00</span> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div id="product_fresh" class="tab_pane">
                        <div class="product__section--inner">
                            <div class="row row-cols-lg-4 row-cols-md-3 row-cols-2 mb--n28">
                                <div class="col mb-28">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product2.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product1.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Red-tomato-isolated</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$52.00</span>
                                                <span class="old__price">$62.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product4.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product3.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Raw-onions-surface</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$58.00</span>
                                                <span class="old__price">$68.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product6.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product5.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Chili-pepper</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$52.00</span>
                                                <span class="old__price">$62.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product8.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product7.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Papaya-green</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$48.00</span>
                                                <span class="old__price">$54.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col md-28">
                                    <div class="product__items ">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product1.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product2.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Vegetable-healthy</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$39.00</span>
                                                <span class="old__price">$59.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items ">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product3.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product4.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Fresh-whole-fish</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$42.00</span>
                                                <span class="old__price">$48.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product5.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product6.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Chili-pepper</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$38.00</span>
                                                <span class="old__price">$44.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product7.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product8.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Green-surface</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$38.00</span>
                                                <span class="old__price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="product_fruits" class="tab_pane">
                        <div class="product__section--inner">
                            <div class="row row-cols-lg-4 row-cols-md-3 row-cols-2 mb--n28">
                                <div class="col mb-28">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product5.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product6.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Chili-pepper</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$38.00</span>
                                                <span class="old__price">$44.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product7.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product8.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Green-surface</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$38.00</span>
                                                <span class="old__price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product2.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product1.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Red-tomato-isolated</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$52.00</span>
                                                <span class="old__price">$62.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col md-28">
                                    <div class="product__items ">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product1.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product2.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Vegetable-healthy</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$39.00</span>
                                                <span class="old__price">$59.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items ">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product3.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product4.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Fresh-whole-fish</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$42.00</span>
                                                <span class="old__price">$48.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product4.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product3.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Raw-onions-surface</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$58.00</span>
                                                <span class="old__price">$68.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product6.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product5.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Chili-pepper</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$52.00</span>
                                                <span class="old__price">$62.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product8.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product7.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Papaya-green</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$48.00</span>
                                                <span class="old__price">$54.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="product_nature" class="tab_pane">
                        <div class="product__section--inner">
                            <div class="row row-cols-lg-4 row-cols-md-3 row-cols-2 mb--n28">
                                <div class="col mb-28">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product5.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product6.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Chili-pepper</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$38.00</span>
                                                <span class="old__price">$44.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product7.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product8.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Green-surface</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$38.00</span>
                                                <span class="old__price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product2.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product1.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Red-tomato-isolated</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$52.00</span>
                                                <span class="old__price">$62.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product4.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product3.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Raw-onions-surface</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$58.00</span>
                                                <span class="old__price">$68.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product6.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product5.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Chili-pepper</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$52.00</span>
                                                <span class="old__price">$62.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product8.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product7.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Papaya-green</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$48.00</span>
                                                <span class="old__price">$54.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col md-28">
                                    <div class="product__items ">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product1.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product2.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Vegetable-healthy</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$39.00</span>
                                                <span class="old__price">$59.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items ">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product3.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product4.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Fresh-whole-fish</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$42.00</span>
                                                <span class="old__price">$48.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="product_recipies" class="tab_pane">
                        <div class="product__section--inner">
                            <div class="row row-cols-lg-4 row-cols-md-3 row-cols-2 mb--n28">
                                <div class="col md-28">
                                    <div class="product__items ">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product1.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product2.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Vegetable-healthy</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$39.00</span>
                                                <span class="old__price">$59.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items ">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product3.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product4.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Fresh-whole-fish</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$42.00</span>
                                                <span class="old__price">$48.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product5.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product6.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Chili-pepper</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$38.00</span>
                                                <span class="old__price">$44.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product7.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product8.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Green-surface</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$38.00</span>
                                                <span class="old__price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product2.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product1.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Red-tomato-isolated</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$52.00</span>
                                                <span class="old__price">$62.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product4.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product3.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Raw-onions-surface</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$58.00</span>
                                                <span class="old__price">$68.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product6.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product5.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Chili-pepper</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$52.00</span>
                                                <span class="old__price">$62.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product8.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product7.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Papaya-green</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$48.00</span>
                                                <span class="old__price">$54.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="product_vegetable" class="tab_pane">
                        <div class="product__section--inner">
                            <div class="row row-cols-lg-4 row-cols-md-3 row-cols-2 mb--n28">
                                <div class="col md-28">
                                    <div class="product__items ">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product1.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product2.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Vegetable-healthy</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$39.00</span>
                                                <span class="old__price">$59.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product6.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product5.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Chili-pepper</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$52.00</span>
                                                <span class="old__price">$62.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product8.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product7.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Papaya-green</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$48.00</span>
                                                <span class="old__price">$54.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items ">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product3.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product4.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Fresh-whole-fish</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$42.00</span>
                                                <span class="old__price">$48.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product5.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product6.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Chili-pepper</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$38.00</span>
                                                <span class="old__price">$44.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product7.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product8.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Green-surface</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$38.00</span>
                                                <span class="old__price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product2.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product1.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Red-tomato-isolated</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$52.00</span>
                                                <span class="old__price">$62.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-28">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="/assets/img/product/product4.png" alt="product-img">
                                                <img class="product__items--img product__secondary--img"
                                                    src="/assets/img/product/product3.png" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-miterlimit="10" stroke-width="32"
                                                                d="M338.29 338.29L448 448" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="compare.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"
                                                                d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                                            <path
                                                                d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">Raw-onions-surface</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$58.00</span>
                                                <span class="old__price">$68.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End product section -->

        <!-- Start deal product section -->
        <section class="product__section section--padding pt-0">
            <div class="container">
                <div class="section__heading text-center mb-40">
                    <span class="section__heading--subtitle">Mới được thêm vào cửa hàng</span>
                    <h2 class="section__heading--maintitle">Món ăn bán chạy</h2>
                </div>
                <div class="product__section--inner product__swiper--activation swiper">
                    <div class="swiper-wrapper">
                        @foreach ($decilious_foods as $food)
                            <div class="swiper-slide">
                                <div class="product__items">
                                    <div class="product__items--thumbnail">
                                        <a class="product__items--link"  href="{{ route('menu.item.detail', ['id' => $result->id]) }}">
                                            <img class="product__items--img product__primary--img"
                                                src="{{ asset('public/image/foods/' . $food->Image) }}" alt="{{ $food->Title_items }}">
                                            <img class="product__items--img product__secondary--img"
                                                src="{{ asset('public/image/foods/' . $food->Image) }}" alt="{{ $food->Title_items }}">
                                        </a>
                                        <div class="product__badge">
                                            <span class="product__badge--items sale">Bán chạy</span>
                                        </div>
                                        <ul class="product__items--action">
                                            <li class="product__items--action__list">
                                                <a class="product__items--action__btn" href="wishlist.html">
                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 512 512">
                                                        <path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64
                                                                     c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08
                                                                     183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09
                                                                     183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none"
                                                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="32" />
                                                    </svg>
                                                    <span class="visually-hidden">Yêu thích</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product__items--content text-center">
                                        <a class="add__to--cart__btn" href="{{ route('cart.add', $food->id) }}">+ Thêm vào giỏ</a>
                                        <h3 class="product__items--content__title style2 h4">
                                            <a href="{{ route('menu.item.detail', ['id' => $food->id]) }}">{{ $food->Title_items }}</a>
                                        </h3>
                                        <div class="product__items--price">
                                        <span class="current__price">{{ number_format($food->Price, 0, ',', '.') }}₫</span>
                                            <span class="old__price">$68.00</span>
                                        </div>
                                        <div class="product__items--sold__stocks d-flex justify-content-between">
                                            <span class="product__items--sold__stocks--text">
                                                Địa chỉ: {{ $food->restaurant->location->Address ?? 'Chưa cập nhật' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                    <div class="swiper__nav--btn swiper-button-next"></div>
                    <div class="swiper__nav--btn swiper-button-prev"></div>
                </div>
            </div>
        </section>
        <!-- End deal product section -->




        <!-- Start shipping section -->
    <section class="shipping__section section--padding">
        <div class="container">
            <div class="shipping__section--inner d-flex">
                <div class="shipping__items">
                    <div class="shipping__items--icon">
                        <!-- Icon -->
                    </div>
                    <div class="shipping__items--content text-center">
                        <h2 class="shipping__items--title h3">Miễn phí vận chuyển</h2>
                        <p class="shipping__items--desc">Cho tất cả đơn hàng từ 75.000đ trở lên</p>
                    </div>
                </div>
                <div class="shipping__items">
                    <div class="shipping__items--icon">
                        <!-- Icon -->
                    </div>
                    <div class="shipping__items--content text-center">
                        <h2 class="shipping__items--title h3">Miễn phí đổi trả</h2>
                        <p class="shipping__items--desc">Cho tất cả đơn hàng từ 75.000đ trở lên</p>
                    </div>
                </div>
                <div class="shipping__items">
                    <div class="shipping__items--icon">
                        <!-- Icon -->
                    </div>
                    <div class="shipping__items--content text-center">
                        <h2 class="shipping__items--title h3">Thanh toán an toàn</h2>
                        <p class="shipping__items--desc">Cho tất cả đơn hàng từ 75.000đ trở lên</p>
                    </div>
                </div>
                <div class="shipping__items">
                    <div class="shipping__items--icon">
                        <!-- Icon -->
                    </div>
                    <div class="shipping__items--content text-center">
                        <h2 class="shipping__items--title h3">Dịch vụ quà tặng</h2>
                        <p class="shipping__items--desc">Cho tất cả đơn hàng từ 75.000đ trở lên</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- End shipping section -->
@endsection
