@extends('Client.Share.master')
@section('content')
<main class="main__content_wrapper">

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title text-white mb-25">Shopping Cart</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items"><a class="text-white"
                                    href="index.html">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">Shopping Cart</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- cart section start -->
    <section class="cart__section section--padding">
        <div class="container-fluid">
            <div class="cart__section--inner">
                <form action="#">
                    <h2 class="cart__title mb-40">Shopping Cart</h2>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="cart__table">
                                <table class="cart__table--inner">
                                    <thead class="cart__table--header">
                                        <tr class="cart__table--header__items">
                                            <th class="cart__table--header__list">Product</th>
                                            <th class="cart__table--header__list">Price</th>
                                            <th class="cart__table--header__list">Quantity</th>
                                            <th class="cart__table--header__list">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody class="cart__table--body">
                                        <tr class="cart__table--body__items">
                                            <td class="cart__table--body__list">
                                                <div class="cart__product d-flex align-items-center">
                                                    <button class="cart__remove--btn" aria-label="search button"
                                                        type="button">
                                                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24" width="16px" height="16px">
                                                            <path
                                                                d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                    <div class="cart__thumbnail">
                                                        <a href="product-details.html"><img class="border-radius-5"
                                                                src="assets/img/product/product1.png"
                                                                alt="cart-product"></a>
                                                    </div>
                                                    <div class="cart__content">
                                                        <h3 class="cart__content--title h4"><a
                                                                href="product-details.html">Fresh-whole-fish</a></h3>
                                                        <span class="cart__content--variant">COLOR: Blue</span>
                                                        <span class="cart__content--variant">WEIGHT: 2 Kg</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <span class="cart__price">£65.00</span>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <div class="quantity__box">
                                                    <button type="button"
                                                        class="quantity__value quickview__value--quantity decrease"
                                                        aria-label="quantity value" value="Decrease Value">-</button>
                                                    <label>
                                                        <input type="number"
                                                            class="quantity__number quickview__value--number" value="1"
                                                            data-counter="">
                                                    </label>
                                                    <button type="button"
                                                        class="quantity__value quickview__value--quantity increase"
                                                        aria-label="quantity value" value="Increase Value">+</button>
                                                </div>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <span class="cart__price end">£130.00</span>
                                            </td>
                                        </tr>
                                        <tr class="cart__table--body__items">
                                            <td class="cart__table--body__list">
                                                <div class="cart__product d-flex align-items-center">
                                                    <button class="cart__remove--btn" aria-label="search button"
                                                        type="button">
                                                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24" width="16px" height="16px">
                                                            <path
                                                                d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                    <div class="cart__thumbnail">
                                                        <a href="product-details.html"><img class="border-radius-5"
                                                                src="assets/img/product/product2.png"
                                                                alt="cart-product"></a>
                                                    </div>
                                                    <div class="cart__content">
                                                        <h3 class="cart__content--title h4"><a
                                                                href="product-details.html">Vegetable-healthy</a></h3>
                                                        <span class="cart__content--variant">COLOR: Blue</span>
                                                        <span class="cart__content--variant">WEIGHT: 2 Kg</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <span class="cart__price">£65.00</span>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <div class="quantity__box">
                                                    <button type="button"
                                                        class="quantity__value quickview__value--quantity decrease"
                                                        aria-label="quantity value" value="Decrease Value">-</button>
                                                    <label>
                                                        <input type="number"
                                                            class="quantity__number quickview__value--number" value="1"
                                                            data-counter="">
                                                    </label>
                                                    <button type="button"
                                                        class="quantity__value quickview__value--quantity increase"
                                                        aria-label="quantity value" value="Increase Value">+</button>
                                                </div>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <span class="cart__price end">£130.00</span>
                                            </td>
                                        </tr>
                                        <tr class="cart__table--body__items">
                                            <td class="cart__table--body__list">
                                                <div class="cart__product d-flex align-items-center">
                                                    <button class="cart__remove--btn" aria-label="search button"
                                                        type="button">
                                                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24" width="16px" height="16px">
                                                            <path
                                                                d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                    <div class="cart__thumbnail">
                                                        <a href="product-details.html"><img class="border-radius-5"
                                                                src="assets/img/product/product3.png"
                                                                alt="cart-product"></a>
                                                    </div>
                                                    <div class="cart__content">
                                                        <h3 class="cart__content--title h4"><a
                                                                href="product-details.html">Raw-onions-surface</a></h3>
                                                        <span class="cart__content--variant">COLOR: Blue</span>
                                                        <span class="cart__content--variant">WEIGHT: 2 Kg</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <span class="cart__price">£65.00</span>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <div class="quantity__box">
                                                    <button type="button"
                                                        class="quantity__value quickview__value--quantity decrease"
                                                        aria-label="quantity value" value="Decrease Value">-</button>
                                                    <label>
                                                        <input type="number"
                                                            class="quantity__number quickview__value--number" value="1"
                                                            data-counter="">
                                                    </label>
                                                    <button type="button"
                                                        class="quantity__value quickview__value--quantity increase"
                                                        aria-label="quantity value" value="Increase Value">+</button>
                                                </div>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <span class="cart__price end">£130.00</span>
                                            </td>
                                        </tr>
                                        <tr class="cart__table--body__items">
                                            <td class="cart__table--body__list">
                                                <div class="cart__product d-flex align-items-center">
                                                    <button class="cart__remove--btn" aria-label="search button"
                                                        type="button">
                                                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24" width="16px" height="16px">
                                                            <path
                                                                d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                    <div class="cart__thumbnail">
                                                        <a href="product-details.html"><img class="border-radius-5"
                                                                src="assets/img/product/product4.png"
                                                                alt="cart-product"></a>
                                                    </div>
                                                    <div class="cart__content">
                                                        <h3 class="cart__content--title h4"><a
                                                                href="product-details.html">Red-tomato-isolated</a></h3>
                                                        <span class="cart__content--variant">COLOR: Blue</span>
                                                        <span class="cart__content--variant">WEIGHT: 2 Kg</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <span class="cart__price">£65.00</span>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <div class="quantity__box">
                                                    <button type="button"
                                                        class="quantity__value quickview__value--quantity decrease"
                                                        aria-label="quantity value" value="Decrease Value">-</button>
                                                    <label>
                                                        <input type="number"
                                                            class="quantity__number quickview__value--number" value="1"
                                                            data-counter="">
                                                    </label>
                                                    <button type="button"
                                                        class="quantity__value quickview__value--quantity increase"
                                                        aria-label="quantity value" value="Increase Value">+</button>
                                                </div>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <span class="cart__price end">£130.00</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="continue__shopping d-flex justify-content-between">
                                    <a class="continue__shopping--link" href="shop.html">Continue shopping</a>
                                    <button class="continue__shopping--clear" type="submit">Clear Cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="cart__summary border-radius-10">
                                <div class="coupon__code mb-30">
                                    <h3 class="coupon__code--title">Coupon</h3>
                                    <p class="coupon__code--desc">Enter your coupon code if you have one.</p>
                                    <div class="coupon__code--field d-flex">
                                        <label>
                                            <input class="coupon__code--field__input border-radius-5"
                                                placeholder="Coupon code" type="text">
                                        </label>
                                        <button class="coupon__code--field__btn btn" type="submit">Apply Coupon</button>
                                    </div>
                                </div>
                                <div class="cart__note mb-20">
                                    <h3 class="cart__note--title">Note</h3>
                                    <p class="cart__note--desc">Add special instructions for your seller...</p>
                                    <textarea class="cart__note--textarea border-radius-5"></textarea>
                                </div>
                                <div class="cart__summary--total mb-20">
                                    <table class="cart__summary--total__table">
                                        <tbody>
                                            <tr class="cart__summary--total__list">
                                                <td class="cart__summary--total__title text-left">SUBTOTAL</td>
                                                <td class="cart__summary--amount text-right">$860.00</td>
                                            </tr>
                                            <tr class="cart__summary--total__list">
                                                <td class="cart__summary--total__title text-left">GRAND TOTAL</td>
                                                <td class="cart__summary--amount text-right">$860.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="cart__summary--footer">
                                    <p class="cart__summary--footer__desc">Shipping &amp; taxes calculated at checkout
                                    </p>
                                    <ul class="d-flex justify-content-between">
                                        <li><button class="cart__summary--footer__btn btn cart" type="submit">Update
                                                Cart</button></li>
                                        <li><a class="cart__summary--footer__btn btn checkout"
                                                href="checkout.html">Check Out</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- cart section end -->

    <!-- Start product section -->
    <section class="product__section product__section--style3 section--padding pt-0">
        <div class="container-fluid">
            <div class="section__heading3 mb-40">
                <h2 class="section__heading3--maintitle">New Products</h2>
            </div>
            <div
                class="product__section--inner product3__section--inner__padding product__section--style3__inner product__column6--activation swiper swiper-initialized swiper-horizontal swiper-pointer-events">
                <div class="swiper-wrapper" id="swiper-wrapper-915a49d3c164f6bf" aria-live="polite"
                    style="transform: translate3d(-1346px, 0px, 0px); transition-duration: 0ms;">
                    <div class="swiper-slide swiper-slide-duplicate" role="group" aria-label="3 / 7"
                        data-swiper-slide-index="2" style="width: 249.2px; margin-right: 20px;">
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
                    <div class="swiper-slide swiper-slide-duplicate" role="group" aria-label="4 / 7"
                        data-swiper-slide-index="3" style="width: 249.2px; margin-right: 20px;">
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
                    <div class="swiper-slide swiper-slide-duplicate" role="group" aria-label="5 / 7"
                        data-swiper-slide-index="4" style="width: 249.2px; margin-right: 20px;">
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
                    <div class="swiper-slide swiper-slide-duplicate" role="group" aria-label="6 / 7"
                        style="width: 249.2px; margin-right: 20px;" data-swiper-slide-index="5">
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
                    <div class="swiper-slide swiper-slide-duplicate swiper-slide-prev" role="group" aria-label="7 / 7"
                        style="width: 249.2px; margin-right: 20px;" data-swiper-slide-index="6">
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
                    <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 7"
                        style="width: 249.2px; margin-right: 20px;" data-swiper-slide-index="0">
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
                    <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 7"
                        style="width: 249.2px; margin-right: 20px;" data-swiper-slide-index="1">
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
                    <div class="swiper-slide" role="group" aria-label="3 / 7" data-swiper-slide-index="2"
                        style="width: 249.2px; margin-right: 20px;">
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
                    <div class="swiper-slide" role="group" aria-label="4 / 7" data-swiper-slide-index="3"
                        style="width: 249.2px; margin-right: 20px;">
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
                    <div class="swiper-slide" role="group" aria-label="5 / 7" data-swiper-slide-index="4"
                        style="width: 249.2px; margin-right: 20px;">
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
                    <div class="swiper-slide" role="group" aria-label="6 / 7"
                        style="width: 249.2px; margin-right: 20px;" data-swiper-slide-index="5">
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
                    <div class="swiper-slide swiper-slide-duplicate-prev" role="group" aria-label="7 / 7"
                        style="width: 249.2px; margin-right: 20px;" data-swiper-slide-index="6">
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
                    <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" role="group"
                        aria-label="1 / 7" style="width: 249.2px; margin-right: 20px;" data-swiper-slide-index="0">
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
                        aria-label="2 / 7" style="width: 249.2px; margin-right: 20px;" data-swiper-slide-index="1">
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
                    <div class="swiper-slide swiper-slide-duplicate" role="group" aria-label="3 / 7"
                        data-swiper-slide-index="2" style="width: 249.2px; margin-right: 20px;">
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
                    <div class="swiper-slide swiper-slide-duplicate" role="group" aria-label="4 / 7"
                        data-swiper-slide-index="3" style="width: 249.2px; margin-right: 20px;">
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
                    <div class="swiper-slide swiper-slide-duplicate" role="group" aria-label="5 / 7"
                        data-swiper-slide-index="4" style="width: 249.2px; margin-right: 20px;">
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
                </div>
                <div class="swiper__nav--btn swiper-button-next" tabindex="0" role="button" aria-label="Next slide"
                    aria-controls="swiper-wrapper-915a49d3c164f6bf"></div>
                <div class="swiper__nav--btn swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"
                    aria-controls="swiper-wrapper-915a49d3c164f6bf"></div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
        </div>
    </section>
    <!-- End product section -->

    <!-- Start brand logo section -->
    <div class="brand__logo--section section--padding pt-0">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="brand__logo--section__inner d-flex justify-content-between align-items-center">
                        <div class="brand__logo--items">
                            <img class="brand__logo--items__thumbnail--img display-block"
                                src="assets/img/logo/brand-logo1.png" alt="brand img">
                        </div>
                        <div class="brand__logo--items">
                            <img class="brand__logo--items__thumbnail--img display-block"
                                src="assets/img/logo/brand-logo2.png" alt="brand img">
                        </div>
                        <div class="brand__logo--items">
                            <img class="brand__logo--items__thumbnail--img display-block"
                                src="assets/img/logo/brand-logo3.png" alt="brand img">
                        </div>
                        <div class="brand__logo--items">
                            <img class="brand__logo--items__thumbnail--img display-block"
                                src="assets/img/logo/brand-logo4.png" alt="brand img">
                        </div>
                        <div class="brand__logo--items">
                            <img class="brand__logo--items__thumbnail--img display-block"
                                src="assets/img/logo/brand-logo5.png" alt="brand img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End brand logo section -->

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
