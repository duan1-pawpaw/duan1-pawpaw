<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhập khuyến mãi</title>
</head>
<style>
    form select {
        width: 15%;
        padding: 5px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        outline: none;
        background-color: #fff;
        margin-bottom: 8px;
        transition: border-color 0.3s ease;
    }

    form select:focus {
        border-color: #007bff;
        /* Màu viền khi chọn */
    }

    /* CSS cho nút Submit */
    form button[type="submit"] {
        width: 7%;
        padding: 4px 0;
        font-size: 16px;
        color: #fff;
        background-color: #007bff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    form button[type="submit"]:hover {
        background-color: #0056b3;
        /* Màu khi hover */
    }
</style>

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
                        <h1>Quản Lý Mã Khuyến Mãi</h1>
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
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Sửa Mã Khuyễn Mãi</h3>
                                <!-- nếu voucher đã hoạt động thì admin chỉ có quyền sửa trạng thái của voucher -->
                                <?php if ($detailVoucher['trang_thai_khuyen_mai_id'] ==  3) { ?>
                                    <form action="<?= BASE_URL_ADMIN . '?act=update_Voucher_case_1&voucher_id=' . $detailVoucher['id'] ?>" method="POST" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <?php
                                            // Lấy thông báo lỗi từ session
                                            $errors = $_SESSION['errors'] ?? [];
                                            // Xóa thông báo lỗi trong session sau khi hiển thị
                                            unset($_SESSION['errors']);
                                            ?>
                                            <div class="form-group">
                                                <label>Sản Phẩm Khuyến Mãi</label>
                                                <select name="id_san_pham" class="form-control" id="">
                                                    <?php
                                                    //  foreach ($listCinemas as $listCinema) {
                                                    ?>
                                                    <option value="<?= $detailVoucher['id_san_pham'] ?>"><?= $detailVoucher['ten_san_pham'] ?></option>
                                                    <?php
                                                    // }
                                                    ?>
                                                </select>
                                                <?php if (isset($errors['id_san_pham'])) {
                                                ?>
                                                    <p class="text-danger mt-2"><?= $errors['id_san_pham']  ?></p>
                                                <?php
                                                } ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Tên Khuyễn Mãi</label>
                                                <input type="text" class="form-control" name="ten_khuyen_mai" value="<?= $detailVoucher['ten_khuyen_mai'] ?>">
                                                <?php if (isset($errors['ten_khuyen_mai'])) {
                                                ?>
                                                    <p class="text-danger mt-2"><?= $errors['ten_khuyen_mai']  ?></p>
                                                <?php
                                                } ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Mã Khuyến Mãi:</label>
                                                <input type="text" class="form-control" name="ma_khuyen_mai" value="<?= $detailVoucher['ma_khuyen_mai'] ?>">
                                                <?php if (isset($errors['ma_khuyen_mai'])) {
                                                ?>
                                                    <p class="text-danger mt-2"><?= $errors['ma_khuyen_mai']  ?></p>
                                                <?php
                                                } ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Giá Trị Khuyễn Mãi:</label>
                                                <input type="text" class="form-control" name="gia_tri" value="<?= $detailVoucher['gia_tri'] ?>">
                                                <?php if (isset($errors['gia_tri'])) {
                                                ?>
                                                    <p class="text-danger mt-2"><?= $errors['gia_tri']  ?></p>
                                                <?php
                                                } ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Ngày Bắt Đầu:</label>
                                                <input type="text" class="form-control" name="ngay_bat_dau" value="<?= ($detailVoucher['ngay_bat_dau']) ?>">
                                                <?php if (isset($errors['ngay_bat_dau'])) {
                                                ?>
                                                    <p class="text-danger mt-2"><?= $errors['ngay_bat_dau']  ?></p>
                                                <?php
                                                } ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Ngày Kết Thúc:</label>
                                                <input type="text" class="form-control" name="ngay_ket_thuc" value=" <?= ($detailVoucher['ngay_ket_thuc']) ?>">
                                                <?php if (isset($errors['ngay_ket_thuc'])) {
                                                ?>
                                                    <p class="text-danger mt-2"><?= $errors['ngay_ket_thuc']  ?></p>
                                                <?php
                                                } ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Mô Tả:</label>
                                                <textarea name="mo_ta" class="form-control" id="" value="<?= $detailVoucher['mo_ta'] ?? "Nhập Mô Tả..." ?>"></textarea>
                                                <?php if (isset($errors['mo_ta'])) {
                                                ?>
                                                    <p class="text-danger mt-2"><?= $errors['mo_ta']  ?></p>
                                                <?php
                                                } ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Trạng Thái</label>
                                                <select name="trang_thai_khuyen_mai" class="form-control" id="">
                                                    <!-- <?php foreach ($listStatusVouchers as $listStatusVoucher) { ?> -->
                                                    <option <?= $listStatusVoucher['id'] == $detailVoucher['trang_thai_khuyen_mai_id'] ? 'selected' : ''  ?> value="<?= $listStatusVoucher['id'] ?>"><?= $listStatusVoucher['ten_trang_thai_khuyen_mai'] ?></option>
                                                    <!-- <?php } ?> -->
                                                </select>
                                                <?php if (isset($errors['trang_thai_khuyen_mai'])) {
                                                ?>
                                                    <p class="text-danger mt-2"><?= $errors['trang_thai_khuyen_mai']  ?></p>
                                                <?php
                                                } ?>
                                            </div>

                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                <?php }
                                // nếu voucher đã chưa hoạt động thì admin chỉ có quyền sửa tất cả các dữ liệu của voucher 
                                else { ?>
                                    <form action="<?= BASE_URL_ADMIN . '?act=update_Voucher_case_2&voucher_id=' . $detailVoucher['id'] ?>" method="POST">
                                        <select  name="trang_thai_khuyen_mai" id="">
                                            <?php foreach ($listStatusVouchers as $key => $listStatusVoucher) { ?>
                                                <option <?= $listStatusVoucher['id'] == $detailVoucher['trang_thai_khuyen_mai_id'] ? 'selected' : '' ?> value="<?= $listStatusVoucher['id'] ?>"><?= $listStatusVoucher['ten_trang_thai_khuyen_mai'] ?> </option>
                                            <?php } ?>
                                        </select>
                                        <div class="mt-1">
                                            <button type="submit" class="btn-primary">Xác Nhận</button>
                                        </div>
                                    </form>
                            </div>

                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Tên Khuyến Mãi</th>
                                        <td><?= $detailVoucher['ten_khuyen_mai'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Mã Khuyễn Mãi</th>
                                        <td><?= $detailVoucher['ma_khuyen_mai'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Sản Phẩm Khuyển Mãi</th>
                                        <td><?= $detailVoucher['ten_san_pham'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Ngày Bắt Đầu</th>
                                        <td><?= formartDate($detailVoucher['ngay_bat_dau']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Ngày Kết Thúc</th>
                                        <td><?= formartDate($detailVoucher['ngay_ket_thuc']) ?></td>
                                    </tr>
                                    <?php if (!empty($detailVoucher['mo_ta'])) { ?>
                                        <tr>
                                            <th>Mô Tả</th>
                                            <td><?= $detailVoucher['mo_ta'] ?></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>

                        <?php } ?>
                        </div>
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