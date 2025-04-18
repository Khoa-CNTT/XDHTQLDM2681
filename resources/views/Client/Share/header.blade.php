<header class="header__section header__transparent">
    <div class="header__topbar bg__primary">
        <div class="container">
            <div class="header__topbar--inner d-flex align-items-center justify-content-center">
                <div class="header__shipping">
                    <p class="header__shipping--text text-white"><img class="header__shipping--icon"
                            src="/assets/img/icon/car.png" alt="header-shipping-img"> Claim your online FREE Delivery
                        or Shipping today! Expires in</p>
                </div>
                <div class="header__topbar--countdown d-flex" data-countdown="Sep 30, 2022 00:00:00"></div>
            </div>
        </div>
    </div>
    <div class="main__header header__sticky">
        <div class="container">
            <div class="main__header--inner position__relative d-flex justify-content-between align-items-center">
                <div class="offcanvas__header--menu__open ">
                    <a class="offcanvas__header--menu__open--btn" href="javascript:void(0)" data-offcanvas>
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon offcanvas__header--menu__open--svg"
                            viewBox="0 0 512 512">
                            <path fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                stroke-miterlimit="10" stroke-width="32" d="M80 160h352M80 256h352M80 352h352" />
                        </svg>
                        <span class="visually-hidden">Offcanvas Menu Open</span>
                    </a>
                </div>
                <div class="main__logo">
                    <h1 class="main__logo--title"><a class="main__logo--link" href="index.html"><img
                                class="main__logo--img" src="/assets/img/logo/nav-log.png" alt="logo-img"></a></h1>
                </div>
                <div class="header__search--widget d-none d-lg-block header__sticky--none">
                    <div class="d-flex header__search--form" action="#">

                        <div class="header__select--categories select">
                        <div class="header__select--categories select">
                    <form method="GET" action="{{ route('menu.item.index') }}">
                        <select name="district" onchange="this.form.submit()" class="header__select--inner" id="quan">
                            <option selected value="">Chọn Quận/Huyện</option>
                        </select>
                    </form>

                        </div>
