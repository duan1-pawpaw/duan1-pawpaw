<?php 
     unset($_SESSION['tong_tien']);
?>

<header id="header" class="header-default header-absolute">
    <div class="px_15 lg-px_40">
        <div class="row wrapper-header align-items-center">
            <div class="col-xl-3 col-md-4 col-6">
                <a href="<?= BASE_URL ?>" class="logo-header">
                    <img src="./assets/images/logo6.png" alt="logo" style="width: 250px;">
                </a>
            </div>
            <div class="col-xl-6 tf-md-hidden">
                <nav class="box-navigation text-center">
                    <ul class="box-nav-ul d-flex align-items-center justify-content-center gap-30">
                        <li class="menu-item">
                            <a href="<?= BASE_URL ?>" class="item-link"><i class="fa-solid fa-house" style="color: black;"></i>Trang Chủ</a>
                        </li>
                        <!-- Product -->
                        <li class="menu-item">
                            <a href="<?= BASE_URL . '?act=productlist' ?>" class="item-link btn-open-sub collapsed mb-menu-link current"><i class="fa-solid fa-cat"></i>Thú Cưng</a>
                        </li>
                        <li class="menu-item position-relative">
                            <a href="<?= BASE_URL . '?act=bai_viet' ?>" class="item-link"><i class="fa-solid fa-newspaper"></i>Bài Viết</a>
                        </li>
                        <li class="menu-item position-relative">
                            <a href="<?= BASE_URL . '?act=contact' ?>" class="item-link"><i class="fa-solid fa-square-phone-flip"></i>Liên Hệ</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-xl-3 col-md-4 col-3">
                <ul class="nav-icon d-flex justify-content-end align-items-center gap-20">
                    <li class="nav-search"><a href="<?= BASE_URL . '?act=search' ?>"  aria-controls="offcanvasLeft" class="nav-icon-item"><i class="icon icon-search"></i></a></li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="icon icon-account"></i>
                        </a>
                        <ul class="dropdown-menu mt-1 dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <?php if (isset($_SESSION['user']['id'])) { ?>
                                <li><a class="dropdown-item" href="<?= BASE_URL . '?act=form-update-profile' ?>">Hồ sơ cá nhân</a></li>
                                <li><a class="dropdown-item" href="<?= BASE_URL . '?act=listOrder' ?>">Đơn hàng của tôi</a></li>
                                <li><a onclick="return confirm('Bạn Chắc Chắn Muôn Đăng Xuất Chứ??')" class="dropdown-item" href="<?= BASE_URL . '?act=logout' ?>">Đăng xuất</a></li>
                            <?php } else { ?>
                                <li><a class="dropdown-item" href="<?= BASE_URL . '?act=registers' ?>">Đăng Nhập, Ký</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="nav-wishlist"><a href="<?= BASE_URL . '?act=wishlist' ?>" class="nav-icon-item"><i class="icon icon-heart"></i><span class="count-box">0</span></a></li>
                    <li class="nav-cart"><a href="<?= BASE_URL . '?act=carts' ?>" class="nav-icon-item"><i class="icon icon-bag"></i><span class="count-box">0</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</header>