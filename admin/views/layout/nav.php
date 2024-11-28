<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        <nav class="navbar header-navbar pcoded-header">
            <div class="navbar-wrapper">

                <div class="navbar-logo">
                    <a class="mobile-menu" id="mobile-collapse" href="#!">
                        <i class="ti-menu"></i>
                    </a>
                    <a class="mobile-search morphsearch-search" href="#">
                        <i class="ti-search"></i>
                    </a>
                    <a href="index.html">
                        <img class="img-fluid" width="170" style="margin-left: 10px;" src="../assets/images/logo5.JPG" alt="Theme-Logo" />
                    </a>
                    <a class="mobile-options">
                        <i class="ti-more"></i>
                    </a>
                </div>

                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        <li>
                            <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                        </li>

                        <li>
                            <a href="#!" onclick="javascript:toggleFullScreen()">
                                <i class="ti-fullscreen"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="header-notification">
                            <a href="#!">
                                <i class="ti-bell"></i>
                                <span class="badge bg-c-pink"></span>
                            </a>
                            <ul class="show-notification">
                                <li>
                                    <h6>Notifications</h6>
                                    <label class="label label-danger">New</label>
                                </li>
                                <li>
                                    <div class="media">
                                        <img class="d-flex align-self-center" src="../assets/images/user.png" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <h5 class="notification-user">John Doe</h5>
                                            <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                            <span class="notification-time">30 minutes ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <img class="d-flex align-self-center" src="../assets/images/user.png" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <h5 class="notification-user">Joseph William</h5>
                                            <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                            <span class="notification-time">30 minutes ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <img class="d-flex align-self-center" src="../assets/images/user.png" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <h5 class="notification-user">Sara Soudein</h5>
                                            <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                            <span class="notification-time">30 minutes ago</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>

                        <li class="user-profile header-notification">
                            <a href="#!">
                                <img src="../assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image">
                                <span>John Doe</span>
                                <i class="ti-angle-down"></i>
                            </a>
                            <ul class="show-notification profile-notification">
                                <li>
                                    <a href="<?= BASE_URL_ADMIN . '?act=users-admin' ?>">
                                        <i class="ti-user"></i> Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= BASE_URL_ADMIN . '?act=logout' ?>">
                                        <i class="ti-layout-sidebar-left"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>


        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <nav class="pcoded-navbar">
                    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                    <div class="pcoded-inner-navbar main-menu">
                        <div class="">
                            <div class="main-menu-header">
                                <img class="img-40 img-radius" src="../assets/images/avatar-4.jpg" alt="User-Profile-Image">
                                <div class="user-details">
                                    <span><?= $_SESSION['user']['ho_ten'] ?></span>
                                    <span id="more-details">Infomation<i class="ti-angle-down"></i></span>
                                </div>
                            </div>

                            <div class="main-menu-content">
                                <ul>
                                    <li class="more-details">
                                        <a href="<?= BASE_URL_ADMIN . '?act=users-admin' ?>"><i class="ti-user"></i>View Profile</a>
                                        <a href="<?= BASE_URL_ADMIN . '?act=logout' ?>"><i class="ti-layout-sidebar-left"></i>Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="pcoded-search">
                            <span class="searchbar-toggle"> </span>
                            <div class="pcoded-search-box ">
                                <input type="text" placeholder="Search">
                                <span class="search-icon"><i class="ti-search" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Navigation</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="">
                                <a href="<?= BASE_URL_ADMIN ?>">
                                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= BASE_URL_ADMIN . '?act=categorys' ?>">
                                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Quản Lý Danh Mục</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= BASE_URL_ADMIN . '?act=products' ?>">
                                    <span class="pcoded-micon"><i class="fa-brands fa-product-hunt"></i></b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Quản Lý Sản Phẩm</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= BASE_URL_ADMIN . '?act=list_vouchers' ?>">
                                    <span class="pcoded-micon"><i class="fa-solid fa-ticket"></i></b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Quản Lý Khuyến Mãi</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= BASE_URL_ADMIN . '?act=list_order' ?>">
                                    <span class="pcoded-micon"><i class="fa-regular fa-folder"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Quản Lý Đơn Hàng</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="pcoded-hasmenu ">
                                <a href="#">
                                    <span class="pcoded-micon"><i class="fa-regular fa-user"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Quản Lý Tài Khoản</span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class=" ">
                                        <a href="<?= BASE_URL_ADMIN . '?act=users-khachHang' ?>">
                                            <span><i class="fa-solid fa-user-gear"></i>Tài Khoản Khách Hàng</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <!-- <li class=" ">
                                        <a href="#">
                                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Tài Khoản Nhân Viên</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li> -->
                                    <li class=" ">
                                        <a href="<?= BASE_URL_ADMIN . '?act=users-admin' ?>">
                                            <span><i class="fa-solid fa-user-pen"></i>Tài Khoản Cá Nhân</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                            <a href="<?= BASE_URL_ADMIN . '?act=rating' ?>">
                                <span class="pcoded-micon"><i class="fa-solid fa-star-half-stroke"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.form-components.main">Quản Lý Đánh Giá</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= BASE_URL_ADMIN . '?act=binh_luan' ?>">
                                <span class="pcoded-micon"><i class="fa-regular fa-comments"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.form-components.main">Quản Lý Bình Luận</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= BASE_URL_ADMIN . '?act=quan_ly_tin' ?>">
                                <span class="pcoded-micon"><i class="fa-solid fa-newspaper"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.form-components.main">Quản Lý Tin Tức</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= BASE_URL_ADMIN . '?act=quan_ly_lh' ?>">
                                <span class="pcoded-micon"><i class="fa-regular fa-images"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.form-components.main">Quản Lý Liên Hệ</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= BASE_URL_ADMIN . '?act=quan_ly_banner' ?>">
                                <span class="pcoded-micon"><i class="fa-regular fa-images"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.form-components.main">Quản Lý Banner</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        </li>
                        </ul>
                        
                        <div style="width: 100%; height: 3px; background-color: white; border-radius: 50%;" class="mt-5">
                            <hr>
                        </div>
                        <li class="d-flex">
                            <a onclick="return confirm('Bạn chắc chắn muốn đăng xuất không???')" href="<?= BASE_URL . '?act=logout' ?>" class="nav-link">
                                <p><i class="nav-icon fa-solid fa-arrow-right-from-bracket"></i> Đăng xuất</p>
                            </a>
                        </li>
                        </ul>

                    </div>

                </nav>
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">