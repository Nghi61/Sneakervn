<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-light.png" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="/admin">
                        <i class="ri-dashboard-2-line"></i> <span>Dashboards</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Tài khoản</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/admin/user/create" class="nav-link" data-key="t-calendar">Thêm mới</a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/user" class="nav-link" data-key="t-chat"> Danh sách </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Sản Phẩm</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/admin/product/create" class="nav-link" data-key="t-calendar">Thêm mới</a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/product" class="nav-link" data-key="t-chat"> Danh sách </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/categories" class="nav-link" data-key="t-chat"> Danh mục </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="/admin/comments">
                        <i class="ri-honour-line"></i> <span data-key="t-widgets">Bình luận</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="/admin/contract">
                        <i class="ri-honour-line"></i> <span data-key="t-widgets">Phản hồi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="/admin/bill">
                        <i class="ri-honour-line"></i> <span data-key="t-widgets">Hóa đơn</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
