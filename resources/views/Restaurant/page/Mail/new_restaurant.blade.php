<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Thông báo nhà hàng mới</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container my-5">

        <!-- Logo -->
        <div class="text-center mb-4">
            <img src="/assets/img/icon/z6443881384501_a4968d4d4a8fb548eca0294aef2d6ad8.jpg" alt="Logo" style="max-height: 80px;">
        </div>

        <!-- Card Thông báo -->
        <div class="card border-info shadow">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0">📢 Thông báo nhà hàng mới đăng ký</h4>
            </div>
            <div class="card-body">
                <p>Xin chào,</p>
                <p>Một nhà hàng mới đã đăng ký trên hệ thống:</p>
                <ul>
                    <li><strong>Tên nhà hàng:</strong> {{ $Name }}</li>
                    <li><strong>Email:</strong> {{ $email }}</li>
                    <li><strong>Số điện thoại:</strong> {{ $phone }}</li>
                    <li><strong>Loại hình kinh doanh:</strong> {{ $businessType }}</li>
                </ul>
                <p>Vui lòng kiểm tra và phê duyệt.</p>
                <p>Trân trọng,</p>
                <p><strong>Hệ thống quản lý đăng ký nhà hàng</strong></p>
                <hr>
                <p class="mb-0">
                    📧 Liên hệ: <a href="mailto:longkolp16@gmail.com">longkolp16@gmail.com</a><br>
                    🌐 Website: <a href="https://food.log.vn">https://food.log.vn</a>
                </p>
            </div>
        </div>

    </div>
</body>

</html>
