<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">
        <div class="container-fluid">
            <button class="btn btn-light me-2 d-lg-none" id="menuToggle">☰</button>

            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="assets/img/logo/logo.jpg" class="rounded-circle me-2" width="40" height="40">
                CallFood - Shipper
            </a>

            <div class="collapse navbar-collapse d-none d-lg-block">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Trang chủ</a></li>
                </ul>

                <div class="dropdown ms-3">
                    <img src="assets/img/logo/logo.jpg" class="rounded-circle shadow-sm" width="50" height="50" id="userDropdown" data-bs-toggle="dropdown">
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li class="dropdown-header">Nguyễn Văn A - 7733</li>
                        <li class="dropdown-item d-flex justify-content-between">
                            <span>🚀 Trạng thái hoạt động</span>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="toggleStatus">
                            </div>
                        </li>
                        <li><a class="dropdown-item" href="#">📦 Đơn hàng</a></li>
                        <li><a class="dropdown-item" href="#">📜 Lịch sử đơn hàng</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="#">🔴 Đăng xuất</a></li>
                    </ul>
                </div>
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
                    <input class="form-check-input" type="checkbox" id="toggleStatusSidebar">
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

        menuToggle.addEventListener('click', function () {
            sidebar.style.transform = "translateX(0)";
            overlay.classList.remove("d-none");
        });

        function closeMenu() {
            sidebar.style.transform = "translateX(-250px)";
            overlay.classList.add("d-none");
        }

        closeSidebar.addEventListener('click', closeMenu);
        overlay.addEventListener('click', closeMenu);

        document.getElementById('toggleStatus').addEventListener('change', function () {
            document.getElementById('toggleStatusSidebar').checked = this.checked;
            alert(this.checked ? 'Bạn đang ở trạng thái hoạt động!' : 'Bạn đã tắt trạng thái hoạt động!');
        });
    </script>
</body>