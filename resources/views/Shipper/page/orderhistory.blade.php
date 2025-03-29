@extends('Shipper.share.master')
@section('content')
<div class="bg-light">

<!-- Thanh điều hướng -->

<!-- Nội dung chính -->
<div class="container mt-4">
    <h3 class="text-center mb-4">📜 Lịch sử đơn hàng</h3>

    <!-- Bộ lọc -->
    <div class="btn-group d-flex mb-4" role="group">
        <button class="btn btn-success" onclick="filterOrders('delivered')">Đã giao</button>
        <button class="btn btn-warning" onclick="filterOrders('pending')">Đang giao</button>
        <button class="btn btn-danger" onclick="filterOrders('canceled')">Đã hủy</button>
        <button class="btn btn-secondary" onclick="filterOrders('all')">Tất cả</button>
    </div>

    <!-- Danh sách đơn hàng -->
    <div id="order-list" class="row row-cols-1 row-cols-md-2 g-3">
        <!-- Đơn hàng 1 -->
        <div class="col" data-status="delivered">
            <div class="card shadow-sm">
                <div class="card-body" onclick="window.location.href='Detail-shipper.html'">
                    <h5 class="card-title">🆔 Đơn hàng #12345 <span class="badge bg-success">Đã giao</span></h5>
                    <p class="card-text">📅 Ngày giao: 25/03/2025</p>
                    <p class="card-text">💰 Tổng tiền: <strong>250.000 VNĐ</strong></p>
                </div>
            </div>
        </div>

        <!-- Đơn hàng 2 -->
        <div class="col" data-status="pending">
            <div class="card shadow-sm">
                <div class="card-body" onclick="window.location.href='Detail-shipper.html'">
                    <h5 class="card-title">🆔 Đơn hàng #12346 <span class="badge bg-warning text-dark">Đang giao</span></h5>
                    <p class="card-text">📅 Ngày giao: 26/03/2025</p>
                    <p class="card-text">💰 Tổng tiền: <strong>180.000 VNĐ</strong></p>
                </div>
            </div>
        </div>

        <!-- Đơn hàng 3 -->
        <div class="col" data-status="canceled">
            <div class="card shadow-sm">
                <div class="card-body" onclick="window.location.href='Detail-shipper.html'">
                    <h5 class="card-title">🆔 Đơn hàng #12347 <span class="badge bg-danger">Đã hủy</span></h5>
                    <p class="card-text">📅 Ngày giao: 22/03/2025</p>
                    <p class="card-text">💰 Tổng tiền: <strong>300.000 VNĐ</strong></p>
                </div>
            </div>
        </div>

        <!-- Đơn hàng 4 -->
        <div class="col" data-status="delivered">
            <div class="card shadow-sm">
                <div class="card-body" onclick="window.location.href='Detail-shipper.html'">
                    <h5 class="card-title">🆔 Đơn hàng #12348 <span class="badge bg-success">Đã giao</span></h5>
                    <p class="card-text">📅 Ngày giao: 21/03/2025</p>
                    <p class="card-text">💰 Tổng tiền: <strong>220.000 VNĐ</strong></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function filterOrders(status) {
        document.querySelectorAll(".col").forEach(order => {
            order.style.display = (status === "all" || order.getAttribute("data-status") === status) ? "block" : "none";
        });
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</div>
@endsection