@extends('Shipper.share.master')
@section('content')
<div class="bg-light">

<div class="container mt-4">
    <button class="btn btn-secondary mb-3" onclick="window.history.back()">← Quay lại</button>

    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="card-title">🆔 Đơn hàng #12345</h4>
            <p>📅 Ngày giao: <strong>25/03/2025</strong></p>
            <p>💰 Tổng tiền: <strong>250.000 VNĐ</strong></p>
            <p>🚀 Trạng thái: <span class="badge bg-success">Đã giao</span></p>

            <hr>

            <h5>🥡 Danh sách món ăn</h5>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between">
                    <span>Burger bò</span> <span>x2 - 50.000 VNĐ</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Pizza phô mai</span> <span>x1 - 100.000 VNĐ</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Nước cam</span> <span>x2 - 50.000 VNĐ</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Khoai tây chiên</span> <span>x1 - 50.000 VNĐ</span>
                </li>
            </ul>

            <hr>

            <h5>🚚 Thông tin giao hàng</h5>
            <p>👤 Khách hàng: <strong>Nguyễn Văn A</strong></p>
            <p>📍 Địa chỉ: <strong>123 Đường ABC, Quận 1, TP.HCM</strong></p>
            <p>📞 Số điện thoại: <strong>0909 123 456</strong></p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</div>
@endsection