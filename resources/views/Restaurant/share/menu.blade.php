<div class="nav-container primary-menu">
    <div class="mobile-topbar-header">
        <div>
            <img src="/admin/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Rukada</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <nav class="navbar navbar-expand-xl w-100">
        <ul class="navbar-nav justify-content-start flex-grow-1 gap-1">

            <li class="nav-item dropdown">
                <a href="/restaurant/menu_items" class="nav-link dropdown-toggle dropdown-toggle-nocaret">
                    <div class="parent-icon"><i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div class="menu-title">Quản lý món ăn</div>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="{{ route('restaurant.info') }}" class="nav-link dropdown-toggle dropdown-toggle-nocaret">
                    <div class="parent-icon"><i class="fa-solid fa-dragon"></i>
                    </div>
                    <div class="menu-title">Thay đổi thông tin nhà hàng</div>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="/restaurant/reports/chart" class="nav-link dropdown-toggle dropdown-toggle-nocaret">
                    <div class="parent-icon"><i class="fa-regular fa-rectangle-list"></i>
                    </div>
                    <div class="menu-title">Thống kê và báo cáo</div>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="/restaurant/order" class="nav-link dropdown-toggle dropdown-toggle-nocaret">
                    <div class="parent-icon"><i class="fa-solid fa-bowl-food"></i>
                    </div>
                    <div class="menu-title">Quản lý đơn hàng</div>
                </a>
            </li>


            <li class="nav-item dropdown">
                <a href="/restaurant/chat" class="nav-link dropdown-toggle dropdown-toggle-nocaret">
                    <div class="parent-icon"><i class="fa-solid fa-truck-field-un"></i>
                    </div>
                    <div class="menu-title">Nhận Thông báo Tin nhắn từ khách hàng</div>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="/admin/customer/index" class="nav-link dropdown-toggle dropdown-toggle-nocaret">
                    <div class="parent-icon"><i class="fa-solid fa-truck-field-un"></i>
                    </div>
                    <div class="menu-title">Khách hàng</div>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="/admin/order/index" class="nav-link dropdown-toggle dropdown-toggle-nocaret">
                    <div class="parent-icon"><i class="fa-solid fa-calendar-check"></i>
                    </div>
                    <div class="menu-title">Bán Hàng</div>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="/admin/import/index" class="nav-link dropdown-toggle dropdown-toggle-nocaret">
                    <div class="parent-icon"><i class="fa-solid fa-vault"></i>
                    </div>
                    <div class="menu-title">Nhập Hàng</div>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="/admin/admin/index" class="nav-link dropdown-toggle dropdown-toggle-nocaret">
                    <div class="parent-icon"><i class="fa-solid fa-user"></i></i>
                    </div>
                    <div class="menu-title">Tài Khoản</div>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                    <div class="parent-icon"><i class="fa-solid fa-bars"></i>
                    </div>
                    <div class="menu-title">Menu</div>
                </a>
                <ul class="dropdown-menu">
                    <li> <a class="dropdown-item" href="/admin/order/get-menu"><i
                                class="fa-solid fa-fire-burner"></i>Menu Bếp</a>
                    </li>
                    <li> <a class="dropdown-item" href="/admin/order/get-real"><i
                                class="fa-solid fa-cart-flatbed-suitcase"></i></i>Menu Tiếp Thục</a>
                    </li>
                </ul>
            </li>



            <li class="nav-item">
                <a class="nav-link" href="/admin/role/index">
                    <div class="parent-icon">
                        <i class="fa-solid fa-user-shield"></i>
                    </div>
                    <div class="menu-title">Phân Quyền</div>
                </a>
            </li>
        </ul>
    </nav>
</div>
