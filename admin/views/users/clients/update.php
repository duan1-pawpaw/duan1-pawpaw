<!-- header -->
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
                    <h1>Quản Lý Tài Khoản Người Dùng</h1>
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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h4>Cập nhật tài khoản <strong><?= $user['ho_ten'] ?></strong> </h4>`
                        </div>
                        <form action="" method="POST">
                            <input type="hidden" name="khach_hang_id" value="<?= $user['id'] ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Họ tên</label>
                                    <input type="text" class="form-control" name="ho_ten" value="<?= $user['ho_ten'] ?>" placeholder="Nhập họ tên">
                                    <?php if (isset($_SESSION['error']['ho_ten'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Ngày sinh</label>
                                    <input type="date" class="form-control" name="ngay_sinh" value="<?= $user['ngay_sinh'] ?>" placeholder="Nhập ngày sinh">
                                    <?php if (isset($_SESSION['error']['ngay_sinh'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['ngay_sinh'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="<?= $user['email'] ?>" placeholder="Nhập email">
                                    <?php if (isset($_SESSION['error']['email'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" class="form-control" name="so_dien_thoai" value="<?= $user['so_dien_thoai'] ?>" placeholder="Nhập số điện thoại">
                                    <?php if (isset($_SESSION['error']['so_dien_thoai'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['so_dien_thoai'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="inoutStatus">Giới tính</label>
                                    <select id="inoutStatus" name="gioi_tinh" class="form-control custom-select">
                                        <option <?= $user['gioi_tinh'] == 1 ? 'selected' : '' ?> value="1">Nam</option>
                                        <option <?= $user['gioi_tinh'] !== 1 ? 'selected' : '' ?> value="2">Nữ</option>
                                    </select>
                                    <?php if (isset($_SESSION['error']['gioi_tinh'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['gioi_tinh'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control" name="dia_chi" value="<?= $user['dia_chi'] ?>" placeholder="Nhập địa chỉ">
                                    <?php if (isset($_SESSION['error']['dia_chi'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['dia_chi'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="inoutStatus">Trạng thái tài khoản</label>
                                    <select id="inoutStatus" name="trang_thai" class="form-control custom-select">
                                        <option <?= $user['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Active</option>
                                        <option <?= $user['trang_thai'] !== 1 ? 'selected' : '' ?> value="2">Inactive</option>
                                    </select>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
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
<!-- End footer  -->>