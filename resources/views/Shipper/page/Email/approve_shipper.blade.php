<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg"
        href="{{ asset('assets/img/icon/z6443881384501_a4968d4d4a8fb548eca0294aef2d6ad8.jpg') }}">
    <title>Thông báo tài khoản shipper đã được phê duyệt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="container text-center">
            <h2 class="mb-4">Chúc mừng, tài khoản shipper của bạn đã được phê duyệt!</h2>
            <p>Xin chào {{ $data->fullname }},</p>
            <p>Chúng tôi vui mừng thông báo rằng tài khoản của bạn đã được phê duyệt thành công.</p>
            <p>Email của bạn: {{ $data->email }}</p>
            <p>Mật khẩu mặc định của bạn là: <strong>123456</strong></p>
            <p>Vui lòng đăng nhập và thay đổi mật khẩu ngay sau khi đăng nhập.</p>
        </div>
    </div>
</body>

</html>
