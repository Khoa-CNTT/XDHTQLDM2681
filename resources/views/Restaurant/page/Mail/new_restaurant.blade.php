<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Thông báo nhà hàng mới</title>
</head>

<body>
    <h2>📢 Thông báo nhà hàng mới đăng ký</h2>
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
</body>

</html>
