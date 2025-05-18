<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác Thực OTP</title>
    <link rel="icon" type="image/jpeg"
        href="{{ asset('assets/img/icon/z6443881384501_a4968d4d4a8fb548eca0294aef2d6ad8.jpg') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .otp-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 50px auto;
        }

        .otp-container h2 {
            text-align: center;
            color: #343a40;
            margin-bottom: 20px;
        }

        .otp-container label {
            font-size: 16px;
            font-weight: bold;
            color: #495057;
        }

        .otp-container input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ced4da;
        }

        .otp-container button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            font-size: 16px;
            border-radius: 4px;
        }

        .otp-container button:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="otp-container">
        <h2>Xác Thực OTP</h2>

        @if(session('error'))
            <p class="error-message">{{ session('error') }}</p>
        @endif

        <form method="POST" action="{{ route('verify.otp.submit') }}">
            @csrf
            <div class="mb-3">
                <label for="otp">Mã OTP:</label>
                <input type="text" name="otp" id="otp" required>
            </div>
            <button type="submit" class="btn btn-primary">Xác Thực</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
