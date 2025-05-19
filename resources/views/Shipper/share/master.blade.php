<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Người giao hàng</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('Shipper.share.header')
    <main class="main__content_wrapper">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

      @yield('content')
    </main>

       <script>
    document.addEventListener("DOMContentLoaded", function () {
        console.log("📍 Đang kiểm tra hỗ trợ định vị...");

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function (position) {
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;

                    console.log("✅ Lấy tọa độ thành công:");
                    console.log("Latitude:", latitude);
                    console.log("Longitude:", longitude);

                    const payload = {
                        lat: latitude,
                        lon: longitude
                    };

                    console.log("📦 Payload gửi lên server:", payload);

                    fetch("{{ route('shipper.nearby') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'  // Đảm bảo CSRF token đã được truyền chính xác
                        },
                        body: JSON.stringify(payload)
                    })
                        .then(res => res.json())  // Chuyển đổi phản hồi từ server sang JSON
                        .then(data => {
                            console.log("✅ Dữ liệu nhận được từ server:", data);

                        })
                        .catch(error => {
                            console.error("❌ Lỗi khi xử lý phản hồi JSON:", error);
                            alert("Đã xảy ra lỗi khi kết nối với server.");
                        });
                },
                function (error) {
                    alert('Không thể truy cập vị trí của bạn! Vui lòng cho phép trình duyệt.');
                    console.error("❌ Lỗi khi lấy vị trí:", error);
                }
            );
        } else {
            alert("Trình duyệt của bạn không hỗ trợ định vị.");
            console.error("⚠️ Trình duyệt không hỗ trợ Geolocation API.");
        }
    });
</script>




</body>
</html>
