<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký Tài Xế</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/jpeg"
        href="{{ asset('assets/img/icon/z6443881384501_a4968d4d4a8fb548eca0294aef2d6ad8.jpg') }}">
</head>

<body class="bg-warning">

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="bg-white p-4 rounded shadow" style="width: 400px;">
            <h1 class="text-success fw-bold text-center"><img  style="height:70px;" src="/assets/img/icon/z6443881384501_a4968d4d4a8fb548eca0294aef2d6ad8.jpg"
                    alt=""></h1>
            <h4 class="text-center">Đăng Ký</h4>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('driver.register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Thành Phố</label>
                    <select name="address" class="form-select">
                        <option value="Đà nẵng">Đà nẵng</option>

                    </select>
                    @error('vehicle_type')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Tài khoản" >
                    @error('username')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>



                <div class="mb-3">
                    <input type="text" name="fullname" class="form-control" placeholder="Họ và Tên" >
                    @error('fullname')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" >
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="text" name="phonenumber" class="form-control" placeholder="Số điện thoại" >
                    @error('phonenumber')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="text" name="id_card" class="form-control" placeholder="CMND/CCCD">
                    @error('id_card')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="date" name="dateofbirth" class="form-control">
                    @error('dateofbirth')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Loại Xe</label>
                    <select name="vehicle_type" class="form-select">
                        <option value="Xe máy">Xe máy</option>
                        <option value="Ô tô">Ô tô</option>
                    </select>
                    @error('vehicle_type')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="text" name="license_plate" class="form-control" placeholder="Biển số xe">
                    @error('license_plate')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>



                <div class="mb-3 text-center">
                    <input type="checkbox" > Tôi không phải là người máy
                </div>

                <div class="mb-3 text-center">
                    <small>Khi tiếp tục, tôi đồng ý rằng ShopeeFood có thể thu thập và sử dụng thông tin được tôi cung
                        cấp.</small>
                </div>
                <p class="text-center"><a class="text-center" href="/shipper/login">Đã có tài khoản</a></p>

                <button type="submit" class="btn btn-danger w-100">Đăng Ký</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
