<section class="hero__slider--section">
    <div class="hero__slider--inner hero__slider--activation swiper">
        <div class="hero__slider--wrapper swiper-wrapper">
              @foreach ($products as $index => $product)
                <div class="swiper-slide ">
                    <div class="hero__slider--items bg__gray--color">
                        <div class="container slider__items--container">
                            <div class="hero__slider--items__inner">
                                <div class="row row-cols-lg-2 row-cols-md-2 row-cols-1 align-items-center">
                                    <div class="col">
                                        <div class="slider__content slider__content--padding__left">
                                            <span class="slider__content--subtitle text__secondary">{{$product->Title_items}}</span>
                                            <h2 class="slider__content--maintitle h1">
                                                {{$product->Title_items}}</h2>
                                            <p class="slider__content--desc">{{$product->description}}
                                            </p>
                                            <a class="btn slider__btn" href="shop.html">Đặt món ngay</a>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="hero__slider--layer">
                                            <img class="slider__layer--img "
                                                src="{{ asset('public/image/foods/' . $product->Image) }}" alt="slider-img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="slider__pagination swiper-pagination"></div>
    </div>
</section>
