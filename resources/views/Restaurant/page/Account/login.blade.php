<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CallFood - Đăng nhập Nhà hàng</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100"
    style="background: linear-gradient(135deg, #e0f7e9, #c8f0df);">

    <div class="card shadow-lg p-4 rounded-4" style="max-width: 420px; width: 100%;">
        <div class="text-center mb-4">
            <h1 class="text-success fw-bold">🍽️ CallFood</h1>
            <h4 class="text-secondary">Đăng nhập dành cho <span class="text-success">Nhà hàng</span></h4>
        </div>
    <form action="/restaurant/actionlogin" method="POST">
        @csrf

            <div class="mb-3">
                <label for="username" class="form-label">Tên đăng nhập</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Nhập tên đăng nhập"
                    >
                @error('username')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Nhập mật khẩu"
                    >
                @error('password')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success w-100 fw-bold">Đăng Nhập</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
