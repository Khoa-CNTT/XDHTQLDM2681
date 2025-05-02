@extends('Client.Share.master')
@section('content')
                @php
    use Carbon\Carbon;

    $restaurant = $menuItem->restaurant;

    $start = $restaurant->start_time ? Carbon::createFromFormat('H:i:s', $restaurant->start_time) : null;
    $end = $restaurant->end_time ? Carbon::createFromFormat('H:i:s', $restaurant->end_time) : null;
    $now = Carbon::now();

    $isOpen = false;

    if ($start && $end) {
        $isOpen = $start->lt($end)
            ? $now->between($start, $end)
            : $now->gte($start) || $now->lte($end);
    }
                @endphp


                    <main class="main__content_wrapper">

                        <!-- Start breadcrumb section -->
                        <section class="breadcrumb__section breadcrumb__bg">
                            <div class="container">
                                <div class="row row-cols-1">
                                    <div class="col">
                                        <div class="breadcrumb__content text-center">
                                            <h1 class="breadcrumb__content--title text-white mb-25">Chi tiết món ăn</h1>
                                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="/">Trang chủ</a>
                                                </li>
                                                <li class="breadcrumb__content--menu__items"><span
                                                        class="text-white">{{ $menuItem->Title_items }}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- End breadcrumb section -->

                        <!-- Start product details section -->
                        <section class="product__details--section section--padding">
                            <div class="container">
                                <div class="row row-cols-lg-2 row-cols-md-2">
                                    <div class="col">
                                        <div class="product__details--media">
                                            <div
                                                class="product__media--preview swiper swiper-initialized swiper-horizontal swiper-pointer-events">
                                                <div class="swiper-wrapper" id="swiper-wrapper-510f11c91f8f16ba3" aria-live="polite"
                                                    style="transform: translate3d(-580px, 0px, 0px); transition-duration: 0ms;">
                                                    <div class="swiper-slide swiper-slide-duplicate swiper-slide-prev"
                                                        data-swiper-slide-index="5" role="group" aria-label="6 / 6"
                                                        style="width: 570px; margin-right: 10px;">
                                                        <div class="product__media--preview__items">
                                                            <a class="product__media--preview__items--link glightbox"
                                                                data-gallery="product-media-preview"
                                                                href="assets/img/product/big-product6.jpg"><img
                                                                    class="product__media--preview__items--img"
                                                                    src="assets/img/product/big-product6.jpg" alt="product-media-img"></a>
                                                            <div class="product__media--view__icon">
                                                                <a class="product__media--view__icon--link glightbox"
                                                                    href="assets/img/product/big-product6.jpg"
                                                                    data-gallery="product-media-preview">
                                                                    <svg class="product__items--action__btn--svg"
                                                                        xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443"
                                                                        viewBox="0 0 512 512">
                                                                        <path
                                                                            d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                            fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                            stroke-width="32"></path>
                                                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                            stroke-miterlimit="10" stroke-width="32"
                                                                            d="M338.29 338.29L448 448"></path>
                                                                    </svg>
                                                                    <span class="visually-hidden">product view</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" role="group"
                                                        aria-label="1 / 6" style="width: 570px; margin-right: 10px;">
                                                        <div class="product__media--preview__items" style="width: 100%; height: 100%; overflow: hidden; border-radius: 10px;">
                                                            <a class="product__media--preview__items--link glightbox"
                                                                data-gallery="product-media-preview"
                                                                href="{{ asset('public/image/foods/' . $menuItem->Image) }}"><img
                                                                    class="product__media--preview__items--img"
                                                                    src="{{ asset('public/image/foods/' . $menuItem->Image) }}" alt="product-media-img"   style="width: 100%; height: 100%; object-fit: cover;"></a>
                                                            <div class="product__media--view__icon">
                                                                <a class="product__media--view__icon--link glightbox"
                                                                    href="{{ asset('public/image/foods/' . $menuItem->Image) }}"
                                                                    data-gallery="product-media-preview">
                                                                    <svg class="product__items--action__btn--svg"
                                                                        xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443"
                                                                        viewBox="0 0 512 512">
                                                                        <path
                                                                            d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                            fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                            stroke-width="32"></path>
                                                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                            stroke-miterlimit="10" stroke-width="32"
                                                                            d="M338.29 338.29L448 448"></path>
                                                                    </svg>
                                                                    <span class="visually-hidden">product view</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                            </div>
                                            <div
                                                class="product__media--nav swiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-free-mode swiper-thumbs">
                                                <div class="swiper-wrapper" id="swiper-wrapper-8c10c8b4c7e995b11" aria-live="polite"
                                                    style="transform: translate3d(-580px, 0px, 0px); transition-duration: 0ms;">
                                                    <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next"
                                                        role="group" aria-label="2 / 6" style="width: 106px; margin-right: 10px;"
                                                        data-swiper-slide-index="1">
                                                        <div class="product__media--nav__items">
                                                            <img class="product__media--nav__items--img"
                                                                src="{{ asset('public/image/foods/' . $menuItem->Image) }}"
                                                                alt="product-nav-img">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="swiper__nav--btn swiper-button-next" tabindex="0" role="button"
                                                    aria-label="Next slide" aria-controls="swiper-wrapper-8c10c8b4c7e995b11"></div>
                                                <div class="swiper__nav--btn swiper-button-prev" tabindex="0" role="button"
                                                    aria-label="Previous slide" aria-controls="swiper-wrapper-8c10c8b4c7e995b11"></div>
                                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="product__details--info">
                                            <form action="#">
                                                <h2 class="product__details--info__title mb-15">{{$menuItem->Title_items}}</h2>
                                                <div class="product__details--info__price mb-15">
                                                    <span class="current__price">{{ number_format($menuItem->Price, 0, ',', '.') }} đ</span>

                                                    <span class="old__price">{{ number_format($menuItem->OldPrice, 0, ',', '.') }} đ</span>
                                                </div>
                                                <div class="product__items--rating d-flex align-items-center mb-15">
                                                    <ul class="d-flex">
                                                        <li class="product__items--rating__list">
                                                            <span class="product__items--rating__icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16.105" height="14.732"
                                                                    viewBox="0 0 10.105 9.732">
                                                                    <path data-name="star - Copy"
                                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                        </li>
                                                        <li class="product__items--rating__list">
                                                            <span class="product__items--rating__icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16.105" height="14.732"
                                                                    viewBox="0 0 10.105 9.732">
                                                                    <path data-name="star - Copy"
                                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                        </li>
                                                        <li class="product__items--rating__list">
                                                            <span class="product__items--rating__icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16.105" height="14.732"
                                                                    viewBox="0 0 10.105 9.732">
                                                                    <path data-name="star - Copy"
                                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                        </li>
                                                        <li class="product__items--rating__list">
                                                            <span class="product__items--rating__icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16.105" height="14.732"
                                                                    viewBox="0 0 10.105 9.732">
                                                                    <path data-name="star - Copy"
                                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                        </li>
                                                        <li class="product__items--rating__list">
                                                            <span class="product__items--rating__icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16.105" height="14.732"
                                                                    viewBox="0 0 10.105 9.732">
                                                                    <path data-name="star - Copy"
                                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                        transform="translate(0 -0.018)" fill="#c7c5c2"></path>
                                                                </svg>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                    <span class="product__items--rating__count--number">(24)</span>
                                                </div>
                                                <p><a href="{{ route('restaurant.menu', ['id' => $menuItem->restaurant->id]) }}">
                                                                    <h2 class="product__tab--content__title h4 mb-0">Nhà hàng :
                                                                        {{ $menuItem->restaurant->name }}</h2>
                                                            </a></p>
                                            @foreach ($menuItem->restaurant->locations as $index => $location)
                                                <div style="margin-bottom: 20px;">
                                                    <!-- Hiển thị địa chỉ dạng clickable -->
                                                    <p>
                                                        <a href="javascript:void(0);"
                                                            onclick="showMap({{ $location->Latitude }}, {{ $location->Longitude }}, '{{ $location->Address }}', {{ $index }})">
                                                            📍 Địa chỉ: {{ $location->Address }}, {{ $location->Ward }}, {{ $location->District }},
                                                            {{ $location->City }}
                                                        </a>
                                                    </p>

                                                    <!-- Div bản đồ, ẩn ban đầu -->
                                                    <div id="map-{{ $index }}" style="height: 300px; display: none;"></div>
                                                </div>
                                            @endforeach


                                                <p><p><strong>Giờ hoạt động:</strong>
                                                    {{ $start ? $start->format('H:i') : 'Không rõ' }} -
                                                    {{ $end ? $end->format('H:i') : 'Không rõ' }}
                                                </p></p>
                                                <p>
                                                    <strong>Trạng thái:</strong>
                                                    @if ($start && $end)
                                                        @if ($isOpen)
                                                            <span style="color: green; font-weight: bold;">Đang mở cửa</span>
                                                        @else
                                                            <span style="color: red; font-weight: bold;">Đã đóng cửa</span>
                                                        @endif
                                                    @else
                                                        <span>Không có thông tin giờ hoạt động</span>
                                                    @endif
                                                </p>


                                                <div class="product__variant">
                                                    <div class="product__variant--list mb-10">

                                                    </div>

                                                    <div class="product__variant--list quantity d-flex align-items-center mb-20">
                                                        <div class="quantity__box">
                                                            <button type="button"
                                                                class="quantity__value quickview__value--quantity decrease"
                                                                aria-label="quantity value" value="Decrease Value">-</button>
                                                            <label>
                                                                <input type="number" class="quantity__number quickview__value--number"
                                                                    value="1" data-counter="">
                                                            </label>
                                                            <button type="button"
                                                                class="quantity__value quickview__value--quantity increase"
                                                                aria-label="quantity value" value="Increase Value">+</button>
                                                        </div>
                                                        <a class="btn quickview__cart--btn" type="submit"
                                                            href="{{ route('cart.add', $menuItem->id) }}">Thêm vào giỏ</a>
                                                    </div>


                                                </div>


                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- End product details section -->

                        <!-- Start product details tab section -->
                        <section class="product__details--tab__section section--padding">
                            <div class="container">
                                <div class="row row-cols-1">
                                    <div class="col">
                                        <ul class="product__tab--one product__details--tab d-flex mb-30">
                                            <li class="product__details--tab__list active" data-toggle="tab" data-target="#description">Mô
                                                tả</li>


                                        </ul>
                                        <div class="product__details--tab__inner border-radius-10">
                                            <div class="tab_content">
                                                <div id="description" class="tab_pane active show">
                                                    <div class="product__tab--content">
                                                        <div class="product__tab--content__step mb-30">
                                                            <a href="{{ route('restaurant.menu', ['id' => $menuItem->restaurant->id]) }}">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <img src="{{ asset('/image/logo/' . $menuItem->restaurant->logo) }}"
                                                                         style="width: 40px; height: 40px; object-fit: cover; border-radius: 20%;">
                                                                    <h2 class="product__tab--content__title h4 mb-0">Nhà hàng : {{ $menuItem->restaurant->name }}</h2>
                                                                </div>
                                                            </a>
                                                            <p class="product__tab--content__desc">Mô tả:<br>{!! $menuItem->description !!}</p>
                                                        </div>

                                                    </div>
                                                </div>
                                        </div>
                                        </div>


                                        <ul class="product__tab--one product__details--tab d-flex mb-30" style="margin-top: 20px;">
                                            <li class="product__details--tab__list active">Đánh giá</li>
                                        </ul>
                                        <div class="product__details--tab__inner border-radius-10">
                                            <div class="tab_content">
                                                <div>
                                                    <div class="product__reviews">
                                                        <div class="product__reviews--header">
                                                            <h3 class="product__reviews--header__title h3 mb-20">Đánh giá của khách hàng</h3>
                                                            <div class="reviews__ratting d-flex align-items-center">
                                                                <ul class="d-flex">
                                                                    <li class="reviews__ratting--list">
                                                                        <span class="reviews__ratting--icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                                                height="12.732" viewBox="0 0 10.105 9.732">
                                                                                <path data-name="star - Copy"
                                                                                    d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                                    transform="translate(0 -0.018)" fill="currentColor">
                                                                                </path>
                                                                            </svg>
                                                                        </span>
                                                                    </li>
                                                                    <li class="reviews__ratting--list">
                                                                        <span class="reviews__ratting--icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                                                height="12.732" viewBox="0 0 10.105 9.732">
                                                                                <path data-name="star - Copy"
                                                                                    d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                                    transform="translate(0 -0.018)" fill="currentColor">
                                                                                </path>
                                                                            </svg>
                                                                        </span>
                                                                    </li>
                                                                    <li class="reviews__ratting--list">
                                                                        <span class="reviews__ratting--icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                                                height="12.732" viewBox="0 0 10.105 9.732">
                                                                                <path data-name="star - Copy"
                                                                                    d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                                    transform="translate(0 -0.018)" fill="currentColor">
                                                                                </path>
                                                                            </svg>
                                                                        </span>
                                                                    </li>
                                                                    <li class="reviews__ratting--list">
                                                                        <span class="reviews__ratting--icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                                                height="12.732" viewBox="0 0 10.105 9.732">
                                                                                <path data-name="star - Copy"
                                                                                    d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                                    transform="translate(0 -0.018)" fill="currentColor">
                                                                                </path>
                                                                            </svg>
                                                                        </span>
                                                                    </li>
                                                                    <li class="reviews__ratting--list">
                                                                        <span class="reviews__ratting--icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                                                height="12.732" viewBox="0 0 10.105 9.732">
                                                                                <path data-name="star - Copy"
                                                                                    d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                                    transform="translate(0 -0.018)" fill="#c7c5c2"></path>
                                                                            </svg>
                                                                        </span>
                                                                    </li>
                                                                </ul>
                                                                <span class="reviews__summary--caption">Based on 2 reviews</span>
                                                            </div>

                                                        </div>
                                                        <div class="reviews__comment--area">
                                                            <div class="reviews__comment--list d-flex">
                                                                <div class="reviews__comment--thumb">
                                                                    <img src="assets/img/other/comment-thumb1.png" alt="comment-thumb">
                                                                </div>
                                                                <div class="reviews__comment--content">
                                                                    <div class="reviews__comment--top d-flex justify-content-between">
                                                                        <div class="reviews__comment--top__left">
                                                                            <h3 class="reviews__comment--content__title h4">Jakes on</h3>
                                                                            <ul class="reviews__ratting d-flex">
                                                                                <li class="reviews__ratting--list">
                                                                                    <span class="reviews__ratting--icon">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            width="14.105" height="12.732"
                                                                                            viewBox="0 0 10.105 9.732">
                                                                                            <path data-name="star - Copy"
                                                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                                                transform="translate(0 -0.018)"
                                                                                                fill="currentColor"></path>
                                                                                        </svg>
                                                                                    </span>
                                                                                </li>
                                                                                <li class="reviews__ratting--list">
                                                                                    <span class="reviews__ratting--icon">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            width="14.105" height="12.732"
                                                                                            viewBox="0 0 10.105 9.732">
                                                                                            <path data-name="star - Copy"
                                                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                                                transform="translate(0 -0.018)"
                                                                                                fill="currentColor"></path>
                                                                                        </svg>
                                                                                    </span>
                                                                                </li>
                                                                                <li class="reviews__ratting--list">
                                                                                    <span class="reviews__ratting--icon">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            width="14.105" height="12.732"
                                                                                            viewBox="0 0 10.105 9.732">
                                                                                            <path data-name="star - Copy"
                                                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                                                transform="translate(0 -0.018)"
                                                                                                fill="currentColor"></path>
                                                                                        </svg>
                                                                                    </span>
                                                                                </li>
                                                                                <li class="reviews__ratting--list">
                                                                                    <span class="reviews__ratting--icon">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            width="14.105" height="12.732"
                                                                                            viewBox="0 0 10.105 9.732">
                                                                                            <path data-name="star - Copy"
                                                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                                                transform="translate(0 -0.018)"
                                                                                                fill="currentColor"></path>
                                                                                        </svg>
                                                                                    </span>
                                                                                </li>
                                                                                <li class="reviews__ratting--list">
                                                                                    <span class="reviews__ratting--icon">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            width="14.105" height="12.732"
                                                                                            viewBox="0 0 10.105 9.732">
                                                                                            <path data-name="star - Copy"
                                                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                                                transform="translate(0 -0.018)"
                                                                                                fill="#c7c5c2"></path>
                                                                                        </svg>
                                                                                    </span>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <span class="reviews__comment--content__date">February 13,
                                                                            2022</span>
                                                                    </div>
                                                                    <p class="reviews__comment--content__desc">Lorem ipsum, dolor sit amet
                                                                        consectetur adipisicing elit. Eos ex repellat officiis neque.
                                                                        Veniam, rem nesciunt. Assumenda distinctio, autem error repellat
                                                                        eveniet ratione dolor facilis accusantium amet pariatur, non eius!
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="reviews__comment--list margin__left d-flex">
                                                                <div class="reviews__comment--thumb">
                                                                    <img src="assets/img/other/comment-thumb2.png" alt="comment-thumb">
                                                                </div>
                                                                <div class="reviews__comment--content">
                                                                    <div class="reviews__comment--top d-flex justify-content-between">
                                                                        <div class="reviews__comment--top__left">
                                                                            <h3 class="reviews__comment--content__title h4">Laura Johnson
                                                                            </h3>
                                                                            <ul class="reviews__ratting d-flex">
                                                                                <li class="reviews__ratting--list">
                                                                                    <span class="reviews__ratting--icon">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            width="14.105" height="12.732"
                                                                                            viewBox="0 0 10.105 9.732">
                                                                                            <path data-name="star - Copy"
                                                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                                                transform="translate(0 -0.018)"
                                                                                                fill="currentColor"></path>
                                                                                        </svg>
                                                                                    </span>
                                                                                </li>
                                                                                <li class="reviews__ratting--list">
                                                                                    <span class="reviews__ratting--icon">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            width="14.105" height="12.732"
                                                                                            viewBox="0 0 10.105 9.732">
                                                                                            <path data-name="star - Copy"
                                                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                                                transform="translate(0 -0.018)"
                                                                                                fill="currentColor"></path>
                                                                                        </svg>
                                                                                    </span>
                                                                                </li>
                                                                                <li class="reviews__ratting--list">
                                                                                    <span class="reviews__ratting--icon">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            width="14.105" height="12.732"
                                                                                            viewBox="0 0 10.105 9.732">
                                                                                            <path data-name="star - Copy"
                                                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                                                transform="translate(0 -0.018)"
                                                                                                fill="currentColor"></path>
                                                                                        </svg>
                                                                                    </span>
                                                                                </li>
                                                                                <li class="reviews__ratting--list">
                                                                                    <span class="reviews__ratting--icon">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            width="14.105" height="12.732"
                                                                                            viewBox="0 0 10.105 9.732">
                                                                                            <path data-name="star - Copy"
                                                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                                                transform="translate(0 -0.018)"
                                                                                                fill="currentColor"></path>
                                                                                        </svg>
                                                                                    </span>
                                                                                </li>
                                                                                <li class="reviews__ratting--list">
                                                                                    <span class="reviews__ratting--icon">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            width="14.105" height="12.732"
                                                                                            viewBox="0 0 10.105 9.732">
                                                                                            <path data-name="star - Copy"
                                                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                                                transform="translate(0 -0.018)"
                                                                                                fill="#c7c5c2"></path>
                                                                                        </svg>
                                                                                    </span>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <span class="reviews__comment--content__date">February 13,
                                                                            2022</span>
                                                                    </div>
                                                                    <p class="reviews__comment--content__desc">Lorem ipsum, dolor sit amet
                                                                        consectetur adipisicing elit. Eos ex repellat officiis neque.
                                                                        Veniam, rem nesciunt. Assumenda distinctio, autem error repellat
                                                                        eveniet ratione dolor facilis accusantium amet pariatur, non eius!
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="reviews__comment--list d-flex">
                                                                <div class="reviews__comment--thumb">
                                                                    <img src="assets/img/other/comment-thumb3.png" alt="comment-thumb">
                                                                </div>
                                                                <div class="reviews__comment--content">
                                                                    <div class="reviews__comment--top d-flex justify-content-between">
                                                                        <div class="reviews__comment--top__left">
                                                                            <h3 class="reviews__comment--content__title h4">Richard Smith
                                                                            </h3>
                                                                            <ul class="reviews__ratting d-flex">
                                                                                <li class="reviews__ratting--list">
                                                                                    <span class="reviews__ratting--icon">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            width="14.105" height="12.732"
                                                                                            viewBox="0 0 10.105 9.732">
                                                                                            <path data-name="star - Copy"
                                                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                                                transform="translate(0 -0.018)"
                                                                                                fill="currentColor"></path>
                                                                                        </svg>
                                                                                    </span>
                                                                                </li>
                                                                                <li class="reviews__ratting--list">
                                                                                    <span class="reviews__ratting--icon">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            width="14.105" height="12.732"
                                                                                            viewBox="0 0 10.105 9.732">
                                                                                            <path data-name="star - Copy"
                                                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                                                transform="translate(0 -0.018)"
                                                                                                fill="currentColor"></path>
                                                                                        </svg>
                                                                                    </span>
                                                                                </li>
                                                                                <li class="reviews__ratting--list">
                                                                                    <span class="reviews__ratting--icon">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            width="14.105" height="12.732"
                                                                                            viewBox="0 0 10.105 9.732">
                                                                                            <path data-name="star - Copy"
                                                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                                                transform="translate(0 -0.018)"
                                                                                                fill="currentColor"></path>
                                                                                        </svg>
                                                                                    </span>
                                                                                </li>
                                                                                <li class="reviews__ratting--list">
                                                                                    <span class="reviews__ratting--icon">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            width="14.105" height="12.732"
                                                                                            viewBox="0 0 10.105 9.732">
                                                                                            <path data-name="star - Copy"
                                                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                                                transform="translate(0 -0.018)"
                                                                                                fill="currentColor"></path>
                                                                                        </svg>
                                                                                    </span>
                                                                                </li>
                                                                                <li class="reviews__ratting--list">
                                                                                    <span class="reviews__ratting--icon">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            width="14.105" height="12.732"
                                                                                            viewBox="0 0 10.105 9.732">
                                                                                            <path data-name="star - Copy"
                                                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                                                transform="translate(0 -0.018)"
                                                                                                fill="#c7c5c2"></path>
                                                                                        </svg>
                                                                                    </span>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <span class="reviews__comment--content__date">February 13,
                                                                            2022</span>
                                                                    </div>
                                                                    <p class="reviews__comment--content__desc">Lorem ipsum, dolor sit amet
                                                                        consectetur adipisicing elit. Eos ex repellat officiis neque.
                                                                        Veniam, rem nesciunt. Assumenda distinctio, autem error repellat
                                                                        eveniet ratione dolor facilis accusantium amet pariatur, non eius!
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div id="information" class="tab_pane">
                                                    <div class="product__tab--conten">
                                                        <div class="product__tab--content__step mb-30">
                                                            <h2 class="product__tab--content__title h4 mb-10">Nam provident sequi</h2>
                                                            <p class="product__tab--content__desc">Lorem ipsum dolor sit, amet consectetur
                                                                adipisicing elit. Nam provident sequi, nemo sapiente culpa nostrum rem eum
                                                                perferendis quibusdam, magnam a vitae corporis! Magnam enim modi, illo harum
                                                                suscipit tempore aut dolore doloribus deserunt voluptatum illum, est porro?
                                                                Ducimus dolore accusamus impedit ipsum maiores, ea iusto temporibus numquam
                                                                eaque mollitia fugiat laborum dolor tempora eligendi voluptatem quis
                                                                necessitatibus nam ab?</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="custom" class="tab_pane">
                                                    <div class="product__tab--content">
                                                        <div class="product__tab--content__step mb-30">
                                                            <h2 class="product__tab--content__title h4 mb-10">Nam provident sequi</h2>
                                                            <p class="product__tab--content__desc">Lorem ipsum dolor sit, amet consectetur
                                                                adipisicing elit. Nam provident sequi, nemo sapiente culpa nostrum rem eum
                                                                perferendis quibusdam, magnam a vitae corporis! Magnam enim modi, illo harum
                                                                suscipit tempore aut dolore doloribus deserunt voluptatum illum, est porro?
                                                                Ducimus dolore accusamus impedit ipsum maiores, ea iusto temporibus numquam
                                                                eaque mollitia fugiat laborum dolor tempora eligendi voluptatem quis
                                                                necessitatibus nam ab?</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        {{-- mô tả đã xóa 2 thẻ div --}}
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- End product details tab section -->

                        <!-- Start product section -->
                        <section class="product__section product__section--style3 section--padding">
                            <div class="container product3__section--container">
                                <div class="section__heading3 text-center mb-40">
                                    <h2 class="section__heading3--maintitle">You may also like</h2>
                                </div>
                                <div
                                    class="product__section--inner product3__section--inner__padding product__section--style3__inner product__swiper--activation swiper swiper-initialized swiper-horizontal swiper-pointer-events">
                                    <div class="swiper-wrapper" id="swiper-wrapper-111baa3d810d74d4e" aria-live="polite"
                                        style="transform: translate3d(-1190px, 0px, 0px); transition-duration: 0ms;">
                                        <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next" role="group"
                                            aria-label="2 / 5" style="width: 277.5px; margin-right: 20px;" data-swiper-slide-index="1">
                                            <div class="product__items product__items2">
                                                <div class="product__items--thumbnail">
                                                    <a class="product__items--link" href="product-details.html">
                                                        <img class="product__items--img product__primary--img"
                                                            src="assets/img/product/product2.png" alt="product-img">
                                                        <img class="product__items--img product__secondary--img"
                                                            src="assets/img/product/product1.png" alt="product-img">
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
                                                                        stroke-linejoin="round" stroke-width="32"></path>
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
                                                                        stroke-width="32"></path>
                                                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                        stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448">
                                                                    </path>
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
                                                                        d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256">
                                                                    </path>
                                                                    <path
                                                                        d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="32"></path>
                                                                </svg>
                                                                <span class="visually-hidden">Compare</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product__items--content product__items2--content text-center">
                                                    <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                                    <h3 class="product__items--content__title h4"><a
                                                            href="product-details.html">Red-tomato-isolated</a></h3>
                                                    <div class="product__items--price">
                                                        <span class="current__price">$52.00</span>
                                                        <span class="old__price">$62.00</span>
                                                    </div>
                                                    <div class="product__items--rating d-flex justify-content-center align-items-center">
                                                        <ul class="d-flex">
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="#c7c5c2"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                        <span class="product__items--rating__count--number">(24)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-duplicate" role="group" aria-label="3 / 5"
                                            data-swiper-slide-index="2" style="width: 277.5px; margin-right: 20px;">
                                            <div class="product__items product__items2">
                                                <div class="product__items--thumbnail">
                                                    <a class="product__items--link" href="product-details.html">
                                                        <img class="product__items--img product__primary--img"
                                                            src="assets/img/product/product1.png" alt="product-img">
                                                        <img class="product__items--img product__secondary--img"
                                                            src="assets/img/product/product2.png" alt="product-img">
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
                                                                        stroke-linejoin="round" stroke-width="32"></path>
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
                                                                        stroke-width="32"></path>
                                                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                        stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448">
                                                                    </path>
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
                                                                        d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256">
                                                                    </path>
                                                                    <path
                                                                        d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="32"></path>
                                                                </svg>
                                                                <span class="visually-hidden">Compare</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product__items--content product__items2--content text-center">
                                                    <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                                    <h3 class="product__items--content__title h4"><a
                                                            href="product-details.html">Vegetable-healthy</a></h3>
                                                    <div class="product__items--price">
                                                        <span class="current__price">$39.00</span>
                                                        <span class="old__price">$59.00</span>
                                                    </div>
                                                    <div class="product__items--rating d-flex justify-content-center align-items-center">
                                                        <ul class="d-flex">
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="#c7c5c2"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                        <span class="product__items--rating__count--number">(24)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-duplicate" role="group" aria-label="4 / 5"
                                            style="width: 277.5px; margin-right: 20px;" data-swiper-slide-index="3">
                                            <div class="product__items product__items2">
                                                <div class="product__items--thumbnail">
                                                    <a class="product__items--link" href="product-details.html">
                                                        <img class="product__items--img product__primary--img"
                                                            src="assets/img/product/product3.png" alt="product-img">
                                                        <img class="product__items--img product__secondary--img"
                                                            src="assets/img/product/product4.png" alt="product-img">
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
                                                                        stroke-linejoin="round" stroke-width="32"></path>
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
                                                                        stroke-width="32"></path>
                                                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                        stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448">
                                                                    </path>
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
                                                                        d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256">
                                                                    </path>
                                                                    <path
                                                                        d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="32"></path>
                                                                </svg>
                                                                <span class="visually-hidden">Compare</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product__items--content product__items2--content text-center">
                                                    <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                                    <h3 class="product__items--content__title h4"><a
                                                            href="product-details.html">Fresh-whole-fish</a></h3>
                                                    <div class="product__items--price">
                                                        <span class="current__price">$42.00</span>
                                                        <span class="old__price">$48.00</span>
                                                    </div>
                                                    <div class="product__items--rating d-flex justify-content-center align-items-center">
                                                        <ul class="d-flex">
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="#c7c5c2"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                        <span class="product__items--rating__count--number">(24)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-duplicate swiper-slide-prev" role="group" aria-label="5 / 5"
                                            style="width: 277.5px; margin-right: 20px;" data-swiper-slide-index="4">
                                            <div class="product__items product__items2">
                                                <div class="product__items--thumbnail">
                                                    <a class="product__items--link" href="product-details.html">
                                                        <img class="product__items--img product__primary--img"
                                                            src="assets/img/product/product5.png" alt="product-img">
                                                        <img class="product__items--img product__secondary--img"
                                                            src="assets/img/product/product6.png" alt="product-img">
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
                                                                        stroke-linejoin="round" stroke-width="32"></path>
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
                                                                        stroke-width="32"></path>
                                                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                        stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448">
                                                                    </path>
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
                                                                        d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256">
                                                                    </path>
                                                                    <path
                                                                        d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="32"></path>
                                                                </svg>
                                                                <span class="visually-hidden">Compare</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product__items--content product__items2--content text-center">
                                                    <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                                    <h3 class="product__items--content__title h4"><a
                                                            href="product-details.html">Chili-pepper</a></h3>
                                                    <div class="product__items--price">
                                                        <span class="current__price">$38.00</span>
                                                        <span class="old__price">$44.00</span>
                                                    </div>
                                                    <div class="product__items--rating d-flex justify-content-center align-items-center">
                                                        <ul class="d-flex">
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="#c7c5c2"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                        <span class="product__items--rating__count--number">(24)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 5"
                                            style="width: 277.5px; margin-right: 20px;" data-swiper-slide-index="0">
                                            <div class="product__items product__items2">
                                                <div class="product__items--thumbnail">
                                                    <a class="product__items--link" href="product-details.html">
                                                        <img class="product__items--img product__primary--img"
                                                            src="assets/img/product/product7.png" alt="product-img">
                                                        <img class="product__items--img product__secondary--img"
                                                            src="assets/img/product/product8.png" alt="product-img">
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
                                                                        stroke-linejoin="round" stroke-width="32"></path>
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
                                                                        stroke-width="32"></path>
                                                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                        stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448">
                                                                    </path>
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
                                                                        d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256">
                                                                    </path>
                                                                    <path
                                                                        d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="32"></path>
                                                                </svg>
                                                                <span class="visually-hidden">Compare</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product__items--content product__items2--content text-center">
                                                    <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                                    <h3 class="product__items--content__title h4"><a
                                                            href="product-details.html">Green-surface</a></h3>
                                                    <div class="product__items--price">
                                                        <span class="current__price">$38.00</span>
                                                        <span class="old__price">$40.00</span>
                                                    </div>
                                                    <div class="product__items--rating d-flex justify-content-center align-items-center">
                                                        <ul class="d-flex">
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="#c7c5c2"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                        <span class="product__items--rating__count--number">(24)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 5"
                                            style="width: 277.5px; margin-right: 20px;" data-swiper-slide-index="1">
                                            <div class="product__items product__items2">
                                                <div class="product__items--thumbnail">
                                                    <a class="product__items--link" href="product-details.html">
                                                        <img class="product__items--img product__primary--img"
                                                            src="assets/img/product/product2.png" alt="product-img">
                                                        <img class="product__items--img product__secondary--img"
                                                            src="assets/img/product/product1.png" alt="product-img">
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
                                                                        stroke-linejoin="round" stroke-width="32"></path>
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
                                                                        stroke-width="32"></path>
                                                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                        stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448">
                                                                    </path>
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
                                                                        d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256">
                                                                    </path>
                                                                    <path
                                                                        d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="32"></path>
                                                                </svg>
                                                                <span class="visually-hidden">Compare</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product__items--content product__items2--content text-center">
                                                    <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                                    <h3 class="product__items--content__title h4"><a
                                                            href="product-details.html">Red-tomato-isolated</a></h3>
                                                    <div class="product__items--price">
                                                        <span class="current__price">$52.00</span>
                                                        <span class="old__price">$62.00</span>
                                                    </div>
                                                    <div class="product__items--rating d-flex justify-content-center align-items-center">
                                                        <ul class="d-flex">
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="#c7c5c2"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                        <span class="product__items--rating__count--number">(24)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-label="3 / 5" data-swiper-slide-index="2"
                                            style="width: 277.5px; margin-right: 20px;">
                                            <div class="product__items product__items2">
                                                <div class="product__items--thumbnail">
                                                    <a class="product__items--link" href="product-details.html">
                                                        <img class="product__items--img product__primary--img"
                                                            src="assets/img/product/product1.png" alt="product-img">
                                                        <img class="product__items--img product__secondary--img"
                                                            src="assets/img/product/product2.png" alt="product-img">
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
                                                                        stroke-linejoin="round" stroke-width="32"></path>
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
                                                                        stroke-width="32"></path>
                                                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                        stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448">
                                                                    </path>
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
                                                                        d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256">
                                                                    </path>
                                                                    <path
                                                                        d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="32"></path>
                                                                </svg>
                                                                <span class="visually-hidden">Compare</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product__items--content product__items2--content text-center">
                                                    <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                                    <h3 class="product__items--content__title h4"><a
                                                            href="product-details.html">Vegetable-healthy</a></h3>
                                                    <div class="product__items--price">
                                                        <span class="current__price">$39.00</span>
                                                        <span class="old__price">$59.00</span>
                                                    </div>
                                                    <div class="product__items--rating d-flex justify-content-center align-items-center">
                                                        <ul class="d-flex">
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="#c7c5c2"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                        <span class="product__items--rating__count--number">(24)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-label="4 / 5"
                                            style="width: 277.5px; margin-right: 20px;" data-swiper-slide-index="3">
                                            <div class="product__items product__items2">
                                                <div class="product__items--thumbnail">
                                                    <a class="product__items--link" href="product-details.html">
                                                        <img class="product__items--img product__primary--img"
                                                            src="assets/img/product/product3.png" alt="product-img">
                                                        <img class="product__items--img product__secondary--img"
                                                            src="assets/img/product/product4.png" alt="product-img">
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
                                                                        stroke-linejoin="round" stroke-width="32"></path>
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
                                                                        stroke-width="32"></path>
                                                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                        stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448">
                                                                    </path>
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
                                                                        d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256">
                                                                    </path>
                                                                    <path
                                                                        d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="32"></path>
                                                                </svg>
                                                                <span class="visually-hidden">Compare</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product__items--content product__items2--content text-center">
                                                    <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                                    <h3 class="product__items--content__title h4"><a
                                                            href="product-details.html">Fresh-whole-fish</a></h3>
                                                    <div class="product__items--price">
                                                        <span class="current__price">$42.00</span>
                                                        <span class="old__price">$48.00</span>
                                                    </div>
                                                    <div class="product__items--rating d-flex justify-content-center align-items-center">
                                                        <ul class="d-flex">
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="#c7c5c2"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                        <span class="product__items--rating__count--number">(24)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-duplicate-prev" role="group" aria-label="5 / 5"
                                            style="width: 277.5px; margin-right: 20px;" data-swiper-slide-index="4">
                                            <div class="product__items product__items2">
                                                <div class="product__items--thumbnail">
                                                    <a class="product__items--link" href="product-details.html">
                                                        <img class="product__items--img product__primary--img"
                                                            src="assets/img/product/product5.png" alt="product-img">
                                                        <img class="product__items--img product__secondary--img"
                                                            src="assets/img/product/product6.png" alt="product-img">
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
                                                                        stroke-linejoin="round" stroke-width="32"></path>
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
                                                                        stroke-width="32"></path>
                                                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                        stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448">
                                                                    </path>
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
                                                                        d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256">
                                                                    </path>
                                                                    <path
                                                                        d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="32"></path>
                                                                </svg>
                                                                <span class="visually-hidden">Compare</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product__items--content product__items2--content text-center">
                                                    <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                                    <h3 class="product__items--content__title h4"><a
                                                            href="product-details.html">Chili-pepper</a></h3>
                                                    <div class="product__items--price">
                                                        <span class="current__price">$38.00</span>
                                                        <span class="old__price">$44.00</span>
                                                    </div>
                                                    <div class="product__items--rating d-flex justify-content-center align-items-center">
                                                        <ul class="d-flex">
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="#c7c5c2"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                        <span class="product__items--rating__count--number">(24)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" role="group"
                                            aria-label="1 / 5" style="width: 277.5px; margin-right: 20px;" data-swiper-slide-index="0">
                                            <div class="product__items product__items2">
                                                <div class="product__items--thumbnail">
                                                    <a class="product__items--link" href="product-details.html">
                                                        <img class="product__items--img product__primary--img"
                                                            src="assets/img/product/product7.png" alt="product-img">
                                                        <img class="product__items--img product__secondary--img"
                                                            src="assets/img/product/product8.png" alt="product-img">
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
                                                                        stroke-linejoin="round" stroke-width="32"></path>
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
                                                                        stroke-width="32"></path>
                                                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                        stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448">
                                                                    </path>
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
                                                                        d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256">
                                                                    </path>
                                                                    <path
                                                                        d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="32"></path>
                                                                </svg>
                                                                <span class="visually-hidden">Compare</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product__items--content product__items2--content text-center">
                                                    <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                                    <h3 class="product__items--content__title h4"><a
                                                            href="product-details.html">Green-surface</a></h3>
                                                    <div class="product__items--price">
                                                        <span class="current__price">$38.00</span>
                                                        <span class="old__price">$40.00</span>
                                                    </div>
                                                    <div class="product__items--rating d-flex justify-content-center align-items-center">
                                                        <ul class="d-flex">
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="#c7c5c2"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                        <span class="product__items--rating__count--number">(24)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next" role="group"
                                            aria-label="2 / 5" style="width: 277.5px; margin-right: 20px;" data-swiper-slide-index="1">
                                            <div class="product__items product__items2">
                                                <div class="product__items--thumbnail">
                                                    <a class="product__items--link" href="product-details.html">
                                                        <img class="product__items--img product__primary--img"
                                                            src="assets/img/product/product2.png" alt="product-img">
                                                        <img class="product__items--img product__secondary--img"
                                                            src="assets/img/product/product1.png" alt="product-img">
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
                                                                        stroke-linejoin="round" stroke-width="32"></path>
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
                                                                        stroke-width="32"></path>
                                                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                        stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448">
                                                                    </path>
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
                                                                        d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256">
                                                                    </path>
                                                                    <path
                                                                        d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="32"></path>
                                                                </svg>
                                                                <span class="visually-hidden">Compare</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product__items--content product__items2--content text-center">
                                                    <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                                    <h3 class="product__items--content__title h4"><a
                                                            href="product-details.html">Red-tomato-isolated</a></h3>
                                                    <div class="product__items--price">
                                                        <span class="current__price">$52.00</span>
                                                        <span class="old__price">$62.00</span>
                                                    </div>
                                                    <div class="product__items--rating d-flex justify-content-center align-items-center">
                                                        <ul class="d-flex">
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="#c7c5c2"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                        <span class="product__items--rating__count--number">(24)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-duplicate" role="group" aria-label="3 / 5"
                                            data-swiper-slide-index="2" style="width: 277.5px; margin-right: 20px;">
                                            <div class="product__items product__items2">
                                                <div class="product__items--thumbnail">
                                                    <a class="product__items--link" href="product-details.html">
                                                        <img class="product__items--img product__primary--img"
                                                            src="assets/img/product/product1.png" alt="product-img">
                                                        <img class="product__items--img product__secondary--img"
                                                            src="assets/img/product/product2.png" alt="product-img">
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
                                                                        stroke-linejoin="round" stroke-width="32"></path>
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
                                                                        stroke-width="32"></path>
                                                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                        stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448">
                                                                    </path>
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
                                                                        d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256">
                                                                    </path>
                                                                    <path
                                                                        d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="32"></path>
                                                                </svg>
                                                                <span class="visually-hidden">Compare</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product__items--content product__items2--content text-center">
                                                    <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                                    <h3 class="product__items--content__title h4"><a
                                                            href="product-details.html">Vegetable-healthy</a></h3>
                                                    <div class="product__items--price">
                                                        <span class="current__price">$39.00</span>
                                                        <span class="old__price">$59.00</span>
                                                    </div>
                                                    <div class="product__items--rating d-flex justify-content-center align-items-center">
                                                        <ul class="d-flex">
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="#c7c5c2"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                        <span class="product__items--rating__count--number">(24)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-duplicate" role="group" aria-label="4 / 5"
                                            style="width: 277.5px; margin-right: 20px;" data-swiper-slide-index="3">
                                            <div class="product__items product__items2">
                                                <div class="product__items--thumbnail">
                                                    <a class="product__items--link" href="product-details.html">
                                                        <img class="product__items--img product__primary--img"
                                                            src="assets/img/product/product3.png" alt="product-img">
                                                        <img class="product__items--img product__secondary--img"
                                                            src="assets/img/product/product4.png" alt="product-img">
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
                                                                        stroke-linejoin="round" stroke-width="32"></path>
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
                                                                        stroke-width="32"></path>
                                                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                                        stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448">
                                                                    </path>
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
                                                                        d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256">
                                                                    </path>
                                                                    <path
                                                                        d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="32"></path>
                                                                </svg>
                                                                <span class="visually-hidden">Compare</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product__items--content product__items2--content text-center">
                                                    <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                                    <h3 class="product__items--content__title h4"><a
                                                            href="product-details.html">Fresh-whole-fish</a></h3>
                                                    <div class="product__items--price">
                                                        <span class="current__price">$42.00</span>
                                                        <span class="old__price">$48.00</span>
                                                    </div>
                                                    <div class="product__items--rating d-flex justify-content-center align-items-center">
                                                        <ul class="d-flex">
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="product__items--rating__list">
                                                                <span class="product__items--rating__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                            transform="translate(0 -0.018)" fill="#c7c5c2"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                        <span class="product__items--rating__count--number">(24)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper__nav--btn swiper-button-next" tabindex="0" role="button" aria-label="Next slide"
                                        aria-controls="swiper-wrapper-111baa3d810d74d4e"></div>
                                    <div class="swiper__nav--btn swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"
                                        aria-controls="swiper-wrapper-111baa3d810d74d4e"></div>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                </div>
                            </div>
                        </section>
                        <!-- End product section -->

                        <!-- Start shipping section -->

                        <!-- End shipping section -->
                    </main>
@endsection
@section('js')
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        function showMap(lat, lng, address, index) {
            const mapId = `map-${index}`;
            const mapDiv = document.getElementById(mapId);
            mapDiv.style.display = 'block'; // Hiển thị bản đồ

            // Tạo map OpenStreetMap
            const map = L.map(mapId).setView([lat, lng], 16);

            // Thêm layer OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // Thêm marker tại vị trí latitude và longitude
            L.marker([lat, lng]).addTo(map)
                .bindPopup(`<b>${address}</b>`)
                .openPopup();
        }
    </script>

@endsection

