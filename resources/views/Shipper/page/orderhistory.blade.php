@extends('Shipper.share.master')
@section('content')
        <div class="bg-light">

        <!-- Thanh điều hướng -->

        <!-- Nội dung chính -->
       <div class="container mt-4">
        <h3 class="text-center mb-4">📜 Lịch sử đơn hàng</h3>

        <!-- Bộ lọc -->
        <div class="btn-group d-flex mb-4" role="group">
            <button class="btn btn-success" onclick="filterOrders('Đã thanh toán')">Đã giao thành công</button>
            <button class="btn btn-warning" onclick="filterOrders('Đang đến điểm lấy, đang giao cho khách')">Đang giao</button>
            <button class="btn btn-danger" onclick="filterOrders('Đã từ chối')">Đã hủy</button>
            <button class="btn btn-secondary" onclick="filterOrders('all')">Tất cả</button>
        </div>

        <!-- Danh sách đơn hàng -->
        <div id="order-list" class="row row-cols-1 row-cols-md-2 g-3">
            @foreach ($orders as $order)
                <div class="col" data-status="{{ $order->status }}">
                    <div class="card shadow-sm">
                        <div class="card-body" onclick="window.location.href='{{ route('order.history.detail', $order->id) }}'">
                            <h5 class="card-title">
                                🆔 Đơn hàng #{{ $order->id }}
                                <span class="badge
                                    @if($order->status == 'Đã thanh toán') bg-success
                                    @elseif($order->status == 'Đã từ chối') bg-danger
                                    @elseif($order->status == 'Đã nhận') bg-info
                                    @elseif($order->status == 'Đang đến điểm lấy, đang giao cho khách') bg-warning text-dark
                                    @endif">
                                    {{ $order->status }}
                                </span>
                            </h5>
                            <p class="card-text">📅 Ngày giao:
                                {{ $order->delivery_date ? $order->delivery_date->format('d/m/Y') : 'Chưa có' }}
                            </p>
                            <p class="card-text">💰 Tổng tiền: <strong>{{ number_format($order->total_amount, 0, ',', '.') }}
                                    VNĐ</strong></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function filterOrders(status) {
            const orders = document.querySelectorAll('.col');
            orders.forEach(order => {
                if (status === 'all') {
                    order.style.display = 'block';
                } else {
                    // So sánh trạng thái của đơn hàng với trạng thái được chọn từ bộ lọc
                    if (order.getAttribute('data-status') === status) {
                        order.style.display = 'block';
                    } else {
                        order.style.display = 'none';
                    }
                }
            });
        }
    </script>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        </div>
@endsection
