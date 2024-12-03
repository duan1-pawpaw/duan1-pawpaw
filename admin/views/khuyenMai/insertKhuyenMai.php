<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Mã Khuyễn Mãi</title>
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
                                <h3 class="card-title">Thêm Mã Khuyễn Mãi</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <?php
                                    // Lấy thông báo lỗi từ session
                                    $errors = $_SESSION['errors'] ?? [];
                                    $fromData = $_SESSION['fromData'] ?? [];
                                    // Xóa thông báo lỗi trong session sau khi hiển thị
                                    unset($_SESSION['errors']);
                                    unset($_SESSION['fromData']);
                                    ?>
                                    <div class="form-group">
                                        <label>Sản Phẩm Khuyến Mãi</label>
                                        <select name="id_san_pham" class="form-control">
                                            <option selected disabled>Chọn Sản Phẩm Khuyến Mãi</option>
                                            <?php foreach ($listProducts as $listProduct) { ?>
                                                <option value="<?= $listProduct['id'] ?>"
                                                    <?= isset($fromData['id_san_pham']) && $fromData['id_san_pham'] == $listProduct['id'] ? 'selected' : '' ?>>
                                                    <?= $listProduct['ten_san_pham'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>

                                        <?php if (isset($errors['id_san_pham'])) {
                                        ?>
                                            <p class="text-danger mt-2"><?= $errors['id_san_pham']  ?></p>
                                        <?php
                                        } ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Tên Khuyễn Mãi</label>
                                        <input type="text" class="form-control" name="ten_khuyen_mai" value="<?= $fromData['ten_khuyen_mai'] ?? '' ?>" placeholder="Nhập Tên Khuyễn Mãi..">
                                        <?php if (isset($errors['ten_khuyen_mai'])) {
                                        ?>
                                            <p class="text-danger mt-2"><?= $errors['ten_khuyen_mai']  ?></p>
                                        <?php
                                        } ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Mã Khuyến Mãi:</label>
                                        <input type="text" class="form-control" name="ma_khuyen_mai" value="<?= $fromData['ma_khuyen_mai'] ?? '' ?>" placeholder="Nhập Mã Khuyễn Mãi..">
                                        <?php if (isset($errors['ma_khuyen_mai'])) {
                                        ?>
                                            <p class="text-danger mt-2"><?= $errors['ma_khuyen_mai']  ?></p>
                                        <?php
                                        } ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Giá Trị Khuyễn Mãi:</label>
                                        <input type="text" class="form-control" name="gia_tri" value="<?= $fromData['gia_tri'] ?? '' ?>" placeholder="Nhập Giá Trị Khuyễn Mãi..">
                                        <?php if (isset($errors['gia_tri'])) {
                                        ?>
                                            <p class="text-danger mt-2"><?= $errors['gia_tri']  ?></p>
                                        <?php
                                        } ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Số Lượt Sử Dụng:</label>
                                        <input type="text" class="form-control" name="so_luong_su_dung_con_lai" value="<?= $fromData['so_luong_su_dung_con_lai'] ?? '' ?>" placeholder="Nhập Giá Trị Khuyễn Mãi..">
                                        <?php if (isset($errors['so_luong_su_dung_con_lai'])) {
                                        ?>
                                            <p class="text-danger mt-2"><?= $errors['so_luong_su_dung_con_lai']  ?></p>
                                        <?php
                                        } ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Ngày Bắt Đầu:</label>
                                        <input type="date" class="form-control" name="ngay_bat_dau" value="<?= $fromData['ngay_bat_dau'] ?? '' ?>" placeholder="Chọn Ngày Bắt Đầu Khuyễn Mãi..">
                                        <?php if (isset($errors['ngay_bat_dau'])) {
                                        ?>
                                            <p class="text-danger mt-2"><?= $errors['ngay_bat_dau']  ?></p>
                                        <?php
                                        } ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Ngày Kết Thúc:</label>
                                        <input type="date" class="form-control" name="ngay_ket_thuc" value="<?= $fromData['ngay_ket_thuc'] ?? '' ?>" placeholder="Chọn Ngày Kết Thúc Khuyễn Mãi..">
                                        <?php if (isset($errors['ngay_ket_thuc'])) {
                                        ?>
                                            <p class="text-danger mt-2"><?= $errors['ngay_ket_thuc']  ?></p>
                                        <?php
                                        } ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Mô Tả:</label>
                                        <textarea name="mo_ta" class="form-control" id="" placeholder="Nhập Mô Tả.."><?= $fromData['mo_ta'] ?? '' ?></textarea>
                                        <?php if (isset($errors['mo_ta'])) {
                                        ?>
                                            <p class="text-danger mt-2"><?= $errors['mo_ta']  ?></p>
                                        <?php
                                        } ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Trạng Thái</label>
                                        <select name="trang_thai_khuyen_mai" class="form-control" id="">
                                            <option selected disabled>Chọn Trạng Thái Khuyễn Mãi</option>
                                            <!-- <?php foreach ($listStatusVouchers as $listStatusVoucher) { ?> -->
                                            <option value="<?= $listStatusVoucher['id'] ?>"><?= $listStatusVoucher['ten_trang_thai_khuyen_mai'] ?></option>
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