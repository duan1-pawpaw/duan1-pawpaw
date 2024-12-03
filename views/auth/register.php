<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./assets/css/auth.css">
</head>

<body>
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="./assets/images/logo.jpg" style="width: 100px; border-radius: 50%; object-fit: cover;" alt="">
                <h3>Chào Mừng</h3>
                <p>Hãy Đăng Ký Để Trở Thành Thành Viên Của PawPaw</p>
            </div>

            <div class="col-md-9 register-right">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Đăng Ký</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Đăng Nhập</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <?php
                    // Lấy thông báo lỗi từ session
                    $errors = $_SESSION['errors'] ?? [];
                    // Xóa thông báo lỗi trong session sau khi hiển thị
                    unset($_SESSION['errors']);
                    ?>
                    <div class="tab-pane fade show " id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Đăng Ký</h3>
                        <form action="<?= BASE_URL . '?act=registers' ?>" method="POST">
                            <input type="hidden" name="action" value="register">
                            <div class="row register-form">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="ho_ten" placeholder="Nhập Tên Của Bạn..." value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Nhập Email..." value="">
                                        <?php if (isset($errors['email'])): ?>
                                            <span class="text-danger"><?= $errors['email'] ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="mat_khau" placeholder="Nhập Mật Khẩu..." value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="xac_nhan_mat_khau" placeholder="Confirm Password..." value="">
                                    </div>
                                    <?php if (isset($errors['password'])): ?>
                                            <span class="text-danger"><?= $errors['password'] ?></span>
                                        <?php endif; ?>
                                </div>
                                <div class="col-md-8" style="margin-left: auto;">
                                    <button type="submit" class="btn btn-primary w-100 mb-2">Đăng Ký</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h3 class="register-heading">Đăng Nhập</h3>
                        <form action="<?= BASE_URL . '?act=logins' ?>" method="POST">
                            <div class="row register-form">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Nhập Email..." value="">
                                    </div>
                                    <?php if (isset($errors['email'])): ?>
                                            <span class="text-danger"><?= $errors['email'] ?></span>
                                        <?php endif; ?>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="mat_khau" placeholder="Nhập Mật Khẩu.." value="">
                                    </div>
                                    <?php if (isset($errors['mat_khau'])): ?>
                                            <span class="text-danger"><?= $errors['mat_khau'] ?></span>
                                        <?php endif; ?>
                                </div>
                                <div class="col-md-12 ms-2">
                                    <p>Có Phải Bạn Đang<a href="<?= BASE_URL . '?act=formResest' ?>" style="margin-left: 5px; text-decoration: none;">Quên Mật Khẩu</a>  Đấy Khôngg???</p>
                                </div>
                                <div class="col-md-8 mt-3" style="margin-left: 100px;">
                                    <button type="submit" class="btn btn-primary w-100 mb-2">Đăng Nhập</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script type="text/javascript"></script>
</body>

</html>