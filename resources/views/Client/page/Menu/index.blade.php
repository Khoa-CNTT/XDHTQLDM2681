@extends('Client.Share.master')
@section('content')
            <!-- Start slider section -->
                <!-- Start breadcrumb section -->
                <section class="breadcrumb__section breadcrumb__bg">
                    <div class="container">
                        <div class="row row-cols-1">
                            <div class="col">
                                <div class="breadcrumb__content text-center">
                                    <h1 class="breadcrumb__content--title text-white mb-25">Thực đơn</h1>
                                    <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                        <li class="breadcrumb__content--menu__items"><a class="text-white"
                                                href="/">Trang chủ</a></li>
                                        <li class="breadcrumb__content--menu__items"><span class="text-white">Thực đơn</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End breadcrumb section -->

                <!-- Start shop section -->
                <section class="shop__section section--padding">
                    <div class="container-fluid">
                        <div class="shop__header bg__gray--color d-flex align-items-center justify-content-between mb-30">
                            <button class="widget__filter--btn d-flex d-lg-none align-items-center" data-offcanvas="">
                                <svg class="widget__filter--btn__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="28" d="M368 128h80M64 128h240M368 384h80M64 384h240M208 256h240M64 256h80">
                                    </path>
                                    <circle cx="336" cy="128" r="28" fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="28"></circle>
                                    <circle cx="176" cy="256" r="28" fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="28"></circle>
                                    <circle cx="336" cy="384" r="28" fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="28"></circle>
                                </svg>
                                <span class="widget__filter--btn__text">Lọc</span>
                            </button>
                            <div class="product__view--mode d-flex align-items-center">

                                <div class="product__view--mode__list product__short--by align-items-center d-none d-lg-flex">
                                    <label class="product__view--label">Sắp xếp:</label>
                                    <div class="select shop__header--select">
                                        <form method="GET" action="{{ route('menu.item.index') }}">
                                            <select name="sort" class="product__view--select" onchange="this.form.submit()">
                                                <option value="">Mặc định</option>
                                                <option value="newness" {{ request('sort') == 'newness' ? 'selected' : '' }}>Mới nhất</option>
                                                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Giá thấp nhất</option>
                                                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Giá cao nhất</option>
                                            </select>

                                            @if(request()->has('query'))
                                                <input type="hidden" name="query" value="{{ request('query') }}">
                                            @endif
                                        </form>
                                    </div>
                                </div>

                            <div class="product__view--mode__list product__view--search d-xl-block d-none">
                                <form class="product__view--search__form" action="{{ route('menu-items.search') }}" method="GET">
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
                      <p class="product__showing--count">

            Hiển thị từ {{ $results->firstItem() }} đến {{ $results->lastItem() }} trong tổng số {{ $results->total() }} kết quả
        </p>

                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-lg-4">
                                <div class="shop__sidebar--widget widget__area d-none d-lg-block">
                                    <div class="single__widget widget__bg">
                                        <h2 class="widget__title h3">
                                            <a href="{{route('menu.item.index')}}">
                                                Danh mục
                                                </a>
                                        </h2>
                                    <ul class="widget__categories--menu">
                                        @foreach ($categories as $category)
                                            <li class="widget__categories--menu__list py-2 px-2">
                                                <a href="{{route('menu-items.category', ['id' => $category->id])}}">
                                                <label class="widget__categories--menu__label d-flex align-items-center">
                                                    <span class="widget__categories--menu__text">{{ $category->title }}</span>
                                                </label>
                                               </a>
                                            </li>
                                        @endforeach
                                    </ul>

                                    </div>
                                    <div class="single__widget widget__bg">
                                        <h2 class="widget__title h3">Món ăn yêu thích</h2>
                                        <ul class="widget__form--check">
                                            @foreach ($categories as $category)
                                            <li class="widget__form--check__list">

                                                <label class="widget__form--check__label" for="check1">{{$category->title}}</label>
                                                <input class="widget__form--check__input" id="check1" type="checkbox">
                                                <span class="widget__form--checkmark"></span>

                                            </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                   <form class="price__filter--form" action="{{ route('menu.item.index') }}" method="GET">
        <div class="price__filter--form__inner mb-15 d-flex align-items-center">
            <div class="price__filter--group">
                <label class="price__filter--label" for="Filter-Price-GTE2">Từ</label>
                <div class="price__filter--input border-radius-5 d-flex align-items-center">
                    <span class="price__filter--currency">$</span>
                    <input class="price__filter--input__field border-0"
                        name="min_price" id="Filter-Price-GTE2" type="number"
                        placeholder="0" min="0" max="2500000">
                </div>
            </div>
            <div class="price__divider">
                <span>-</span>
            </div>
            <div class="price__filter--group">
                <label class="price__filter--label" for="Filter-Price-LTE2">Đến</label>
                <div class="price__filter--input border-radius-5 d-flex align-items-center">
                    <span class="price__filter--currency">$</span>
                    <input class="price__filter--input__field border-0"
                        name="max_price" id="Filter-Price-LTE2" type="number" min="0"
                        placeholder="250.000" max="250.000">
                </div>
            </div>
        </div>
        <button class="btn price__filter--btn" type="submit">Lọc</button>
    </form>

                                @if(count($relatedItems) > 0)
                                    <div class="single__widget widget__bg mt-4">
                                        <h2 class="widget__title h3">Món ăn liên quan</h2>
                                        <div class="product__grid--inner">
                                            @foreach ($relatedItems as $item)
                                                <div class="product__grid--items d-flex align-items-center mb-3">
                                                    <div class="product__grid--items--thumbnail">
                                                        <a class="product__items--link" href="{{ route('menu.item.detail', $item->id) }}">
                                                            <img class="product__grid--items__img product__primary--img"
                                                                 src="{{ asset('public/public/image/foods/' . $item->Image) }}" alt="categories-img"> {{ $item->Title_items }}>
                                                        </a>
                                                    </div>
                                                    <div class="product__grid--items--content">
                                                        <h3 class="product__grid--items--content__title h4">
                                                            <a href="{{ route('menu.item.detail', $item->id) }}">{{ $item->Title_items }}</a>
                                                        </h3>
                                                        <div class="product__items--price">
                                                            <span class="current__price">{{ number_format($item->Price, 0, ',', '.') }} VNĐ</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif


                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-8">
                                <div class="shop__product--wrapper">
                                    <div class="tab_content">
                                        <div id="product_grid" class="tab_pane active show">
                                            <div class="product__section--inner product__section--style3__inner">
                                                <div
                                                    class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-3 row-cols-sm-3 row-cols-2 mb--n30">
                                                    <!-- menu  -->
                                                    @if ($results->count() > 0)
                                                        @foreach ($results as $result)
                                                                                                                        <div class="col mb-30">
                                                                                                                            <div class="product__items product__items2">
                                                                                                                                <div class="product__items--thumbnail">
                                                                                                                                    <a class="product__items--link" href="{{ route('menu.item.detail', ['id' => $result->id])}}">
                                                                                                                                        <img class="product__items--img product__primary--img"
                                                                                                                                            src="{{asset('public/public/image/foods/' . $result->Image) }}" alt="product-img"
                                                                                                                                            style="width: 250px; height: 170px; object-fit: cover;">
                                                                                                                                        <img class="product__items--img product__secondary--img"
                                                                                                                                            src="{{asset('public/public/image/foods/' . $result->Image) }}" alt="product-img"
                                                                                                                                            style="width: 250px; height: 170px; object-fit: cover;">
                                                                                                                                    </a>
                                                                                                                                    <div class="product__badge">
                                                                                                                                        <span class="product__badge--items sale">bán chạy</span>
                                                                                                                                    </div>
                                                                                                                                    <ul class="product__items--action">
                                                                                                                                        <li class="product__items--action__list">
                                                                                                                                            <a class="product__items--action__btn" href="wishlist.html">
                                                                                                                                                <svg class="product__items--action__btn--svg"
                                                                                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                                                                                    viewBox="0 0 512 512">
                                                                                                                                                    <path
                                                                                                                                                        d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                                                                                                        fill="none" stroke="currentColor"
                                                                                                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                                                                                                        stroke-width="32"></path>
                                                                                                                                                </svg>
                                                                                                                                                <span class="visually-hidden">Wishlist</span>
                                                                                                                                            </a>
                                                                                                                                        </li>
                                                                                                                                        <li class="product__items--action__list">
                                                                                                                                            <a class="product__items--action__btn" data-open="modal1"
                                                                                                                                                href="javascript:void(0)">
                                                                                                                                                <svg class="product__items--action__btn--svg"
                                                                                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                                                                                    viewBox="0 0 512 512">
                                                                                                                                                    <path
                                                                                                                                                        d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                                                                                                        fill="none" stroke="currentColor"
                                                                                                                                                        stroke-miterlimit="10" stroke-width="32"></path>
                                                                                                                                                    <path fill="none" stroke="currentColor"
                                                                                                                                                        stroke-linecap="round" stroke-miterlimit="10"
                                                                                                                                                        stroke-width="32" d="M338.29 338.29L448 448">
                                                                                                                                                    </path>
                                                                                                                                                </svg>
                                                                                                                                                <span class="visually-hidden">Quick View</span>
                                                                                                                                            </a>
                                                                                                                                        </li>
                                                                                                                                        <li class="product__items--action__list">
                                                                                                                                            <a class="product__items--action__btn" href="compare.html">
                                                                                                                                                <svg class="product__items--action__btn--svg"
                                                                                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                                                                                    viewBox="0 0 512 512">
                                                                                                                                                    <path fill="none" stroke="currentColor"
                                                                                                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                                                                                                        stroke-width="32"
                                                                                                                                                        d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256">
                                                                                                                                                    </path>
                                                                                                                                                    <path
                                                                                                                                                        d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                                                                                                                                        fill="none" stroke="currentColor"
                                                                                                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                                                                                                        stroke-width="32"></path>
                                                                                                                                                </svg>
                                                                                                                                                <span class="visually-hidden">Compare</span>
                                                                                                                                            </a>
                                                                                                                                        </li>
                                                                                                                                    </ul>
                                                                                                                                </div>
                                                                                                                                <div
                                                                                                                                    class="product__items--content product__items2--content text-center">
                                                                                                                                    <a class="add__to--cart__btn" href=  "{{ route('cart.add', $result->id) }}">+ Thêm vào giỏ hàng</a>
                                                                                                                                    <h3 class="product__items--content__title h4"><a
                                                                                                                                            href="product-details.html">{{$result->Title_items}}</a></h3>
                                                                                                                                    <div class="product__items--price">
                                                                                                                                        <span class="current__price">{{ number_format($result->Price, 0, ',', '.') }}₫</span>
                                                                                                                                        <span class="old__price">{{ number_format($result->OldPrice, 0, ',', '.') }}₫</span>
                                                                                                                                    </div>

                                                                                                                                    <div
                                                                                                                                        class="product__items--rating d-flex justify-content-center align-items-center">
                                                            <div class="product__items--rating d-flex justify-content-center align-items-center">
                                                                <ul class="d-flex">
                                                                    @for ($i = 1; $i <= 5; $i++)
                                                                        <li class="product__items--rating__list">
                                                                            <span class="product__items--rating__icon {{ $i <= $result->most_common_rating ? '' : 'text-muted' }}">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732" viewBox="0 0 10.105 9.732">
                                                                                    <path
                                                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                                        fill="currentColor" />
                                                                                </svg>
                                                                            </span>
                                                                        </li>
                                                                    @endfor
                                                                </ul>
                                                            </div>


                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                        @endforeach
                                                    @else
        <div class="col-12 text-center">
            <h3>Danh mục này hiện chưa có món</h3>
        </div>
    @endif
                                                    <!-- dừng -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Pagination -->
        <div class="pagination__area bg__gray--color">
            <nav class="pagination justify-content-center">
                <ul class="pagination__wrapper d-flex align-items-center justify-content-center">
                    <!-- Mũi tên trái -->
                    <li class="pagination__list">
                        @if ($results->onFirstPage())
                            <span class="pagination__item--arrow disabled">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="48"
                                        d="M244 400L100 256l144-144M120 256h292"></path>
                                </svg>
                            </span>
                        @else
                            <a href="{{ $results->previousPageUrl() }}" class="pagination__item--arrow link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="48"
                                        d="M244 400L100 256l144-144M120 256h292"></path>
                                </svg>
                            </a>
                        @endif
                    </li>

                    <!-- Các số trang -->
                    @foreach ($results->getUrlRange(1, $results->lastPage()) as $page => $url)
                        <li class="pagination__list">
                            @if ($page == $results->currentPage())
                                <span class="pagination__item pagination__item--current">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="pagination__item link">{{ $page }}</a>
                            @endif
                        </li>
                    @endforeach

                    <!-- Mũi tên phải -->
                    <li class="pagination__list">
                        @if ($results->hasMorePages())
                            <a href="{{ $results->nextPageUrl() }}" class="pagination__item--arrow link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="48"
                                        d="M268 112l144 144-144 144M392 256H100"></path>
                                </svg>
                            </a>
                        @else
                            <span class="pagination__item--arrow disabled">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="48"
                                        d="M268 112l144 144-144 144M392 256H100"></path>
                                </svg>
                            </span>
                        @endif
                    </li>
                </ul>
            </nav>
        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End shop section -->

                <!-- Start shipping section -->

                <!-- End shipping section -->
@endsection
