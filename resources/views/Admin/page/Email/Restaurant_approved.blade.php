<!-- resources/views/emails/restaurant_approved.blade.php -->

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phê duyệt nhà hàng</title>
</head>

<body>
    <h1>Xin chúc mừng!</h1>
    <p>Nhà hàng <strong>{{ $restaurant->name }}</strong> của bạn đã được phê duyệt và đang hoạt động trên hệ thống.</p>
    <p>Cảm ơn bạn đã đăng ký và sử dụng dịch vụ của chúng tôi.</p>
    <p>Trân trọng,<br>Đội ngũ hỗ trợ</p>
</body>

</html>
