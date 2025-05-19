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
   <h2>🎉 Xin chúc mừng {{ $restaurant->name }}!</h2>
<p>Nhà hàng của bạn đã được phê duyệt thành công.</p>

<p><strong>Thông tin tài khoản đăng nhập:</strong></p>
<ul>
    <li>👤 Tên đăng nhập: <strong>{{ $username }}</strong></li>
    <li>📧 Email: <strong>{{ $restaurant->email }}</strong></li>
    <li>🔒 Mật khẩu: <strong>{{ $password }}</strong></li>
</ul>

<p>Vui lòng đăng nhập để quản lý nhà hàng của bạn. Đừng quên đổi mật khẩu sau khi đăng nhập!</p>

<p>Thân ái,<br>Đội ngũ quản trị</p>

</body>

</html>
