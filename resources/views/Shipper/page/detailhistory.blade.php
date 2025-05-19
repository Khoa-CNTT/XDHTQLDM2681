@extends('Shipper.share.master')
@section('content')
    <div class="bg-light">

    <div class="container mt-4">
        <button class="btn btn-secondary mb-3" onclick="window.history.back()">← Quay lại</button>

        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title">🆔 Đơn hàng #{{ $order->id }}</h4>
                <p>📅 Ngày giao:
                    <strong>{{ $order->delivery_date ? $order->delivery_date->format('d/m/Y') : 'Chưa có' }}</strong></p>
                <p>💰 Tổng tiền: <strong>{{ number_format($order->total_amount, 0, ',', '.') }} VNĐ</strong></p>
                <p>🚀 Trạng thái:
                    <span class="badge
                        @if($order->status == 'Đã thanh toán') bg-success
                        @elseif($order->status == 'Đã từ chối') bg-danger
                        @elseif($order->status == 'Đã nhận') bg-info
                        @elseif($order->status == 'Đang đến điểm lấy, đang giao cho khách') bg-warning text-dark
                        @endif">
                        {{ $order->status }}
                    </span>
                </p>

                <hr>

                <h5>🥡 Danh sách món ăn</h5>
                <ul class="list-group">
                    @foreach ($order->orderDetails as $orderDetail)
                        <li class="list-group-item d-flex justify-content-between">
                            <span>{{ $orderDetail->menuItem->Title_items }}</span>
                            <span>x{{ $orderDetail->quantity_ordered }} -
                                {{ number_format($orderDetail->sell_price, 0, ',', '.') }} VNĐ</span>
                        </li>
                    @endforeach
                </ul>

                <hr>

                <h5>🚚 Thông tin giao hàng</h5>
                <p>👤 Khách hàng: <strong>{{ $order->user->username ?? 'N/A' }}</strong></p>
                <p>📍 Địa chỉ: <strong>{{ $order->user->location->Address  }} -- {{$order->user->location->Ward}}--{{$order->user->location->District}} -- {{$order->user->location->City}}</strong></p>
                <p>📞 Số điện thoại: <strong>{{ $order->user->PhoneNumber ?? 'Chưa có' }}</strong></p>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </div>
@endsection
