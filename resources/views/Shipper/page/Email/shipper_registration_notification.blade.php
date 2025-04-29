<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông báo một  shipper  mới đăng ký đang chờ  duyệt</title>
</head>

<body>
    <h2>Thông báo tài khoản shipper cần duyệt</h2>
    <p>Tên: {{ $data['fullname'] }}</p>
    <p>Số điện thoại: {{ $data['phonenumber'] }}</p>
    <p>CMND: {{ $data['id_card'] }}</p>
    <p>Biển số xe: {{ $data['license_plate'] }}</p>
    <p>Địa chỉ: {{ $data['address'] }}</p>
    <p>Email: {{ $data['email'] }}</p>
</body>

</html>
