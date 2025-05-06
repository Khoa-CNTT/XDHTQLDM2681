@extends('Client.Share.master')
@section('content')
    <style>
    .restaurant__profile {
        padding: 5px 0; /* Reduced padding */
    }

    .restaurant__card {
        display: flex;
        align-items: center;
        padding: 10px; /* Smaller padding inside the card */
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #fff; /* Removed external background color */
    }

    .restaurant__logo img {
      width: 60px;
      height: 60px;
      object-fit: cover;
      border-radius: 8px; /* Bo nhẹ góc */
      border: 2px solid #ddd; /* Viền mỏng */
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Đổ bóng nhẹ */
    }

    .restaurant__name {
        font-size: 16px;
      color: #333;
      margin: 0;
    }

    .restaurant__actions button {
        font-size: 12px;
        font-weight: 600;
        border-radius: 20px;
        transition: all 0.3s ease;
        margin: 5px 0; /* Add spacing between button and other elements */
    }

    .restaurant__actions button:hover {
        opacity: 0.8;
    }
    .section--padding {
        padding: 15px 0; /* Reduced padding for sections */
    }

    .restaurant__profile {
        margin-bottom: 5px; /* Adds a small gap between sections */
    }

    .shop__section {
        margin-top: 5px; /* Keeps consistent spacing above */
    }
    </style>
    <!-- Start slider section -->
        <!-- Start breadcrumb section -->
        <div id="restaurantMap" style="height: 400px; margin: 20px auto;"></div>
        <section class="restaurant__profile section--padding">
            <div class="container">
              <div class="row align-items-start">
                <div class="d-flex">
                  <!-- Logo -->
                  <div class="restaurant__logo me-3">
                    <img
                      src="{{ asset('/image/logo/' . $restaurant->logo) }}"
                      alt="Restaurant Logo"
                      class="img-fluid"
                    />
                  </div>

                  <!-- Info: h2 + p + buttons -->
                <div class="restaurant-section">
                    <!-- Phần info nhà hàng -->
                    <div class="restaurant__info d-flex flex-column">
                        <h2 class="restaurant__name text-uppercase font-weight-bold mb-1">
                            Nhà hàng : {{ $restaurant->name }}
                        </h2>
                        <p class="status text-muted mb-2">Cửa hàng có 30 món</p>
                        <div class="restaurant__actions d-flex gap-2">
                            <button class="btn btn-danger px-3 py-1">Yêu Thích</button>
                            <button class="btn btn-outline-dark px-3 py-1">+ Theo Dõi</button>
                            <button class="btn btn-dark px-3 py-1" id="chatButton"
                                data-restaurant-id="{{ $restaurant->id }}">Chat</button>
                            <a href="/nearby" class="btn btn-dark px-3 py-1">Tìm kiếm nhà hàng gần nhất</a>
                        </div>
                    </div>

                    <!-- Khung chat (ẩn ban đầu) -->
                    <div id="chat-container" style="display: none; margin-top: 20px;">
                        <div id="chat-box">
                            @if (!empty($messages))
                                @foreach ($messages as $msg)
                                    <div class="message {{ $msg['sender'] }}">
                                        <b>{{ $msg['sender'] === 'customer' ? 'Bạn' : 'Nhà hàng' }}:</b><br>
                                        {{ $msg['message'] }}
                                        <br><small>{{ $msg['time'] ?? '' }}</small>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <form id="chat-form">
                            <input type="text" id="message" placeholder="Nhập tin nhắn..." autocomplete="off" />
                            <button type="submit">Gửi</button>
                        </form>
                    </div>
                </div>

                <!-- Styles và Pusher JS -->
                <style>
                    #chat-box {
                        border: 1px solid #ccc;
                        height: 400px;
                        overflow-y: scroll;
                        padding: 10px;
                        margin-bottom: 10px;
                        background-color: #fff;
                        border-radius: 10px;
                    }

                    .message {
                        max-width: 60%;
                        padding: 10px 15px;
                        border-radius: 15px;
                        margin: 8px 0;
                        clear: both;
                        word-wrap: break-word;
                    }

                    .customer {
                        background-color: #dcf8c6;
                        float: right;
                        text-align: right;
                        border-bottom-right-radius: 0;
                    }

                    .restaurant {
                        background-color: #e2e2e2;
                        float: left;
                        text-align: left;
                        border-bottom-left-radius: 0;
                    }

                    #chat-form {
                        display: flex;
                        gap: 10px;
                    }

                    #message {
                        flex: 1;
                        padding: 10px;
                        font-size: 16px;
                        border: 1px solid #ccc;
                        border-radius: 8px;
                    }

                    button {
                        padding: 10px 20px;
                        font-size: 16px;
                        background-color: #4CAF50;
                        color: white;
                        border: none;
                        border-radius: 8px;
                        cursor: pointer;
                    }

                    button:hover {
                        background-color: #45a049;
                    }
                </style>

                <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
                <script>
                    const chatButton = document.getElementById('chatButton');
                    const chatContainer = document.getElementById('chat-container');
                    const chatBox = document.getElementById('chat-box');
                    const form = document.getElementById('chat-form');
                    const input = document.getElementById('message');
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    const restaurantId = chatButton.dataset.restaurantId;
                    const sender = 'customer';

                    chatButton.addEventListener('click', function () {
                        chatContainer.style.display = 'block';
                        chatContainer.scrollIntoView({ behavior: 'smooth' });
                    });

                    // Kết nối Pusher
                    const pusher = new Pusher('daffc7e94b204339825f', {
                        cluster: 'ap1',
                        forceTLS: true
                    });

                    const channel = pusher.subscribe('chat.' + restaurantId);

                    channel.bind('res-message', function (data) {
                        const div = document.createElement('div');
                        div.className = 'message restaurant';
                        div.innerHTML = `<b>Nhà hàng:</b><br>${data.message}`;
                        chatBox.appendChild(div);
                        chatBox.scrollTop = chatBox.scrollHeight;
                    });

                    form.addEventListener('submit', function (e) {
                        e.preventDefault();
                        const msg = input.value.trim();
                        if (!msg) return;

                        const div = document.createElement('div');
                        div.className = 'message customer';
                        div.innerHTML = `<b>Bạn:</b><br>${msg}`;
                        chatBox.appendChild(div);
                        chatBox.scrollTop = chatBox.scrollHeight;

                        fetch('/chat/send', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                                'X-CSRF-TOKEN': csrfToken
                            },
                            body: `message=${encodeURIComponent(msg)}&sender=customer&restaurant_id=${restaurantId}`
                        })
                            .then(response => response.json())
                            .then(data => console.log('Server response:', data))
                            .catch(error => console.error('Error sending message:', error));

                        input.value = '';
                    });
                </script>

                </div>
              </div>
            </div>
          </section>
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
                        <span class="widget__filter--btn__text">Filter</span>
                    </button>
                    <div class="product__view--mode d-flex align-items-center">
                        <div class="product__view--mode__list product__short--by align-items-center d-none d-lg-flex">
                            <label class="product__view--label">Sắp xếp :</label>
                            <div class="select shop__header--select">
                                <form method="GET" action="{{ route('restaurant.menu', ['id' => $restaurant->id]) }}">
                                    <select name="sort" class="product__view--select" onchange="this.form.submit()">
                                        <option value="">Mặc định</option>
                                        <option value="newness" {{ request('sort') == 'newness' ? 'selected' : '' }}>Mới nhất</option>
                                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Giá thấp nhất</option>
                                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Giá cao nhất</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <div class="product__view--mode__list product__view--search d-xl-block d-none ">
                            <form class="product__view--search__form" action="#">
                                <label>
                                    <input class="product__view--search__input border-0" placeholder="Search by"
                                        type="text">
                                </label>
                                <button class="product__view--search__btn" aria-label="search btn" type="submit">
                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"
                                        width="22.51" height="20.443" viewBox="0 0 512 512">
                                        <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                            fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32">
                                        </path>
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    <p class="product__showing--count">Showing 1–9 of 21 results</p>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-4">
                        <div class="shop__sidebar--widget widget__area d-none d-lg-block">
                            <div class="single__widget widget__bg">
                                <a href="{{ route('restaurant.menu', ['id' => $restaurant->id]) }}">
                                <h2 class="widget__title h3">Danh mục của nhà hàng</h2>
                                </a>
                                <ul class="widget__categories--menu">
                                    @foreach ($categories as $category)
                                    <li class="widget__categories--menu__list py-2 px-2">
                                        <a href="{{ route('restaurant.menu.category', ['id' => $restaurant->id, 'category_id' => $category->id]) }}">
                                        <label class="widget__categories--menu__label d-flex align-items-center">
                                            <span class="widget__categories--menu__text">{{$category->title}}</span>
                                        </label>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
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
                                            @foreach ($results as $result)
                                            <div class="col mb-30">
                                                <div class="product__items product__items2">
                                                    <div class="product__items--thumbnail">
                                                        <a class="product__items--link" href="{{ route('menu.item.detail', ['id' => $result->id])}}">
                                                            <img class="product__items--img product__primary--img"
                                                                src="{{asset('public/image/foods/' . $result->Image) }}" alt="product-img" style="width: 250px; height: 170px; object-fit: cover;">
                                                            <img class="product__items--img product__secondary--img"
                                                                src="{{asset('public/image/foods/' . $result->Image) }}" alt="product-img" style="width: 250px; height: 170px; object-fit: cover;">
                                                        </a>
                                                        <div class="product__badge">
                                                            <span class="product__badge--items sale">Sale</span>
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
                                                        <a class="add__to--cart__btn" href=  "{{ route('cart.add', $result->id) }}">+ Add to cart</a>
                                                        <h3 class="product__items--content__title h4"><a
                                                                href="product-details.html">{{$result->Title_items}}</a></h3>
                                                        <div class="product__items--price">
                                                            <span class="current__price">{{$result->Price}}</span>
                                                            <span class="old__price">$59.00</span>
                                                        </div>
                                                        <div
                                                            class="product__items--rating d-flex justify-content-center align-items-center">
                                                            <ul class="d-flex">
                                                                <li class="product__items--rating__list">
                                                                    <span class="product__items--rating__icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="10.105" height="9.732"
                                                                            viewBox="0 0 10.105 9.732">
                                                                            <path data-name="star - Copy"
                                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                                transform="translate(0 -0.018)"
                                                                                fill="currentColor"></path>
                                                                        </svg>
                                                                    </span>
                                                                </li>
                                                                <li class="product__items--rating__list">
                                                                    <span class="product__items--rating__icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="10.105" height="9.732"
                                                                            viewBox="0 0 10.105 9.732">
                                                                            <path data-name="star - Copy"
                                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                                transform="translate(0 -0.018)"
                                                                                fill="currentColor"></path>
                                                                        </svg>
                                                                    </span>
                                                                </li>
                                                                <li class="product__items--rating__list">
                                                                    <span class="product__items--rating__icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="10.105" height="9.732"
                                                                            viewBox="0 0 10.105 9.732">
                                                                            <path data-name="star - Copy"
                                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                                transform="translate(0 -0.018)"
                                                                                fill="currentColor"></path>
                                                                        </svg>
                                                                    </span>
                                                                </li>
                                                                <li class="product__items--rating__list">
                                                                    <span class="product__items--rating__icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="10.105" height="9.732"
                                                                            viewBox="0 0 10.105 9.732">
                                                                            <path data-name="star - Copy"
                                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                                transform="translate(0 -0.018)"
                                                                                fill="currentColor"></path>
                                                                        </svg>
                                                                    </span>
                                                                </li>
                                                                <li class="product__items--rating__list">
                                                                    <span class="product__items--rating__icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="10.105" height="9.732"
                                                                            viewBox="0 0 10.105 9.732">
                                                                            <path data-name="star - Copy"
                                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                                transform="translate(0 -0.018)"
                                                                                fill="#c7c5c2"></path>
                                                                        </svg>
                                                                    </span>
                                                                </li>
                                                            </ul>
                                                            <span class="product__items--rating__count--number">(24)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            <!-- dừng -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pagination__area bg__gray--color">
                                <nav class="pagination justify-content-center">
                                    <ul class="pagination__wrapper d-flex align-items-center justify-content-center">
                                        <li class="pagination__list">
                                            <a href="shop.html" class="pagination__item--arrow  link ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443"
                                                    viewBox="0 0 512 512">
                                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="48"
                                                        d="M244 400L100 256l144-144M120 256h292"></path>
                                                </svg>
                                                <span class="visually-hidden">page left arrow</span>
                                            </a>
                                        </li>
                                        <li>
                                        </li>
                                        <li class="pagination__list"><span
                                                class="pagination__item pagination__item--current">1</span></li>
                                        <li class="pagination__list"><a href="shop.html" class="pagination__item link">2</a>
                                        </li>
                                        <li class="pagination__list"><a href="shop.html" class="pagination__item link">3</a>
                                        </li>
                                        <li class="pagination__list"><a href="shop.html" class="pagination__item link">4</a>
                                        </li>
                                        <li class="pagination__list">
                                            <a href="shop.html" class="pagination__item--arrow  link ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443"
                                                    viewBox="0 0 512 512">
                                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="48"
                                                        d="M268 112l144 144-144 144M392 256H100"></path>
                                                </svg>
                                                <span class="visually-hidden">page right arrow</span>
                                            </a>
                                        </li>
                                        <li>
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
@endsection
    @section('js')
    <script>
        const chatButton = document.getElementById('chatButton');
        console.log(chatButton);
        chatButton.addEventListener('click', function () {
            const restaurantId = chatButton.getAttribute('data-restaurant-id');

            window.location.href = `/chat/${restaurantId}`;
        });
    </script>
    <!-- Leaflet CSS & JS -->


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const lat = {{ $restaurant->locations[0]->Latitude ?? 0 }};
            const lng = {{ $restaurant->locations[0]->Longitude ?? 0 }};
            const address = `{{ $restaurant->locations[0]->Address ?? 'Không có địa chỉ' }}, {{ $restaurant->locations[0]->Ward ?? '' }}, {{ $restaurant->locations[0]->District ?? '' }}, {{ $restaurant->locations[0]->City ?? '' }}`;

            const map = L.map('restaurantMap').setView([lat, lng], 16);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            L.marker([lat, lng])
                .addTo(map)
                .bindPopup(address)
                .openPopup();
        });
    </script>

@endsection
