<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php require_once './views/layout/header.php' ?>
    <?php require_once './views/layout/nav.php' ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                    <div class="callout callout-info col-10">
                        <h2><i class="fas fa-info"></i>Chi Tiết Đơn Hàng</h2>
                    </div>
                    <div class="col-sm-2 col-2">
                        <form action="" method="POST">
                            <select style="color: black;" name="trang_thai_id" id="" class="form-control mb-1">
                                <?php foreach ($listTrangThaiDonHang as $key => $trangThaiDonhang) {
                                ?>
                                    <option <?php

                                            if (
                                                $detailOrder['trang_thai_id'] > $trangThaiDonhang['id']
                                                || $detailOrder['trang_thai_id'] > 7
                                            ) {
                                                echo 'disabled';
                                            }

                                            ?> <?= $trangThaiDonhang['id'] == $detailOrder['trang_thai_id'] ? 'selected' : '' ?> value="<?= $trangThaiDonhang['id']; ?>">
                                        <?= $trangThaiDonhang['ten_trang_thai']; ?>
                                    </option>
                                <?php
                                } ?>

                            </select>
                            <div class="card">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    </div>
                    <!-- Main content -->
                    <div class="card">
                        <?php
                        if ($detailOrder['trang_thai_id'] == 2 && $detailOrder['trang_thai_id'] >3 && $detailOrder['trang_thai_id'] < 8 && $detailOrder['trang_thai_id'] >8 ) {
                            $colorAlert = 'warning';
                        } else if ($detailOrder['trang_thai_id'] == 3 || $detailOrder['trang_thai_id'] == 10 ) {
                            $colorAlert = 'danger';
                        } else if ($detailOrder['trang_thai_id'] == 8 || $detailOrder['trang_thai_id'] == 12) {
                            $colorAlert = 'success';
                        } else {
                            $colorAlert = 'warning';
                        }
                        ?>
                        <div class="alert alert-<?= $colorAlert; ?> mb-3" role="alert">
                            Đơn hàng: <?= $detailOrder['ten_trang_thai'] ?>
                        </div>
                        <div class="card-body">
                            <div class="invoice p-3 mb-3">
                                <!-- title row -->
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <i class="fas fa-globe"></i> Mã Đơn Hàng: <?= $detailOrder['ma_don_hang'] ?>
                                            <small class="float-right">Date: <?= formartDate($detailOrder['ngay_dat']) ?></small>
                                        </h4>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- info row -->
                                <div class="row invoice-info mt-4">
                                    <div class="col-sm-4 invoice-col">
                                        From
                                        <address>
                                            <strong>Người Gửi:</strong><br>
                                            <?= $detailOrder['ho_ten'] ?><br>
                                            <?= $detailOrder['email'] ?><br>
                                            <?= $detailOrder['so_dien_thoai'] ?? "(Chưa Cập Nhật Số Điện Thoại)" ?><br>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        To
                                        <address>
                                            <strong>Người Nhận</strong><br>
                                            <?= $detailOrder['ten_nguoi_nhan'] ?><br>
                                            <?= $detailOrder['email_nguoi_nhan'] ?><br>
                                            <?= $detailOrder['sdt_nguoi_nhan'] ?><br>
                                            <?= $detailOrder['dia_chi_nguoi_nhan'] ?><br>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col mt-3">
                                        <strong>Thông Tin Đơn Hàng</strong><br>
                                        <b>Mã Đơn Hàng:</b> <?= $detailOrder['ma_don_hang'] ?><br>
                                        <b>Tổng Tiền:</b> <?= number_format($detailOrder['tong_tien']) ?><br>
                                        <b>Ghi Chú: </b><?= $detailOrder['ghi_chu'] ?? "(Không Có Ghi Chú)" ?><br>
                                        <b>Phương Thức Thanh Toán:</b><?= $detailOrder['ten_phuong_thuc'] ?>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- Table row -->
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Sản Phẩm</th>
                                                    <th>Đơn Giá</th>
                                                    <th>Số Lượng</th>
                                                    <th>Thành Tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($getProductOrders as $getProductOrder) { ?>
                                                    <tr>
                                                        <td>1</td>
                                                        <td><?= $getProductOrder['ten_san_pham'] ?></td>
                                                        <td><?= number_format($getProductOrder['don_gia']) ?></td>
                                                        <td><?= $getProductOrder['so_luong'] ?></td>
                                                        <td><?= number_format($getProductOrder['thanh_tien']) ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <div class="col-6">
                                        <p class="lead">Ngày Nhận Hàng Dự Kiến: <?= date('d-m-y', strtotime('+5 days')) ?></p>

                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <th style="width:50%">Thành Tiền:</th>
                                                    <td><?= number_format($detailOrder['tong_tien'] - 30000) ?>VNĐ</td>
                                                </tr>
                                                <tr>
                                                    <th>Thuế VAT:</th>
                                                    <td>0%</td>
                                                </tr>
                                                <tr>
                                                    <th>Vận Chuyển:</th>
                                                    <td>30,000VNĐ</td>
                                                </tr>
                                                <tr>
                                                    <th>Tổng Tiền:</th>
                                                    <td><?= number_format($detailOrder['tong_tien']) ?>VNĐ</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <?php require_once './views/layout/footer.php' ?>
</body>

</html>