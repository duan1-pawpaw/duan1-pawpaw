<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php require_once './views/layout/header.php' ?>
    <?php require_once './views/layout/menu.php' ?>
    <div class="tf-page-title" style="margin-top: 100px;">
        <div class="container-full">
            <div class="heading text-center">My Orders</div>
        </div>
    </div>
    <section class="flat-spacing-11">
        <div class="container">
            <div class="row">
                <div class="col-lg-9" style="margin-left: 180px;">
                    <div class="wd-form-order">
                        <div class="order-head">
                            <div class="content">
                                <?php if ($sanphamDonhang['trang_thai_id'] < 7) { ?>
                                    <div class="badge bg-warning">Đang Tiến Hành</div>
                                <?php } else if($sanphamDonhang['trang_thai_id'] == 8 || $sanphamDonhang['trang_thai_id'] == 12){ ?>
                                    <div class="badge bg-success">Đơn Hàng đã <?= $sanphamDonhang['ten_trang_thai'] ?></div>
                                <?php } else{?>
                                    <div class="badge bg-danger">Đơn Hàng đã <?= $sanphamDonhang['ten_trang_thai'] ?></div>
                                <?php } ?>
                                <h6 class="mt-8 fw-5">Mã Đơn Hàng: <?= $sanphamDonhang['ma_don_hang'] ?></h6>
                            </div>
                        </div>
                        <div class="tf-grid-layout md-col-2 gap-15">
                            <div class="item">
                                <div class="text-2 text_black-2">Danh Mục</div>
                                <?php foreach ($productOfDetailOrder as $row) { ?>
                                    <div class="text-2 mt_4 fw-6"><?= $row['ten_danh_muc'] ?></div>
                                <?php } ?>
                            </div>
                            <div class="item">
                                <div class="text-2 text_black-2">Trạng Thái</div>
                                <div class="text-2 mt_4 fw-6"><?= $sanphamDonhang['ten_trang_thai'] ?></div>
                            </div>
                            <div class="item">
                                <div class="text-2 text_black-2">Ngày Đặt</div>
                                <div class="text-2 mt_4 fw-6"><?= formartDate($sanphamDonhang['ngay_dat']) ?></div>
                            </div>
                            <div class="item">
                                <div class="text-2 text_black-2">Địa Chỉ</div>
                                <div class="text-2 mt_4 fw-6"><?= $sanphamDonhang['dia_chi_nguoi_nhan'] ?></div>
                            </div>
                        </div>
                        <div class="widget-tabs style-has-border widget-order-tab">
                            <ul class="widget-menu-tab">
                                <li class="item-title active">
                                    <span class="inner">Chi Tiết Sản Phẩm</span>
                                </li>
                                <li class="item-title">
                                    <span class="inner">Người Nhận</span>
                                </li>
                            </ul>
                            <div class="widget-content-tab">
                                <div class="widget-content-inner active">
                                    <?php $thanh_tien = 0;
                                    foreach ($productOfDetailOrder as $row) { ?>
                                        <div class="order-head">
                                            <figure class="img-product">
                                                <img src="<?= $row['hinh_anh'] ?>" alt="product">
                                            </figure>
                                            <div class="content">
                                                <a href="<?= BASE_URL . '?act=show-product&id=' . $row['san_pham_id'] ?>">
                                                    <div class="text-2 fw-6"><?= $row['ten_san_pham'] ?></div>
                                                </a>
                                                <div class="mt_4"><span class="fw-6">Đơn Giá: </span><?= number_format($row['don_gia']) ?>vnđ</div>
                                                <div class="mt_4"><span class="fw-6">Số Lượng: </span><?= $row['so_luong'] ?></div>
                                            </div>
                                        </div>

                                    <?php $thanh_tien += ($row['so_luong'] * $row['don_gia']);
                                        echo $thanh_tien;
                                    } ?>
                                    <ul>
                                        <li class="d-flex justify-content-between text-2">
                                            <span>Tổng Tiền</span>
                                            <span class="fw-6"><?= number_format($sanphamDonhang['tong_tien'] - 30000) ?>vnđ</span>
                                        </li>
                                        <li class="d-flex justify-content-between text-2">
                                            <span>Tổng Vận Chuyển</span>
                                            <span class="fw-6">30.000vnđ</span>
                                        </li>
                                        <li class="d-flex justify-content-between text-2 mt_4 pb_8 line">
                                            <span>Giảm Giá</span>
                                            <span class="fw-6"><?= number_format($sanphamDonhang['tong_tien'] - $thanh_tien - 30000) ?>vnđ</span>

                                        </li>
                                        <li class="d-flex justify-content-between text-2 mt_8">
                                            <span>Tổng Tiền Đơn Hàng</span>
                                            <span class="fw-6"><?= number_format($sanphamDonhang['tong_tien']) ?>vnđ</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="widget-content-inner">
                                    <?php if ($sanphamDonhang['trang_thai_id'] < 7) { ?>
                                        <p class="text-2 text_success">Chúng tôi rất vui khi nhận được đơn hàng của bạn!!</p>
                                    <?php } else { ?>
                                        <p class="text-2 text_success">Cảm ơn bạn đã đặt hàng!!</p>
                                    <?php } ?>
                                    <ul class="mt_20">
                                        <?php
                                        // tính thời gian nhận hàng cách lúc đặt hàng 3 ngày
                                        $date = new DateTime($sanphamDonhang['ngay_dat']);
                                        $date->modify('+3 days');
                                        ?>
                                        <li>Số Điện Thoại Người Nhận: <span class="fw-7"><?= $sanphamDonhang['sdt_nguoi_nhan'] ?></span></li>
                                        <li>Ngày Nhận Hàng Dự Kiến: <span class="fw-7"><?= $date->format('d-m-Y') ?></span></li>
                                        <li>Tổng Đơn Hàng:
                                            <?php if ($sanphamDonhang['trang_thai_id'] == 2) { ?>
                                                <span class="fw-7"><?= number_format($sanphamDonhang['tong_tien']) ?>vnđ (Đã Thanh Toán)</span>
                                            <?php } else { ?>
                                                <span class="fw-7"><?= number_format($sanphamDonhang['tong_tien']) ?>vnđ</span>
                                            <?php } ?>
                                        </li>
                                        <li>Phương Thức Thanh Toán:<span class="fw-7"><?= $sanphamDonhang['phuong_thuc_thanh_toan_id'] == 1 ? "COD (Thanh toán khi nhận hàng)" : "VNP" ?></span></li>

                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php require_once './views/layout/footer.php' ?>
</body>

</html>