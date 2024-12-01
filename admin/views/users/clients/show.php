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
                                            onerror="this.onerror=null; this.src='https://static.vecteezy.com/system/resources/previews/019/879/186/large_2x/user-icon-on-transparent-background-free-png.png'">
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
                                                <?php foreach ($orders as $key => $order) {
                                                ?>
                                                    <tr>
                                                        <td><?= ++$key ?></td>
                                                        <td><?= $order['ma_don_hang'] ?></td>
                                                        <td><?= $order['ten_nguoi_nhan'] ?></td>
                                                        <td><?= $order['sdt_nguoi_nhan'] ?></td>
                                                        <td><?= formartDate($order['ngay_dat']) ?></td>
                                                        <td><?= number_format($order['tong_tien']) ?></td>
                                                        <td><?= $order['ten_trang_thai'] ?></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="<?= BASE_URL_ADMIN . '?act=update-order&order_id=' . $order['id'] ?>"><button class="btn btn-primary">Chi Tiết</button></a>
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
                                                <?php foreach ($comments as $key => $comment) {
                                                ?>
                                                    <tr>
                                                        <td><?= ++$key ?></td>
                                                        <td><a target="_blank" href="<?= BASE_URL_ADMIN . '?act=show-product&id=' . $comment['san_pham_id'] ?>"><?= $comment['ten_san_pham'] ?></a></td>
                                                        <td><?= $comment['noi_dung'] ?></td>
                                                        <td><?= formartDate($comment['ngay_dang']) ?></td>
                                                        <td><?= $comment['trang_thai'] == 1 ? 'Hiện Thị' : 'Bị Ẩn' ?></td>
                                                        <td>
                                                            <?php if ($comment['trang_thai'] == 1) { ?>
                                                                <a href="<?= BASE_URL_ADMIN . '?act=updateComment&id_binh_luan=' . $comment['id'] . '&id_san_pham=' . $comment['san_pham_id'] . '&trang_thai=0' ?>"><button class="btn btn-danger">Ẩn</button></a>
                                                            <?php } else { ?>
                                                                <a href="<?= BASE_URL_ADMIN . '?act=updateComment&id_binh_luan=' . $comment['id'] . '&id_san_pham=' . $comment['san_pham_id']  . '&trang_thai=1' ?>"><button class="btn btn-info">Bỏ Ẩn</button></a>
                                                        </td>
                                                    </tr>
                                            <?php }
                                                        } ?>


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
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Footer  -->
<?php require_once './views/layout/footer.php'; ?>
<!-- End footer  -->