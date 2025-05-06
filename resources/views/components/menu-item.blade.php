<div class="col md-28">
    <div class="product__items">
        <div class="product__items--thumbnail">
            <a class="product__items--link" href="{{ route('menu.item.detail', ['id' => $item->id]) }}">
                <img class="product__items--img product__primary--img"
                    src="{{ asset('public/image/foods/' . $item->Image) }}" alt="product-img"
                    style="width: 250px; height: 170px; object-fit: cover;">
                <img class="product__items--img product__secondary--img"
                    src="{{ asset('public/image/foods/' . $item->Image) }}" alt="product-img"
                    style="width: 200px; height: 200px; object-fit: cover;">
            </a>
            <div class="product__badge">
                <span class="product__badge--items sale">Đang bán</span>
            </div>
            <ul class="product__items--action">
                <!-- Các nút wishlist, quick view, compare -->
                <!-- ... giữ nguyên như cũ -->
            </ul>
        </div>
        <div class="product__items--content text-center">
            <a href="{{ route('cart.add', $item->id) }}" class="add__to--cart__btn">+ Thêm vào giỏ</a>
            <h3 class="product__items--content__title h4">
                <a href="{{ route('menu.item.detail', ['id' => $item->id]) }}">{{ $item->Title_items }}</a>
            </h3>
            <div class="product__items--price">
                {{ number_format($item->Price, 0, ',', '.') }} đ
                <span class="old__price">{{ number_format($item->OldPrice, 0, ',', '.') }} đ</span>
            </div>
        </div>
    </div>
</div>
