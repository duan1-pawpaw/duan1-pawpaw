<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách khuyễn mãi</title>
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
                                <a href="<?= BASE_URL_ADMIN . '?act=insert_vouchers' ?>"><button class="btn btn-success">Thêm Mã Khuyễn Mãi</button></a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên Khuyến Mãi</th>
                                            <th>Mã Khuyến Mãi</th>
                                            <th>Sản Phẩm</th>
                                            <th>Giá Trị(%)</th>
                                            <th>Ngày Bắt Đầu</th>
                                            <th>Ngày Kết Thúc</th>
                                            <th>Trạng Thái</th>
                                            <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listVouchers as $key=>$row) {
                                        ?>
                                            <tr>
                                                <td><?= ++$key ?></td>
                                                <td><?= $row['ten_khuyen_mai'] ?></td>
                                                <td><?= $row['ma_khuyen_mai'] ?></td>
                                                <td><?= $row['ten_san_pham'] ?></td>
                                                <td><?= $row['gia_tri'] ?></td>
                                                <td><?= $row['ngay_bat_dau'] ?></td>
                                                <td><?= $row['ngay_ket_thuc'] ?></td>
                                                <td><?= $row['ten_trang_thai_khuyen_mai'] ?></td>
                                                <td>
                                                    <a href="<?= BASE_URL_ADMIN . '?act=update_Vouchers&voucher_id=' . $row['id'] ?>"><button class="btn btn-warning">Sửa</button></a>

                                                    <a onclick="return confirm('Bạn có muốn xóa ẩn mã khuyến mãi này không??')" href="<?= BASE_URL_ADMIN . '?act=hidden_Vouchers&voucher_id=' . $row['id'] ?>"><button class="btn btn-warning">Ẩn</button></a>
                                                </td>
                                            </tr>
                                        <?php } ?>


                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên Khuyến Mãi</th>
                                            <th>Mã Khuyến Mãi</th>
                                            <th>Sản Phẩm</th>
                                            <th>Giá Trị (%)</th>
                                            <th>Ngày Bắt Đầu</th>
                                            <th>Ngày Kết Thúc</th>
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