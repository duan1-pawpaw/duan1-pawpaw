<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .css_select_div {
        text-align: center;
    }

    .css_select {
        display: inline-table;
        width: 25%;
        padding: 5px;
        margin: 5px;
        border: solid 1px #686868;
        border-radius: 5px;
    }

    .size-selector {
        border-radius: 8px;
        padding: 10px;
        display: flex;
    }

    .size-option {
        margin: 0 5px;
        padding: 10px 20px;
        border: 1px solid #000;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .size-option:hover {
        background-color: #f0f0f0;
    }

    .size-option.active {
        background-color: #d9d9d9;
        color: white;
    }
</style>

<body>
    <?php require_once './views/layout/header.php' ?>
    <header id="header" class="header-default header-absolute">
        <div class="px_15 lg-px_40">
            <div class="row wrapper-header align-items-center">
                <div class="col-xl-3 col-md-4 col-6">
                    <a onclick="return confirm('Bạn Chắc Muốn Rời Trang Thanh Toán Chứ??')" href="<?= BASE_URL ?>" class="logo-header">
                        <img src="./assets/images/logo6.png" alt="logo" style="width: 250px;">
                    </a>
                </div>
            </div>
        </div>
        <div class="tf-page-title">
            <div class="container-full">
                <div class="heading text-center">Check Out</div>
            </div>
        </div>
        <!-- /page-title -->

        <!-- page-cart -->
        <section class="flat-spacing-11">
            <div class="container">
                <div class="tf-page-cart-wrap layout-2">
                    <div class="tf-page-cart-item">
                        <h5 class="fw-5 mb_20">Thông Tin Chi Tiết</h5>
                        <form class="form-checkout" action="<?= BASE_URL . '?act=checkout' ?>" id="form1" method="POST" enctype="multipart/form-data">
                            <?php
                            // var_dump($_SESSION['tong_tien']);
                            // Lấy thông báo lỗi từ session
                            $errors = $_SESSION['errors'] ?? [];
                            $voucher = $_SESSION['voucher_message'] ?? '';
                            unset($_SESSION['voucher_message']);
                            // var_dump($errors);die;
                            // Xóa thông báo lỗi trong session sau khi hiển thị
                            unset($_SESSION['errors']);
                            ?>

                            <div class="box ">
                                <input type="hidden" name="tong_tien" value="<?= ($_SESSION['tong_tien'] ?? $tong_tien) ?>">
                                <?php foreach ($chiTietGioHang as $key => $sanpham) { ?>
                                    <input type="hidden" name="san_pham[<?= $key ?>][id]" value="<?= $sanpham['san_pham_id'] ?>">
                                    <input type="hidden" name="san_pham[<?= $key ?>][gia_san_pham]" value="<?= $sanpham['gia_san_pham'] ?>">
                                    <input type="hidden" name="san_pham[<?= $key ?>][so_luong]" value="<?= $sanpham['so_luong'] ?>">
                                    <input type="hidden" name="san_pham[<?= $key ?>][ten_san_pham]" value="<?= $sanpham['ten_san_pham'] ?>">
                                <?php } ?>
                                <fieldset class="fieldset">
                                    <label for="first-name">Họ Tên</label>
                                    <input type="text" class="form-control" id="ho_ten" name="ten_nguoi_nhan" value="<?= isset($_POST['ten_nguoi_nhan']) ? $_POST['ten_nguoi_nhan'] : ''  ?>" placeholder="Nhập họ tên người nhận...">
                                    <?php if (isset($errors['ten_nguoi_nhan'])) { ?>
                                        <p class="text-danger"><?= $errors['ten_nguoi_nhan']  ?></p>
                                    <?php } ?>
                                </fieldset>
                            </div>
                            <fieldset class="box fieldset">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email_nguoi_nhan" placeholder="Nhập email người nhận...">
                                <?php if (isset($errors['email_nguoi_nhan'])) { ?>
                                    <p class="text-danger"><?= $errors['email_nguoi_nhan']  ?></p>
                                <?php } ?>
                            </fieldset>
                            <fieldset class="box fieldset">
                                <label for="phone">Số điện thoại:</label>
                                <input type="text" class="form-control" id="sdt" name="sdt_nguoi_nhan" placeholder="Nhập số điện thoại người nhận...">
                                <?php if (isset($errors['sdt_nguoi_nhan'])) { ?>
                                    <p class="text-danger"><?= $errors['sdt_nguoi_nhan']  ?></p>
                                <?php } ?>
                            </fieldset>
                            <fieldset class="box fieldset">
                                <label for="address">Địa chỉ:</label><br>
                                <select class="css_select" id="tinh" name="tinh" title="Chọn Tỉnh Thành">
                                    <option value="">Tỉnh Thành</option>
                                </select>
                                <select class="css_select" id="quan" name="quan" title="Chọn Quận Huyện">
                                    <option value="">Quận Huyện</option>
                                </select>
                                <select class="css_select" id="phuong" name="phuong" title="Chọn Phường Xã">
                                    <option value="">Phường Xã</option>
                                </select>

                                <input type="hidden" id="ten_tinh" name="ten_tinh">
                                <input type="hidden" id="ten_quan" name="ten_quan">
                                <input type="hidden" id="ten_phuong" name="ten_phuong">
                                <?php if (isset($errors['APIAddress'])) { ?>
                                    <p class="text-danger"><?= $errors['APIAddress']  ?> <br></p>
                                <?php } else { ?> <br> <br> <?php } ?>

                                <input type="text" class="form-control" id="dia_chi_nguoi_nhan" name="dia_chi_nguoi_nhan" placeholder="Nhập địa chỉ cụ thể người nhận...">
                            </fieldset>
                            <fieldset class="box fieldset">
                                <label>Ghi chú</label>
                                <textarea class="form-control" name="ghi_chu" id="note" placeholder="Ghi chú"></textarea>
                            </fieldset>
                            <fieldset class="box fieldset">
                                <label for="payment">Phương thức thanh toán:</label>
                                <select class="form-control" id="payment" name="phuong_thuc_thanh_toan">
                                    <option selected disabled>Xin mời chọn phương thức thanh toán</option>
                                    <option value="1">Thanh toán khi nhận hàng (COD)</option>
                                    <option value="2">VNPay</option>
                                    <option value="3">Thẻ tín dụng</option>
                                </select>
                                <?php if (isset($errors['phuong_thuc_thanh_toan'])) { ?>
                                    <p class="text-danger"><?= $errors['phuong_thuc_thanh_toan']  ?></p>
                                <?php } ?>
                            </fieldset>
                            <div class="box-checkbox fieldset-radio mb_20">
                                <input type="checkbox" name="confirmOrder" id="check-agree" class="tf-check">
                                <label for="check-agree" class="text_black-2">Xác Nhận Đặt Hàng</label>
                                <?php if (isset($errors['confirmOrder'])) {
                                    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                                    echo "<script>
                                             Swal.fire({
                                            title: 'Bạn Chưa Xác Nhận Đặt hàng',
                                            confirmButtonText: 'OK'
                                                });
                                    </script>";
                                } ?>
                            </div>
                            <button class="tf-btn radius-3 mt-4 btn-fill btn-icon animate-hover-btn justify-content-center">Place order</button>
                        </form>
                    </div>
                    <div class="tf-page-cart-footer">
                        <div class="tf-cart-footer-inner">
                            <h5 class="fw-5 mb_20">Đơn Hàng</h5>
                            <form class="tf-page-cart-checkout widget-wrap-checkout" action="<?= BASE_URL . '?act=voucher' ?>" id="form2" onsubmit="handleSubmit()" method="POST">
                                <ul class="wrap-checkout-product">
                                    <?php foreach ($chiTietGioHang as $sanpham) { ?>
                                        <li class="checkout-product-item">
                                            <figure class="img-product">
                                                <img src="<?= $sanpham['hinh_anh'] ?>" alt="product">
                                                <span class="quantity"><?= $sanpham['so_luong'] ?></span>
                                            </figure>
                                            <div class="content">
                                                <div class="info">
                                                    <p class="name"><?= $sanpham['ten_san_pham'] ?></p>
                                                    <span class="variant">Giới tính: <?= $sanpham['gioi_tinh'] = 1 ? "Đực" : "Cái" ?></span>
                                                </div>
                                                <span class="price"><?= number_format($sanpham['gia_san_pham'] * $sanpham['so_luong']) ?>Đ</span>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <!-- <?php var_dump($tong_tien) ?> -->
                                <div class="coupon-box">
                                    <input type="hidden" name="tong_gio_hang" value="<?= $tong_tien ?? 0 ?>">
                                    <input type="text" name="code_Voucher" placeholder="Nhập mã Giảm Giá (nếu có)">
                                    <button name="apply_Voucher" class="tf-btn btn-sm radius-3 btn-fill btn-icon animate-hover-btn">Áp Dụng</button><br>

                                </div>
                                <?php if (isset($voucher)) { ?>
                                    <p class="text-danger"><?= $voucher  ?></p>
                                <?php } ?>
                                <div class="d-flex justify-content-between line pb_18">
                                    <h6 class="fw-4">Vận Chuyển</h6>
                                    <h6 class="total fw-4">30.000Đ</h6>
                                </div>
                                <div class="d-flex justify-content-between line pb_20">
                                    <h6 class="fw-5">Tổng</h6>
                                    <input type="hidden" name="tong_tien" value="<?= $_SESSION['tong_tien'] ?? $tong_tien ?>">
                                    <h6 class="total fw-5"><?= number_format($_SESSION['tong_tien'] ?? $tong_tien) ?>Đ</h6>
                                </div>
                                <div class="wd-check-payment">


                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php require_once './views/layout/footer.php' ?>
</body>

<script>
    // Hàm lưu dữ liệu từ Form 1 vào localStorage
    function saveForm1Data() {
        const ho_ten = document.getElementById('ho_ten').value;
        const email = document.getElementById('email').value;
        const sdt = document.getElementById('sdt').value;
        const sl = document.getElementById('quantity').value;
        const payment = document.getElementById('payment').value;
        const tinh = document.getElementById('ten_tinh').value;
        const quan = document.getElementById('ten_quan').value;
        const phuong = document.getElementById('ten_phuong').value;
        const note = document.getElementById('note').value;
        const dia_chi_nguoi_nhan = document.querySelector('input[name="dia_chi_nguoi_nhan"]').value;
        // Tạo một đối tượng chứa toàn bộ dữ liệu form
        const formData = {
            ho_ten,
            email,
            sdt,
            sl,
            payment,
            tinh,
            quan,
            phuong,
            dia_chi_nguoi_nhan,
            note,
        };
        console.log(formData);

        // Lưu đối tượng dưới dạng chuỗi JSON vào localStorage
        localStorage.setItem('form1Data', JSON.stringify(formData));

    }

    function handleSubmit(event) {
        // Ngăn chặn hành động mặc định của form (nếu cần)
        if (event) event.preventDefault();

        // Gọi hàm lưu dữ liệu
        saveForm1Data();
    }

    window.onload = function() {
        // Lấy dữ liệu từ localStorage
        const form1Data = localStorage.getItem('form1Data');
        if (form1Data) {
            // Parse chuỗi JSON thành đối tượng
            const data = JSON.parse(form1Data);

            // Gán giá trị vào các trường form
            document.getElementById('ho_ten').value = data.ho_ten || '';
            document.getElementById('email').value = data.email || '';
            document.getElementById('sdt').value = data.sdt || '';
            document.getElementById('quantity').value = data.sl || 1; // Giá trị mặc định là 1
            document.getElementById('payment').value = data.payment || '';
            document.getElementById('tinh').value = data.tinh || '';
            document.getElementById('quan').value = data.quan || '';
            document.getElementById('phuong').value = data.phuong || '';
            document.getElementById('dia_chi_nguoi_nhan').value = data.dia_chi_nguoi_nhan || '';
            document.getElementById('note').value = data.note || '';
        }
    };

    // Thêm sự kiện để xóa dữ liệu khi người dùng thoát trang
    document.querySelectorAll('a').forEach(function(link) {
        link.addEventListener('click', function() {
            localStorage.removeItem('form1Data');
        });
    });
</script>

</html>