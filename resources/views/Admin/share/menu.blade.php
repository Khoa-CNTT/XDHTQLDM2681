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
                <a href="/admin/roles" class="nav-link dropdown-toggle dropdown-toggle-nocaret">
                    <div class="parent-icon"><i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div class="menu-title"> Phân quyền</div>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="/admin/users" class="nav-link dropdown-toggle dropdown-toggle-nocaret">
                    <div class="parent-icon"><i class="fa-solid fa-dragon"></i>
                    </div>
                    <div class="menu-title"> Tài khoản</div>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="/admin/restaurant/index" class="nav-link dropdown-toggle dropdown-toggle-nocaret">
                    <div class="parent-icon"><i class="fa-regular fa-rectangle-list"></i>
                    </div>
                    <div class="menu-title"> Nhà hàng</div>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="/admin/category/index" class="nav-link dropdown-toggle dropdown-toggle-nocaret">
                    <div class="parent-icon"><i class="fa-solid fa-bowl-food"></i>
                    </div>
                    <div class="menu-title"> Danh mục</div>
                </a>
            </li>


            <li class="nav-item dropdown">

                <a href="{{route('admin.pending_drivers')}}" class="nav-link dropdown-toggle dropdown-toggle-nocaret">
                    <div class="parent-icon"><i class="fa-solid fa-truck-field-un"></i>
                    </div>
                    <div class="menu-title"> Người giao hàng</div>
                </a>


            </li>
            <li class="nav-item dropdown">
                <a href="/admin/food/index" class="nav-link dropdown-toggle dropdown-toggle-nocaret">
                    <div class="parent-icon"><i class="fa-solid fa-truck-field-un"></i>
                    </div>
                    <div class="menu-title"> Quản lý món</div>

                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="/admin/offers" class="nav-link dropdown-toggle dropdown-toggle-nocaret">
                    <div class="parent-icon"><i class="fa-solid fa-truck-field-un"></i>
                    </div>
                    <div class="menu-title"> khuyến mãi</div>

                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="/admin/thong-ke" class="nav-link dropdown-toggle dropdown-toggle-nocaret">
                    <div class="parent-icon"><i class="fa-solid fa-calendar-check"></i>
                    </div>
                    <div class="menu-title">Thống kê và báo cáo</div>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="/admin/ratings" class="nav-link dropdown-toggle dropdown-toggle-nocaret">
                    <div class="parent-icon"><i class="fa-solid fa-vault"></i>
                    </div>
                    <div class="menu-title"> đánh giá</div>
                </a>
            </li>

        </ul>
    </nav>
</div>