</div>
<form class="product__view--search__form header__search--box" action="{{ route('menu-items.search') }}" method="GET">

                            <label>
                                <input class="product__view--search__input border-0" placeholder="Tìm kiếm" type="text" name="query">
                            </label>
                            <button class="product__view--search__btn" aria-label="search btn" type="submit">
                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51"
                                    height="20.443" viewBox="0 0 512 512">
                                    <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none"
                                        stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path>
                                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32"
                                        d="M338.29 338.29L448 448"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="header__menu d-none d-lg-block header__sticky--block">
                    <nav class="header__menu--navigation">
                        <ul class="d-flex">
                            <li class="header__menu--items">
                                <a class="header__menu--link" href="index.html">Home
                                    <svg class="menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12"
                                        height="7.41" viewBox="0 0 12 7.41">
                                        <path d="M16.59,8.59,12,13.17,7.41,8.59,6,10l6,6,6-6Z"
                                            transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7" />
                                    </svg>
                                </a>
                                <ul class="header__sub--menu">
                                    <li class="header__sub--menu__items"><a href="/"
                                            class="header__sub--menu__link">Home </a></li>

                                </ul>
                            </li>
                            <li class="header__menu--items mega__menu--items">
                                <a class="header__menu--link" href="/menu/index">Thực đơn
                                    <svg class="menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12"
                                        height="7.41" viewBox="0 0 12 7.41">
                                        <path d="M16.59,8.59,12,13.17,7.41,8.59,6,10l6,6,6-6Z"
                                            transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7" />
                                    </svg>
                                </a>
                                <ul class="header__mega--menu d-flex">
                                    <li class="header__mega--menu__li">
                                        <span class="header__mega--subtitle">Column One</span>
                                        <ul class="header__mega--sub__menu">
                                            <li class="header__mega--sub__menu_li"><a
                                                    class="header__mega--sub__menu--title" href="/menu/index">Shop
                                                    Left Sidebar</a></li>

                                        </ul>
                                    </li>
                                    <li class="header__mega--menu__li">
                                        <span class="header__mega--subtitle">Column Two</span>
                                        <ul class="header__mega--sub__menu">
                                            <li class="header__mega--sub__menu_li"><a
                                                    class="header__mega--sub__menu--title"
                                                    href="/client/menu/detail">Product Details</a></li>

                                        </ul>
                                    </li>
                                    <li class="header__mega--menu__li">
                                        <span class="header__mega--subtitle">Column Three</span>
                                        <ul class="header__mega--sub__menu">
                                            <li class="header__mega--sub__menu_li"><a
                                                    class="header__mega--sub__menu--title" href="/client/history-order">My
                                                    Account</a></li>
                                            <li class="header__mega--sub__menu_li"><a
                                                    class="header__mega--sub__menu--title"
                                                    href="my-account-2.html">My Account 2</a></li>
                                            <li class="header__mega--sub__menu_li"><a
                                                    class="header__mega--sub__menu--title" href="404.html">404
                                                    Page</a></li>
                                            <li class="header__mega--sub__menu_li"><a
                                                    class="header__mega--sub__menu--title" href="/client/account/login">Login
                                                    Page</a></li>
                                            <li class="header__mega--sub__menu_li"><a
                                                    class="header__mega--sub__menu--title" href="faq.html">Faq
                                                    Page</a></li>
                                        </ul>
                                    </li>
                                    <li class="header__mega--menu__li">
                                        <span class="header__mega--subtitle">Column Four</span>
                                        <ul class="header__mega--sub__menu">
                                            <li class="header__mega--sub__menu_li"><a
                                                    class="header__mega--sub__menu--title"
                                                    href="compare.html">Compare Pages</a></li>
                                            <li class="header__mega--sub__menu_li"><a
                                                    class="header__mega--sub__menu--title"
                                                    href="checkout.html">Checkout page</a></li>
                                            <li class="header__mega--sub__menu_li"><a
                                                    class="header__mega--sub__menu--title"
                                                    href="checkout-2.html">Checkout Style 2</a></li>
                                            <li class="header__mega--sub__menu_li"><a
                                                    class="header__mega--sub__menu--title"
                                                    href="checkout-3.html">Checkout Style 3</a></li>
                                            <li class="header__mega--sub__menu_li"><a
                                                    class="header__mega--sub__menu--title"
                                                    href="checkout-4.html">Checkout Style 4</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="header__menu--items">
                                <a class="header__menu--link" href="blog.html">Blog
                                    <svg class="menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12"
                                        height="7.41" viewBox="0 0 12 7.41">
                                        <path d="M16.59,8.59,12,13.17,7.41,8.59,6,10l6,6,6-6Z"
                                            transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7" />
                                    </svg>
                                </a>
                                <ul class="header__sub--menu">
                                    <li class="header__sub--menu__items"><a href="blog.html"
                                            class="header__sub--menu__link">Blog Grid</a></li>
                                    <li class="header__sub--menu__items"><a href="blog-details.html"
                                            class="header__sub--menu__link">Blog Details</a></li>
                                    <li class="header__sub--menu__items"><a href="blog-left-sidebar.html"
                                            class="header__sub--menu__link">Blog Left Sidebar</a></li>
                                    <li class="header__sub--menu__items"><a href="blog-right-sidebar.html"
                                            class="header__sub--menu__link">Blog Right Sidebar</a></li>
                                </ul>
                            </li>
                            <li class="header__menu--items">
                                <a class="header__menu--link" href="#">Pages
                                    <svg class="menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12"
                                        height="7.41" viewBox="0 0 12 7.41">
                                        <path d="M16.59,8.59,12,13.17,7.41,8.59,6,10l6,6,6-6Z"
                                            transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7" />
                                    </svg>
                                </a>
                                <ul class="header__sub--menu">
                                    <li class="header__sub--menu__items"><a href="about.html"
                                            class="header__sub--menu__link">About Us</a></li>
                                    <li class="header__sub--menu__items"><a href="contact.html"
                                            class="header__sub--menu__link">Contact Us</a></li>
                                    <li class="header__sub--menu__items"><a href="cart.html"
                                            class="header__sub--menu__link">Cart Page</a></li>
                                    <li class="header__sub--menu__items"><a href="portfolio.html"
                                            class="header__sub--menu__link">Portfolio Page</a></li>
                                    <li class="header__sub--menu__items"><a href="wishlist.html"
                                            class="header__sub--menu__link">Wishlist Page</a></li>
                                    <li class="header__sub--menu__items"><a href="login.html"
                                            class="header__sub--menu__link">Login Page</a></li>
                                    <li class="header__sub--menu__items"><a href="404.html"
                                            class="header__sub--menu__link">Error Page</a></li>
                                </ul>
                            </li>
                            <li class="header__menu--items">
                                <a class="header__menu--link" href="contact.html">Contact </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="header__account header__sticky--none">
                    <ul class="d-flex">
                        <li class="header__account--items d-none d-lg-block">
                            @if(Auth::check())
                            <a class="header__account--btn" href="/client/dashboard">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20.51" height="19.443" viewBox="0 0 512 512">
                                        <path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none"
                                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                                        <path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48
                                                15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10"
                                            stroke-width="32" />
                                    </svg>
                                </a>
                            @else
                                <a class="header__account--btn" href="/account/login">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20.51" height="19.443" viewBox="0 0 512 512">
                                        <path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none"
                                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                                        <path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48
                                                15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10"
                                            stroke-width="32" />
                                    </svg>
                                </a>
                            @endif
                        </li>
                        <li
                            class="header__account--items  header__account--search__items mobile__d--block d-sm-2-none">
                            <a class="header__account--btn search__open--btn" href="javascript:void(0)"
                                data-offcanvas>
                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"
                                    width="22.51" height="20.443" viewBox="0 0 512 512">
                                    <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                        fill="none" stroke="currentColor" stroke-miterlimit="10"
                                        stroke-width="32" />
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448" />
                                </svg>
                                <span class="visually-hidden">Search</span>
                            </a>
                        </li>
                        <li class="header__account--items">
                            <a class="header__account--btn minicart__open--btn" href="javascript:void(0)"
                                data-offcanvas>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16.706" height="15.534"
                                    viewBox="0 0 14.706 13.534">
                                    <g transform="translate(0 0)">
                                        <g>
                                            <path data-name="Path 16787"
                                                d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                transform="translate(0 -463.248)" fill="#fefefe" />
                                            <path data-name="Path 16788"
                                                d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                transform="translate(-1.191 -466.622)" fill="#fefefe" />
                                            <path data-name="Path 16789"
                                                d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                transform="translate(-2.875 -466.622)" fill="#fefefe" />
                                        </g>
                                    </g>
                                </svg>
                                <span class="items__count">3</span>
                            </a>
                        </li>
                        <li class="header__account--items d-none d-lg-block">
                            <a class="header__account--btn" href="wishlist.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18.541" height="15.557"
                                    viewBox="0 0 18.541 15.557">
                                    <path
                                        d="M71.775,135.51a5.153,5.153,0,0,1,1.267-1.524,4.986,4.986,0,0,1,6.584.358,4.728,4.728,0,0,1,1.174,4.914,10.458,10.458,0,0,1-2.132,3.808,22.591,22.591,0,0,1-5.4,4.558c-.445.282-.9.549-1.356.812a.306.306,0,0,1-.254.013,25.491,25.491,0,0,1-6.279-4.8,11.648,11.648,0,0,1-2.52-4.009,4.957,4.957,0,0,1,.028-3.787,4.629,4.629,0,0,1,3.744-2.863,4.782,4.782,0,0,1,5.086,2.447c.013.019.025.034.057.076Z"
                                        transform="translate(-62.498 -132.915)" fill="currentColor" />
                                </svg>
                                <span class="items__count">3</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="header__account header__sticky--block">
                    <ul class="d-flex">
                        <li class="header__account--items  header__account--search__items d-sm-2-none">
                            <a class="header__account--btn search__open--btn" href="javascript:void(0)"
                                data-offcanvas>
                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"
                                    width="22.51" height="20.443" viewBox="0 0 512 512">
                                    <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                        fill="none" stroke="currentColor" stroke-miterlimit="10"
                                        stroke-width="32" />
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448" />
                                </svg>
                                <span class="visually-hidden">Search</span>
                            </a>
                        </li>
                        <li class="header__account--items d-none d-lg-block">
                            <a class="header__account--btn" href="wishlist.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18.541" height="15.557"
                                    viewBox="0 0 18.541 15.557">
                                    <path
                                        d="M71.775,135.51a5.153,5.153,0,0,1,1.267-1.524,4.986,4.986,0,0,1,6.584.358,4.728,4.728,0,0,1,1.174,4.914,10.458,10.458,0,0,1-2.132,3.808,22.591,22.591,0,0,1-5.4,4.558c-.445.282-.9.549-1.356.812a.306.306,0,0,1-.254.013,25.491,25.491,0,0,1-6.279-4.8,11.648,11.648,0,0,1-2.52-4.009,4.957,4.957,0,0,1,.028-3.787,4.629,4.629,0,0,1,3.744-2.863,4.782,4.782,0,0,1,5.086,2.447c.013.019.025.034.057.076Z"
                                        transform="translate(-62.498 -132.915)" fill="currentColor" />
                                </svg>
                                <span class="items__count">3</span>
                            </a>
                        </li>
                        <li class="header__account--items d-none d-lg-block">
                            <a class="header__account--btn" href="my-account.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20.51" height="19.443"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="32" />
                                    <path
                                        d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z"
                                        fill="none" stroke="currentColor" stroke-miterlimit="10"
                                        stroke-width="32" />
                                </svg>
                                <span class="visually-hidden">My account</span>
                            </a>
                        </li>
                        <li class="header__account--items">
                            <a class="header__account--btn minicart__open--btn" href="javascript:void(0)"
                                data-offcanvas>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16.706" height="15.534"
                                    viewBox="0 0 14.706 13.534">
                                    <g transform="translate(0 0)">
                                        <g>
                                            <path data-name="Path 16787"
                                                d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                transform="translate(0 -463.248)" fill="#fefefe" />
                                            <path data-name="Path 16788"
                                                d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                transform="translate(-1.191 -466.622)" fill="#fefefe" />
                                            <path data-name="Path 16789"
                                                d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                transform="translate(-2.875 -466.622)" fill="#fefefe" />
                                        </g>
                                    </g>
                                </svg>
                                <span class="items__count">3</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header__bottom bg__secondary">
        <div class="container">
            <div class="header__bottom--inner position__relative d-flex align-items-center">
                <div class="categories__menu">
                    <div class="categories__menu--header text-white d-flex align-items-center">
                        <svg class="categories__list--icon" xmlns="http://www.w3.org/2000/svg" width="21.007"
                            height="16.831" viewBox="0 0 21.007 16.831">
                            <path id="listine-dots"
                                d="M20.66,99.786a1.036,1.036,0,0,0-.347-.13H4.227a2.013,2.013,0,0,1,0,3.012q7.988,0,15.976,0h.063a.7.7,0,0,0,.454-.162.9.9,0,0,0,.286-.452v-1.765A.861.861,0,0,0,20.66,99.786ZM3.323,101.162A1.662,1.662,0,1,1,1.662,99.5,1.661,1.661,0,0,1,3.323,101.162Zm16.99,3H4.227a2.013,2.013,0,0,1,0,3.012q7.988,0,15.976,0h.063a.7.7,0,0,0,.454-.164.9.9,0,0,0,.286-.452v-1.765a.861.861,0,0,0-.347-.5A1.082,1.082,0,0,0,20.314,104.161Zm-16.99,1.506a1.662,1.662,0,1,1-1.662-1.662A1.663,1.663,0,0,1,3.323,105.668Zm16.99,3H4.227a2.013,2.013,0,0,1,0,3.012q7.988,0,15.976,0h.063a.7.7,0,0,0,.454-.164.9.9,0,0,0,.286-.45v-1.767a.861.861,0,0,0-.347-.5A1.083,1.083,0,0,0,20.314,108.663Zm-16.99,1.506a1.662,1.662,0,1,1-1.662-1.662A1.663,1.663,0,0,1,3.323,110.169Zm16.99,2.993H4.227a2.013,2.013,0,0,1,0,3.012q7.988,0,15.976,0h.063a.687.687,0,0,0,.454-.162.9.9,0,0,0,.286-.452v-1.765a.861.861,0,0,0-.347-.5A1.035,1.035,0,0,0,20.314,113.163Zm-16.99,1.506a1.662,1.662,0,1,1-1.662-1.662A1.661,1.661,0,0,1,3.323,114.669Z"
                                transform="translate(0 -99.5)" fill="currentColor" />
                        </svg>
                        <span class="categories__menu--title">Danh Mục</span>
                        <svg class="categories__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355"
                            height="8.394" viewBox="0 0 10.355 6.394">
                            <path d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z"
                                transform="translate(-6 -8.59)" fill="currentColor" />
                        </svg>
                    </div>
                    <div class="dropdown__categories--menu">
                        <ul class="d-none d-lg-block">
                            @foreach($categories as $category)
                                <li class="categories__menu--items">
                                    <a class="categories__menu--link" href="shop.html">
                                        <svg class="categories__menu--svgicon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path
                                                d="M408 64H104a56.16 56.16 0 00-56 56v192a56.16 56.16 0 0056 56h40v80l93.72-78.14a8 8 0 015.13-1.86H408a56.16 56.16 0 0056-56V120a56.16 56.16 0 00-56-56z"
                                                fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                                        </svg>
                                        {{ $category->title }}
                                        <svg class="categories__menu--right__arrow--icon" xmlns="http://www.w3.org/2000/svg" width="17.007"
                                            height="16.831" viewBox="0 0 512 512">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48"
                                                d="M184 112l144 144-144 144" />
                                        </svg>
                                    </a>
                                    <ul class="categories__submenu border-radius-10 d-flex justify-content-between">
                                        <!-- Lặp qua từng nhà hàng -->
                                        @foreach($category->menuItems->groupBy('restaurant_id') as $restaurantId => $menuItemsByRestaurant)
                                            <li class="categories__submenu--items">
                                                <a class="categories__submenu--items__text" href="shop.html">
                                                    <strong>{{ $menuItemsByRestaurant->first()->restaurant->name }}</strong>
                                                </a>
                                                <ul class="categories__submenu--child">
                                                    <!-- Lặp qua các món ăn của nhà hàng -->
                                                    @foreach($menuItemsByRestaurant as $menuItem)
                                                        <li class="categories__submenu--child__items">
                                                            <a class="categories__submenu--child__items--link" href="shop.html">
                                                                {{ $menuItem->Title_items }}
                                                            </a>
                                                            <!-- Hiển thị chi tiết món ăn -->


                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>


                    </div>
                </div>
                <div class="header__right--area d-flex justify-content-between align-items-center">
                    <div class="header__menu">
                        <nav class="header__menu--navigation">
                            <ul class="d-flex">
                                <li class="header__menu--items">
                                    <a class="header__menu--link text-white" href="/">Trang chủ
                                        <svg class="menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg"
                                            width="12" height="7.41" viewBox="0 0 12 7.41">
                                            <path d="M16.59,8.59,12,13.17,7.41,8.59,6,10l6,6,6-6Z"
                                                transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7" />
                                        </svg>
                                    </a>

                                </li>
                                <li class="header__menu--items mega__menu--items">
                                    <a class="header__menu--link text-white" href="/menu/index">Thực đơn
                                        <svg class="menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg"
                                            width="12" height="7.41" viewBox="0 0 12 7.41">
                                            <path d="M16.59,8.59,12,13.17,7.41,8.59,6,10l6,6,6-6Z"
                                                transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7" />
                                        </svg>
                                    </a>
                                    <ul class="header__mega--menu d-flex">
                                    @foreach($category->menuItems->groupBy('restaurant_id') as $restaurantId => $menuItemsByRestaurant)
                                        <li class="header__mega--menu__li">
                                            <span class="header__mega--subtitle">{{ $menuItemsByRestaurant->first()->restaurant->name }}</span>
                                            <ul class="header__mega--sub__menu">
                                                <!-- Lặp qua các món ăn của nhà hàng -->
                                                @foreach($menuItemsByRestaurant as $menuItem)
                                                    <li class="header__mega--sub__menu_li">
                                                        <a class="header__mega--sub__menu--title" href="shop.html">
                                                            {{ $menuItem->Title_items }}
                                                        </a>
                                                        <!-- Hiển thị giá món ăn -->

                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach


                                    </ul>
                                </li>
                                <li class="header__menu--items">
                                    <a class="header__menu--link text-white" href="blog.html">Blog
                                        <svg class="menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg"
                                            width="12" height="7.41" viewBox="0 0 12 7.41">
                                            <path d="M16.59,8.59,12,13.17,7.41,8.59,6,10l6,6,6-6Z"
                                                transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7" />
                                        </svg>
                                    </a>
                                    <ul class="header__sub--menu">
                                        <li class="header__sub--menu__items"><a href="blog.html"
                                                class="header__sub--menu__link">Blog Grid</a></li>
                                        <li class="header__sub--menu__items"><a href="blog-details.html"
                                                class="header__sub--menu__link">Blog Details</a></li>
                                        <li class="header__sub--menu__items"><a href="blog-left-sidebar.html"
                                                class="header__sub--menu__link">Blog Left Sidebar</a></li>
                                        <li class="header__sub--menu__items"><a href="blog-right-sidebar.html"
                                                class="header__sub--menu__link">Blog Right Sidebar</a></li>
                                    </ul>
                                </li>
                                <li class="header__menu--items">
                                    <a class="header__menu--link text-white" href="#">Pages
                                        <svg class="menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg"
                                            width="12" height="7.41" viewBox="0 0 12 7.41">
                                            <path d="M16.59,8.59,12,13.17,7.41,8.59,6,10l6,6,6-6Z"
                                                transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7" />
                                        </svg>
                                    </a>
                                    <ul class="header__sub--menu">
                                        <li class="header__sub--menu__items"><a href="about.html"
                                                class="header__sub--menu__link">About Us</a></li>
                                        <li class="header__sub--menu__items"><a href="contact.html"
                                                class="header__sub--menu__link">Contact Us</a></li>
                                        <li class="header__sub--menu__items"><a href="cart.html"
                                                class="header__sub--menu__link">Cart Page</a></li>
                                        <li class="header__sub--menu__items"><a href="portfolio.html"
                                                class="header__sub--menu__link">Portfolio Page</a></li>
                                        <li class="header__sub--menu__items"><a href="wishlist.html"
                                                class="header__sub--menu__link">Wishlist Page</a></li>
                                        <li class="header__sub--menu__items"><a href="login.html"
                                                class="header__sub--menu__link">Login Page</a></li>
                                        <li class="header__sub--menu__items"><a href="404.html"
                                                class="header__sub--menu__link">Error Page</a></li>
                                    </ul>
                                </li>
                                <li class="header__menu--items">
                                    <a class="header__menu--link text-white" href="contact.html">Contact </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header__right--info d-flex align-items-center">
                        <div class="account__currency">
                            <a class="account__currency--link text-white" href="javascript:void(0)">
                                <img src="/assets/img/icon/usd-icon.png" alt="currency">
                                <span>USD</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="9.797" height="6.05"
                                    viewBox="0 0 9.797 6.05">
                                    <path d="M14.646,8.59,10.9,12.329,7.151,8.59,6,9.741l4.9,4.9,4.9-4.9Z"
                                        transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7" />
                                </svg>
                            </a>
                            <div class="dropdown__currency">
                                <ul>
                                    <li class="currency__items"><a class="currency__text" href="#">CAD</a></li>
                                    <li class="currency__items"><a class="currency__text" href="#">CNY</a></li>
                                    <li class="currency__items"><a class="currency__text" href="#">EUR</a></li>
                                    <li class="currency__items"><a class="currency__text" href="#">GBP</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="suport__contact d-flex align-items-center">
                            <svg class="suport__contact--icon text-white" xmlns="http://www.w3.org/2000/svg"
                                width="36.725" height="36.743" viewBox="0 0 36.725 36.743">
                                <path id="headphone-alt-2"
                                    d="M28.893,18.469c-.026-2.873.1-5.754-.761-8.565-1.587-5.21-5.306-7.742-10.781-7.272-4.681.4-7.588,2.715-8.785,7.573a24.031,24.031,0,0,0,.2,13.3,11.447,11.447,0,0,0,6.254,7.253c.658.3,1.091.408,1.595-.356a3.732,3.732,0,0,1,4.38-1.334,3.931,3.931,0,1,1-4.582,5.82,2.989,2.989,0,0,0-1.782-1.466c-4.321-1.573-6.842-4.869-8.367-9.032a1.686,1.686,0,0,0-1.238-1.275,7.046,7.046,0,0,1-3.718-2.447A5.739,5.739,0,0,1,3.242,11.83,5.338,5.338,0,0,0,6.318,7.957C7.644,3.033,11.62.193,16.845.02a19.923,19.923,0,0,1,6.324.544c4.479,1.3,6.783,4.52,7.72,8.881a1.966,1.966,0,0,0,1.389,1.723,6.235,6.235,0,0,1,4.439,6.324,5.211,5.211,0,0,1-1.33,3.27,7.98,7.98,0,0,1-5.449,2.774c-.731.077-1.124-.051-1.069-.952.085-1.367.022-2.745.026-4.115Z"
                                    transform="translate(0.006 0.01)" fill="currentColor" />
                            </svg>
                            <p class="suport__contact--text text-white">
                                <span class="suport__text--24">24/7 Suport</span>
                                <a class="suport__contact--number" href="tel:09786542214">09 7865 42214</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- End Offcanvas header menu -->

    <!-- Start Offcanvas stikcy toolbar -->
    <div class="offcanvas__stikcy--toolbar">
        <ul class="d-flex justify-content-between">
            <li class="offcanvas__stikcy--toolbar__list">
                <a class="offcanvas__stikcy--toolbar__btn" href="index.html">
                    <span class="offcanvas__stikcy--toolbar__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="21.51" height="21.443"
                            viewBox="0 0 22 17">
                            <path fill="currentColor"
                                d="M20.9141 7.93359c.1406.11719.2109.26953.2109.45703 0 .14063-.0469.25782-.1406.35157l-.3516.42187c-.1172.14063-.2578.21094-.4219.21094-.1406 0-.2578-.04688-.3515-.14062l-.9844-.77344V15c0 .3047-.1172.5625-.3516.7734-.2109.2344-.4687.3516-.7734.3516h-4.5c-.3047 0-.5742-.1172-.8086-.3516-.2109-.2109-.3164-.4687-.3164-.7734v-3.6562h-2.25V15c0 .3047-.11719.5625-.35156.7734-.21094.2344-.46875.3516-.77344.3516h-4.5c-.30469 0-.57422-.1172-.80859-.3516-.21094-.2109-.31641-.4687-.31641-.7734V8.46094l-.94922.77344c-.11719.09374-.24609.14062-.38672.14062-.16406 0-.30468-.07031-.42187-.21094l-.35157-.42187C.921875 8.625.875 8.50781.875 8.39062c0-.1875.070312-.33984.21094-.45703L9.73438.832031C10.1094.527344 10.5312.375 11 .375s.8906.152344 1.2656.457031l8.6485 7.101559zm-3.7266 6.50391V7.05469L11 1.99219l-6.1875 5.0625v7.38281h3.375v-3.6563c0-.3046.10547-.5624.31641-.7734.23437-.23436.5039-.35155.80859-.35155h3.375c.3047 0 .5625.11719.7734.35155.2344.211.3516.4688.3516.7734v3.6563h3.375z">
                            </path>
                        </svg>
                    </span>
                    <span class="offcanvas__stikcy--toolbar__label">Home</span>
                </a>
            </li>
            <li class="offcanvas__stikcy--toolbar__list">
                <a class="offcanvas__stikcy--toolbar__btn" href="shop.html">
                    <span class="offcanvas__stikcy--toolbar__icon">
                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="18.51" height="17.443"
                            viewBox="0 0 448 512">
                            <path
                                d="M416 32H32A32 32 0 0 0 0 64v384a32 32 0 0 0 32 32h384a32 32 0 0 0 32-32V64a32 32 0 0 0-32-32zm-16 48v152H248V80zm-200 0v152H48V80zM48 432V280h152v152zm200 0V280h152v152z">
                            </path>
                        </svg>
                    </span>
                    <span class="offcanvas__stikcy--toolbar__label">Shop</span>
                </a>
            </li>
            <li class="offcanvas__stikcy--toolbar__list ">
                <a class="offcanvas__stikcy--toolbar__btn search__open--btn" href="javascript:void(0)"
                    data-offcanvas>
                    <span class="offcanvas__stikcy--toolbar__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                            <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                                stroke-width="32" d="M338.29 338.29L448 448" />
                        </svg>
                    </span>
                    <span class="offcanvas__stikcy--toolbar__label">Search</span>
                </a>
            </li>
            <li class="offcanvas__stikcy--toolbar__list">
                <a class="offcanvas__stikcy--toolbar__btn minicart__open--btn" href="javascript:void(0)"
                    data-offcanvas>
                    <span class="offcanvas__stikcy--toolbar__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18.51" height="15.443"
                            viewBox="0 0 18.51 15.443">
                            <path
                                d="M79.963,138.379l-13.358,0-.56-1.927a.871.871,0,0,0-.6-.592l-1.961-.529a.91.91,0,0,0-.226-.03.864.864,0,0,0-.226,1.7l1.491.4,3.026,10.919a1.277,1.277,0,1,0,1.844,1.144.358.358,0,0,0,0-.049h6.163c0,.017,0,.034,0,.049a1.277,1.277,0,1,0,1.434-1.267c-1.531-.247-7.783-.55-7.783-.55l-.205-.8h7.8a.9.9,0,0,0,.863-.651l1.688-5.943h.62a.936.936,0,1,0,0-1.872Zm-9.934,6.474H68.568c-.04,0-.1.008-.125-.085-.034-.118-.082-.283-.082-.283l-1.146-4.037a.061.061,0,0,1,.011-.057.064.064,0,0,1,.053-.025h1.777a.064.064,0,0,1,.063.051l.969,4.34,0,.013a.058.058,0,0,1,0,.019A.063.063,0,0,1,70.03,144.853Zm3.731-4.41-.789,4.359a.066.066,0,0,1-.063.051h-1.1a.064.064,0,0,1-.063-.051l-.789-4.357a.064.064,0,0,1,.013-.055.07.07,0,0,1,.051-.025H73.7a.06.06,0,0,1,.051.025A.064.064,0,0,1,73.76,140.443Zm3.737,0L76.26,144.8a.068.068,0,0,1-.063.049H74.684a.063.063,0,0,1-.051-.025.064.064,0,0,1-.013-.055l.973-4.357a.066.066,0,0,1,.063-.051h1.777a.071.071,0,0,1,.053.025A.076.076,0,0,1,77.5,140.448Z"
                                transform="translate(-62.393 -135.3)" fill="currentColor" />
                        </svg>
                    </span>
                    <span class="offcanvas__stikcy--toolbar__label">Cart</span>
                    <span class="items__count">3</span>
                </a>
            </li>
            <li class="offcanvas__stikcy--toolbar__list">
                <a class="offcanvas__stikcy--toolbar__btn" href="wishlist.html">
                    <span class="offcanvas__stikcy--toolbar__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18.541" height="15.557"
                            viewBox="0 0 18.541 15.557">
                            <path
                                d="M71.775,135.51a5.153,5.153,0,0,1,1.267-1.524,4.986,4.986,0,0,1,6.584.358,4.728,4.728,0,0,1,1.174,4.914,10.458,10.458,0,0,1-2.132,3.808,22.591,22.591,0,0,1-5.4,4.558c-.445.282-.9.549-1.356.812a.306.306,0,0,1-.254.013,25.491,25.491,0,0,1-6.279-4.8,11.648,11.648,0,0,1-2.52-4.009,4.957,4.957,0,0,1,.028-3.787,4.629,4.629,0,0,1,3.744-2.863,4.782,4.782,0,0,1,5.086,2.447c.013.019.025.034.057.076Z"
                                transform="translate(-62.498 -132.915)" fill="currentColor" />
                        </svg>
                    </span>
                    <span class="offcanvas__stikcy--toolbar__label">Wishlist</span>
                    <span class="items__count">3</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- End Offcanvas stikcy toolbar -->

    <!-- Start offCanvas minicart -->
    <div class="offCanvas__minicart">
        <div class="minicart__header ">
            <div class="minicart__header--top d-flex justify-content-between align-items-center">
                <h3 class="minicart__title"> Shopping Cart</h3>
                <button class="minicart__close--btn" aria-label="minicart close btn" data-offcanvas>
                    <svg class="minicart__close--icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368" />
                    </svg>
                </button>
            </div>
            <p class="minicart__header--desc">The organic foods products are limited</p>
        </div>
        <div class="minicart__product">
            <div class="minicart__product--items d-flex">
                <div class="minicart__thumb">
                    <a href="product-details.html"><img src="/assets/img/product/product1.png" alt="prduct-img"></a>
                </div>
                <div class="minicart__text">
                    <h4 class="minicart__subtitle"><a href="product-details.html">The is Garden Vegetable.</a></h4>
                    <span class="color__variant"><b>Color:</b> Beige</span>
                    <div class="minicart__price">
                        <span class="current__price">$125.00</span>
                        <span class="old__price">$140.00</span>
                    </div>
                    <div class="minicart__text--footer d-flex align-items-center">
                        <div class="quantity__box minicart__quantity">
                            <button type="button" class="quantity__value decrease" aria-label="quantity value"
                                value="Decrease Value">-</button>
                            <label>
                                <input type="number" class="quantity__number" value="1" data-counter />
                            </label>
                            <button type="button" class="quantity__value increase" aria-label="quantity value"
                                value="Increase Value">+</button>
                        </div>
                        <button class="minicart__product--remove" type="button">Remove</button>
                    </div>
                </div>
            </div>
            <div class="minicart__product--items d-flex">
                <div class="minicart__thumb">
                    <a href="product-details.html"><img src="/assets/img/product/product2.png" alt="prduct-img"></a>
                </div>
                <div class="minicart__text">
                    <h4 class="minicart__subtitle"><a href="product-details.html">Fresh Tomatoe is organic.</a></h4>
                    <span class="color__variant"><b>Color:</b> Green</span>
                    <div class="minicart__price">
                        <span class="current__price">$115.00</span>
                        <span class="old__price">$130.00</span>
                    </div>
                    <div class="minicart__text--footer d-flex align-items-center">
                        <div class="quantity__box minicart__quantity">
                            <button type="button" class="quantity__value decrease" aria-label="quantity value"
                                value="Decrease Value">-</button>
                            <label>
                                <input type="number" class="quantity__number" value="1" data-counter />
                            </label>
                            <button type="button" class="quantity__value increase" aria-label="quantity value"
                                value="Increase Value">+</button>
                        </div>
                        <button class="minicart__product--remove" type="button">Remove</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="minicart__amount">
            <div class="minicart__amount_list d-flex justify-content-between">
                <span>Sub Total:</span>
                <span><b>$240.00</b></span>
            </div>
            <div class="minicart__amount_list d-flex justify-content-between">
                <span>Total:</span>
                <span><b>$240.00</b></span>
            </div>
        </div>
        <div class="minicart__conditions text-center">
            <input class="minicart__conditions--input" id="accept" type="checkbox">
            <label class="minicart__conditions--label" for="accept">I agree with the <a
                    class="minicart__conditions--link" href="privacy-policy.html">Privacy Policy</a></label>
        </div>
        <div class="minicart__button d-flex justify-content-center">
            <a class="btn minicart__button--link" href="cart.html">View cart</a>
            <a class="btn minicart__button--link" href="checkout.html">Checkout</a>
        </div>
    </div>
    <!-- End offCanvas minicart -->

    <!-- Start serch box area -->
    <div class="predictive__search--box ">
        <div class="predictive__search--box__inner">
            <h2 class="predictive__search--title">Search Products</h2>
            <form class="predictive__search--form" action="#">
                <label>
                    <input class="predictive__search--input" placeholder="Search Here" type="text">
                </label>
                <button class="predictive__search--button" aria-label="search button"><svg
                        class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="30.51"
                        height="25.443" viewBox="0 0 512 512">
                        <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none"
                            stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                            stroke-width="32" d="M338.29 338.29L448 448" />
                    </svg> </button>
            </form>
        </div>
        <button class="predictive__search--close__btn" aria-label="search close" data-offcanvas>
            <svg class="predictive__search--close__icon" xmlns="http://www.w3.org/2000/svg" width="40.51"
                height="30.443" viewBox="0 0 512 512">
                <path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="32" d="M368 368L144 144M368 144L144 368" />
            </svg>
        </button>
    </div>
    <!-- End serch box area -->

</header>
