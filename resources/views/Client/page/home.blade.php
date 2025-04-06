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
                @foreach ($restaurants_item as $restaurant)
                    <div class="swiper-slide">
                        <div class="product__items product__bg">
                            <div class="product__items--thumbnail">
                                <a class="product__items--link" href="shop.html">
                                    <img class="product__items--img" src="{{ asset('/image/logo/' . $restaurant->logo) }}" alt="{{$restaurant->name}}">
                                    <div class="product__categories--content d-flex justify-content-between align-items-center">
                                        <div class="product__categories--content__left">
                                            <h3 class="product__categories--content__maintitle">{{$restaurant->name}}</h3>
                                            <span class="product__categories--content__subtitle">99 items</span>
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
                                            <a class="product__items--link" href="{{ route('menu.item.detail', ['id' => $result->id]) }}">
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
                                        <a href="{{ route('cart.add', $result->id) }}" class="add__to--cart__btn">+ Thêm vào giỏ</a>
                                            <h3 class="product__items--content__title h4"><a
                                                    href="product-details.html">{{$result->Title_items}}</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">{{$result->Price}}</span>
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

    <!-- Start banner section -->
    <section class="banner__section section--padding pt-0">
        <div class="container">
            <div class="row row-cols-lg-2 row-cols-md-2 row-cols-sm-2 row-cols-1 mb--n30">
                <div class="col mb-30">
                    <div class="banner__items position__relative">
                        <a class="banner__items--thumbnail display-block" href="shop.html"><img
                                class="banner__items--thumbnail__img display-block" src="/assets/img/banner/banner1.png"
                                alt="banner-img">
                            <div class="banner__items--content">
                                <h2 class="banner__items--content__title text__secondary">Organic Juice</h2>
                                <p class="banner__items--content__desc text-white">Shop our selection of organic
                                    fresh vegetables in a discounted price 10% off.</p>
                                <span class="btn banner__items--content__btn">Shop Now</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col mb-30">
                    <div class="banner__items position__relative">
                        <a class="banner__items--thumbnail display-block" href="shop.html"><img
                                class="banner__items--thumbnail__img display-block" src="/assets/img/banner/banner2.png"
                                alt="banner-img">
                            <div class="banner__items--content">
                                <h2 class="banner__items--content__title text__secondary">Organic Food</h2>
                                <p class="banner__items--content__desc text-black">Shop our selection of organic
                                    fresh vegetables in a discounted price 10% off.</p>
                                <span class="btn banner__items--content__btn">Shop Now</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner section -->

    <!-- Start deal product section -->
    <section class="product__section section--padding pt-0">
        <div class="container">
            <div class="section__heading text-center mb-40">
                <span class="section__heading--subtitle">Recently added our store</span>
                <h2 class="section__heading--maintitle">Top Rated Product</h2>
            </div>
            <div class="product__section--inner product__swiper--activation swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
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
                                            <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                    fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="32" />
                                            </svg>
                                            <span class="visually-hidden">Wishlist</span>
                                        </a>
                                    </li>
                                    <li class="product__items--action__list">
                                        <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">
                                            <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                    fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                    stroke-width="32" />
                                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448" />
                                            </svg>
                                            <span class="visually-hidden">Quick View</span>
                                        </a>
                                    </li>
                                    <li class="product__items--action__list">
                                        <a class="product__items--action__btn" href="compare.html">
                                            <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512">
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
                                <h3 class="product__items--content__title style2 h4"><a
                                        href="product-details.html">Raw-onions-surface</a></h3>
                                <div class="product__items--price">
                                    <span class="current__price">$58.00</span>
                                    <span class="old__price">$68.00</span>
                                </div>
                                <div class="product__items--sold__stocks d-flex justify-content-between">
                                    <span class="product__items--sold__stocks--text">Total Sold : 1</span>
                                    <span class="product__items--sold__stocks--text">Stocks : 35</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
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
                                            <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                    fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="32" />
                                            </svg>
                                            <span class="visually-hidden">Wishlist</span>
                                        </a>
                                    </li>
                                    <li class="product__items--action__list">
                                        <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">
                                            <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                    fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                    stroke-width="32" />
                                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448" />
                                            </svg>
                                            <span class="visually-hidden">Quick View</span>
                                        </a>
                                    </li>
                                    <li class="product__items--action__list">
                                        <a class="product__items--action__btn" href="compare.html">
                                            <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512">
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
                                <h3 class="product__items--content__title style2 h4"><a
                                        href="product-details.html">Papaya-green</a></h3>
                                <div class="product__items--price">
                                    <span class="current__price">$48.00</span>
                                    <span class="old__price">$54.00</span>
                                </div>
                                <div class="product__items--sold__stocks d-flex justify-content-between">
                                    <span class="product__items--sold__stocks--text">Total Sold : 1</span>
                                    <span class="product__items--sold__stocks--text">Stocks : 35</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
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
                                            <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                    fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="32" />
                                            </svg>
                                            <span class="visually-hidden">Wishlist</span>
                                        </a>
                                    </li>
                                    <li class="product__items--action__list">
                                        <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">
                                            <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                    fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                    stroke-width="32" />
                                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448" />
                                            </svg>
                                            <span class="visually-hidden">Quick View</span>
                                        </a>
                                    </li>
                                    <li class="product__items--action__list">
                                        <a class="product__items--action__btn" href="compare.html">
                                            <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512">
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
                                <h3 class="product__items--content__title style2 h4"><a
                                        href="product-details.html">Vegetable-healthy</a></h3>
                                <div class="product__items--price">
                                    <span class="current__price">$39.00</span>
                                    <span class="old__price">$59.00</span>
                                </div>
                                <div class="product__items--sold__stocks d-flex justify-content-between">
                                    <span class="product__items--sold__stocks--text">Total Sold : 1</span>
                                    <span class="product__items--sold__stocks--text">Stocks : 35</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
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
                                            <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                    fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="32" />
                                            </svg>
                                            <span class="visually-hidden">Wishlist</span>
                                        </a>
                                    </li>
                                    <li class="product__items--action__list">
                                        <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">
                                            <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                    fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                    stroke-width="32" />
                                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448" />
                                            </svg>
                                            <span class="visually-hidden">Quick View</span>
                                        </a>
                                    </li>
                                    <li class="product__items--action__list">
                                        <a class="product__items--action__btn" href="compare.html">
                                            <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512">
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
                                <h3 class="product__items--content__title style2 h4"><a
                                        href="product-details.html">Fresh-whole-fish</a></h3>
                                <div class="product__items--price">
                                    <span class="current__price">$38.00</span>
                                    <span class="old__price">$44.00</span>
                                </div>
                                <div class="product__items--sold__stocks d-flex justify-content-between">
                                    <span class="product__items--sold__stocks--text">Total Sold : 1</span>
                                    <span class="product__items--sold__stocks--text">Stocks : 35</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
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
                                            <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                    fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="32" />
                                            </svg>
                                            <span class="visually-hidden">Wishlist</span>
                                        </a>
                                    </li>
                                    <li class="product__items--action__list">
                                        <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">
                                            <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                    fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                    stroke-width="32" />
                                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448" />
                                            </svg>
                                            <span class="visually-hidden">Quick View</span>
                                        </a>
                                    </li>
                                    <li class="product__items--action__list">
                                        <a class="product__items--action__btn" href="compare.html">
                                            <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512">
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
                                <h3 class="product__items--content__title style2 h4"><a
                                        href="product-details.html">Green-surface</a></h3>
                                <div class="product__items--price">
                                    <span class="current__price">$38.00</span>
                                    <span class="old__price">$40.00</span>
                                </div>
                                <div class="product__items--sold__stocks d-flex justify-content-between">
                                    <span class="product__items--sold__stocks--text">Total Sold : 1</span>
                                    <span class="product__items--sold__stocks--text">Stocks : 35</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper__nav--btn swiper-button-next"></div>
                <div class="swiper__nav--btn swiper-button-prev"></div>
            </div>
        </div>
    </section>
    <!-- End deal product section -->

    <!-- Start deals banner section -->
    <section class="deals__banner--section banner__bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-5 deals__baner--col">
                    <div class="deals__banner--content">
                        <h3 class="deals__banner--content__subtitle text__secondary">Best Deals of the week!</h3>
                        <h2 class="deals__banner--content__maintitle">Grab The Best Offer
                            of This Week</h2>
                        <p class="deals__banner--content__desc">Shop our selection of organic fresh vegetables in a
                            discounted price. 10% off on all vegetables.</p>
                        <div class="deals__banner--countdown d-flex" data-countdown="Sep 30, 2022 00:00:00"></div>
                        <a class="btn deals__banner--content__btn" href="shop.html">Discover Now</a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 deals__baner--col">
                    <div class="banner__items text-right">
                        <a class="banner__items--thumbnail display-block" href="shop.html"><img
                                class="banner__items--thumbnail__img display-block"
                                src="/assets/img/banner/banner-layer.png" alt="banner-layer-img"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End deals banner section -->

    <!-- Start blog section -->
    <section class="blog__section section--padding">
        <div class="container blog__section--container">
            <div class="section__heading text-center mb-40">
                <span class="section__heading--subtitle">Our recent articles about Organic</span>
                <h2 class="section__heading--maintitle">Our Blog Posts</h2>
            </div>
            <div class="blog__section--inner blog__swiper--activation swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="blog__items">
                            <div class="blog__items--thumbnail">
                                <a class="blog__items--link" href="blog-details.html"><img class="blog__items--img"
                                        src="/assets/img/blog/blog1.png" alt="blog-img"></a>
                            </div>
                            <div class="blog__items--content">
                                <div class="blog__items--meta">
                                    <ul class="d-flex">
                                        <li class="blog__items--meta__list">
                                            <svg class="blog__items--meta__icon" xmlns="http://www.w3.org/2000/svg"
                                                width="15" height="15" viewBox="0 0 15 15">
                                                <path
                                                    d="M74.705,129.154a6.088,6.088,0,0,0,1.085-5.056,6.167,6.167,0,0,0-2.539-3.839,6.608,6.608,0,0,0-4.958-1.207,6.475,6.475,0,0,0-4.356,2.53,6.056,6.056,0,0,0-1.174,5.154,14.881,14.881,0,0,1,.442,2.339,5.759,5.759,0,0,1-.494,2.849c-.065.136-.139.266-.213.4.029.012.043.022.055.02a6.859,6.859,0,0,0,3.154-1.268.223.223,0,0,1,.281-.043,6.72,6.72,0,0,0,4.658.7,6.475,6.475,0,0,0,4.058-2.585Zm2.717,4.572a2.756,2.756,0,0,1-.261-.425,4.205,4.205,0,0,1-.1-2.971,4.6,4.6,0,0,0-.139-3.087c-.113-.278-.267-.534-.427-.851-.031.134-.046.191-.057.25a6.593,6.593,0,0,1-.849,2.323,7.164,7.164,0,0,1-4.994,3.5c-.367.071-.741.095-1.119.142a.19.19,0,0,0,.036.055c.094.071.185.144.285.2a4.856,4.856,0,0,0,4.87.278.261.261,0,0,1,.23,0,4.912,4.912,0,0,0,1.725.752,2.973,2.973,0,0,0,.72.081C77.531,133.97,77.541,133.895,77.423,133.726Z"
                                                    transform="translate(-62.5 -118.975)" fill="currentColor" />
                                            </svg>
                                            <span class="blog__items--meta__text">19 Comments</span>
                                        </li>
                                        <li class="blog__items--meta__list">
                                            <svg class="blog__items--meta__icon" xmlns="http://www.w3.org/2000/svg"
                                                width="15" height="15" viewBox="0 0 15 15">
                                                <path
                                                    d="M75.809,63.836c0-.221,0-.429,0-.639a.915.915,0,0,0-.656-.869.959.959,0,0,0-1.057.321.97.97,0,0,0-.2.619v.559a.163.163,0,0,1-.164.161H72.716a.162.162,0,0,1-.164-.161c0-.192,0-.377,0-.564a.959.959,0,0,0-1.918-.06c-.005.206,0,.413,0,.62a.163.163,0,0,1-.164.161H69.428a.162.162,0,0,1-.164-.161,5.7,5.7,0,0,0-.009-.768.849.849,0,0,0-.627-.725.93.93,0,0,0-.942.185.952.952,0,0,0-.329.79c0,.175,0,.35,0,.533A.163.163,0,0,1,67.2,64H64.363a.162.162,0,0,0-.164.161V77.113a.163.163,0,0,0,.164.161H79.036a.162.162,0,0,0,.164-.161V64.158A.163.163,0,0,0,79.036,64H75.972A.161.161,0,0,1,75.809,63.836ZM68.7,76.636h-3.68a.162.162,0,0,1-.164-.161V73.913a.163.163,0,0,1,.164-.161H68.7a.162.162,0,0,1,.164.161v2.561A.162.162,0,0,1,68.7,76.636Zm0-3.543H65.018a.162.162,0,0,1-.164-.161V70.224a.163.163,0,0,1,.164-.161H68.7a.162.162,0,0,1,.164.161v2.708A.163.163,0,0,1,68.7,73.093Zm0-3.685H65.018a.162.162,0,0,1-.164-.161v-2.6a.163.163,0,0,1,.164-.161H68.7a.162.162,0,0,1,.164.161v2.6A.162.162,0,0,1,68.7,69.408Zm4.9,7.23H69.71a.162.162,0,0,1-.164-.161V73.921a.163.163,0,0,1,.164-.161H73.6a.162.162,0,0,1,.164.161v2.557A.16.16,0,0,1,73.6,76.638Zm.172-3.632c0,.05-.077.089-.169.089h-3.9a.162.162,0,0,1-.164-.161v-2.71c0-.089.043-.163.093-.166l.093-.005c1.282,0,2.563,0,3.844,0,.155,0,.208.034.207.2-.007.89,0,1.783-.005,2.672A.747.747,0,0,1,73.776,73.006Zm.005-3.694c0,.05-.074.091-.164.091H69.707a.162.162,0,0,1-.164-.161V66.636c0-.089.043-.161.1-.161h.1c1.282,0,2.563,0,3.844,0,.155,0,.207.036.2.2-.007.852,0,1.7,0,2.552v.091Zm.823.756h3.772a.162.162,0,0,1,.164.161v2.706a.163.163,0,0,1-.164.161H74.6a.162.162,0,0,1-.164-.161V70.227A.162.162,0,0,1,74.6,70.068Zm3.773,6.568H74.6a.162.162,0,0,1-.164-.161V73.918a.163.163,0,0,1,.164-.161h3.773a.162.162,0,0,1,.164.161v2.557A.158.158,0,0,1,78.377,76.636Zm0-7.233H74.6a.162.162,0,0,1-.164-.161V66.648a.163.163,0,0,1,.164-.161h3.773a.162.162,0,0,1,.164.161v2.593A.159.159,0,0,1,78.377,69.4Z"
                                                    transform="translate(-64.2 -62.274)" fill="currentColor" />
                                            </svg>
                                            <span class="blog__items--meta__text">10 Feb 2022</span>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="blog__items--title"><a href="blog-details.html">Aypi Non Habent
                                        Claritatemnon Insitam</a></h3>
                                <p class="blog__items--desc">It is a long established fact that a reader will be by
                                    the readable content of a page when looking at. </p>
                                <a class="blog__items--readmore" href="blog-details.html">Read more <svg
                                        class="blog__items--readmore__icon" xmlns="http://www.w3.org/2000/svg" width="6.2"
                                        height="6.2" viewBox="0 0 6.2 6.2">
                                        <path
                                            d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z"
                                            transform="translate(-4 -4)" fill="currentColor" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog__items">
                            <div class="blog__items--thumbnail">
                                <a class="blog__items--link" href="blog-details.html"><img class="blog__items--img"
                                        src="/assets/img/blog/blog2.png" alt="blog-img"></a>
                            </div>
                            <div class="blog__items--content">
                                <div class="blog__items--meta">
                                    <ul class="d-flex">
                                        <li class="blog__items--meta__list">
                                            <svg class="blog__items--meta__icon" xmlns="http://www.w3.org/2000/svg"
                                                width="15" height="15" viewBox="0 0 15 15">
                                                <path
                                                    d="M74.705,129.154a6.088,6.088,0,0,0,1.085-5.056,6.167,6.167,0,0,0-2.539-3.839,6.608,6.608,0,0,0-4.958-1.207,6.475,6.475,0,0,0-4.356,2.53,6.056,6.056,0,0,0-1.174,5.154,14.881,14.881,0,0,1,.442,2.339,5.759,5.759,0,0,1-.494,2.849c-.065.136-.139.266-.213.4.029.012.043.022.055.02a6.859,6.859,0,0,0,3.154-1.268.223.223,0,0,1,.281-.043,6.72,6.72,0,0,0,4.658.7,6.475,6.475,0,0,0,4.058-2.585Zm2.717,4.572a2.756,2.756,0,0,1-.261-.425,4.205,4.205,0,0,1-.1-2.971,4.6,4.6,0,0,0-.139-3.087c-.113-.278-.267-.534-.427-.851-.031.134-.046.191-.057.25a6.593,6.593,0,0,1-.849,2.323,7.164,7.164,0,0,1-4.994,3.5c-.367.071-.741.095-1.119.142a.19.19,0,0,0,.036.055c.094.071.185.144.285.2a4.856,4.856,0,0,0,4.87.278.261.261,0,0,1,.23,0,4.912,4.912,0,0,0,1.725.752,2.973,2.973,0,0,0,.72.081C77.531,133.97,77.541,133.895,77.423,133.726Z"
                                                    transform="translate(-62.5 -118.975)" fill="currentColor" />
                                            </svg>
                                            <span class="blog__items--meta__text">19 Comments</span>
                                        </li>
                                        <li class="blog__items--meta__list">
                                            <svg class="blog__items--meta__icon" xmlns="http://www.w3.org/2000/svg"
                                                width="15" height="15" viewBox="0 0 15 15">
                                                <path
                                                    d="M75.809,63.836c0-.221,0-.429,0-.639a.915.915,0,0,0-.656-.869.959.959,0,0,0-1.057.321.97.97,0,0,0-.2.619v.559a.163.163,0,0,1-.164.161H72.716a.162.162,0,0,1-.164-.161c0-.192,0-.377,0-.564a.959.959,0,0,0-1.918-.06c-.005.206,0,.413,0,.62a.163.163,0,0,1-.164.161H69.428a.162.162,0,0,1-.164-.161,5.7,5.7,0,0,0-.009-.768.849.849,0,0,0-.627-.725.93.93,0,0,0-.942.185.952.952,0,0,0-.329.79c0,.175,0,.35,0,.533A.163.163,0,0,1,67.2,64H64.363a.162.162,0,0,0-.164.161V77.113a.163.163,0,0,0,.164.161H79.036a.162.162,0,0,0,.164-.161V64.158A.163.163,0,0,0,79.036,64H75.972A.161.161,0,0,1,75.809,63.836ZM68.7,76.636h-3.68a.162.162,0,0,1-.164-.161V73.913a.163.163,0,0,1,.164-.161H68.7a.162.162,0,0,1,.164.161v2.561A.162.162,0,0,1,68.7,76.636Zm0-3.543H65.018a.162.162,0,0,1-.164-.161V70.224a.163.163,0,0,1,.164-.161H68.7a.162.162,0,0,1,.164.161v2.708A.163.163,0,0,1,68.7,73.093Zm0-3.685H65.018a.162.162,0,0,1-.164-.161v-2.6a.163.163,0,0,1,.164-.161H68.7a.162.162,0,0,1,.164.161v2.6A.162.162,0,0,1,68.7,69.408Zm4.9,7.23H69.71a.162.162,0,0,1-.164-.161V73.921a.163.163,0,0,1,.164-.161H73.6a.162.162,0,0,1,.164.161v2.557A.16.16,0,0,1,73.6,76.638Zm.172-3.632c0,.05-.077.089-.169.089h-3.9a.162.162,0,0,1-.164-.161v-2.71c0-.089.043-.163.093-.166l.093-.005c1.282,0,2.563,0,3.844,0,.155,0,.208.034.207.2-.007.89,0,1.783-.005,2.672A.747.747,0,0,1,73.776,73.006Zm.005-3.694c0,.05-.074.091-.164.091H69.707a.162.162,0,0,1-.164-.161V66.636c0-.089.043-.161.1-.161h.1c1.282,0,2.563,0,3.844,0,.155,0,.207.036.2.2-.007.852,0,1.7,0,2.552v.091Zm.823.756h3.772a.162.162,0,0,1,.164.161v2.706a.163.163,0,0,1-.164.161H74.6a.162.162,0,0,1-.164-.161V70.227A.162.162,0,0,1,74.6,70.068Zm3.773,6.568H74.6a.162.162,0,0,1-.164-.161V73.918a.163.163,0,0,1,.164-.161h3.773a.162.162,0,0,1,.164.161v2.557A.158.158,0,0,1,78.377,76.636Zm0-7.233H74.6a.162.162,0,0,1-.164-.161V66.648a.163.163,0,0,1,.164-.161h3.773a.162.162,0,0,1,.164.161v2.593A.159.159,0,0,1,78.377,69.4Z"
                                                    transform="translate(-64.2 -62.274)" fill="currentColor" />
                                            </svg>
                                            <span class="blog__items--meta__text">10 Feb 2022</span>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="blog__items--title"><a href="blog-details.html">Lorem ipsum dolor sit
                                        amet are consecte.</a></h3>
                                <p class="blog__items--desc">It is a long established fact that a reader will be by
                                    the readable content of a page when looking at. </p>
                                <a class="blog__items--readmore" href="blog-details.html">Read more <svg
                                        class="blog__items--readmore__icon" xmlns="http://www.w3.org/2000/svg" width="6.2"
                                        height="6.2" viewBox="0 0 6.2 6.2">
                                        <path
                                            d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z"
                                            transform="translate(-4 -4)" fill="currentColor" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog__items">
                            <div class="blog__items--thumbnail">
                                <a class="blog__items--link" href="blog-details.html"><img class="blog__items--img"
                                        src="/assets/img/blog/blog3.png" alt="blog-img"></a>
                            </div>
                            <div class="blog__items--content">
                                <div class="blog__items--meta">
                                    <ul class="d-flex">
                                        <li class="blog__items--meta__list">
                                            <svg class="blog__items--meta__icon" xmlns="http://www.w3.org/2000/svg"
                                                width="15" height="15" viewBox="0 0 15 15">
                                                <path
                                                    d="M74.705,129.154a6.088,6.088,0,0,0,1.085-5.056,6.167,6.167,0,0,0-2.539-3.839,6.608,6.608,0,0,0-4.958-1.207,6.475,6.475,0,0,0-4.356,2.53,6.056,6.056,0,0,0-1.174,5.154,14.881,14.881,0,0,1,.442,2.339,5.759,5.759,0,0,1-.494,2.849c-.065.136-.139.266-.213.4.029.012.043.022.055.02a6.859,6.859,0,0,0,3.154-1.268.223.223,0,0,1,.281-.043,6.72,6.72,0,0,0,4.658.7,6.475,6.475,0,0,0,4.058-2.585Zm2.717,4.572a2.756,2.756,0,0,1-.261-.425,4.205,4.205,0,0,1-.1-2.971,4.6,4.6,0,0,0-.139-3.087c-.113-.278-.267-.534-.427-.851-.031.134-.046.191-.057.25a6.593,6.593,0,0,1-.849,2.323,7.164,7.164,0,0,1-4.994,3.5c-.367.071-.741.095-1.119.142a.19.19,0,0,0,.036.055c.094.071.185.144.285.2a4.856,4.856,0,0,0,4.87.278.261.261,0,0,1,.23,0,4.912,4.912,0,0,0,1.725.752,2.973,2.973,0,0,0,.72.081C77.531,133.97,77.541,133.895,77.423,133.726Z"
                                                    transform="translate(-62.5 -118.975)" fill="currentColor" />
                                            </svg>
                                            <span class="blog__items--meta__text">19 Comments</span>
                                        </li>
                                        <li class="blog__items--meta__list">
                                            <svg class="blog__items--meta__icon" xmlns="http://www.w3.org/2000/svg"
                                                width="15" height="15" viewBox="0 0 15 15">
                                                <path
                                                    d="M75.809,63.836c0-.221,0-.429,0-.639a.915.915,0,0,0-.656-.869.959.959,0,0,0-1.057.321.97.97,0,0,0-.2.619v.559a.163.163,0,0,1-.164.161H72.716a.162.162,0,0,1-.164-.161c0-.192,0-.377,0-.564a.959.959,0,0,0-1.918-.06c-.005.206,0,.413,0,.62a.163.163,0,0,1-.164.161H69.428a.162.162,0,0,1-.164-.161,5.7,5.7,0,0,0-.009-.768.849.849,0,0,0-.627-.725.93.93,0,0,0-.942.185.952.952,0,0,0-.329.79c0,.175,0,.35,0,.533A.163.163,0,0,1,67.2,64H64.363a.162.162,0,0,0-.164.161V77.113a.163.163,0,0,0,.164.161H79.036a.162.162,0,0,0,.164-.161V64.158A.163.163,0,0,0,79.036,64H75.972A.161.161,0,0,1,75.809,63.836ZM68.7,76.636h-3.68a.162.162,0,0,1-.164-.161V73.913a.163.163,0,0,1,.164-.161H68.7a.162.162,0,0,1,.164.161v2.561A.162.162,0,0,1,68.7,76.636Zm0-3.543H65.018a.162.162,0,0,1-.164-.161V70.224a.163.163,0,0,1,.164-.161H68.7a.162.162,0,0,1,.164.161v2.708A.163.163,0,0,1,68.7,73.093Zm0-3.685H65.018a.162.162,0,0,1-.164-.161v-2.6a.163.163,0,0,1,.164-.161H68.7a.162.162,0,0,1,.164.161v2.6A.162.162,0,0,1,68.7,69.408Zm4.9,7.23H69.71a.162.162,0,0,1-.164-.161V73.921a.163.163,0,0,1,.164-.161H73.6a.162.162,0,0,1,.164.161v2.557A.16.16,0,0,1,73.6,76.638Zm.172-3.632c0,.05-.077.089-.169.089h-3.9a.162.162,0,0,1-.164-.161v-2.71c0-.089.043-.163.093-.166l.093-.005c1.282,0,2.563,0,3.844,0,.155,0,.208.034.207.2-.007.89,0,1.783-.005,2.672A.747.747,0,0,1,73.776,73.006Zm.005-3.694c0,.05-.074.091-.164.091H69.707a.162.162,0,0,1-.164-.161V66.636c0-.089.043-.161.1-.161h.1c1.282,0,2.563,0,3.844,0,.155,0,.207.036.2.2-.007.852,0,1.7,0,2.552v.091Zm.823.756h3.772a.162.162,0,0,1,.164.161v2.706a.163.163,0,0,1-.164.161H74.6a.162.162,0,0,1-.164-.161V70.227A.162.162,0,0,1,74.6,70.068Zm3.773,6.568H74.6a.162.162,0,0,1-.164-.161V73.918a.163.163,0,0,1,.164-.161h3.773a.162.162,0,0,1,.164.161v2.557A.158.158,0,0,1,78.377,76.636Zm0-7.233H74.6a.162.162,0,0,1-.164-.161V66.648a.163.163,0,0,1,.164-.161h3.773a.162.162,0,0,1,.164.161v2.593A.159.159,0,0,1,78.377,69.4Z"
                                                    transform="translate(-64.2 -62.274)" fill="currentColor" />
                                            </svg>
                                            <span class="blog__items--meta__text">10 Feb 2022</span>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="blog__items--title"><a href="blog-details.html">Ratione nobis the are
                                        delectus in impedit?</a></h3>
                                <p class="blog__items--desc">It is a long established fact that a reader will be by
                                    the readable content of a page when looking at. </p>
                                <a class="blog__items--readmore" href="blog-details.html">Read more <svg
                                        class="blog__items--readmore__icon" xmlns="http://www.w3.org/2000/svg" width="6.2"
                                        height="6.2" viewBox="0 0 6.2 6.2">
                                        <path
                                            d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z"
                                            transform="translate(-4 -4)" fill="currentColor" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog__items">
                            <div class="blog__items--thumbnail">
                                <a class="blog__items--link" href="blog-details.html"><img class="blog__items--img"
                                        src="/assets/img/blog/blog1.png" alt="blog-img"></a>
                            </div>
                            <div class="blog__items--content">
                                <div class="blog__items--meta">
                                    <ul class="d-flex">
                                        <li class="blog__items--meta__list">
                                            <svg class="blog__items--meta__icon" xmlns="http://www.w3.org/2000/svg"
                                                width="15" height="15" viewBox="0 0 15 15">
                                                <path
                                                    d="M74.705,129.154a6.088,6.088,0,0,0,1.085-5.056,6.167,6.167,0,0,0-2.539-3.839,6.608,6.608,0,0,0-4.958-1.207,6.475,6.475,0,0,0-4.356,2.53,6.056,6.056,0,0,0-1.174,5.154,14.881,14.881,0,0,1,.442,2.339,5.759,5.759,0,0,1-.494,2.849c-.065.136-.139.266-.213.4.029.012.043.022.055.02a6.859,6.859,0,0,0,3.154-1.268.223.223,0,0,1,.281-.043,6.72,6.72,0,0,0,4.658.7,6.475,6.475,0,0,0,4.058-2.585Zm2.717,4.572a2.756,2.756,0,0,1-.261-.425,4.205,4.205,0,0,1-.1-2.971,4.6,4.6,0,0,0-.139-3.087c-.113-.278-.267-.534-.427-.851-.031.134-.046.191-.057.25a6.593,6.593,0,0,1-.849,2.323,7.164,7.164,0,0,1-4.994,3.5c-.367.071-.741.095-1.119.142a.19.19,0,0,0,.036.055c.094.071.185.144.285.2a4.856,4.856,0,0,0,4.87.278.261.261,0,0,1,.23,0,4.912,4.912,0,0,0,1.725.752,2.973,2.973,0,0,0,.72.081C77.531,133.97,77.541,133.895,77.423,133.726Z"
                                                    transform="translate(-62.5 -118.975)" fill="currentColor" />
                                            </svg>
                                            <span class="blog__items--meta__text">19 Comments</span>
                                        </li>
                                        <li class="blog__items--meta__list">
                                            <svg class="blog__items--meta__icon" xmlns="http://www.w3.org/2000/svg"
                                                width="15" height="15" viewBox="0 0 15 15">
                                                <path
                                                    d="M75.809,63.836c0-.221,0-.429,0-.639a.915.915,0,0,0-.656-.869.959.959,0,0,0-1.057.321.97.97,0,0,0-.2.619v.559a.163.163,0,0,1-.164.161H72.716a.162.162,0,0,1-.164-.161c0-.192,0-.377,0-.564a.959.959,0,0,0-1.918-.06c-.005.206,0,.413,0,.62a.163.163,0,0,1-.164.161H69.428a.162.162,0,0,1-.164-.161,5.7,5.7,0,0,0-.009-.768.849.849,0,0,0-.627-.725.93.93,0,0,0-.942.185.952.952,0,0,0-.329.79c0,.175,0,.35,0,.533A.163.163,0,0,1,67.2,64H64.363a.162.162,0,0,0-.164.161V77.113a.163.163,0,0,0,.164.161H79.036a.162.162,0,0,0,.164-.161V64.158A.163.163,0,0,0,79.036,64H75.972A.161.161,0,0,1,75.809,63.836ZM68.7,76.636h-3.68a.162.162,0,0,1-.164-.161V73.913a.163.163,0,0,1,.164-.161H68.7a.162.162,0,0,1,.164.161v2.561A.162.162,0,0,1,68.7,76.636Zm0-3.543H65.018a.162.162,0,0,1-.164-.161V70.224a.163.163,0,0,1,.164-.161H68.7a.162.162,0,0,1,.164.161v2.708A.163.163,0,0,1,68.7,73.093Zm0-3.685H65.018a.162.162,0,0,1-.164-.161v-2.6a.163.163,0,0,1,.164-.161H68.7a.162.162,0,0,1,.164.161v2.6A.162.162,0,0,1,68.7,69.408Zm4.9,7.23H69.71a.162.162,0,0,1-.164-.161V73.921a.163.163,0,0,1,.164-.161H73.6a.162.162,0,0,1,.164.161v2.557A.16.16,0,0,1,73.6,76.638Zm.172-3.632c0,.05-.077.089-.169.089h-3.9a.162.162,0,0,1-.164-.161v-2.71c0-.089.043-.163.093-.166l.093-.005c1.282,0,2.563,0,3.844,0,.155,0,.208.034.207.2-.007.89,0,1.783-.005,2.672A.747.747,0,0,1,73.776,73.006Zm.005-3.694c0,.05-.074.091-.164.091H69.707a.162.162,0,0,1-.164-.161V66.636c0-.089.043-.161.1-.161h.1c1.282,0,2.563,0,3.844,0,.155,0,.207.036.2.2-.007.852,0,1.7,0,2.552v.091Zm.823.756h3.772a.162.162,0,0,1,.164.161v2.706a.163.163,0,0,1-.164.161H74.6a.162.162,0,0,1-.164-.161V70.227A.162.162,0,0,1,74.6,70.068Zm3.773,6.568H74.6a.162.162,0,0,1-.164-.161V73.918a.163.163,0,0,1,.164-.161h3.773a.162.162,0,0,1,.164.161v2.557A.158.158,0,0,1,78.377,76.636Zm0-7.233H74.6a.162.162,0,0,1-.164-.161V66.648a.163.163,0,0,1,.164-.161h3.773a.162.162,0,0,1,.164.161v2.593A.159.159,0,0,1,78.377,69.4Z"
                                                    transform="translate(-64.2 -62.274)" fill="currentColor" />
                                            </svg>
                                            <span class="blog__items--meta__text">10 Feb 2022</span>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="blog__items--title"><a href="blog-details.html">Aypi Non Habent
                                        Claritatemnon Insitam</a></h3>
                                <p class="blog__items--desc">It is a long established fact that a reader will be by
                                    the readable content of a page when looking at. </p>
                                <a class="blog__items--readmore" href="blog-details.html">Read more <svg
                                        class="blog__items--readmore__icon" xmlns="http://www.w3.org/2000/svg" width="6.2"
                                        height="6.2" viewBox="0 0 6.2 6.2">
                                        <path
                                            d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z"
                                            transform="translate(-4 -4)" fill="currentColor" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper__nav--btn swiper-button-next"></div>
                <div class="swiper__nav--btn swiper-button-prev"></div>
            </div>
        </div>
    </section>
    <!-- End blog section -->

    <!-- Start testimonial section -->
    <section class="testimonial__section testimonial__bg section--padding">
        <div class="container-fluid p-0">
            <div class="section__heading text-center mb-55">
                <span class="section__heading--subtitle">Recently added our store</span>
                <h2 class="section__heading--maintitle">Our Testimonial</h2>
            </div>
            <div class="testimonial__section--inner testimonial__swiper--activation swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimonial__items d-flex align-items-center">
                            <div class="testimonial__items--thumbnail">
                                <img class="testimonial__items--thumbnail__img"
                                    src="/assets/img/other/testimonial-thumb1.png" alt="testimonial-img">
                            </div>
                            <div class="testimonial__items--content">
                                <h3 class="testimonial__items--title">JACKLY SMITH</h3>
                                <span class="testimonial__items--subtitle">Senior Maneger</span>
                                <p class="testimonial__items--desc">Lorem ipsum dolor sit, amet consectetur is
                                    adipisicing elit. Recusandae iusto veritatis eveniet, amet sint are suscipit!
                                </p>
                                <div class="ratting testimonial__ratting">
                                    <ul class="d-flex testimonial__ratting--inner">
                                        <li class="testimonial__ratting--list">
                                            <span class="testimonial__ratting--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15.54" height="15.555"
                                                    viewBox="0 0 20.54 19.555">
                                                    <path
                                                        d="M9.947,24.316c.168-.388.446-.388.616,0L13,29.9a1.447,1.447,0,0,0,1.076.783l6.067.589c.423.039.507.3.191.585L15.77,35.9a1.456,1.456,0,0,0-.411,1.267l1.315,5.95c.092.415-.134.577-.5.364L10.92,40.4a1.45,1.45,0,0,0-1.331,0L4.335,43.485c-.368.214-.589.051-.5-.364l1.315-5.95A1.462,1.462,0,0,0,4.74,35.9L.176,31.862c-.316-.281-.232-.546.191-.585l6.069-.589A1.454,1.454,0,0,0,7.513,29.9l2.434-5.589Z"
                                                        transform="translate(0.015 -24.025)" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="testimonial__ratting--list">
                                            <span class="testimonial__ratting--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15.54" height="15.555"
                                                    viewBox="0 0 20.54 19.555">
                                                    <path
                                                        d="M9.947,24.316c.168-.388.446-.388.616,0L13,29.9a1.447,1.447,0,0,0,1.076.783l6.067.589c.423.039.507.3.191.585L15.77,35.9a1.456,1.456,0,0,0-.411,1.267l1.315,5.95c.092.415-.134.577-.5.364L10.92,40.4a1.45,1.45,0,0,0-1.331,0L4.335,43.485c-.368.214-.589.051-.5-.364l1.315-5.95A1.462,1.462,0,0,0,4.74,35.9L.176,31.862c-.316-.281-.232-.546.191-.585l6.069-.589A1.454,1.454,0,0,0,7.513,29.9l2.434-5.589Z"
                                                        transform="translate(0.015 -24.025)" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="testimonial__ratting--list">
                                            <span class="testimonial__ratting--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15.54" height="15.555"
                                                    viewBox="0 0 20.54 19.555">
                                                    <path
                                                        d="M9.947,24.316c.168-.388.446-.388.616,0L13,29.9a1.447,1.447,0,0,0,1.076.783l6.067.589c.423.039.507.3.191.585L15.77,35.9a1.456,1.456,0,0,0-.411,1.267l1.315,5.95c.092.415-.134.577-.5.364L10.92,40.4a1.45,1.45,0,0,0-1.331,0L4.335,43.485c-.368.214-.589.051-.5-.364l1.315-5.95A1.462,1.462,0,0,0,4.74,35.9L.176,31.862c-.316-.281-.232-.546.191-.585l6.069-.589A1.454,1.454,0,0,0,7.513,29.9l2.434-5.589Z"
                                                        transform="translate(0.015 -24.025)" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="testimonial__ratting--list">
                                            <span class="testimonial__ratting--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15.54" height="15.555"
                                                    viewBox="0 0 20.54 19.555">
                                                    <path
                                                        d="M9.947,24.316c.168-.388.446-.388.616,0L13,29.9a1.447,1.447,0,0,0,1.076.783l6.067.589c.423.039.507.3.191.585L15.77,35.9a1.456,1.456,0,0,0-.411,1.267l1.315,5.95c.092.415-.134.577-.5.364L10.92,40.4a1.45,1.45,0,0,0-1.331,0L4.335,43.485c-.368.214-.589.051-.5-.364l1.315-5.95A1.462,1.462,0,0,0,4.74,35.9L.176,31.862c-.316-.281-.232-.546.191-.585l6.069-.589A1.454,1.454,0,0,0,7.513,29.9l2.434-5.589Z"
                                                        transform="translate(0.015 -24.025)" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="testimonial__ratting--list">
                                            <span class="testimonial__ratting--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15.54" height="15.555"
                                                    viewBox="0 0 20.54 19.555">
                                                    <path
                                                        d="M9.947,24.316c.168-.388.446-.388.616,0L13,29.9a1.447,1.447,0,0,0,1.076.783l6.067.589c.423.039.507.3.191.585L15.77,35.9a1.456,1.456,0,0,0-.411,1.267l1.315,5.95c.092.415-.134.577-.5.364L10.92,40.4a1.45,1.45,0,0,0-1.331,0L4.335,43.485c-.368.214-.589.051-.5-.364l1.315-5.95A1.462,1.462,0,0,0,4.74,35.9L.176,31.862c-.316-.281-.232-.546.191-.585l6.069-.589A1.454,1.454,0,0,0,7.513,29.9l2.434-5.589Z"
                                                        transform="translate(0.015 -24.025)" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="testimonial__chat--icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="52.472" height="45.687"
                                        viewBox="0 0 52.472 45.687">
                                        <path data-name="Chat icon"
                                            d="M105.2,149.979a16.71,16.71,0,0,0,3.8-15.4,18.87,18.87,0,0,0-8.881-11.694,25.79,25.79,0,0,0-17.343-3.676,23.55,23.55,0,0,0-15.238,7.706,16.673,16.673,0,0,0-4.108,15.7,40.137,40.137,0,0,1,1.547,7.124,15.559,15.559,0,0,1-1.727,8.677c-.228.414-.486.81-.744,1.229.1.036.15.066.192.06a26.1,26.1,0,0,0,11.034-3.862.865.865,0,0,1,.983-.132A26.582,26.582,0,0,0,91,157.853a23.243,23.243,0,0,0,14.194-7.874Zm9.5,13.924a8.286,8.286,0,0,1-.911-1.3,11.272,11.272,0,0,1-.354-9.049,12.317,12.317,0,0,0-.486-9.4c-.4-.846-.935-1.625-1.493-2.591-.108.408-.162.582-.2.762a18.517,18.517,0,0,1-2.968,7.076c-4.234,6.141-10.236,9.427-17.468,10.65-1.283.216-2.591.288-3.916.432a.579.579,0,0,0,.126.168c.33.216.648.438,1,.624a19.172,19.172,0,0,0,17.037.846,1.037,1.037,0,0,1,.8,0,18.573,18.573,0,0,0,6.033,2.291,11.879,11.879,0,0,0,2.519.246C115.079,164.647,115.115,164.419,114.7,163.9Z"
                                            transform="translate(-62.5 -118.975)" fill="currentColor" opacity="0.11" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial__items d-flex align-items-center">
                            <div class="testimonial__items--thumbnail">
                                <img class="testimonial__items--thumbnail__img"
                                    src="/assets/img/other/testimonial-thumb2.png" alt="testimonial-img">
                            </div>
                            <div class="testimonial__items--content">
                                <h3 class="testimonial__items--title">Laura Johnson</h3>
                                <span class="testimonial__items--subtitle">Products Manager</span>
                                <p class="testimonial__items--desc">Lorem ipsum dolor sit, amet consectetur is
                                    adipisicing elit. Recusandae iusto veritatis eveniet, amet sint are suscipit!
                                </p>
                                <div class="ratting testimonial__ratting">
                                    <ul class="d-flex testimonial__ratting--inner">
                                        <li class="testimonial__ratting--list">
                                            <span class="testimonial__ratting--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15.54" height="15.555"
                                                    viewBox="0 0 20.54 19.555">
                                                    <path
                                                        d="M9.947,24.316c.168-.388.446-.388.616,0L13,29.9a1.447,1.447,0,0,0,1.076.783l6.067.589c.423.039.507.3.191.585L15.77,35.9a1.456,1.456,0,0,0-.411,1.267l1.315,5.95c.092.415-.134.577-.5.364L10.92,40.4a1.45,1.45,0,0,0-1.331,0L4.335,43.485c-.368.214-.589.051-.5-.364l1.315-5.95A1.462,1.462,0,0,0,4.74,35.9L.176,31.862c-.316-.281-.232-.546.191-.585l6.069-.589A1.454,1.454,0,0,0,7.513,29.9l2.434-5.589Z"
                                                        transform="translate(0.015 -24.025)" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="testimonial__ratting--list">
                                            <span class="testimonial__ratting--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15.54" height="15.555"
                                                    viewBox="0 0 20.54 19.555">
                                                    <path
                                                        d="M9.947,24.316c.168-.388.446-.388.616,0L13,29.9a1.447,1.447,0,0,0,1.076.783l6.067.589c.423.039.507.3.191.585L15.77,35.9a1.456,1.456,0,0,0-.411,1.267l1.315,5.95c.092.415-.134.577-.5.364L10.92,40.4a1.45,1.45,0,0,0-1.331,0L4.335,43.485c-.368.214-.589.051-.5-.364l1.315-5.95A1.462,1.462,0,0,0,4.74,35.9L.176,31.862c-.316-.281-.232-.546.191-.585l6.069-.589A1.454,1.454,0,0,0,7.513,29.9l2.434-5.589Z"
                                                        transform="translate(0.015 -24.025)" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="testimonial__ratting--list">
                                            <span class="testimonial__ratting--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15.54" height="15.555"
                                                    viewBox="0 0 20.54 19.555">
                                                    <path
                                                        d="M9.947,24.316c.168-.388.446-.388.616,0L13,29.9a1.447,1.447,0,0,0,1.076.783l6.067.589c.423.039.507.3.191.585L15.77,35.9a1.456,1.456,0,0,0-.411,1.267l1.315,5.95c.092.415-.134.577-.5.364L10.92,40.4a1.45,1.45,0,0,0-1.331,0L4.335,43.485c-.368.214-.589.051-.5-.364l1.315-5.95A1.462,1.462,0,0,0,4.74,35.9L.176,31.862c-.316-.281-.232-.546.191-.585l6.069-.589A1.454,1.454,0,0,0,7.513,29.9l2.434-5.589Z"
                                                        transform="translate(0.015 -24.025)" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="testimonial__ratting--list">
                                            <span class="testimonial__ratting--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15.54" height="15.555"
                                                    viewBox="0 0 20.54 19.555">
                                                    <path
                                                        d="M9.947,24.316c.168-.388.446-.388.616,0L13,29.9a1.447,1.447,0,0,0,1.076.783l6.067.589c.423.039.507.3.191.585L15.77,35.9a1.456,1.456,0,0,0-.411,1.267l1.315,5.95c.092.415-.134.577-.5.364L10.92,40.4a1.45,1.45,0,0,0-1.331,0L4.335,43.485c-.368.214-.589.051-.5-.364l1.315-5.95A1.462,1.462,0,0,0,4.74,35.9L.176,31.862c-.316-.281-.232-.546.191-.585l6.069-.589A1.454,1.454,0,0,0,7.513,29.9l2.434-5.589Z"
                                                        transform="translate(0.015 -24.025)" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="testimonial__ratting--list">
                                            <span class="testimonial__ratting--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15.54" height="15.555"
                                                    viewBox="0 0 20.54 19.555">
                                                    <path
                                                        d="M9.947,24.316c.168-.388.446-.388.616,0L13,29.9a1.447,1.447,0,0,0,1.076.783l6.067.589c.423.039.507.3.191.585L15.77,35.9a1.456,1.456,0,0,0-.411,1.267l1.315,5.95c.092.415-.134.577-.5.364L10.92,40.4a1.45,1.45,0,0,0-1.331,0L4.335,43.485c-.368.214-.589.051-.5-.364l1.315-5.95A1.462,1.462,0,0,0,4.74,35.9L.176,31.862c-.316-.281-.232-.546.191-.585l6.069-.589A1.454,1.454,0,0,0,7.513,29.9l2.434-5.589Z"
                                                        transform="translate(0.015 -24.025)" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="testimonial__chat--icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="52.472" height="45.687"
                                        viewBox="0 0 52.472 45.687">
                                        <path data-name="Chat icon"
                                            d="M105.2,149.979a16.71,16.71,0,0,0,3.8-15.4,18.87,18.87,0,0,0-8.881-11.694,25.79,25.79,0,0,0-17.343-3.676,23.55,23.55,0,0,0-15.238,7.706,16.673,16.673,0,0,0-4.108,15.7,40.137,40.137,0,0,1,1.547,7.124,15.559,15.559,0,0,1-1.727,8.677c-.228.414-.486.81-.744,1.229.1.036.15.066.192.06a26.1,26.1,0,0,0,11.034-3.862.865.865,0,0,1,.983-.132A26.582,26.582,0,0,0,91,157.853a23.243,23.243,0,0,0,14.194-7.874Zm9.5,13.924a8.286,8.286,0,0,1-.911-1.3,11.272,11.272,0,0,1-.354-9.049,12.317,12.317,0,0,0-.486-9.4c-.4-.846-.935-1.625-1.493-2.591-.108.408-.162.582-.2.762a18.517,18.517,0,0,1-2.968,7.076c-4.234,6.141-10.236,9.427-17.468,10.65-1.283.216-2.591.288-3.916.432a.579.579,0,0,0,.126.168c.33.216.648.438,1,.624a19.172,19.172,0,0,0,17.037.846,1.037,1.037,0,0,1,.8,0,18.573,18.573,0,0,0,6.033,2.291,11.879,11.879,0,0,0,2.519.246C115.079,164.647,115.115,164.419,114.7,163.9Z"
                                            transform="translate(-62.5 -118.975)" fill="currentColor" opacity="0.11" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial__items d-flex align-items-center">
                            <div class="testimonial__items--thumbnail">
                                <img class="testimonial__items--thumbnail__img"
                                    src="/assets/img/other/testimonial-thumb3.png" alt="testimonial-img">
                            </div>
                            <div class="testimonial__items--content">
                                <h3 class="testimonial__items--title">Richard Smith</h3>
                                <span class="testimonial__items--subtitle">CEO - Founder</span>
                                <p class="testimonial__items--desc">Lorem ipsum dolor sit, amet consectetur is
                                    adipisicing elit. Recusandae iusto veritatis eveniet, amet sint are suscipit!
                                </p>
                                <div class="ratting testimonial__ratting">
                                    <ul class="d-flex testimonial__ratting--inner">
                                        <li class="testimonial__ratting--list">
                                            <span class="testimonial__ratting--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15.54" height="15.555"
                                                    viewBox="0 0 20.54 19.555">
                                                    <path
                                                        d="M9.947,24.316c.168-.388.446-.388.616,0L13,29.9a1.447,1.447,0,0,0,1.076.783l6.067.589c.423.039.507.3.191.585L15.77,35.9a1.456,1.456,0,0,0-.411,1.267l1.315,5.95c.092.415-.134.577-.5.364L10.92,40.4a1.45,1.45,0,0,0-1.331,0L4.335,43.485c-.368.214-.589.051-.5-.364l1.315-5.95A1.462,1.462,0,0,0,4.74,35.9L.176,31.862c-.316-.281-.232-.546.191-.585l6.069-.589A1.454,1.454,0,0,0,7.513,29.9l2.434-5.589Z"
                                                        transform="translate(0.015 -24.025)" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="testimonial__ratting--list">
                                            <span class="testimonial__ratting--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15.54" height="15.555"
                                                    viewBox="0 0 20.54 19.555">
                                                    <path
                                                        d="M9.947,24.316c.168-.388.446-.388.616,0L13,29.9a1.447,1.447,0,0,0,1.076.783l6.067.589c.423.039.507.3.191.585L15.77,35.9a1.456,1.456,0,0,0-.411,1.267l1.315,5.95c.092.415-.134.577-.5.364L10.92,40.4a1.45,1.45,0,0,0-1.331,0L4.335,43.485c-.368.214-.589.051-.5-.364l1.315-5.95A1.462,1.462,0,0,0,4.74,35.9L.176,31.862c-.316-.281-.232-.546.191-.585l6.069-.589A1.454,1.454,0,0,0,7.513,29.9l2.434-5.589Z"
                                                        transform="translate(0.015 -24.025)" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="testimonial__ratting--list">
                                            <span class="testimonial__ratting--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15.54" height="15.555"
                                                    viewBox="0 0 20.54 19.555">
                                                    <path
                                                        d="M9.947,24.316c.168-.388.446-.388.616,0L13,29.9a1.447,1.447,0,0,0,1.076.783l6.067.589c.423.039.507.3.191.585L15.77,35.9a1.456,1.456,0,0,0-.411,1.267l1.315,5.95c.092.415-.134.577-.5.364L10.92,40.4a1.45,1.45,0,0,0-1.331,0L4.335,43.485c-.368.214-.589.051-.5-.364l1.315-5.95A1.462,1.462,0,0,0,4.74,35.9L.176,31.862c-.316-.281-.232-.546.191-.585l6.069-.589A1.454,1.454,0,0,0,7.513,29.9l2.434-5.589Z"
                                                        transform="translate(0.015 -24.025)" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="testimonial__ratting--list">
                                            <span class="testimonial__ratting--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15.54" height="15.555"
                                                    viewBox="0 0 20.54 19.555">
                                                    <path
                                                        d="M9.947,24.316c.168-.388.446-.388.616,0L13,29.9a1.447,1.447,0,0,0,1.076.783l6.067.589c.423.039.507.3.191.585L15.77,35.9a1.456,1.456,0,0,0-.411,1.267l1.315,5.95c.092.415-.134.577-.5.364L10.92,40.4a1.45,1.45,0,0,0-1.331,0L4.335,43.485c-.368.214-.589.051-.5-.364l1.315-5.95A1.462,1.462,0,0,0,4.74,35.9L.176,31.862c-.316-.281-.232-.546.191-.585l6.069-.589A1.454,1.454,0,0,0,7.513,29.9l2.434-5.589Z"
                                                        transform="translate(0.015 -24.025)" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="testimonial__ratting--list">
                                            <span class="testimonial__ratting--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15.54" height="15.555"
                                                    viewBox="0 0 20.54 19.555">
                                                    <path
                                                        d="M9.947,24.316c.168-.388.446-.388.616,0L13,29.9a1.447,1.447,0,0,0,1.076.783l6.067.589c.423.039.507.3.191.585L15.77,35.9a1.456,1.456,0,0,0-.411,1.267l1.315,5.95c.092.415-.134.577-.5.364L10.92,40.4a1.45,1.45,0,0,0-1.331,0L4.335,43.485c-.368.214-.589.051-.5-.364l1.315-5.95A1.462,1.462,0,0,0,4.74,35.9L.176,31.862c-.316-.281-.232-.546.191-.585l6.069-.589A1.454,1.454,0,0,0,7.513,29.9l2.434-5.589Z"
                                                        transform="translate(0.015 -24.025)" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="testimonial__chat--icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="52.472" height="45.687"
                                        viewBox="0 0 52.472 45.687">
                                        <path data-name="Chat icon"
                                            d="M105.2,149.979a16.71,16.71,0,0,0,3.8-15.4,18.87,18.87,0,0,0-8.881-11.694,25.79,25.79,0,0,0-17.343-3.676,23.55,23.55,0,0,0-15.238,7.706,16.673,16.673,0,0,0-4.108,15.7,40.137,40.137,0,0,1,1.547,7.124,15.559,15.559,0,0,1-1.727,8.677c-.228.414-.486.81-.744,1.229.1.036.15.066.192.06a26.1,26.1,0,0,0,11.034-3.862.865.865,0,0,1,.983-.132A26.582,26.582,0,0,0,91,157.853a23.243,23.243,0,0,0,14.194-7.874Zm9.5,13.924a8.286,8.286,0,0,1-.911-1.3,11.272,11.272,0,0,1-.354-9.049,12.317,12.317,0,0,0-.486-9.4c-.4-.846-.935-1.625-1.493-2.591-.108.408-.162.582-.2.762a18.517,18.517,0,0,1-2.968,7.076c-4.234,6.141-10.236,9.427-17.468,10.65-1.283.216-2.591.288-3.916.432a.579.579,0,0,0,.126.168c.33.216.648.438,1,.624a19.172,19.172,0,0,0,17.037.846,1.037,1.037,0,0,1,.8,0,18.573,18.573,0,0,0,6.033,2.291,11.879,11.879,0,0,0,2.519.246C115.079,164.647,115.115,164.419,114.7,163.9Z"
                                            transform="translate(-62.5 -118.975)" fill="currentColor" opacity="0.11" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial__items d-flex align-items-center">
                            <div class="testimonial__items--thumbnail">
                                <img class="testimonial__items--thumbnail__img"
                                    src="/assets/img/other/testimonial-thumb1.png" alt="testimonial-img">
                            </div>
                            <div class="testimonial__items--content">
                                <h3 class="testimonial__items--title">JACKLY SMITH</h3>
                                <span class="testimonial__items--subtitle">Senior Maneger</span>
                                <p class="testimonial__items--desc">Lorem ipsum dolor sit, amet consectetur is
                                    adipisicing elit. Recusandae iusto veritatis eveniet, amet sint are suscipit!
                                </p>
                                <div class="ratting testimonial__ratting">
                                    <ul class="d-flex testimonial__ratting--inner">
                                        <li class="testimonial__ratting--list">
                                            <span class="testimonial__ratting--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15.54" height="15.555"
                                                    viewBox="0 0 20.54 19.555">
                                                    <path
                                                        d="M9.947,24.316c.168-.388.446-.388.616,0L13,29.9a1.447,1.447,0,0,0,1.076.783l6.067.589c.423.039.507.3.191.585L15.77,35.9a1.456,1.456,0,0,0-.411,1.267l1.315,5.95c.092.415-.134.577-.5.364L10.92,40.4a1.45,1.45,0,0,0-1.331,0L4.335,43.485c-.368.214-.589.051-.5-.364l1.315-5.95A1.462,1.462,0,0,0,4.74,35.9L.176,31.862c-.316-.281-.232-.546.191-.585l6.069-.589A1.454,1.454,0,0,0,7.513,29.9l2.434-5.589Z"
                                                        transform="translate(0.015 -24.025)" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="testimonial__ratting--list">
                                            <span class="testimonial__ratting--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15.54" height="15.555"
                                                    viewBox="0 0 20.54 19.555">
                                                    <path
                                                        d="M9.947,24.316c.168-.388.446-.388.616,0L13,29.9a1.447,1.447,0,0,0,1.076.783l6.067.589c.423.039.507.3.191.585L15.77,35.9a1.456,1.456,0,0,0-.411,1.267l1.315,5.95c.092.415-.134.577-.5.364L10.92,40.4a1.45,1.45,0,0,0-1.331,0L4.335,43.485c-.368.214-.589.051-.5-.364l1.315-5.95A1.462,1.462,0,0,0,4.74,35.9L.176,31.862c-.316-.281-.232-.546.191-.585l6.069-.589A1.454,1.454,0,0,0,7.513,29.9l2.434-5.589Z"
                                                        transform="translate(0.015 -24.025)" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="testimonial__ratting--list">
                                            <span class="testimonial__ratting--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15.54" height="15.555"
                                                    viewBox="0 0 20.54 19.555">
                                                    <path
                                                        d="M9.947,24.316c.168-.388.446-.388.616,0L13,29.9a1.447,1.447,0,0,0,1.076.783l6.067.589c.423.039.507.3.191.585L15.77,35.9a1.456,1.456,0,0,0-.411,1.267l1.315,5.95c.092.415-.134.577-.5.364L10.92,40.4a1.45,1.45,0,0,0-1.331,0L4.335,43.485c-.368.214-.589.051-.5-.364l1.315-5.95A1.462,1.462,0,0,0,4.74,35.9L.176,31.862c-.316-.281-.232-.546.191-.585l6.069-.589A1.454,1.454,0,0,0,7.513,29.9l2.434-5.589Z"
                                                        transform="translate(0.015 -24.025)" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="testimonial__ratting--list">
                                            <span class="testimonial__ratting--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15.54" height="15.555"
                                                    viewBox="0 0 20.54 19.555">
                                                    <path
                                                        d="M9.947,24.316c.168-.388.446-.388.616,0L13,29.9a1.447,1.447,0,0,0,1.076.783l6.067.589c.423.039.507.3.191.585L15.77,35.9a1.456,1.456,0,0,0-.411,1.267l1.315,5.95c.092.415-.134.577-.5.364L10.92,40.4a1.45,1.45,0,0,0-1.331,0L4.335,43.485c-.368.214-.589.051-.5-.364l1.315-5.95A1.462,1.462,0,0,0,4.74,35.9L.176,31.862c-.316-.281-.232-.546.191-.585l6.069-.589A1.454,1.454,0,0,0,7.513,29.9l2.434-5.589Z"
                                                        transform="translate(0.015 -24.025)" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="testimonial__ratting--list">
                                            <span class="testimonial__ratting--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15.54" height="15.555"
                                                    viewBox="0 0 20.54 19.555">
                                                    <path
                                                        d="M9.947,24.316c.168-.388.446-.388.616,0L13,29.9a1.447,1.447,0,0,0,1.076.783l6.067.589c.423.039.507.3.191.585L15.77,35.9a1.456,1.456,0,0,0-.411,1.267l1.315,5.95c.092.415-.134.577-.5.364L10.92,40.4a1.45,1.45,0,0,0-1.331,0L4.335,43.485c-.368.214-.589.051-.5-.364l1.315-5.95A1.462,1.462,0,0,0,4.74,35.9L.176,31.862c-.316-.281-.232-.546.191-.585l6.069-.589A1.454,1.454,0,0,0,7.513,29.9l2.434-5.589Z"
                                                        transform="translate(0.015 -24.025)" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="testimonial__chat--icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="52.472" height="45.687"
                                        viewBox="0 0 52.472 45.687">
                                        <path data-name="Chat icon"
                                            d="M105.2,149.979a16.71,16.71,0,0,0,3.8-15.4,18.87,18.87,0,0,0-8.881-11.694,25.79,25.79,0,0,0-17.343-3.676,23.55,23.55,0,0,0-15.238,7.706,16.673,16.673,0,0,0-4.108,15.7,40.137,40.137,0,0,1,1.547,7.124,15.559,15.559,0,0,1-1.727,8.677c-.228.414-.486.81-.744,1.229.1.036.15.066.192.06a26.1,26.1,0,0,0,11.034-3.862.865.865,0,0,1,.983-.132A26.582,26.582,0,0,0,91,157.853a23.243,23.243,0,0,0,14.194-7.874Zm9.5,13.924a8.286,8.286,0,0,1-.911-1.3,11.272,11.272,0,0,1-.354-9.049,12.317,12.317,0,0,0-.486-9.4c-.4-.846-.935-1.625-1.493-2.591-.108.408-.162.582-.2.762a18.517,18.517,0,0,1-2.968,7.076c-4.234,6.141-10.236,9.427-17.468,10.65-1.283.216-2.591.288-3.916.432a.579.579,0,0,0,.126.168c.33.216.648.438,1,.624a19.172,19.172,0,0,0,17.037.846,1.037,1.037,0,0,1,.8,0,18.573,18.573,0,0,0,6.033,2.291,11.879,11.879,0,0,0,2.519.246C115.079,164.647,115.115,164.419,114.7,163.9Z"
                                            transform="translate(-62.5 -118.975)" fill="currentColor" opacity="0.11" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial__items d-flex align-items-center">
                            <div class="testimonial__items--thumbnail">
                                <img class="testimonial__items--thumbnail__img"
                                    src="/assets/img/other/testimonial-thumb2.png" alt="testimonial-img">
                            </div>
                            <div class="testimonial__items--content">
                                <h3 class="testimonial__items--title">Laura Johnson</h3>
                                <span class="testimonial__items--subtitle">Products Manager</span>
                                <p class="testimonial__items--desc">Lorem ipsum dolor sit, amet consectetur is
                                    adipisicing elit. Recusandae iusto veritatis eveniet, amet sint are suscipit!
                                </p>
                                <div class="ratting testimonial__ratting">
                                    <ul class="d-flex testimonial__ratting--inner">
                                        <li class="testimonial__ratting--list">
                                            <span class="testimonial__ratting--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15.54" height="15.555"
                                                    viewBox="0 0 20.54 19.555">
                                                    <path
                                                        d="M9.947,24.316c.168-.388.446-.388.616,0L13,29.9a1.447,1.447,0,0,0,1.076.783l6.067.589c.423.039.507.3.191.585L15.77,35.9a1.456,1.456,0,0,0-.411,1.267l1.315,5.95c.092.415-.134.577-.5.364L10.92,40.4a1.45,1.45,0,0,0-1.331,0L4.335,43.485c-.368.214-.589.051-.5-.364l1.315-5.95A1.462,1.462,0,0,0,4.74,35.9L.176,31.862c-.316-.281-.232-.546.191-.585l6.069-.589A1.454,1.454,0,0,0,7.513,29.9l2.434-5.589Z"
                                                        transform="translate(0.015 -24.025)" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="testimonial__ratting--list">
                                            <span class="testimonial__ratting--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15.54" height="15.555"
                                                    viewBox="0 0 20.54 19.555">
                                                    <path
                                                        d="M9.947,24.316c.168-.388.446-.388.616,0L13,29.9a1.447,1.447,0,0,0,1.076.783l6.067.589c.423.039.507.3.191.585L15.77,35.9a1.456,1.456,0,0,0-.411,1.267l1.315,5.95c.092.415-.134.577-.5.364L10.92,40.4a1.45,1.45,0,0,0-1.331,0L4.335,43.485c-.368.214-.589.051-.5-.364l1.315-5.95A1.462,1.462,0,0,0,4.74,35.9L.176,31.862c-.316-.281-.232-.546.191-.585l6.069-.589A1.454,1.454,0,0,0,7.513,29.9l2.434-5.589Z"
                                                        transform="translate(0.015 -24.025)" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="testimonial__ratting--list">
                                            <span class="testimonial__ratting--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15.54" height="15.555"
                                                    viewBox="0 0 20.54 19.555">
                                                    <path
                                                        d="M9.947,24.316c.168-.388.446-.388.616,0L13,29.9a1.447,1.447,0,0,0,1.076.783l6.067.589c.423.039.507.3.191.585L15.77,35.9a1.456,1.456,0,0,0-.411,1.267l1.315,5.95c.092.415-.134.577-.5.364L10.92,40.4a1.45,1.45,0,0,0-1.331,0L4.335,43.485c-.368.214-.589.051-.5-.364l1.315-5.95A1.462,1.462,0,0,0,4.74,35.9L.176,31.862c-.316-.281-.232-.546.191-.585l6.069-.589A1.454,1.454,0,0,0,7.513,29.9l2.434-5.589Z"
                                                        transform="translate(0.015 -24.025)" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="testimonial__ratting--list">
                                            <span class="testimonial__ratting--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15.54" height="15.555"
                                                    viewBox="0 0 20.54 19.555">
                                                    <path
                                                        d="M9.947,24.316c.168-.388.446-.388.616,0L13,29.9a1.447,1.447,0,0,0,1.076.783l6.067.589c.423.039.507.3.191.585L15.77,35.9a1.456,1.456,0,0,0-.411,1.267l1.315,5.95c.092.415-.134.577-.5.364L10.92,40.4a1.45,1.45,0,0,0-1.331,0L4.335,43.485c-.368.214-.589.051-.5-.364l1.315-5.95A1.462,1.462,0,0,0,4.74,35.9L.176,31.862c-.316-.281-.232-.546.191-.585l6.069-.589A1.454,1.454,0,0,0,7.513,29.9l2.434-5.589Z"
                                                        transform="translate(0.015 -24.025)" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="testimonial__ratting--list">
                                            <span class="testimonial__ratting--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15.54" height="15.555"
                                                    viewBox="0 0 20.54 19.555">
                                                    <path
                                                        d="M9.947,24.316c.168-.388.446-.388.616,0L13,29.9a1.447,1.447,0,0,0,1.076.783l6.067.589c.423.039.507.3.191.585L15.77,35.9a1.456,1.456,0,0,0-.411,1.267l1.315,5.95c.092.415-.134.577-.5.364L10.92,40.4a1.45,1.45,0,0,0-1.331,0L4.335,43.485c-.368.214-.589.051-.5-.364l1.315-5.95A1.462,1.462,0,0,0,4.74,35.9L.176,31.862c-.316-.281-.232-.546.191-.585l6.069-.589A1.454,1.454,0,0,0,7.513,29.9l2.434-5.589Z"
                                                        transform="translate(0.015 -24.025)" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="testimonial__chat--icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="52.472" height="45.687"
                                        viewBox="0 0 52.472 45.687">
                                        <path data-name="Chat icon"
                                            d="M105.2,149.979a16.71,16.71,0,0,0,3.8-15.4,18.87,18.87,0,0,0-8.881-11.694,25.79,25.79,0,0,0-17.343-3.676,23.55,23.55,0,0,0-15.238,7.706,16.673,16.673,0,0,0-4.108,15.7,40.137,40.137,0,0,1,1.547,7.124,15.559,15.559,0,0,1-1.727,8.677c-.228.414-.486.81-.744,1.229.1.036.15.066.192.06a26.1,26.1,0,0,0,11.034-3.862.865.865,0,0,1,.983-.132A26.582,26.582,0,0,0,91,157.853a23.243,23.243,0,0,0,14.194-7.874Zm9.5,13.924a8.286,8.286,0,0,1-.911-1.3,11.272,11.272,0,0,1-.354-9.049,12.317,12.317,0,0,0-.486-9.4c-.4-.846-.935-1.625-1.493-2.591-.108.408-.162.582-.2.762a18.517,18.517,0,0,1-2.968,7.076c-4.234,6.141-10.236,9.427-17.468,10.65-1.283.216-2.591.288-3.916.432a.579.579,0,0,0,.126.168c.33.216.648.438,1,.624a19.172,19.172,0,0,0,17.037.846,1.037,1.037,0,0,1,.8,0,18.573,18.573,0,0,0,6.033,2.291,11.879,11.879,0,0,0,2.519.246C115.079,164.647,115.115,164.419,114.7,163.9Z"
                                            transform="translate(-62.5 -118.975)" fill="currentColor" opacity="0.11" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper__nav--btn swiper-button-next"></div>
                <div class="swiper__nav--btn swiper-button-prev"></div>
            </div>
        </div>
    </section>
    <!-- End testimonial section -->

    <!-- Start shipping section -->
    <section class="shipping__section section--padding">
        <div class="container">
            <div class="shipping__section--inner d-flex">
                <div class="shipping__items">
                    <div class="shipping__items--icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32.955" height="23.967" viewBox="0 0 32.955 23.967">
                            <path
                                d="M29.461,9.992H24.967V4H4A3,3,0,0,0,1,7V23.473H4a4.494,4.494,0,0,0,8.988,0h8.988a4.494,4.494,0,1,0,8.988,0h3v-7.49ZM8.49,25.72a2.247,2.247,0,1,1,2.247-2.247A2.244,2.244,0,0,1,8.49,25.72ZM28.712,12.239l2.936,3.745H24.967V12.239ZM26.465,25.72a2.247,2.247,0,1,1,2.247-2.247A2.244,2.244,0,0,1,26.465,25.72Z"
                                transform="translate(-1 -4)" fill="currentColor" opacity="0.73" />
                        </svg>
                    </div>
                    <div class="shipping__items--content text-center">
                        <h2 class="shipping__items--title h3">Free Shipping</h2>
                        <p class="shipping__items--desc">On all orders over $75.00</p>
                    </div>
                </div>
                <div class="shipping__items">
                    <div class="shipping__items--icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="27.63" height="38.407" viewBox="0 0 27.63 38.407">
                            <path
                                d="M17.615,6.106V1L10.808,7.808l6.808,6.808V9.509A10.219,10.219,0,0,1,27.826,19.721a9.991,9.991,0,0,1-1.191,4.765l2.485,2.485a13.591,13.591,0,0,0-11.5-20.865Zm0,23.826A10.219,10.219,0,0,1,7.4,19.721,9.991,9.991,0,0,1,8.6,14.955L6.11,12.471a13.591,13.591,0,0,0,11.5,20.865v5.106l6.808-6.808-6.808-6.808Z"
                                transform="translate(-3.8 -0.517)" fill="currentColor" stroke-width="0.4" opacity="0.7" />
                        </svg>
                    </div>
                    <div class="shipping__items--content text-center">
                        <h2 class="shipping__items--title h3">Free Returns</h2>
                        <p class="shipping__items--desc">On all orders over $75.00</p>
                    </div>
                </div>
                <div class="shipping__items">
                    <div class="shipping__items--icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="27.787" height="22.735" viewBox="0 0 27.787 22.735">
                            <path
                                d="M26.261,3H3.526A2.534,2.534,0,0,0,1,5.526V23.209a2.534,2.534,0,0,0,2.526,2.526H26.261a2.534,2.534,0,0,0,2.526-2.526V5.526A2.534,2.534,0,0,0,26.261,3ZM14.894,13.1H3.526V10.578H14.894Zm0-5.052H3.526V5.526H14.894Z"
                                transform="translate(-1 -3)" fill="currentColor" opacity="0.7" />
                        </svg>
                    </div>
                    <div class="shipping__items--content text-center">
                        <h2 class="shipping__items--title h3">Secure Payment</h2>
                        <p class="shipping__items--desc">On all orders over $75.00</p>
                    </div>
                </div>
                <div class="shipping__items">
                    <div class="shipping__items--icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="22.143" viewBox="0 0 25 22.143">
                            <path
                                d="M81.251,82.1c2.151,0,3.12-.959,3.12-2.149S83.4,77.8,81.251,77.8a6.99,6.99,0,0,0-4.694,1.8,3.4,3.4,0,0,0-1.609-.414,3.306,3.306,0,0,0-1.54.385A7,7,0,0,0,68.746,77.8c-2.157,0-3.12.964-3.12,2.149s.96,2.149,3.12,2.149h5.189V99.943H76.06V82.1Zm0-2.862c.709,0,1.554.126,1.554.713s-.846.721-1.554.721H77.7l-.029-.066A5.35,5.35,0,0,1,81.251,79.236ZM72.206,80.67H68.749c-.709,0-1.566-.128-1.566-.721s.854-.713,1.566-.713a5.33,5.33,0,0,1,3.526,1.321Zm-9.706,3.5v2.87H73.44v-4.3H64.066A1.505,1.505,0,0,0,62.5,84.174Zm1.566,14.333a1.5,1.5,0,0,0,1.563,1.434H73.44V88.472H64.066ZM85.934,82.74H76.628v4.306H87.5V84.174A1.507,1.507,0,0,0,85.934,82.74Zm-9.306,17.2h7.743a1.507,1.507,0,0,0,1.566-1.434V88.472H76.628Z"
                                transform="translate(-62.5 -77.8)" fill="currentColor" opacity="0.7" />
                        </svg>
                    </div>
                    <div class="shipping__items--content text-center">
                        <h2 class="shipping__items--title h3">Gift Service</h2>
                        <p class="shipping__items--desc">On all orders over $75.00</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End shipping section -->
@endsection
