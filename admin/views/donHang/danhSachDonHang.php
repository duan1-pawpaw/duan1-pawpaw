<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Đơn Hàng</title>
</head>

<body>
    <?php require_once './views/layout/header.php' ?>
    <?php require_once './views/layout/nav.php' ?>

    <!-- ConTent -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Quản Lý Đơn Hàng</h1>
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
                            <!-- /.card-header -->
                            <div class="card-header">
                                <input type="text" id="searchProduct" class="form-control" placeholder="Tìm kiếm đơn hàng..." style="width: 300px; margin-left: 75%;">
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã Đơn Hàng</th>
                                            <th>Người Nhận</th>
                                            <th>Số Điện Thoại Người Nhận</th>
                                            <th>Email Người Nhận</th>
                                            <th>Ngày Đặt</th>
                                            <th>Tổng Tiền</th>
                                            <th>Trạng Thái</th>
                                            <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($list_orders as $key => $list_order) { ?>
                                            <tr>
                                                <td><?= ++$key ?></td>
                                                <td><?= $list_order['ma_don_hang'] ?></td>
                                                <td><?= $list_order['ten_nguoi_nhan'] ?></td>
                                                <td><?= $list_order['sdt_nguoi_nhan'] ?></td>
                                                <td><?= $list_order['email_nguoi_nhan'] ?></td>
                                                <td><?= formartDate($list_order['ngay_dat']) ?></td>
                                                <td><?= number_format($list_order['tong_tien']) ?></td>
                                                <td>
                                                    <?php
                                                    if ($list_order['trang_thai_id'] == 2) {
                                                        $colorAlert = 'warning';
                                                    } else if ($list_order['trang_thai_id'] == 3) {
                                                        $colorAlert = 'danger';
                                                    } else if ($list_order['trang_thai_id'] > 6) {
                                                        $colorAlert = 'success';
                                                    } else {
                                                        $colorAlert = 'warning';
                                                    }
                                                    ?>
                                                    <div class="badge badge-<?= $colorAlert; ?> mt-1 d-flex align-items-center justify-content-center" style="height: 25px;"><?= $list_order['ten_trang_thai'] ?></div>
                                                </td>
                                                <td><a href="<?= BASE_URL_ADMIN . '?act=update_order&order_id=' . $list_order['id'] ?>"><button class="btn btn-warning">Sửa</button></a></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã Đơn Hàng</th>
                                            <th>Người Nhận</th>
                                            <th>Số Điện Thoại Người Nhận</th>
                                            <th>Email Người Nhận</th>
                                            <th>Ngày Đặt</th>
                                            <th>Tổng Tiền</th>
                                            <th>Trạng Thái</th>
                                            <th>Thao Tác</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
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
    <?php require_once './views/layout/footer.php' ?>
</body>

</html>