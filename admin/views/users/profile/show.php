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
                    <h1>Thông tin tài khoản cá nhân</h1>
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
                        <!-- /.card-header -->
                        <?php
                        if (isset($_SESSION['success'])) {
                        ?>
                            <div class="alert alert-success">
                                <?= $_SESSION['success']; ?>
                            </div>
                        <?php
                            unset($_SESSION['success']); // Xóa thông báo sau khi hiển thị
                        }
                        ?>

                        <div class="card-body">
                            <div class="row">
                                <!-- left column -->
                                <div class="col-md-3 mt-5">
                                    <div class="text-center">
                                        <img src="<?= BASE_URL_ADMIN . $user['anh_dai_dien']; ?>" class="avatar img-circle" alt="avatar" width="100px"
                                            onerror="this.onerror=null; this.src='https://static.vecteezy.com/system/resources/previews/019/879/186/large_2x/user-icon-on-transparent-background-free-png.png'">
                                        <h6 class="mt-2">Họ tên: <strong><?= $user['ho_ten'] ?></strong></h6>
                                        <h6 class="mt-2">Chức vụ: <strong><?= $user['chuc_vu_id'] == 1 ? "admin" : "client" ?></strong></h6>
                                    </div>
                                </div>

                                <!-- edit form column -->
                                <div class="col-md-9 personal-info">

                                    <hr>
                                    <h3>Thông tin cá nhân</h3>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label for="validationDefault01" class="form-label">Họ tên</label>
                                            <input type="text" class="form-control" id="validationDefault01" value="<?= $user['ho_ten'] ?? '' ?>" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationDefault02" class="form-label">Ngày sinh</label>
                                            <input type="text" class="form-control" id="validationDefault02" value="<?= $user['ngay_sinh'] ?? '' ?>" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationDefaultUsername" class="form-label">Email</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                                <input type="text" class="form-control" id="validationDefaultUsername" value="<?= $user['email'] ?? '' ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="validationDefault03" class="form-label">Số điện thoại</label>
                                            <input type="text" class="form-control" id="validationDefault03" value="<?= $user['so_dien_thoai'] ?? '' ?>" disabled>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="validationDefault04" class="form-label">Giới tính</label>
                                            <select class="form-select" id="validationDefault04" disabled>
                                                <option selected disabled><?= $user['gioi_tinh'] == 1 ? 'Nam' : 'Nữ' ?></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="validationDefault05" class="form-label">Địa chỉ</label>
                                            <input type="text" class="form-control" id="validationDefault05" value="<?= $user['dia_chi'] ?? '' ?>" disabled>
                                        </div>
                                        <div class="col-12">
                                            <label for="validationDefault04" class="form-label">Trạng thái</label>
                                            <select class="form-select" id="validationDefault04" disabled>
                                                <option selected disabled><?= $user['trang_thai'] == 1 ? 'Active' : 'Inactive' ?></option>
                                            </select>
                                        </div>
                                        <div class="btn-group mt-4">
                                            <a href="<?= BASE_URL_ADMIN . '?act=form-update-profile' ?>" class="btn btn-warning">
                                                Cài đặt
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
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
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Footer  -->
<?php require_once './views/layout/footer.php'; ?>
<!-- End footer  -->