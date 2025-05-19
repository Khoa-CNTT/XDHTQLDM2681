@extends('Client.page.Account.settingmaster')
@section('settingaccount_content')
    <div class="account__wrapper">
        <div class="account__wrapper">
            <div class="account__content">
                <h2 class="account__content--title h3 mb-20">Lịch sử đơn hàng</h2>
                <div class="account__table--area">
                    <table class="account__table">
                        <thead class="account__table--header">
                            <tr class="account__table--header__child">
                                <th class="account__table--header__child--items">Mã đơn hàng</th>
                                <th class="account__table--header__child--items">Ngày đặt</th>
                                <th class="account__table--header__child--items">Trạng thái đơn hàng</th>
                                {{-- <th class="account__table--header__child--items">Fulfillment Status</th> --}}
                                <th class="account__table--header__child--items">Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody class="account__table--body mobile__none">
                            @foreach ($orders as $order)
                                <tr class="account__table--body__child">
                                    <td class="account__table--body__child--items">#{{ $order->id }}</td>
                                    <td class="account__table--body__child--items">{{ $order->created_at->format('d/m/Y H:i') }}
                                    </td>
                                    <td class="account__table--body__child--items">{{ $order->status }}</td>
                                    {{-- <td class="account__table--body__child--items">{{ $order->fulfillment_status }}</td>
                                    --}}
                                    <td class="account__table--body__child--items">{{ number_format($order->total_amount) }} đ
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tbody class="account__table--body mobile__block">
                            @foreach ($orders as $order)
                                <tr class="account__table--body__child">
                                    <td class="account__table--body__child--items">
                                        <strong>Order</strong>
                                        <span>#{{ $order->id }}</span>
                                    </td>
                                    <td class="account__table--body__child--items">
                                        <strong>Date</strong>
                                        {{-- <span>{{ $order->date->format('F j, Y') }}</span> --}}
                                    </td>
                                    <td class="account__table--body__child--items">
                                        <strong>Payment Status</strong>
                                        <span>{{ $order->payment_status }}</span>
                                    </td>
                                    {{-- <td class="account__table--body__child--items">
                                        <strong>Fulfillment Status</strong>
                                        <span>{{ $order->fulfillment_status }}</span>
                                    </td> --}}
                                    <td class="account__table--body__child--items">
                                        <strong>Total</strong>
                                        <span>${{ $order->total_amount }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
    </script>
@endsection
