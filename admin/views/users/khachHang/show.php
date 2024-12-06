<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- header  -->
    <?php require_once './views/layout/header.php'; ?>
    <!-- Navbar -->
    <?php require_once './views/layout/nav.php'; ?>
    <!-- /.navbar -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Quản Lý Khuyễn Mãi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="section-title">Xem Chi Tiết</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <td>
                                            <img src="<?= BASE_URL . $user['anh_dai_dien'] ?>"
                                                style="width:80%; " alt=""
                                                onerror="this.onerror=null; this.src='https://static.vecteezy.com/system/resources/previews/000/439/863/original/vector-users-icon.jpg'">
                                        </td>
                                    </div>
                                    <div class="col-8">
                                        <table class="table table-borderless">
                                            <tbody style="font-size: large;">
                                                <tr>
                                                    <th>Họ tên:</th>
                                                    <td><?= $user['ho_ten'] ?? '(Chưa Cập Nhật)' ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Ngày sinh:</th>
                                                    <td><?= $user['ngay_sinh'] ?? '(Chưa Cập Nhật)' ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Email:</th>
                                                    <td><?= $user['email'] ?? '(Chưa Cập Nhật)' ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Số điện thoại:</th>
                                                    <td><?= $user['so_dien_thoai'] ?? '(Chưa Cập Nhật)' ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Giới tính:</th>
                                                    <td><?= $user['gioi_tinh'] == 1 ? 'Nam' : 'Nữ' ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Địa chỉ:</th>
                                                    <td><?= $user['dia_chi'] ?? '(Chưa Cập Nhật)' ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Trạng thái:</th>
                                                    <td><?= $user['trang_thai'] == 1 ? 'Active' : 'Inactive' ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-12">
                                        <hr>
                                        <h2>Lịch sử mua hàng</h2>
                                        <div>
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Mã Đơn Hàng</th>
                                                        <th>Tên Người Nhận</th>
                                                        <th>SĐT</th>
                                                        <th>Ngày Đặt</th>
                                                        <th>Tổng tiền</th>
                                                        <th>Trạng Thái</th>
                                                        <th>Thao Tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($listDonHang as $key => $DonHang) {
                                                    ?>
                                                        <tr>
                                                            <td><?= ++$key ?></td>
                                                            <td><?= $DonHang['ma_don_hang'] ?></td>
                                                            <td><?= $DonHang['ten_nguoi_nhan'] ?></td>
                                                            <td><?= $DonHang['sdt_nguoi_nhan'] ?></td>
                                                            <td><?= formartDate($DonHang['ngay_dat']) ?></td>
                                                            <td><?= number_format($DonHang['tong_tien']) ?></td>
                                                            <td><?= $DonHang['ten_trang_thai'] ?></td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a href="<?= BASE_URL_ADMIN . '?act=update_order&order_id=' . $DonHang['id'] ?>"><button class="btn btn-primary">Chi Tiết</button></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php }  ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <hr>
                                        <h2>Lịch sử bình luận</h2>
                                        <div>
                                            <table id="example2" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Sản Phẩm</th>
                                                        <th>Nội Dung</th>
                                                        <th>Ngày Bình Luận</th>
                                                        <th>Trạng Thái</th>
                                                        <th>Thao Tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($listBinhLuan as $key => $BinhLuan) {
                                                    ?>
                                                        <tr>
                                                            <td><?= ++$key ?></td>
                                                            <td><a target="_blank" href="<?= BASE_URL_ADMIN . '?act=show-product&id=' . $BinhLuan['san_pham_id'] ?>"><?= $BinhLuan['ten_san_pham'] ?></a></td>
                                                            <td><?= $BinhLuan['noi_dung'] ?></td>
                                                            <td><?= formartDate($BinhLuan['ngay_dang']) ?></td>
                                                            <td><?= $BinhLuan['trang_thai'] == 1 ? 'Hiện Thị' : 'Bị Ẩn' ?></td>
                                                            <td>
                                                            <?php if ($BinhLuan['trang_thai'] == 1) { ?>
                                                                <a href="<?= BASE_URL_ADMIN . '?act=updateComment&id_binh_luan=' . $BinhLuan['id'] .'&id_san_pham=' .$BinhLuan['san_pham_id'] . '&trang_thai=0' ?>"><button class="btn btn-danger">Ẩn</button></a>
                                                             <?php } else { ?>
                                                                <a href="<?= BASE_URL_ADMIN . '?act=updateComment&id_binh_luan=' . $BinhLuan['id'] .'&id_san_pham=' .$BinhLuan['san_pham_id']  . '&trang_thai=1' ?>"><button class="btn btn-info">Bỏ Ẩn</button></a>
                                                            </td>
                                                        </tr>
                                                    <?php } }?>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- Footer  -->
    <?php require_once './views/layout/footer.php'; ?>
    <!-- End footer  -->
</body>

</html>