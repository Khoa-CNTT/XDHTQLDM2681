@extends('Client.Share.master')
@section('content')

    <div class="checkout__page--area">
        <div class="container">
            <div class="checkout__page--inner d-flex">
                <div class="main checkout__mian">
                <header class="main__header checkout__mian--header mb-30">
                    <a class="logo logo__left mb-20" href="index.html">
                        <img src="assets/img/logo/nav-log.png" alt="logo">
                    </a>
                    <details class="order__summary--mobile__version">
                        <summary class="order__summary--toggle border-radius-5">
                            <span class="order__summary--toggle__inner">
                                <span class="order__summary--toggle__icon">
                                    <!-- Biểu tượng giỏ hàng -->
                                    <svg width="20" height="19" xmlns="http://www.w3.org/2000/svg">
                                        <path d="..." fill="currentColor"></path>
                                    </svg>
                                </span>
                                <span class="order__summary--toggle__text show">
                                    <span>Hiển thị tóm tắt đơn hàng</span>
                                    <svg width="11" height="6" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__dropdown"
                                        fill="currentColor">
                                        <path d="..."></path>
                                    </svg>
                                </span>
                                <span class="order__summary--final__price">227,70 ₫</span>
                            </span>
                        </summary>
                        <div class="order__summary--section">
                            <div class="cart__table checkout__product--table">
                                <table class="summary__table">
                                    <tbody class="summary__table--body">
                                        <tr class="summary__table--items">
                                            <td class="summary__table--list">
                                                <div class="product__image two d-flex align-items-center">
                                                    <div class="product__thumbnail border-radius-5">
                                                        <a href="product-details.html"><img class="border-radius-5"
                                                                src="assets/img/product/small-product7.png" alt="cart-product"></a>
                                                        <span class="product__thumbnail--quantity">1</span>
                                                    </div>
                                                    <div class="product__description">
                                                        <h3 class="product__description--name h4"><a href="product-details.html">Cá tươi
                                                                nguyên con</a></h3>
                                                        <span class="product__description--variant">MÀU: Xanh</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="summary__table--list">
                                                <span class="cart__price">£65.00</span>
                                            </td>
                                        </tr>
                                        <tr class="summary__table--items">
                                            <td class="summary__table--list">
                                                <div class="cart__product d-flex align-items-center">
                                                    <div class="product__thumbnail border-radius-5">
                                                        <a href="product-details.html"><img class="border-radius-5"
                                                                src="assets/img/product/small-product2.png" alt="cart-product"></a>
                                                        <span class="product__thumbnail--quantity">1</span>
                                                    </div>
                                                    <div class="product__description">
                                                        <h3 class="product__description--name h4"><a href="product-details.html">Rau củ
                                                                sạch</a></h3>
                                                        <span class="product__description--variant">MÀU: Xanh lá</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="summary__table--list">
                                                <span class="cart__price">£82.00</span>
                                            </td>
                                        </tr>
                                        <tr class="summary__table--items">
                                            <td class="summary__table--list">
                                                <div class="cart__product d-flex align-items-center">
                                                    <div class="product__thumbnail border-radius-5">
                                                        <a href="product-details.html"><img class="border-radius-5"
                                                                src="assets/img/product/small-product4.png" alt="cart-product"></a>
                                                        <span class="product__thumbnail--quantity">1</span>
                                                    </div>
                                                    <div class="product__description">
                                                        <h3 class="product__description--name h4"><a href="product-details.html">Hành
                                                                tươi</a></h3>
                                                        <span class="product__description--variant">MÀU: Trắng</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="summary__table--list">
                                                <span class="cart__price">£78.00</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="checkout__discount--code">
                                <form class="d-flex" action="#">
                                    <label>
                                        <input class="checkout__discount--code__input--field border-radius-5"
                                            placeholder="Mã giảm giá hoặc thẻ quà tặng" type="text">
                                    </label>
                                    <button class="checkout__discount--code__btn btn border-radius-5" type="submit">Áp dụng</button>
                                </form>
                            </div>
                            <div class="checkout__total">
                                <table class="checkout__total--table">
                                    <tbody class="checkout__total--body">
                                        <tr class="checkout__total--items">
                                            <td class="checkout__total--title text-left">Tạm tính</td>
                                            <td class="checkout__total--amount text-right">$860.00</td>
                                        </tr>
                                        <tr class="checkout__total--items">
                                            <td class="checkout__total--title text-left">Phí vận chuyển</td>
                                            <td class="checkout__total--calculated__text text-right">Sẽ được tính ở bước tiếp theo</td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="checkout__total--footer">
                                        <tr class="checkout__total--footer__items">
                                            <td class="checkout__total--footer__title checkout__total--footer__list text-left">Tổng cộng
                                            </td>
                                            <td class="checkout__total--footer__amount checkout__total--footer__list text-right">$860.00
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </details>
                    <nav>
                        <ol class="breadcrumb checkout__breadcrumb d-flex">
                            <li class="breadcrumb__item breadcrumb__item--completed d-flex align-items-center">
                            <a class="breadcrumb__link" href="{{ route('cart.index') }}">Giỏ hàng</a>

                                <svg class="readcrumb__chevron-icon" ...></svg>
                            </li>
                            <li class="breadcrumb__item breadcrumb__item--current d-flex align-items-center">
                                <a class="breadcrumb__link" href="{{ route('account.information') }}">Thông tin</a>
                                <svg class="readcrumb__chevron-icon" ...></svg>
                            </li>
                            <li class="breadcrumb__item breadcrumb__item--blank d-flex align-items-center">
                                <a class="breadcrumb__link" href="{{ route('cart.index') }}">Giao hàng</a>
                                <svg class="readcrumb__chevron-icon" ...></svg>
                            </li>
                            <li class="breadcrumb__item breadcrumb__item--blank">
                                <span class="breadcrumb__text current">Thanh toán</span>
                            </li>
                        </ol>
                    </nav>
                </header>

                <main class="main__content_wrapper section--padding pt-0">
                    <form action="#">
                        <div class="checkout__content--step checkout__contact--information2 border-radius-5">
                            <div class="checkout__review d-flex justify-content-between align-items-center">
                                <div class="checkout__review--inner d-flex align-items-center">
                                    <label class="checkout__review--label">Liên hệ</label>
                                    <span class="checkout__review--content">info42@gmail.com</span>
                                </div>
                                <div class="checkout__review--link">
                                    <button class="checkout__review--link__text" type="button">Thay đổi</button>
                                </div>
                            </div>
                            <div class="checkout__review d-flex justify-content-between align-items-center">
                                <div class="checkout__review--inner d-flex align-items-center">
                                    <label class="checkout__review--label">Giao đến</label>
                                    <span class="checkout__review--content">Dhaka, Dhaka 1219, Bangladesh</span>
                                </div>
                                <div class="checkout__review--link">
                                    <button class="checkout__review--link__text" type="button">Thay đổi</button>
                                </div>
                            </div>
                            <div class="checkout__review d-flex justify-content-between align-items-center">
                                <div class="checkout__review--inner d-flex align-items-center">
                                    <label class="checkout__review--label">Phương thức</label>
                                    <span class="checkout__review--content">Tiêu chuẩn . <strong>$0.23</strong></span>
                                </div>
                                <div class="checkout__review--link">
                                    <button class="checkout__review--link__text" type="button">Thay đổi</button>
                                </div>
                            </div>
                        </div>


                        <div class="checkout__content--step section__shipping--address pt-10">
                            <div class="section__header mb-25">
                                <h2 class="section__header--title h3">Địa chỉ thanh toán</h2>
                                <p class="section__header--desc">Chọn địa chỉ khớp với thẻ hoặc phương thức thanh toán của bạn.</p>
                            </div>
                            <div class="checkout__content--step__inner3 border-radius-5">
                                <div class="checkout__address--content__header">
                                    <div class="shipping__contact--box__list">
                                        <div class="shipping__radio--input">
                                            <input class="shipping__radio--input__field" id="radiobox" name="checkmethod" type="radio">
                                        </div>
                                        <label class="shipping__radio--label" for="radiobox">
                                            <span class="shipping__radio--label__primary">Giống địa chỉ giao hàng</span>
                                        </label>
                                    </div>
                                    <div class="shipping__contact--box__list">
                                        <div class="shipping__radio--input">
                                            <input class="shipping__radio--input__field" id="radiobox2" name="checkmethod" type="radio">
                                        </div>
                                        <label class="shipping__radio--label" for="radiobox2">
                                            <span class="shipping__radio--label__primary">Dùng địa chỉ thanh toán khác</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="checkout__content--input__box--wrapper ">
                                    <div class="row">
                                        <div class="col-lg-6 mb-12">
                                            <div class="checkout__input--list ">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5"
                                                        placeholder="Tên (không bắt buộc)" type="text">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Số điện thoại" type="text">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Địa chỉ"
                                                        type="text">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5"
                                                        placeholder="Địa chỉ cụ thể..." type="text">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Thành phố"
                                                        type="text">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-12">
                                            <div class="checkout__input--list checkout__input--select select">
                                                <label class="checkout__select--label" for="country"> Khu vực</label>
                                                <select class="checkout__input--select__field border-radius-5" id="country">
                                                    <option value="1">Ấn Độ</option>
                                                    <option value="2">Hoa Kỳ</option>
                                                    <option value="3">Hà Lan</option>
                                                    <option value="4">Afghanistan</option>
                                                    <option value="5">Quần đảo</option>
                                                    <option value="6">Albania</option>
                                                    <option value="7">Antigua và Barbuda</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Mã bưu chính"
                                                        type="text">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </main>


                </div>
                <aside class="checkout__sidebar sidebar">
                    <div class="cart__table checkout__product--table">
                        <table class="cart__table--inner">
                            <tbody class="cart__table--body">
                                <tr class="cart__table--body__items">
                                    <td class="cart__table--body__list">
                                        <div class="product__image two d-flex align-items-center">
                                            <div class="product__thumbnail border-radius-5">
                                                <a href="product-details.html"><img class="border-radius-5"
                                                        src="assets/img/product/small-product7.png" alt="cart-product"></a>
                                                <span class="product__thumbnail--quantity">1</span>
                                            </div>
                                            <div class="product__description">
                                                <h3 class="product__description--name h4">
                                                    <a href="product-details.html">Cá tươi nguyên con</a>
                                                </h3>
                                                <span class="product__description--variant">MÀU: Xanh dương</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__table--body__list">
                                        <span class="cart__price">£65.00</span>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                    <div class="checkout__discount--code">
                        <form class="d-flex" action="#">
                            <label>
                                <input class="checkout__discount--code__input--field border-radius-5"
                                    placeholder="Mã giảm giá hoặc thẻ quà tặng" type="text">
                            </label>
                            <button class="checkout__discount--code__btn btn border-radius-5" type="submit">Áp dụng</button>
                        </form>
                    </div>

                    <div class="checkout__total">
                        <table class="checkout__total--table">
                            <tbody class="checkout__total--body">
                                <tr class="checkout__total--items">
                                    <td class="checkout__total--title text-left">Tạm tính</td>
                                    <td class="checkout__total--amount text-right">$860.00</td>
                                </tr>
                                <tr class="checkout__total--items">
                                    <td class="checkout__total--title text-left">Phí vận chuyển</td>
                                    <td class="checkout__total--calculated__text text-right">Tính ở bước tiếp theo</td>
                                </tr>
                            </tbody>
                            <tfoot class="checkout__total--footer">
                                <tr class="checkout__total--footer__items">
                                    <td class="checkout__total--footer__title checkout__total--footer__list text-left">Tổng cộng</td>
                                    <td class="checkout__total--footer__amount checkout__total--footer__list text-right">
                                        $860.00</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </aside>

            </div>
        </div>
    </div>
@endsection
