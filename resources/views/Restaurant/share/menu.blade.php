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

        </ul>
    </nav>
</div>
