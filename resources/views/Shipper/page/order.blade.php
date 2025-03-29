@extends('Shipper.share.master')
@section('content')
<div class="bg-light">
    <div class="container">
        <!-- Nút Chuyển Trang -->
        <div class="d-flex justify-content-center my-4">
            <button class="btn btn-outline-success mx-2" onclick="showOrder()">Thông tin Quán</button>
            <button class="btn btn-outline-success mx-2" onclick="showCustomer()">Thông tin Khách hàng</button>
        </div>

        <!-- Trang Đơn hàng -->
        <div id="orderPage" class="card border-success mb-4">
            <div class="card-header bg-success text-white text-center">
                <h4>Thông tin Quán</h4>
                <p>137 Nguyễn Đức Trung, P. Hòa Khê, Quận Thanh Khê</p>
            </div>
            <div class="card-body">
                <h5 class="card-title">Chi tiết đơn hàng</h5>
                <ul class="list-group mb-3">
                    <li class="list-group-item">Bánh mì - Số lượng: 4, Giá: 16,000 VND</li>
                    <li class="list-group-item">Càng ghẹ rang muối - Số lượng: 1, Giá: 47,000 VND</li>
                    <li class="list-group-item">Cút lộn xào me - Số lượng: 1, Giá: 47,000 VND</li>
                    <li class="list-group-item">Ốc bươu um dừa - Số lượng: 1, Giá: 47,000 VND</li>
                    <li class="list-group-item">Ốc gai nướng muối - Số lượng: 1, Giá: 60,000 VND</li>
                    <li class="list-group-item">Ốc len vào dừa - Số lượng: 2, Giá: 94,000 VND</li>
                </ul>
                <h5 class="card-title">Tổng tiền trả: 606,000 VND</h5>
                <div class="d-flex justify-content-center gap-2">
                    <button class="btn btn-primary">Gọi</button>
                    <button class="btn btn-success">Chat</button>
                    <button class="btn btn-danger">Từ chối đơn</button>
                    <button class="btn btn-warning">Đã đến điểm lấy</button>
                </div>
            </div>
        </div>

        <!-- Trang Khách hàng -->
        <div id="customerPage" class="card border-success mb-4 d-none">
            <div class="card-header bg-success text-white text-center">
                <h4>Thông tin Khách hàng</h4>
                <p>789 Lê Lợi, Đà Nẵng</p>
            </div>
            <div class="card-body">
                <h5 class="card-title">Thông tin khách hàng</h5>
                <ul class="list-group mb-3">
                    <li class="list-group-item">Tên: Lê Văn Khôi</li>
                    <li class="list-group-item">Số điện thoại: 0123456789</li>
                    <li class="list-group-item">Email: le.khoi@gmail.com</li>
                    <li class="list-group-item">Địa chỉ: 456 Trần Phú, Đà Nẵng</li>
                </ul>
                <h5 class="card-title">Chi tiết đơn hàng: 606,000 VND</h5>
                <ul class="list-group mb-3">
                    <li class="list-group-item">Bánh mì - Số lượng: 4, Giá: 16,000 VND</li>
                    <li class="list-group-item">Càng ghẹ rang muối - Số lượng: 1, Giá: 47,000 VND</li>
                    <li class="list-group-item">Cút lộn xào me - Số lượng: 1, Giá: 47,000 VND</li>
                    <li class="list-group-item">Ốc bươu um dừa - Số lượng: 1, Giá: 47,000 VND</li>
                    <li class="list-group-item">Ốc gai nướng muối - Số lượng: 1, Giá: 60,000 VND</li>
                    <li class="list-group-item">Ốc len vào dừa - Số lượng: 2, Giá: 94,000 VND</li>
                </ul>
                <h5 class="card-title">Tổng tiền thu: 606,000 VND</h5>
                <div class="d-flex justify-content-center gap-2">
                    <button class="btn btn-info">Chỉnh sửa</button>
                    <button class="btn btn-danger">Xóa thông tin</button>
                    <button class="btn btn-secondary">Lưu thay đổi</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        function showOrder() {
            document.getElementById('orderPage').classList.remove('d-none');
            document.getElementById('customerPage').classList.add('d-none');
        }

        function showCustomer() {
            document.getElementById('orderPage').classList.add('d-none');
            document.getElementById('customerPage').classList.remove('d-none');
        }
    </script>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</div>
@endsection