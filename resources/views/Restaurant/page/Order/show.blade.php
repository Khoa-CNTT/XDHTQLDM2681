@extends('Restaurant.share.master')

@section('noi_dung')
    <div class="container">
        <h1>Chi tiết Đơn Hàng #{{ $order->id }}</h1>

        <div class="card mb-4">
            <div class="card-header">
                Thông tin đơn hàng
            </div>
            <div class="card-body">
                <p><strong>Khách hàng:</strong> {{ $order->user->username }} ({{ $order->user->PhoneNumber }})</p>
                <p><strong>Trạng thái:</strong> {{ $order->status }}</p>
                <p><strong>Thời gian đặt:</strong> {{ $order->created_at }}</p>
            <p><strong>Thanh toán:</strong> {{ $order->is_payment ? 'Đã thanh toán' : 'Chưa thanh toán' }}</p>

            </div>
        </div>

        <h4>Danh sách các món ăn</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tên món</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Thời gian chuẩn bị</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderDetails as $detail)
                                    @php
    $thanhTien = $detail->menuItem->Price * $detail->quantity_ordered;
                                    @endphp
                                    <tr>
                                        <td>{{ $detail->menuItem->Title_items }}</td>
                                        <td>{{ number_format($detail->menuItem->Price, 0, ',', '.') }} đ</td>
                                        <td>{{ $detail->quantity_ordered }}</td>
                                        <td>{{ number_format($thanhTien, 0, ',', '.') }} đ</td>
                                        <td>{{ $detail->menuItem->preparation_time }} phút</td>
                                    </tr>
                @endforeach
            </tbody>
        </table>

        <h5 class="text-end">Phí vận chuyển: <strong>{{ number_format($order->delivery_fee, 0, ',', '.') }} đ</strong></h5>
        <h5 class="text-end">Tổng cộng: <strong>{{ number_format($order->total_amount, 0, ',', '.') }} đ</strong></h5>
    <div class="mt-3">
        @if ($order->status == 'xác nhận món')
            <form action="{{ route('restaurant.order.accept', $order->id) }}" method="POST" style="display:inline-block">
                @csrf
                <button class="btn btn-success">✔ Nhận đơn</button>
            </form>
            <form action="{{ route('restaurant.order.reject', $order->id) }}" method="POST" style="display:inline-block">
                @csrf
                <button class="btn btn-danger">✖ Từ chối</button>
            </form>
        @elseif ($order->status == 'đang chuẩn bị')
            <form action="{{ route('restaurant.order.ready', $order->id) }}" method="POST" style="display:inline-block">
                @csrf
                <button class="btn btn-warning">✅ Đã chế biến xong và đang chờ shipper nhận đơn</button>
            </form>
       @elseif ($order->status == 'chờ shipper nhận')
    <form action="{{ route('restaurant.order.shipping', $order->id) }}" method="POST" style="display:inline-block">
        @csrf
        <button class="btn btn-info">🚚 Shipper đã nhận và đang giao</button>
    </form>


        @elseif ($order->status == 'đã từ chối')
            <div class="alert alert-danger mt-3">Đơn hàng đã bị từ chối.</div>
        @else
            <div class="alert alert-secondary mt-3">Trạng thái hiện tại: {{ $order->status }}</div>
        @endif
    </div>

        <a href="{{ route('orders.index') }}" class="btn btn-primary mt-3">Quay lại</a>
    </div>
@endsection
