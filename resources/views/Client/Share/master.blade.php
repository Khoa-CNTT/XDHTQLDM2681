<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Call Food</title>
    <meta name="description" content="Morden Bootstrap HTML5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/icon/z6443881384501_a4968d4d4a8fb548eca0294aef2d6ad8.jpg">
    <meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Thêm CSS cho toastr -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<!-- Thêm JS cho toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Phần render Toastr (nếu bạn sử dụng) -->


    <!-- ======= All CSS Plugins here ======== -->
    @include('Client.Share.css')

</head>

<body>
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
    @include('Client.Share.chatbox')


    <!-- Start preloader -->

    <!-- End preloader -->

    <!-- Start header area -->
    <!-- End header area -->
    @include('Client.Share.header')
    <main class="main__content_wrapper">
      @yield('content')
    </main>

    <!-- Start footer section -->
    @include('Client.Share.footer')
    <!-- End footer section -->

    <!-- Quickview Wrapper -->
    <div class="modal" id="modal1" data-animation="slideInUp">
        <div class="modal-dialog quickview__main--wrapper">
            <header class="modal-header quickview__header">
                <button class="close-modal quickview__close--btn" aria-label="close modal" data-close>✕ </button>
            </header>
            <div class="quickview__inner">
                <div class="row row-cols-lg-2 row-cols-md-2">
                    <div class="col">
                        <div class="quickview__gallery">
                            <div class="product__media--preview  swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox"
                                                data-gallery="product-media-preview"
                                                href="/assets/img/product/big-product1.jpg"><img
                                                    class="product__media--preview__items--img"
                                                    src="/assets/img/product/big-product1.jpg"
                                                    alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox"
                                                    href="/assets/img/product/big-product1.jpg"
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
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox"
                                                data-gallery="product-media-preview"
                                                href="/assets/img/product/big-product2.jpg"><img
                                                    class="product__media--preview__items--img"
                                                    src="/assets/img/product/big-product2.jpg"
                                                    alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox"
                                                    href="/assets/img/product/big-product2.jpg"
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
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox"
                                                data-gallery="product-media-preview"
                                                href="/assets/img/product/big-product3.jpg"><img
                                                    class="product__media--preview__items--img"
                                                    src="/assets/img/product/big-product3.jpg"
                                                    alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox"
                                                    href="/assets/img/product/big-product3.jpg"
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
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox"
                                                data-gallery="product-media-preview"
                                                href="/assets/img/product/big-product4.jpg"><img
                                                    class="product__media--preview__items--img"
                                                    src="/assets/img/product/big-product4.jpg"
                                                    alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox"
                                                    href="/assets/img/product/big-product4.jpg"
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
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox"
                                                data-gallery="product-media-preview"
                                                href="/assets/img/product/big-product5.jpg"><img
                                                    class="product__media--preview__items--img"
                                                    src="/assets/img/product/big-product5.jpg"
                                                    alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox"
                                                    href="/assets/img/product/big-product5.jpg"
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
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox"
                                                data-gallery="product-media-preview"
                                                href="/assets/img/product/big-product6.jpg"><img
                                                    class="product__media--preview__items--img"
                                                    src="/assets/img/product/big-product6.jpg"
                                                    alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox"
                                                    href="/assets/img/product/big-product6.jpg"
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
                            </div>
                            <div class="product__media--nav swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img"
                                                src="/assets/img/product/small-product6.png" alt="product-nav-img">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img"
                                                src="/assets/img/product/small-product1.png" alt="product-nav-img">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img"
                                                src="/assets/img/product/small-product2.png" alt="product-nav-img">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img"
                                                src="/assets/img/product/small-product4.png" alt="product-nav-img">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img"
                                                src="/assets/img/product/small-product5.png" alt="product-nav-img">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img"
                                                src="/assets/img/product/small-product3.png" alt="product-nav-img">
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper__nav--btn swiper-button-next"></div>
                                <div class="swiper__nav--btn swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="quickview__info">
                            <form action="#">
                                <h2 class="product__details--info__title mb-15">Red-tomato-isolated</h2>
                                <div class="product__details--info__price mb-12">
                                    <span class="current__price">$58.00</span>
                                    <span class="old__price">$68.00</span>
                                </div>
                                <div class="product__items--rating d-flex align-items-center mb-12">
                                    <ul class="d-flex">
                                        <li class="product__items--rating__list">
                                            <span class="product__items--rating__icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16.105" height="14.732"
                                                    viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="product__items--rating__list">
                                            <span class="product__items--rating__icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16.105" height="14.732"
                                                    viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="product__items--rating__list">
                                            <span class="product__items--rating__icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16.105" height="14.732"
                                                    viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="product__items--rating__list">
                                            <span class="product__items--rating__icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16.105" height="14.732"
                                                    viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="product__items--rating__list">
                                            <span class="product__items--rating__icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16.105" height="14.732"
                                                    viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="#c7c5c2" />
                                                </svg>
                                            </span>
                                        </li>
                                    </ul>
                                    <span class="product__items--rating__count--number">(24)</span>
                                </div>
                                <p class="product__details--info__desc mb-10">Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit is. Deserunt totam dolores ea numquam labore! Illum magnam totam
                                    tenetur fuga quo dolor.</p>
                                <div class="product__variant">
                                    <div class="product__variant--list mb-10">
                                        <fieldset class="variant__input--fieldset">
                                            <legend class="product__variant--title mb-8">Color :</legend>
                                            <div class="variant__color d-flex">
                                                <div class="variant__color--list">
                                                    <input id="color-red1" name="color" type="radio" checked>
                                                    <label class="variant__color--value red" for="color-red1"
                                                        title="Red"><img class="variant__color--value__img"
                                                            src="/assets/img/product/product1.png"
                                                            alt="variant-color-img"></label>
                                                </div>
                                                <div class="variant__color--list">
                                                    <input id="color-red2" name="color" type="radio">
                                                    <label class="variant__color--value red" for="color-red2"
                                                        title="Black"><img class="variant__color--value__img"
                                                            src="/assets/img/product/product2.png"
                                                            alt="variant-color-img"></label>
                                                </div>
                                                <div class="variant__color--list">
                                                    <input id="color-red3" name="color" type="radio">
                                                    <label class="variant__color--value red" for="color-red3"
                                                        title="Pink"><img class="variant__color--value__img"
                                                            src="/assets/img/product/product3.png"
                                                            alt="variant-color-img"></label>
                                                </div>
                                                <div class="variant__color--list">
                                                    <input id="color-red4" name="color" type="radio">
                                                    <label class="variant__color--value red" for="color-red4"
                                                        title="Orange"><img class="variant__color--value__img"
                                                            src="/assets/img/product/product4.png"
                                                            alt="variant-color-img"></label>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="product__variant--list mb-15">
                                        <fieldset class="variant__input--fieldset">
                                            <legend class="product__variant--title mb-8">Weight :</legend>
                                            <ul class="variant__size d-flex">
                                                <li class="variant__size--list">
                                                    <input id="weight1" name="weight" type="radio" checked>
                                                    <label class="variant__size--value red" for="weight1">5 kg</label>
                                                </li>
                                                <li class="variant__size--list">
                                                    <input id="weight2" name="weight" type="radio">
                                                    <label class="variant__size--value red" for="weight2">3 kg</label>
                                                </li>
                                                <li class="variant__size--list">
                                                    <input id="weight3" name="weight" type="radio">
                                                    <label class="variant__size--value red" for="weight3">2 kg</label>
                                                </li>
                                            </ul>
                                        </fieldset>
                                    </div>
                                    <div class="quickview__variant--list quantity d-flex align-items-center mb-10">
                                        <div class="quantity__box">
                                            <button type="button"
                                                class="quantity__value quickview__value--quantity decrease"
                                                aria-label="quantity value" value="Decrease Value">-</button>
                                            <label>
                                                <input type="number" class="quantity__number quickview__value--number"
                                                    value="1" data-counter />
                                            </label>
                                            <button type="button"
                                                class="quantity__value quickview__value--quantity increase"
                                                aria-label="quantity value" value="Increase Value">+</button>
                                        </div>
                                        <button class="btn quickview__cart--btn" type="submit">Add To Cart</button>
                                    </div>
                                    <div class="quickview__variant--list variant__wishlist mb-10">
                                        <a class="variant__wishlist--icon" href="wishlist.html" title="Add to wishlist">
                                            <svg class="quickview__variant--wishlist__svg"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <path
                                                    d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                    fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="32" />
                                            </svg>
                                            Add to Wishlist
                                        </a>
                                    </div>
                                </div>
                                <div class="quickview__social d-flex align-items-center">
                                    <label class="quickview__social--title">Social Share:</label>
                                    <ul class="quickview__social--wrapper mt-0 d-flex">
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank"
                                                href="https://www.facebook.com">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="7.667" height="16.524"
                                                    viewBox="0 0 7.667 16.524">
                                                    <path data-name="Path 237"
                                                        d="M967.495,353.678h-2.3v8.253h-3.437v-8.253H960.13V350.77h1.624v-1.888a4.087,4.087,0,0,1,.264-1.492,2.9,2.9,0,0,1,1.039-1.379,3.626,3.626,0,0,1,2.153-.6l2.549.019v2.833h-1.851a.732.732,0,0,0-.472.151.8.8,0,0,0-.246.642v1.719H967.8Z"
                                                        transform="translate(-960.13 -345.407)" fill="currentColor" />
                                                </svg>
                                                <span class="visually-hidden">Facebook</span>
                                            </a>
                                        </li>
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank"
                                                href="https://twitter.com">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16.489" height="13.384"
                                                    viewBox="0 0 16.489 13.384">
                                                    <path data-name="Path 303"
                                                        d="M966.025,1144.2v.433a9.783,9.783,0,0,1-.621,3.388,10.1,10.1,0,0,1-1.845,3.087,9.153,9.153,0,0,1-3.012,2.259,9.825,9.825,0,0,1-4.122.866,9.632,9.632,0,0,1-2.748-.4,9.346,9.346,0,0,1-2.447-1.11q.4.038.809.038a6.723,6.723,0,0,0,2.24-.376,7.022,7.022,0,0,0,1.958-1.054,3.379,3.379,0,0,1-1.958-.687,3.259,3.259,0,0,1-1.186-1.666,3.364,3.364,0,0,0,.621.056,3.488,3.488,0,0,0,.885-.113,3.267,3.267,0,0,1-1.374-.631,3.356,3.356,0,0,1-.969-1.186,3.524,3.524,0,0,1-.367-1.5v-.057a3.172,3.172,0,0,0,1.544.433,3.407,3.407,0,0,1-1.1-1.214,3.308,3.308,0,0,1-.4-1.609,3.362,3.362,0,0,1,.452-1.694,9.652,9.652,0,0,0,6.964,3.538,3.911,3.911,0,0,1-.075-.772,3.293,3.293,0,0,1,.452-1.694,3.409,3.409,0,0,1,1.233-1.233,3.257,3.257,0,0,1,1.685-.461,3.351,3.351,0,0,1,2.466,1.073,6.572,6.572,0,0,0,2.146-.828,3.272,3.272,0,0,1-.574,1.083,3.477,3.477,0,0,1-.913.8,6.869,6.869,0,0,0,1.958-.546A7.074,7.074,0,0,1,966.025,1144.2Z"
                                                        transform="translate(-951.23 -1140.849)" fill="currentColor" />
                                                </svg>
                                                <span class="visually-hidden">Twitter</span>
                                            </a>
                                        </li>
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank"
                                                href="https://www.instagram.com">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="17.497" height="17.492"
                                                    viewBox="0 0 19.497 19.492">
                                                    <path data-name="Icon awesome-instagram"
                                                        d="M9.747,6.24a5,5,0,1,0,5,5A4.99,4.99,0,0,0,9.747,6.24Zm0,8.247A3.249,3.249,0,1,1,13,11.238a3.255,3.255,0,0,1-3.249,3.249Zm6.368-8.451A1.166,1.166,0,1,1,14.949,4.87,1.163,1.163,0,0,1,16.115,6.036Zm3.31,1.183A5.769,5.769,0,0,0,17.85,3.135,5.807,5.807,0,0,0,13.766,1.56c-1.609-.091-6.433-.091-8.042,0A5.8,5.8,0,0,0,1.64,3.13,5.788,5.788,0,0,0,.065,7.215c-.091,1.609-.091,6.433,0,8.042A5.769,5.769,0,0,0,1.64,19.341a5.814,5.814,0,0,0,4.084,1.575c1.609.091,6.433.091,8.042,0a5.769,5.769,0,0,0,4.084-1.575,5.807,5.807,0,0,0,1.575-4.084c.091-1.609.091-6.429,0-8.038Zm-2.079,9.765a3.289,3.289,0,0,1-1.853,1.853c-1.283.509-4.328.391-5.746.391S5.28,19.341,4,18.837a3.289,3.289,0,0,1-1.853-1.853c-.509-1.283-.391-4.328-.391-5.746s-.113-4.467.391-5.746A3.289,3.289,0,0,1,4,3.639c1.283-.509,4.328-.391,5.746-.391s4.467-.113,5.746.391a3.289,3.289,0,0,1,1.853,1.853c.509,1.283.391,4.328.391,5.746S17.855,15.705,17.346,16.984Z"
                                                        transform="translate(0.004 -1.492)" fill="currentColor"></path>
                                                </svg>
                                                <span class="visually-hidden">Instagram</span>
                                            </a>
                                        </li>
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank"
                                                href="https://www.youtube.com">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16.49" height="11.582"
                                                    viewBox="0 0 16.49 11.582">
                                                    <path data-name="Path 321"
                                                        d="M967.759,1365.592q0,1.377-.019,1.717-.076,1.114-.151,1.622a3.981,3.981,0,0,1-.245.925,1.847,1.847,0,0,1-.453.717,2.171,2.171,0,0,1-1.151.6q-3.585.265-7.641.189-2.377-.038-3.387-.085a11.337,11.337,0,0,1-1.5-.142,2.206,2.206,0,0,1-1.113-.585,2.562,2.562,0,0,1-.528-1.037,3.523,3.523,0,0,1-.141-.585c-.032-.2-.06-.5-.085-.906a38.894,38.894,0,0,1,0-4.867l.113-.925a4.382,4.382,0,0,1,.208-.906,2.069,2.069,0,0,1,.491-.755,2.409,2.409,0,0,1,1.113-.566,19.2,19.2,0,0,1,2.292-.151q1.82-.056,3.953-.056t3.952.066q1.821.067,2.311.142a2.3,2.3,0,0,1,.726.283,1.865,1.865,0,0,1,.557.49,3.425,3.425,0,0,1,.434,1.019,5.72,5.72,0,0,1,.189,1.075q0,.095.057,1C967.752,1364.1,967.759,1364.677,967.759,1365.592Zm-7.6.925q1.49-.754,2.113-1.094l-4.434-2.339v4.66Q958.609,1367.311,960.156,1366.517Z"
                                                        transform="translate(-951.269 -1359.8)" fill="currentColor" />
                                                </svg>
                                                <span class="visually-hidden">Youtube</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quickview Wrapper End -->

    <!-- Start News letter popup -->
    {{-- <div class="newsletter__popup" data-animation="slideInUp">
        <div id="boxes" class="newsletter__popup--inner">
            <button class="newsletter__popup--close__btn" aria-label="search close button">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 512 512">
                    <path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="32" d="M368 368L144 144M368 144L144 368"></path>
                </svg>
            </button>
            <div class="box newsletter__popup--box d-flex align-items-center">
                <div class="newsletter__popup--thumbnail">
                    <img class="newsletter__popup--thumbnail__img display-block"
                        src="/assets/img/banner/newsletter-popup-thumb.png" alt="newsletter-popup-thumb">
                </div>
                <div class="newsletter__popup--box__right">
                    <h2 class="newsletter__popup--title">Join Our Newsletter</h2>
                    <div class="newsletter__popup--content">
                        <label class="newsletter__popup--content--desc">Enter your email address to subscribe our
                            notification of our new post &amp; features by email.</label>
                        <div class="newsletter__popup--subscribe" id="frm_subscribe">
                            <form class="newsletter__popup--subscribe__form">
                                <input class="newsletter__popup--subscribe__input" type="text"
                                    placeholder="Enter you email address here...">
                                <button class="newsletter__popup--subscribe__btn">Subscribe</button>
                            </form>
                            <div class="newsletter__popup--footer">
                                <input type="checkbox" id="newsletter__dont--show">
                                <label class="newsletter__popup--dontshow__again--text"
                                    for="newsletter__dont--show">Don't show this popup again</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End News letter popup -->

    <!-- Scroll top bar -->
    <button id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48"
                d="M112 244l144-144 144 144M256 120v292" />
        </svg></button>

    <!-- All Script JS Plugins here  -->
    @include('Client.Share.js')
    @yield('js')

</body>

</html>
