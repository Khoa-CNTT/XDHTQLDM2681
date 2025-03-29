<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CallFood - Đăng Nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-success-subtle d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4 text-center" style="max-width: 400px;">
        <h1 class="text-success fw-bold">CallFood</h1>
        <h2 class="text-success">Đăng Nhập</h2>
        <form>
            <div class="mb-3 text-start">
                <label for="email" class="form-label">Tên tài khoản</label>
                <input type="text" class="form-control" id="email" placeholder="Nhập tài khoản" required>
            </div>
            <div class="mb-3 text-start">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" required>
            </div>
            <button type="submit" class="btn btn-success w-100 fw-bold">Đăng Nhập</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
