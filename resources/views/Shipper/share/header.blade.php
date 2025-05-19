<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">
        <div class="container-fluid">
            <button class="btn btn-light me-2 d-lg-none" id="menuToggle">☰</button>

            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="/assets/img/icon/z6443881384501_a4968d4d4a8fb548eca0294aef2d6ad8.jpg" class="rounded-circle me-2" width="40" height="40">
                CallFood - Shipper
            </a>

            <div class="collapse navbar-collapse d-none d-lg-block">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/shipper/home">Trang chủ</a></li>
                </ul>

                @php
$shipper = Auth::guard('driver_auth')->user();
                @endphp

                @if($shipper)
                    <div class="dropdown ms-3">
                        <img src="{{ asset($shipper->avatar ?? 'assets/img/logo/logo.jpg') }}" class="rounded-circle shadow-sm" width="50"
                            height="50" id="userDropdown" data-bs-toggle="dropdown" style="object-fit: cover;">
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li class="dropdown-header">
                                {{ $shipper->fullname ?? 'Shipper' }}
                            </li>
                            <li class="dropdown-item d-flex justify-content-between">
                                <span>🚀 Trạng thái hoạt động</span>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="toggleStatus" {{ $shipper->is_active ? 'checked' : '' }}>
                                </div>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('shipper.orders') }}">📦 Đơn hàng</a></li>
                            <li><a class="dropdown-item" href="{{ route('shipper.order_history') }}">📜 Lịch sử đơn hàng</a></li>
                            <li><a class="dropdown-item" href="{{ route('shipper.profile') }}">Thông tin cá nhân</a></li>
                            <li><a class="dropdown-item" href="{{ route('shipper.changePassword') }}">Đổi mật khẩu</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger" href="{{ route('shipper.logout') }}">🔴 Đăng xuất</a></li>
                        </ul>
                    </div>
                @endif

            </div>
        </div>
    </nav>

    <!-- Overlay -->
    <div class="position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-none" id="overlay"></div>

    <!-- Sidebar -->
    <div class="position-fixed top-0 start-0 vh-100 bg-white shadow-lg p-3" style="width: 250px; transform: translateX(-250px);" id="sidebar">
        <span class="position-absolute top-0 end-0 p-3 fs-4 text-danger" id="closeSidebar">×</span>
        <div class="text-center mb-3">
            <img src="logo.jpg" alt="User Avatar" class="rounded-circle" width="80" height="80">
            <p class="fw-bold mt-2">Nguyễn Văn A - 7733</p>
        </div>
        <ul class="list-unstyled">
            <li><a href="#" class="d-block py-2 px-3 text-dark text-decoration-none">🏠 Trang chủ</a></li>
            <li class="d-flex justify-content-between px-3 py-2">
                <span>🚀 Trạng thái hoạt động</span>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="toggleStatusSidebar" {{ Auth::check() && Auth::user()->is_active ? 'checked' : '' }}>
                </div>

            </li>
            <li><a href="#" class="d-block py-2 px-3 text-dark text-decoration-none">📦 Đơn hàng</a></li>
            <li><a href="#" class="d-block py-2 px-3 text-dark text-decoration-none">📜 Lịch sử đơn hàng</a></li>
            <li><hr></li>
            <li><a href="#" class="d-block py-2 px-3 text-danger text-decoration-none">🔴 Đăng xuất</a></li>
        </ul>
    </div>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   <script>
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const menuToggle = document.getElementById('menuToggle');
    const closeSidebar = document.getElementById('closeSidebar');

    const toggleStatus = document.getElementById('toggleStatus'); // checkbox trên header (nếu có)
    const toggleStatusSidebar = document.getElementById('toggleStatusSidebar'); // checkbox trong sidebar

    // Mở sidebar
    menuToggle.addEventListener('click', function () {
        sidebar.style.transform = "translateX(0)";
        overlay.classList.remove("d-none");
    });

    // Đóng sidebar
    function closeMenu() {
        sidebar.style.transform = "translateX(-250px)";
        overlay.classList.add("d-none");
    }

    closeSidebar.addEventListener('click', closeMenu);
    overlay.addEventListener('click', closeMenu);

    // Sự kiện thay đổi trạng thái từ header (nếu có)
    if (toggleStatus) {
        toggleStatus.addEventListener('change', function () {
            toggleStatusSidebar.checked = this.checked;
            handleStatusChange(this.checked);
        });
    }

    // Sự kiện thay đổi trạng thái từ sidebar
    toggleStatusSidebar.addEventListener('change', function () {
        if (toggleStatus) {
            toggleStatus.checked = this.checked;
        }
        handleStatusChange(this.checked);
    });

    // Hàm xử lý thông báo và gọi API (nếu có)
    function handleStatusChange(isActive) {
        alert(isActive ? 'Bạn đang ở trạng thái hoạt động!' : 'Bạn đã tắt trạng thái hoạt động!');

        // Gửi cập nhật trạng thái đến server (nếu cần)
        fetch('/shipper/update-status', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ is_active: isActive ? 1 : 0 })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Cập nhật thành công:', data.message);
        })
        .catch(error => {
            console.error('Lỗi khi cập nhật trạng thái:', error);
        });
    }
</script>

</body>
