<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Món ăn đã được phê duyệt</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container my-5">
        <div class="text-center mb-4">

            <img src="/assets/img/icon/z6443881384501_a4968d4d4a8fb548eca0294aef2d6ad8.jpg" alt="Logo" style="max-height: 80px;">
        </div>
        <div class="card shadow border-success">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">🎉 Món ăn đã được phê duyệt</h4>
            </div>
            <div class="card-body">
                <h5 class="card-title">Xin chúc mừng!</h5>
                <p class="card-text">
                    Món ăn <strong>{{ $menuItem->Title_items }}</strong> của bạn đã được <strong>Admin</strong> phê
                    duyệt.
                    Món ăn sẽ được hiển thị trên hệ thống và tiếp cận đến nhiều khách hàng hơn.
                </p>
                <p class="card-text">Cảm ơn bạn đã tin tưởng và sử dụng dịch vụ của chúng tôi!</p>

                <hr>
                <p class="mb-0">
                    📧 Liên hệ: <a href="mailto:longkolp16@gmail.com">longkolp16@gmail.com</a> <br>
                    🌐 Website: <a href="https://food.log.vn">https://food.log.vn</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Optional Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
