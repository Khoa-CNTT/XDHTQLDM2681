@extends('Shipper.share.master')
@section('content')
    <div class="bg-light">
        <!-- Thanh điều hướng -->

        <!-- Nội dung chính -->
        <div class="container mt-5">
            <h3 class="text-center mb-4">📜 Lịch sử đơn hàng</h3>

            <!-- Bộ lọc trạng thái đơn hàng -->
            <div class="btn-group d-flex mb-4" role="group">
                <button class="btn btn-outline-success flex-fill" onclick="filterOrders('Đã giao thành công')">
                    Đã giao thành công
                </button>
                <button class="btn btn-outline-warning flex-fill"
                    onclick="filterOrders('Đang đến điểm lấy, đang giao cho khách')">
                    Đang giao
                </button>
                <button class="btn btn-outline-danger flex-fill" onclick="filterOrders('Đã từ chối')">
                    Đã hủy
                </button>
                <button class="btn btn-outline-secondary flex-fill" onclick="filterOrders('all')">
                    Tất cả
                </button>
            </div>

            <!-- Danh sách đơn hàng -->
            <div id="order-list" class="row row-cols-1 row-cols-md-2 g-4">
                @foreach ($orders as $order)
                    <div class="col" data-status="{{ $order->status }}">
                        <div class="card shadow-sm border-0">
                            <div class="card-body p-4" style="cursor: pointer;"
                                onclick="window.location.href='{{ route('order.history.detail', $order->id) }}'">
                                <h5 class="card-title d-flex justify-content-between align-items-center">
                                    🆔 Đơn hàng #{{ $order->id }}
                                    <span class="badge
                                        @if($order->status == 'Đã giao thành công') bg-success
                                        @elseif($order->status == 'Đã từ chối') bg-danger
                                        @elseif($order->status == 'Đang đến điểm lấy, đang giao cho khách') bg-warning text-dark
                                        @else bg-info @endif
                                        text-uppercase">
                                        {{ $order->status }}
                                    </span>
                                </h5>
                                <p class="card-text text-muted">📅 Ngày giao:
                                    {{ $order->created_at ? $order->created_at->format('d/m/Y') : 'Chưa có' }}
                                </p>
                                <p class="card-text">💰 Tổng tiền:
                                    <strong>{{ number_format($order->total_amount, 0, ',', '.') }} VNĐ</strong></p>
                                <p class="card-text text-muted text-end"><button class="btn btn-primary">xem thêm</button></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Script for filtering orders -->
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
