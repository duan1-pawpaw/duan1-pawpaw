<?php require_once './views/layout/header.php' ?>
<?php require_once './views/layout/menu.php' ?>

<div class="content-wrapper">
    <div class="container">
        <!-- Main content -->
        <section class="flat-spacing-11">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->

                        <div class="mt-2">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <!-- left column -->
                                    <div class="col-md-3 mt-5">
                                        <div class="text-center">
                                            <?php
                                            // var_dump($user);die;
                                            ?>
                                            <img src="<?= BASE_URL . $user['anh_dai_dien']; ?>" id="img" class="img-fluid rounded-circle mb-3" alt="avatar" width="300px"
                                                onerror="this.onerror=null; this.src='https://static.vecteezy.com/system/resources/previews/000/439/863/original/vector-users-icon.jpg'">
                                            <h5 class="mt-2"><strong><?= $user['ho_ten'] ?></strong></h5>
                                        </div>
                                    </div>

                                    <!-- edit form column -->

                                    <div class="col-md-9 personal-info">
                                        <?php
                                        if (isset($_SESSION['success'])) {
                                        ?>
                                            <div class="alert alert-info alert-dismissable">
                                                <?= $_SESSION['success']; ?>
                                            </div>
                                        <?php
                                            unset($_SESSION['success']); // Xóa thông báo sau khi hiển thị
                                        }
                                        ?>
                                        <form method="post" action="<?= BASE_URL . '?act=update-profile' ?>" enctype="multipart/form-data">
                                            <hr>
                                            <h3>Thông tin cá nhân</h3>
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Ảnh Đại Diện:</label>
                                                <div class="col-lg-12">
                                                    <input type="file" id="input" class="form-control" name="avata">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Họ tên:</label>
                                                <div class="col-lg-12">
                                                    <input type="text" class="form-control" name="ho_ten"
                                                        value="<?= $_SESSION['old_data']['ho_ten'] ?? $user['ho_ten'] ?? '' ?>"
                                                        placeholder="Nhập họ tên">
                                                    <?php if (isset($_SESSION['error']['ho_ten'])) { ?>
                                                        <p class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Ngày sinh:</label>
                                                <div class="col-lg-12">
                                                    <input type="date" class="form-control" name="ngay_sinh"
                                                        value="<?= $_SESSION['old_data']['ngay_sinh'] ?? $user['ngay_sinh'] ?? '' ?>"
                                                        placeholder="Nhập ngày sinh">
                                                    <?php if (isset($_SESSION['error']['ngay_sinh'])) { ?>
                                                        <p class="text-danger"><?= $_SESSION['error']['ngay_sinh'] ?></p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Email:</label>
                                                <div class="col-lg-12">
                                                    <input type="email" class="form-control" name="email"
                                                        value="<?= $_SESSION['old_data']['email'] ?? $user['email'] ?? '' ?>"
                                                        placeholder="Nhập email">
                                                    <?php if (isset($_SESSION['error']['email'])) { ?>
                                                        <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Số điện thoại:</label>
                                                <div class="col-lg-12">
                                                    <input type="number" class="form-control" name="so_dien_thoai"
                                                        value="<?= $_SESSION['old_data']['so_dien_thoai'] ?? $user['so_dien_thoai']  ?? ''  ?>"
                                                        placeholder="Nhập số điện thoại">
                                                    <?php if (isset($_SESSION['error']['so_dien_thoai'])) { ?>
                                                        <p class="text-danger"><?= $_SESSION['error']['so_dien_thoai'] ?></p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Giới tính:</label>
                                                <div class="col-lg-12">
                                                    <div class="ui-select">
                                                        <select id="inoutStatus" name="gioi_tinh" class="form-control custom-select">
                                                            <option <?= ($_SESSION['old_data']['gioi_tinh'] ?? $user['gioi_tinh']) == 1 ? 'selected' : '' ?> value="1">Nam</option>
                                                            <option <?= ($_SESSION['old_data']['gioi_tinh'] ?? $user['gioi_tinh']) != 1 ? 'selected' : '' ?> value="2">Nữ</option>
                                                        </select>
                                                        <?php if (isset($_SESSION['error']['gioi_tinh'])) { ?>
                                                            <p class="text-danger"><?= $_SESSION['error']['gioi_tinh'] ?></p>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Địa chỉ:</label>
                                                <div class="col-lg-12">
                                                    <input type="text" class="form-control" name="dia_chi"
                                                        value="<?= $_SESSION['old_data']['dia_chi'] ?? $user['dia_chi'] ?? '' ?>"
                                                        placeholder="Nhập địa chỉ">
                                                    <?php if (isset($_SESSION['error']['dia_chi'])) { ?>
                                                        <p class="text-danger"><?= $_SESSION['error']['dia_chi'] ?></p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label"></label>
                                                <div class="col-md-12">
                                                    <input type="submit" class="btn btn-success mt-1" value="Save Changes">
                                                </div>
                                            </div>
                                        </form>
                                        <hr>
                                        <h3>Đổi mật khẩu</h3>
                                        <form action="<?= BASE_URL . '?act=update-password-profile' ?>" method="post">

                                            <?php if (isset($_SESSION['password'])) { ?>
                                                <div class="alert alert-info alert-dismissable">
                                                    <a class="panel-close close" data-dismiss="alert">×</a>
                                                    <i class="fa fa-coffee"></i>
                                                    <?= $_SESSION['password']; ?></p>
                                                </div>
                                            <?php
                                                unset($_SESSION['password']); // Xóa thông báo sau khi hiển thị
                                            }
                                            ?>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Mật khẩu cũ:</label>
                                                <div class="col-md-12">
                                                    <input class="form-control" type="password" name="old_pass" value="">
                                                    <?php if (isset($_SESSION['error']['old_pass'])) { ?>
                                                        <p class="text-danger"><?= $_SESSION['error']['old_pass'] ?></p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Mật khẩu mới:</label>
                                                <div class="col-md-12">
                                                    <input class="form-control" type="password" name="new_pass" value="">
                                                    <?php if (isset($_SESSION['error']['new_pass'])) { ?>
                                                        <p class="text-danger"><?= $_SESSION['error']['new_pass'] ?></p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Nhập lại mật khẩu mới:</label>
                                                <div class="col-md-12">
                                                    <input class="form-control" type="password" name="confirm_pass" value="">
                                                    <?php if (isset($_SESSION['error']['confirm_pass'])) { ?>
                                                        <p class="text-danger"><?= $_SESSION['error']['confirm_pass'] ?></p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label"></label>
                                                <div class="col-md-12">
                                                    <input type="submit" class="btn btn-success mt-2" value="Save Changes">
                                                </div>
                                            </div>
                                        </form>
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
</div>
<!-- Footer  -->
<?php require_once './views/layout/footer.php' ?>
<!-- End footer  -->
<script>
    const img = document.querySelector('#img');
    const input = document.querySelector('#input');

    input.addEventListener("change", () => {
        img.src = URL.createObjectURL(input.files[0])
    })
</script>