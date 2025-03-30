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
                    <form class="d-flex header__search--form" action="#">
                        <div class="header__select--categories select">
                        <select class="header__select--inner">
                            <option selected value="0">Chọn danh mục</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="header__search--box">
                            <label>
                                <input class="header__search--input" placeholder="Search Product" type="text">
                            </label>
                            <button class="header__search--button bg__secondary text-white"
                                type="submit">Search</button>
                        </div>
                    </form>
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
                                    {{-- <li class="header__sub--menu__items"><a href="index-2.html"
                                            class="header__sub--menu__link">Home Two</a></li>
                                    <li class="header__sub--menu__items"><a href="index-3.html"
                                            class="header__sub--menu__link">Home Three</a></li>
                                    <li class="header__sub--menu__items"><a href="index-4.html"
                                            class="header__sub--menu__link">Home Four</a></li> --}}
                                </ul>
                            </li>
                            <li class="header__menu--items mega__menu--items">
                                <a class="header__menu--link" href="shop.html">Shop
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
                                                    class="header__mega--sub__menu--title" href="/client/menu/index">Shop
                                                    Left Sidebar</a></li>
                                            {{-- <li class="header__mega--sub__menu_li"><a
                                                    class="header__mega--sub__menu--title"
                                                    href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                            <li class="header__mega--sub__menu_li"><a
                                                    class="header__mega--sub__menu--title"
                                                    href="shop-grid.html">Shop Grid</a></li>
                                            <li class="header__mega--sub__menu_li"><a
                                                    class="header__mega--sub__menu--title"
                                                    href="shop-grid-list.html">Shop Grid List</a></li>
                                            <li class="header__mega--sub__menu_li"><a
                                                    class="header__mega--sub__menu--title"
                                                    href="shop-list.html">Shop List</a></li> --}}
                                        </ul>
                                    </li>
                                    <li class="header__mega--menu__li">
                                        <span class="header__mega--subtitle">Column Two</span>
                                        <ul class="header__mega--sub__menu">
                                            <li class="header__mega--sub__menu_li"><a
                                                    class="header__mega--sub__menu--title"
                                                    href="/client/menu/detail">Product Details</a></li>
                                            {{-- <li class="header__mega--sub__menu_li"><a
                                                    class="header__mega--sub__menu--title"
                                                    href="product-video.html">Video Product</a></li>
                                            <li class="header__mega--sub__menu_li"><a
                                                    class="header__mega--sub__menu--title"
                                                    href="product-details.html">Variable Product</a></li>
                                            <li class="header__mega--sub__menu_li"><a
                                                    class="header__mega--sub__menu--title"
                                                    href="product-left-sidebar.html">Product Left Sidebar</a></li>
                                            <li class="header__mega--sub__menu_li"><a
                                                    class="header__mega--sub__menu--title"
                                                    href="product-gallery.html">Product Gallery</a></li> --}}
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
                        <span class="categories__menu--title">All Categories</span>
                        <svg class="categories__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355"
                            height="8.394" viewBox="0 0 10.355 6.394">
                            <path d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z"
                                transform="translate(-6 -8.59)" fill="currentColor" />
                        </svg>
                    </div>
                    <div class="dropdown__categories--menu">
                        <ul class="d-none d-lg-block">
                            <li class="categories__menu--items">
                                <a class="categories__menu--link" href="shop.html">
                                    <svg class="categories__menu--svgicon" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <ellipse cx="256" cy="256" rx="267.57" ry="173.44"
                                            transform="rotate(-45 256 256.002)" fill="none" stroke="currentColor"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="32"
                                            d="M334.04 177.96L177.96 334.04M278.3 278.3l-44.6-44.6M322.89 233.7l-44.59-44.59M456.68 211.4L300.6 55.32M211.4 456.68L55.32 300.6M233.7 322.89l-44.59-44.59" />
                                    </svg> Fruits & Vegetables
                                </a>
                            </li>
                            <li class="categories__menu--items">
                                <a class="categories__menu--link" href="shop.html">
                                    <svg class="categories__menu--svgicon" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M448 256c0-106-86-192-192-192S64 150 64 256s86 192 192 192 192-86 192-192z"
                                            fill="none" stroke="currentColor" stroke-miterlimit="10"
                                            stroke-width="32" />
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="32"
                                            d="M256 176v160M336 256H176" />
                                    </svg> Fresh Fruits

                                    <svg class="categories__menu--right__arrow--icon"
                                        xmlns="http://www.w3.org/2000/svg" width="17.007" height="16.831"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="48"
                                            d="M184 112l144 144-144 144" />
                                    </svg>
                                </a>
                                <ul class="categories__submenu border-radius-10 d-flex justify-content-between">
                                    <li class="categories__submenu--items"><a
                                            class="categories__submenu--items__text" href="shop.html"><strong>Fresh
                                                Berries</strong></a>
                                        <ul class="categories__submenu--child">
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html">Apple Juice </a></li>
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html">Oil and Vinegar </a></li>
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html">Bread and Juice </a></li>
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html">AFresh Seafood </a></li>
                                        </ul>
                                    </li>
                                    <li class="categories__submenu--items"><a
                                            class="categories__submenu--items__text" href="shop.html"><strong>Orange
                                                Juice</strong></a>
                                        <ul class="categories__submenu--child">
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html">Apple Juice </a></li>
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html">Oil and Vinegar </a></li>
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html">Bread and Juice </a></li>
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html">AFresh Seafood </a></li>
                                        </ul>
                                    </li>
                                    <li class="categories__submenu--items"><a
                                            class="categories__submenu--items__text" href="shop.html"><strong>Fresh
                                                Nuts</strong></a>
                                        <ul class="categories__submenu--child">
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html">Apple Juice </a></li>
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html">Oil and Vinegar </a></li>
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html">Bread and Juice </a></li>
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html">AFresh Seafood </a></li>
                                        </ul>
                                    </li>
                                    <li class="categories__submenu--items"><a
                                            class="categories__submenu--items__text" href="shop.html"><strong>Laura
                                                Mercier</strong></a>
                                        <ul class="categories__submenu--child">
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html">Apple Juice </a></li>
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html">Oil and Vinegar </a></li>
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html">Bread and Juice </a></li>
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html">AFresh Seafood </a></li>
                                        </ul>
                                    </li>
                                </ul>

                            </li>
                            <li class="categories__menu--items">
                                <a class="categories__menu--link" href="shop.html">
                                    <svg class="categories__menu--svgicon" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M215.08 156.92c-4.89-24-10.77-56.27-10.77-73.23A51.36 51.36 0 01256 32h0c28.55 0 51.69 23.69 51.69 51.69 0 16.5-5.85 48.95-10.77 73.23M215.08 355.08c-4.91 24.06-10.77 56.16-10.77 73.23A51.36 51.36 0 00256 480h0c28.55 0 51.69-23.69 51.69-51.69 0-16.54-5.85-48.93-10.77-73.23M355.08 215.08c24.06-4.91 56.16-10.77 73.23-10.77A51.36 51.36 0 01480 256h0c0 28.55-23.69 51.69-51.69 51.69-16.5 0-48.95-5.85-73.23-10.77M156.92 215.07c-24-4.89-56.25-10.76-73.23-10.76A51.36 51.36 0 0032 256h0c0 28.55 23.69 51.69 51.69 51.69 16.5 0 48.95-5.85 73.23-10.77"
                                            fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-miterlimit="10" stroke-width="32" />
                                        <path
                                            d="M296.92 156.92c13.55-20.48 32.3-47.25 44.37-59.31a51.35 51.35 0 0173.1 0h0c20.19 20.19 19.8 53.3 0 73.1-11.66 11.67-38.67 30.67-59.31 44.37M156.92 296.92c-20.48 13.55-47.25 32.3-59.31 44.37a51.35 51.35 0 000 73.1h0c20.19 20.19 53.3 19.8 73.1 0 11.67-11.66 30.67-38.67 44.37-59.31M355.08 296.92c20.48 13.55 47.25 32.3 59.31 44.37a51.35 51.35 0 010 73.1h0c-20.19 20.19-53.3 19.8-73.1 0-11.69-11.69-30.66-38.65-44.37-59.31M215.08 156.92c-13.53-20.43-32.38-47.32-44.37-59.31a51.35 51.35 0 00-73.1 0h0c-20.19 20.19-19.8 53.3 0 73.1 11.61 11.61 38.7 30.68 59.31 44.37"
                                            fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-miterlimit="10" stroke-width="32" />
                                        <circle cx="256" cy="256" r="64" fill="none" stroke="currentColor"
                                            stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" />
                                    </svg> Vegetables
                                </a>
                            </li>
                            <li class="categories__menu--items">
                                <a class="categories__menu--link" href="shop.html">
                                    <svg class="categories__menu--svgicon" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M408 64H104a56.16 56.16 0 00-56 56v192a56.16 56.16 0 0056 56h40v80l93.72-78.14a8 8 0 015.13-1.86H408a56.16 56.16 0 0056-56V120a56.16 56.16 0 00-56-56z"
                                            fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32" />
                                    </svg> Organics
                                    <svg class="categories__menu--right__arrow--icon"
                                        xmlns="http://www.w3.org/2000/svg" width="17.007" height="16.831"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="48"
                                            d="M184 112l144 144-144 144" />
                                    </svg>
                                </a>
                                <ul class="categories__submenu border-radius-10 d-flex justify-content-between">
                                    <li class="categories__submenu--items"><a
                                            class="categories__submenu--items__text" href="shop.html"><strong>Hot
                                                Offers</strong></a>
                                        <ul class="categories__submenu--child">
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html"> AFresh Seafood</a></li>
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html">Oil and Vinegar </a></li>
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html">Bread and Juice </a></li>
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html"> Apple Juice</a></li>
                                        </ul>
                                    </li>
                                    <li class="categories__submenu--items"><a
                                            class="categories__submenu--items__text" href="shop.html"><strong>Fresh
                                                Meat</strong></a>
                                        <ul class="categories__submenu--child">
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html">Apple Juice </a></li>
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html">Oil and Vinegar </a></li>
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html">Bread and Juice </a></li>
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html">AFresh Seafood </a></li>
                                        </ul>
                                    </li>
                                    <li class="categories__submenu--items"><a
                                            class="categories__submenu--items__text" href="shop.html"><strong>Nature
                                                Food</strong></a>
                                        <ul class="categories__submenu--child">
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html">Apple Juice </a></li>
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html">Oil and Vinegar </a></li>
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html">Bread and Juice </a></li>
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html">AFresh Seafood </a></li>
                                        </ul>
                                    </li>
                                    <li class="categories__submenu--items"><a
                                            class="categories__submenu--items__text" href="shop.html"><strong>Laura
                                                Mercier</strong></a>
                                        <ul class="categories__submenu--child">
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html">Apple Juice </a></li>
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html">Oil and Vinegar </a></li>
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html">Bread and Juice </a></li>
                                            <li class="categories__submenu--child__items"><a
                                                    class="categories__submenu--child__items--link"
                                                    href="shop.html">AFresh Seafood </a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="categories__menu--items">
                                <a class="categories__menu--link" href="shop.html">
                                    <svg class="categories__menu--svgicon" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <circle cx="256" cy="184" r="120" fill="none" stroke="currentColor"
                                            stroke-linejoin="round" stroke-width="32" />
                                        <circle cx="344" cy="328" r="120" fill="none" stroke="currentColor"
                                            stroke-linejoin="round" stroke-width="32" />
                                        <circle cx="168" cy="328" r="120" fill="none" stroke="currentColor"
                                            stroke-linejoin="round" stroke-width="32" />
                                    </svg> Beauty & Care
                                </a>
                            </li>
                            <li class="categories__menu--items">
                                <a class="categories__menu--link" href="shop.html">
                                    <svg class="categories__menu--svgicon" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-width="32"
                                            stroke-linejoin="round"
                                            d="M240 152c-50.71 12.21-94.15 52.31-120.3 73.43a261.14 261.14 0 00-23.81-19.58C59.53 179.29 16 176 16 176s11.37 51.53 41.36 79.83C27.37 284.14 16 335.67 16 335.67s43.53-3.29 79.89-29.85a259.18 259.18 0 0023.61-19.41c26.1 21.14 69.74 61.34 120.5 73.59l-16 56c39.43-6.67 78.86-35.51 94.72-48.25C448 362 496 279 496 256c0-22-48-106-176.89-111.73C303.52 131.78 263.76 102.72 224 96z" />
                                        <circle cx="416" cy="239.99" r="16" />
                                        <path fill="none" stroke="currentColor" stroke-width="32"
                                            stroke-linecap="round" stroke-miterlimit="20"
                                            d="M378.37 356a199.22 199.22 0 010-200" />
                                    </svg> Fresh Fish
                                </a>
                            </li>
                            <li class="categories__menu--items">
                                <a class="categories__menu--link" href="shop.html">
                                    <svg class="categories__menu--svgicon" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M321.89 171.42C233 114 141 155.22 56 65.22c-19.8-21-8.3 235.5 98.1 332.7 77.79 71 197.9 63.08 238.4-5.92s18.28-163.17-70.61-220.58zM173 253c86 81 175 129 292 147"
                                            fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="32" />
                                    </svg> Nature
                                </a>
                            </li>
                            <li class="categories__menu--items">
                                <a class="categories__menu--link" href="shop.html">
                                    <svg class="categories__menu--svgicon" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <circle cx="256" cy="184" r="120" fill="none" stroke="currentColor"
                                            stroke-linejoin="round" stroke-width="32" />
                                        <circle cx="344" cy="328" r="120" fill="none" stroke="currentColor"
                                            stroke-linejoin="round" stroke-width="32" />
                                        <circle cx="168" cy="328" r="120" fill="none" stroke="currentColor"
                                            stroke-linejoin="round" stroke-width="32" />
                                    </svg> Fresh Berries
                                </a>
                            </li>
                            <li class="categories__menu--items">
                                <a class="categories__menu--link" href="shop.html">
                                    <svg class="categories__menu--svgicon" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M322 416c0 35.35-20.65 64-56 64H134c-35.35 0-56-28.65-56-64M336 336c17.67 0 32 17.91 32 40h0c0 22.09-14.33 40-32 40H64c-17.67 0-32-17.91-32-40h0c0-22.09 14.33-40 32-40"
                                            fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-miterlimit="10" stroke-width="32" />
                                        <path
                                            d="M344 336H179.31a8 8 0 00-5.65 2.34l-26.83 26.83a4 4 0 01-5.66 0l-26.83-26.83a8 8 0 00-5.65-2.34H56a24 24 0 01-24-24h0a24 24 0 0124-24h288a24 24 0 0124 24h0a24 24 0 01-24 24zM64 276v-.22c0-55 45-83.78 100-83.78h72c55 0 100 29 100 84v-.22M241 112l7.44 63.97"
                                            fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-miterlimit="10" stroke-width="32" />
                                        <path d="M256 480h139.31a32 32 0 0031.91-29.61L463 112" fill="none"
                                            stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                                            stroke-width="32" />
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="32" d="M368 112l16-64 47-16" />
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-miterlimit="10" stroke-width="32" d="M224 112h256" />
                                    </svg> Bread & Bakery
                                </a>
                            </li>
                        </ul>
                        <nav class="category__mobile--menu">
                            <ul class="category__mobile--menu_ul">
                                <li class="categories__menu--items">
                                    <a class="categories__menu--link" href="shop.html">
                                        <svg class="categories__menu--svgicon" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <ellipse cx="256" cy="256" rx="267.57" ry="173.44"
                                                transform="rotate(-45 256 256.002)" fill="none"
                                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="32" />
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="32"
                                                d="M334.04 177.96L177.96 334.04M278.3 278.3l-44.6-44.6M322.89 233.7l-44.59-44.59M456.68 211.4L300.6 55.32M211.4 456.68L55.32 300.6M233.7 322.89l-44.59-44.59" />
                                        </svg> Fruits & Vegetables
                                    </a>
                                </li>
                                <li class="categories__menu--items">
                                    <a class="categories__menu--link" href="shop.html">
                                        <svg class="categories__menu--svgicon" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M448 256c0-106-86-192-192-192S64 150 64 256s86 192 192 192 192-86 192-192z"
                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                stroke-width="32" />
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="32"
                                                d="M256 176v160M336 256H176" />
                                        </svg> Fresh Fruits
                                    </a>
                                    <ul class="category__sub--menu">
                                        <li class="categories__submenu--items"><a
                                                class="categories__submenu--items__text" href="shop.html">Fresh
                                                Berries</a>
                                            <ul class="category__sub--menu">
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">Apple Juice </a></li>
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">Oil and Vinegar </a></li>
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">Bread and Juice </a></li>
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">AFresh Seafood </a></li>
                                            </ul>
                                        </li>
                                        <li class="categories__submenu--items"><a
                                                class="categories__submenu--items__text" href="shop.html">Orange
                                                Juice</a>
                                            <ul class="category__sub--menu">
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">Apple Juice </a></li>
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">Oil and Vinegar </a></li>
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">Bread and Juice </a></li>
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">AFresh Seafood </a></li>
                                            </ul>
                                        </li>
                                        <li class="categories__submenu--items"><a
                                                class="categories__submenu--items__text" href="shop.html">Fresh
                                                Nuts</a>
                                            <ul class="category__sub--menu">
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">Apple Juice </a></li>
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">Oil and Vinegar </a></li>
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">Bread and Juice </a></li>
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">AFresh Seafood </a></li>
                                            </ul>
                                        </li>
                                        <li class="categories__submenu--items"><a
                                                class="categories__submenu--items__text" href="shop.html">Laura
                                                Mercier</a>
                                            <ul class="category__sub--menu">
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">Apple Juice </a></li>
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">Oil and Vinegar </a></li>
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">Bread and Juice </a></li>
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">AFresh Seafood </a></li>
                                            </ul>
                                        </li>
                                    </ul>

                                </li>
                                <li class="categories__menu--items">
                                    <a class="categories__menu--link" href="shop.html">
                                        <svg class="categories__menu--svgicon" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M215.08 156.92c-4.89-24-10.77-56.27-10.77-73.23A51.36 51.36 0 01256 32h0c28.55 0 51.69 23.69 51.69 51.69 0 16.5-5.85 48.95-10.77 73.23M215.08 355.08c-4.91 24.06-10.77 56.16-10.77 73.23A51.36 51.36 0 00256 480h0c28.55 0 51.69-23.69 51.69-51.69 0-16.54-5.85-48.93-10.77-73.23M355.08 215.08c24.06-4.91 56.16-10.77 73.23-10.77A51.36 51.36 0 01480 256h0c0 28.55-23.69 51.69-51.69 51.69-16.5 0-48.95-5.85-73.23-10.77M156.92 215.07c-24-4.89-56.25-10.76-73.23-10.76A51.36 51.36 0 0032 256h0c0 28.55 23.69 51.69 51.69 51.69 16.5 0 48.95-5.85 73.23-10.77"
                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-miterlimit="10" stroke-width="32" />
                                            <path
                                                d="M296.92 156.92c13.55-20.48 32.3-47.25 44.37-59.31a51.35 51.35 0 0173.1 0h0c20.19 20.19 19.8 53.3 0 73.1-11.66 11.67-38.67 30.67-59.31 44.37M156.92 296.92c-20.48 13.55-47.25 32.3-59.31 44.37a51.35 51.35 0 000 73.1h0c20.19 20.19 53.3 19.8 73.1 0 11.67-11.66 30.67-38.67 44.37-59.31M355.08 296.92c20.48 13.55 47.25 32.3 59.31 44.37a51.35 51.35 0 010 73.1h0c-20.19 20.19-53.3 19.8-73.1 0-11.69-11.69-30.66-38.65-44.37-59.31M215.08 156.92c-13.53-20.43-32.38-47.32-44.37-59.31a51.35 51.35 0 00-73.1 0h0c-20.19 20.19-19.8 53.3 0 73.1 11.61 11.61 38.7 30.68 59.31 44.37"
                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-miterlimit="10" stroke-width="32" />
                                            <circle cx="256" cy="256" r="64" fill="none" stroke="currentColor"
                                                stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" />
                                        </svg> Vegetables
                                    </a>
                                </li>
                                <li class="categories__menu--items">
                                    <a class="categories__menu--link" href="shop.html">
                                        <svg class="categories__menu--svgicon" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M408 64H104a56.16 56.16 0 00-56 56v192a56.16 56.16 0 0056 56h40v80l93.72-78.14a8 8 0 015.13-1.86H408a56.16 56.16 0 0056-56V120a56.16 56.16 0 00-56-56z"
                                                fill="none" stroke="currentColor" stroke-linejoin="round"
                                                stroke-width="32" />
                                        </svg> Organics
                                    </a>
                                    <ul class="category__sub--menu">
                                        <li class="categories__submenu--items"><a
                                                class="categories__submenu--items__text" href="shop.html">Hot
                                                Offers</a>
                                            <ul class="category__sub--menu">
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">Apple Juice </a></li>
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">Oil and Vinegar </a></li>
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">Bread and Juice </a></li>
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">AFresh Seafood </a></li>
                                            </ul>
                                        </li>
                                        <li class="categories__submenu--items"><a
                                                class="categories__submenu--items__text" href="shop.html">Fresh
                                                Meat</a>
                                            <ul class="category__sub--menu">
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">Apple Juice </a></li>
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">Oil and Vinegar </a></li>
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">Bread and Juice </a></li>
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">AFresh Seafood </a></li>
                                            </ul>
                                        </li>
                                        <li class="categories__submenu--items"><a
                                                class="categories__submenu--items__text" href="shop.html">Nature
                                                Food</a>
                                            <ul class="category__sub--menu">
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">Apple Juice </a></li>
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">Oil and Vinegar </a></li>
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">Bread and Juice </a></li>
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">AFresh Seafood </a></li>
                                            </ul>
                                        </li>
                                        <li class="categories__submenu--items"><a
                                                class="categories__submenu--items__text" href="shop.html">Laura
                                                Mercier</a>
                                            <ul class="category__sub--menu">
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">Apple Juice </a></li>
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">Oil and Vinegar </a></li>
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">Bread and Juice </a></li>
                                                <li class="categories__submenu--child__items"><a
                                                        class="categories__submenu--child__items--link"
                                                        href="shop.html">AFresh Seafood </a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="categories__menu--items">
                                    <a class="categories__menu--link" href="shop.html">
                                        <svg class="categories__menu--svgicon" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <circle cx="256" cy="184" r="120" fill="none" stroke="currentColor"
                                                stroke-linejoin="round" stroke-width="32" />
                                            <circle cx="344" cy="328" r="120" fill="none" stroke="currentColor"
                                                stroke-linejoin="round" stroke-width="32" />
                                            <circle cx="168" cy="328" r="120" fill="none" stroke="currentColor"
                                                stroke-linejoin="round" stroke-width="32" />
                                        </svg> Beauty & Care
                                    </a>
                                </li>
                                <li class="categories__menu--items">
                                    <a class="categories__menu--link" href="shop.html">
                                        <svg class="categories__menu--svgicon" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path fill="none" stroke="currentColor" stroke-width="32"
                                                stroke-linejoin="round"
                                                d="M240 152c-50.71 12.21-94.15 52.31-120.3 73.43a261.14 261.14 0 00-23.81-19.58C59.53 179.29 16 176 16 176s11.37 51.53 41.36 79.83C27.37 284.14 16 335.67 16 335.67s43.53-3.29 79.89-29.85a259.18 259.18 0 0023.61-19.41c26.1 21.14 69.74 61.34 120.5 73.59l-16 56c39.43-6.67 78.86-35.51 94.72-48.25C448 362 496 279 496 256c0-22-48-106-176.89-111.73C303.52 131.78 263.76 102.72 224 96z" />
                                            <circle cx="416" cy="239.99" r="16" />
                                            <path fill="none" stroke="currentColor" stroke-width="32"
                                                stroke-linecap="round" stroke-miterlimit="20"
                                                d="M378.37 356a199.22 199.22 0 010-200" />
                                        </svg> Fresh Fish
                                    </a>
                                </li>
                                <li class="categories__menu--items">
                                    <a class="categories__menu--link" href="shop.html">
                                        <svg class="categories__menu--svgicon" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M321.89 171.42C233 114 141 155.22 56 65.22c-19.8-21-8.3 235.5 98.1 332.7 77.79 71 197.9 63.08 238.4-5.92s18.28-163.17-70.61-220.58zM173 253c86 81 175 129 292 147"
                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="32" />
                                        </svg> Nature
                                    </a>
                                </li>
                                <li class="categories__menu--items">
                                    <a class="categories__menu--link" href="shop.html">
                                        <svg class="categories__menu--svgicon" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <circle cx="256" cy="184" r="120" fill="none" stroke="currentColor"
                                                stroke-linejoin="round" stroke-width="32" />
                                            <circle cx="344" cy="328" r="120" fill="none" stroke="currentColor"
                                                stroke-linejoin="round" stroke-width="32" />
                                            <circle cx="168" cy="328" r="120" fill="none" stroke="currentColor"
                                                stroke-linejoin="round" stroke-width="32" />
                                        </svg> Fresh Berries
                                    </a>
                                </li>
                                <li class="categories__menu--items">
                                    <a class="categories__menu--link" href="shop.html">
                                        <svg class="categories__menu--svgicon" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M322 416c0 35.35-20.65 64-56 64H134c-35.35 0-56-28.65-56-64M336 336c17.67 0 32 17.91 32 40h0c0 22.09-14.33 40-32 40H64c-17.67 0-32-17.91-32-40h0c0-22.09 14.33-40 32-40"
                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-miterlimit="10" stroke-width="32" />
                                            <path
                                                d="M344 336H179.31a8 8 0 00-5.65 2.34l-26.83 26.83a4 4 0 01-5.66 0l-26.83-26.83a8 8 0 00-5.65-2.34H56a24 24 0 01-24-24h0a24 24 0 0124-24h288a24 24 0 0124 24h0a24 24 0 01-24 24zM64 276v-.22c0-55 45-83.78 100-83.78h72c55 0 100 29 100 84v-.22M241 112l7.44 63.97"
                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-miterlimit="10" stroke-width="32" />
                                            <path d="M256 480h139.31a32 32 0 0031.91-29.61L463 112" fill="none"
                                                stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                                                stroke-width="32" />
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="32"
                                                d="M368 112l16-64 47-16" />
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-miterlimit="10" stroke-width="32" d="M224 112h256" />
                                        </svg> Bread & Bakery
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="header__right--area d-flex justify-content-between align-items-center">
                    <div class="header__menu">
                        <nav class="header__menu--navigation">
                            <ul class="d-flex">
                                <li class="header__menu--items">
                                    <a class="header__menu--link text-white" href="index.html">Home
                                        <svg class="menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg"
                                            width="12" height="7.41" viewBox="0 0 12 7.41">
                                            <path d="M16.59,8.59,12,13.17,7.41,8.59,6,10l6,6,6-6Z"
                                                transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7" />
                                        </svg>
                                    </a>
                                    <ul class="header__sub--menu">
                                        <li class="header__sub--menu__items"><a href="index.html"
                                                class="header__sub--menu__link">Home One</a></li>
                                        <li class="header__sub--menu__items"><a href="index-2.html"
                                                class="header__sub--menu__link">Home Two</a></li>
                                        <li class="header__sub--menu__items"><a href="index-3.html"
                                                class="header__sub--menu__link">Home Three</a></li>
                                        <li class="header__sub--menu__items"><a href="index-4.html"
                                                class="header__sub--menu__link">Home Four</a></li>
                                    </ul>
                                </li>
                                <li class="header__menu--items mega__menu--items">
                                    <a class="header__menu--link text-white" href="shop.html">Shop
                                        <svg class="menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg"
                                            width="12" height="7.41" viewBox="0 0 12 7.41">
                                            <path d="M16.59,8.59,12,13.17,7.41,8.59,6,10l6,6,6-6Z"
                                                transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7" />
                                        </svg>
                                    </a>
                                    <ul class="header__mega--menu d-flex">
                                        <li class="header__mega--menu__li">
                                            <span class="header__mega--subtitle">Column One</span>
                                            <ul class="header__mega--sub__menu">
                                                <li class="header__mega--sub__menu_li"><a
                                                        class="header__mega--sub__menu--title" href="shop.html">Shop
                                                        Left Sidebar</a></li>
                                                <li class="header__mega--sub__menu_li"><a
                                                        class="header__mega--sub__menu--title"
                                                        href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                                <li class="header__mega--sub__menu_li"><a
                                                        class="header__mega--sub__menu--title"
                                                        href="shop-grid.html">Shop Grid</a></li>
                                                <li class="header__mega--sub__menu_li"><a
                                                        class="header__mega--sub__menu--title"
                                                        href="shop-grid-list.html">Shop Grid List</a></li>
                                                <li class="header__mega--sub__menu_li"><a
                                                        class="header__mega--sub__menu--title"
                                                        href="shop-list.html">Shop List</a></li>
                                            </ul>
                                        </li>
                                        <li class="header__mega--menu__li">
                                            <span class="header__mega--subtitle">Column Two</span>
                                            <ul class="header__mega--sub__menu">
                                                <li class="header__mega--sub__menu_li"><a
                                                        class="header__mega--sub__menu--title"
                                                        href="product-details.html">Product Details</a></li>
                                                <li class="header__mega--sub__menu_li"><a
                                                        class="header__mega--sub__menu--title"
                                                        href="product-video.html">Video Product</a></li>
                                                <li class="header__mega--sub__menu_li"><a
                                                        class="header__mega--sub__menu--title"
                                                        href="product-details.html">Variable Product</a></li>
                                                <li class="header__mega--sub__menu_li"><a
                                                        class="header__mega--sub__menu--title"
                                                        href="product-left-sidebar.html">Product Left Sidebar</a>
                                                </li>
                                                <li class="header__mega--sub__menu_li"><a
                                                        class="header__mega--sub__menu--title"
                                                        href="product-gallery.html">Product Gallery</a></li>
                                            </ul>
                                        </li>
                                        <li class="header__mega--menu__li">
                                            <span class="header__mega--subtitle">Column Three</span>
                                            <ul class="header__mega--sub__menu">
                                                <li class="header__mega--sub__menu_li"><a
                                                        class="header__mega--sub__menu--title"
                                                        href="my-account.html">My Account</a></li>
                                                <li class="header__mega--sub__menu_li"><a
                                                        class="header__mega--sub__menu--title"
                                                        href="my-account-2.html">My Account 2</a></li>
                                                <li class="header__mega--sub__menu_li"><a
                                                        class="header__mega--sub__menu--title" href="404.html">404
                                                        Page</a></li>
                                                <li class="header__mega--sub__menu_li"><a
                                                        class="header__mega--sub__menu--title"
                                                        href="login.html">Login Page</a></li>
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

    <!-- Start Offcanvas header menu -->
    <div class="offcanvas__header">
        <div class="offcanvas__inner">
            <div class="offcanvas__logo">
                <a class="offcanvas__logo_link" href="index.html">
                    <img src="/assets/img/logo/nav-log.png" alt="Grocee Logo" width="158" height="36">
                </a>
                <button class="offcanvas__close--btn" data-offcanvas>close</button>
            </div>
            <nav class="offcanvas__menu">
                <ul class="offcanvas__menu_ul">
                    <li class="offcanvas__menu_li">
                        <a class="offcanvas__menu_item" href="index.html">Home</a>
                        <ul class="offcanvas__sub_menu">
                            <li class="offcanvas__sub_menu_li"><a href="index.html"
                                    class="offcanvas__sub_menu_item">Home One</a></li>
                            <li class="offcanvas__sub_menu_li"><a href="index-2.html"
                                    class="offcanvas__sub_menu_item">Home Two</a></li>
                            <li class="offcanvas__sub_menu_li"><a href="index-3.html"
                                    class="offcanvas__sub_menu_item">Home Three</a></li>
                            <li class="offcanvas__sub_menu_li"><a href="index-4.html"
                                    class="offcanvas__sub_menu_item">Home Four</a></li>
                        </ul>
                    </li>
                    <li class="offcanvas__menu_li">
                        <a class="offcanvas__menu_item" href="shop.html">Shop</a>
                        <ul class="offcanvas__sub_menu">
                            <li class="offcanvas__sub_menu_li">
                                <a href="#" class="offcanvas__sub_menu_item">Column One</a>
                                <ul class="offcanvas__sub_menu">
                                    <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                            href="shop.html">Shop Left Sidebar</a></li>
                                    <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                            href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                    <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                            href="shop-grid.html">Shop Grid</a></li>
                                    <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                            href="shop-grid-list.html">Shop Grid List</a></li>
                                    <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                            href="shop-list.html">Shop List</a></li>
                                </ul>
                            </li>
                            <li class="offcanvas__sub_menu_li">
                                <a href="#" class="offcanvas__sub_menu_item">Column Two</a>
                                <ul class="offcanvas__sub_menu">
                                    <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                            href="product-details.html">Product Details</a></li>
                                    <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                            href="product-video.html">Video Product</a></li>
                                    <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                            href="product-details.html">Variable Product</a></li>
                                    <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                            href="product-left-sidebar.html">Product Left Sidebar</a></li>
                                    <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                            href="product-gallery.html">Product Gallery</a></li>
                                </ul>
                            </li>
                            <li class="offcanvas__sub_menu_li">
                                <a href="#" class="offcanvas__sub_menu_item">Column Three</a>
                                <ul class="offcanvas__sub_menu">
                                    <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                            href="my-account.html">My Account</a></li>
                                    <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                            href="my-account-2.html">My Account 2</a></li>
                                    <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                            href="404.html">404 Page</a></li>
                                    <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                            href="login.html">Login Page</a></li>
                                    <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                            href="faq.html">Faq Page</a></li>
                                </ul>
                            </li>
                            <li class="offcanvas__sub_menu_li">
                                <a href="#" class="offcanvas__sub_menu_item">Column Three</a>
                                <ul class="offcanvas__sub_menu">
                                    <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                            href="compare.html">Compare Pages</a></li>
                                    <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                            href="checkout.html">Checkout page</a></li>
                                    <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                            href="checkout-2.html">Checkout Style 2</a></li>
                                    <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                            href="checkout-3.html">Checkout Style 3</a></li>
                                    <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                            href="checkout-4.html">Checkout Style 4</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="offcanvas__menu_li">
                        <a class="offcanvas__menu_item" href="blog.html">Blog</a>
                        <ul class="offcanvas__sub_menu">
                            <li class="offcanvas__sub_menu_li"><a href="blog.html"
                                    class="offcanvas__sub_menu_item">Blog Grid</a></li>
                            <li class="offcanvas__sub_menu_li"><a href="blog-details.html"
                                    class="offcanvas__sub_menu_item">Blog Details</a></li>
                            <li class="offcanvas__sub_menu_li"><a href="blog-left-sidebar.html"
                                    class="offcanvas__sub_menu_item">Blog Left Sidebar</a></li>
                            <li class="offcanvas__sub_menu_li"><a href="blog-right-sidebar.html"
                                    class="offcanvas__sub_menu_item">Blog Right Sidebar</a></li>
                        </ul>
                    </li>
                    <li class="offcanvas__menu_li">
                        <a class="offcanvas__menu_item" href="#">Pages</a>
                        <ul class="offcanvas__sub_menu">
                            <li class="offcanvas__sub_menu_li"><a href="about.html"
                                    class="offcanvas__sub_menu_item">About Us</a></li>
                            <li class="offcanvas__sub_menu_li"><a href="contact.html"
                                    class="offcanvas__sub_menu_item">Contact Us</a></li>
                            <li class="offcanvas__sub_menu_li"><a href="cart.html"
                                    class="offcanvas__sub_menu_item">Cart Page</a></li>
                            <li class="offcanvas__sub_menu_li"><a href="portfolio.html"
                                    class="offcanvas__sub_menu_item">Portfolio Page</a></li>
                            <li class="offcanvas__sub_menu_li"><a href="wishlist.html"
                                    class="offcanvas__sub_menu_item">Wishlist Page</a></li>
                            <li class="offcanvas__sub_menu_li"><a href="login.html"
                                    class="offcanvas__sub_menu_item">Login Page</a></li>
                            <li class="offcanvas__sub_menu_li"><a href="404.html"
                                    class="offcanvas__sub_menu_item">Error Page</a></li>
                        </ul>
                    </li>
                    <li class="offcanvas__menu_li"><a class="offcanvas__menu_item" href="about.html">About</a></li>
                    <li class="offcanvas__menu_li"><a class="offcanvas__menu_item" href="contact.html">Contact</a>
                    </li>
                </ul>
                <div class="offcanvas__account--items">
                    <a class="offcanvas__account--items__btn d-flex align-items-center" href="login.html">
                        <span class="offcanvas__account--items__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20.51" height="19.443"
                                viewBox="0 0 512 512">
                                <path
                                    d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z"
                                    fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="32" />
                                <path
                                    d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z"
                                    fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                            </svg>
                        </span>
                        <span class="offcanvas__account--items__label">Login / Register</span>
                    </a>
                </div>
                <div class="offcanvas__account--currency">
                    <a class="offcanvas__account--currency__menu text-black" href="javascript:void(0)">
                        <img src="/assets/img/icon/usd-icon.png" alt="currency">
                        <span>USD</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="9.797" height="6.05"
                            viewBox="0 0 9.797 6.05">
                            <path d="M14.646,8.59,10.9,12.329,7.151,8.59,6,9.741l4.9,4.9,4.9-4.9Z"
                                transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7" />
                        </svg>
                    </a>
                    <div class="offcanvas__account--currency__submenu">
                        <ul>
                            <li class="currency__items"><a class="currency__text" href="#">CAD</a></li>
                            <li class="currency__items"><a class="currency__text" href="#">CNY</a></li>
                            <li class="currency__items"><a class="currency__text" href="#">EUR</a></li>
                            <li class="currency__items"><a class="currency__text" href="#">GBP</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
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
