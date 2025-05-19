<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mã OTP Xác Thực</title>
    <link rel="icon" type="image/jpeg"
        href="{{ asset('assets/img/icon/z6443881384501_a4968d4d4a8fb548eca0294aef2d6ad8.jpg') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }

        .container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 500px;
        }

        .otp-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .otp-button {
            width: 100%;
            margin-top: 20px;
        }

        #countdown {
            font-weight: bold;
            color: red;
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="container">
            <div class="otp-container">
                <h2 class="text-primary mb-4">Chào bạn!</h2>
                <p>Mã OTP của bạn là: <strong class="text-success">{{ $otp }}</strong></p>
                <p>Mã này có hiệu lực trong <span id="countdown">5:00</span> phút.</p>
                <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!</p>
            </div>

            <!-- Form Nhập OTP -->
            <form action="{{ route('verify.otp') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="otp" class="form-label">Nhập Mã OTP</label>
                    <input type="text" class="form-control" id="otp" name="otp" placeholder="Nhập mã OTP" required>
                </div>

                <button type="submit" class="btn btn-primary otp-button">Xác Thực OTP</button>
            </form>
        </div>
    </div>

    <script>
        // Đếm ngược thời gian 5 phút
        var countdown = 300; // 5 phút = 300 giây
        var countdownElement = document.getElementById('countdown');

        function updateCountdown() {
            var minutes = Math.floor(countdown / 60);
            var seconds = countdown % 60;

            // Đảm bảo hiển thị 2 chữ số cho giây và phút
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;

            countdownElement.textContent = minutes + ':' + seconds;

            if (countdown <= 0) {
                clearInterval(countdownInterval);
                countdownElement.textContent = "Hết thời gian";
            }

            countdown--;
        }

        // Cập nhật mỗi giây
        var countdownInterval = setInterval(updateCountdown, 1000);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
