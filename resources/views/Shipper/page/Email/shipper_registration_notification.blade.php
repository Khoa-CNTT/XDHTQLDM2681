<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông báo tài khoản shipper cần duyệt</title>
    <link rel="icon" type="image/jpeg"
        href="{{ asset('assets/img/icon/z6443881384501_a4968d4d4a8fb548eca0294aef2d6ad8.jpg') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .notification-container {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .notification-header {
            font-size: 24px;
            color: #343a40;
            margin-bottom: 15px;
        }

        .notification-body p {
            font-size: 16px;
            margin: 5px 0;
        }

        .notification-body .label {
            font-weight: bold;
            color: #495057;
        }

        .footer-text {
            font-size: 14px;
            color: #6c757d;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="notification-container">
            <div class="notification-header text-center">
                Thông báo tài khoản shipper cần duyệt
            </div>

            <div class="notification-body">
                <p><span class="label">Tên:</span> {{ $data['fullname'] }}</p>
                <p><span class="label">Số điện thoại:</span> {{ $data['phonenumber'] }}</p>
                <p><span class="label">CMND:</span> {{ $data['id_card'] }}</p>
                <p><span class="label">Biển số xe:</span> {{ $data['license_plate'] }}</p>
                <p><span class="label">Địa chỉ:</span> {{ $data['address'] }}</p>
                <p><span class="label">Email:</span> {{ $data['email'] }}</p>
            </div>

            <div class="footer-text text-center">
                Vui lòng kiểm tra và duyệt tài khoản này sớm. Cảm ơn bạn!
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
