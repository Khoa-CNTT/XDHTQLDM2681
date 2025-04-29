<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông báo tài khoản shipper đã được phê duyệt</title>
</head>

<body>
    <h2>Chúc mừng, tài khoản shipper của bạn đã được phê duyệt!</h2>
    <p>Xin chào {{ $data->fullname }},</p>
    <p>Chúng tôi vui mừng thông báo rằng tài khoản của bạn đã được phê duyệt thành công.</p>
    <p>Email của bạn: {{ $data->email }}</p>
    <p>Mật khẩu mặc định của bạn là: <strong>123456</strong></p>
    <p>Vui lòng đăng nhập và thay đổi mật khẩu ngay sau khi đăng nhập.</p>
</body>

</html>
