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
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Đăng Ký</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Xác Thực Đăng Ký</h3>
                        <?php
                        // Lấy thông báo lỗi từ session
                        $errors = $_SESSION['errors'] ?? [];
                        // Xóa thông báo lỗi trong session sau khi hiển thị
                        unset($_SESSION['errors']);
                        ?>
                        <form action="<?= BASE_URL . '?act=reset-password' ?>" method="POST">
                            <!-- <input type="hidden" name="action" value="comfirm_register"> -->
                            <div class="row register-form">
                                <p>Nhập email để chúng tôi cấp lại mật khẩu cho bạn</p>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control" placeholder="Nhập email..." value="">
                                    </div>
                                    <?php if (isset($errors['email'])): ?>
                                        <span class="text-danger"><?= $errors['email'] ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-8" style="margin-left: auto;">
                                    <button type="submit" class="btn btn-primary w-100 mb-2">Xác Nhận</button>
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