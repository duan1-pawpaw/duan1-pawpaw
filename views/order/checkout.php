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
    <?php
    // require_once './views/layout/menu.php' 
    ?>
    <div class="row col-2 mt-5" style="float: right;"><a onclick="return confirm('Bạn muốn rời trang đặt mua sản phẩm chứ??')" href="<?= BASE_URL ?>"><button class="btn btn-secondary">Home</button></a></div>
    <div>
        <div class="container mt-4">
            <h3>Thông tin thanh toán</h3>
            <div class="row col-12 col-sm-12">
                <div class="col-6 col-sm-6">
                    <form id="form1" method="POST" enctype="multipart/form-data">
                        <?php
                        // Lấy thông báo lỗi từ session
                        $errors = $_SESSION['errors'] ?? [];
                        $voucher = $_SESSION['voucher_message'] ?? '';
                        unset($_SESSION['voucher_message']);
                        // var_dump($errors);die;
                        // Xóa thông báo lỗi trong session sau khi hiển thị
                        unset($_SESSION['errors']);
                        ?>
                        <input type="hidden" name="ma_don_hang">
                        <input type="hidden" name="tai_khoan_id" value="<?= $_SESSION['user']['id'] ?>">
                        <div class="form-group">
                            <label for="name">Họ và tên:</label>
                            <input type="text" class="form-control" id="ho_ten" name="ten_nguoi_nhan" value="<?= isset($_POST['ten_nguoi_nhan']) ? $_POST['ten_nguoi_nhan'] : ''  ?>" placeholder="Nhập họ tên người nhận...">
                            <?php if (isset($errors['ten_nguoi_nhan'])) { ?>
                                <p class="text-danger"><?= $errors['ten_nguoi_nhan']  ?></p>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email_nguoi_nhan" placeholder="Nhập email người nhận...">
                            <?php if (isset($errors['email_nguoi_nhan'])) { ?>
                                <p class="text-danger"><?= $errors['email_nguoi_nhan']  ?></p>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại:</label>
                            <input type="text" class="form-control" id="sdt" name="sdt_nguoi_nhan" placeholder="Nhập số điện thoại người nhận...">
                            <?php if (isset($errors['sdt_nguoi_nhan'])) { ?>
                                <p class="text-danger"><?= $errors['sdt_nguoi_nhan']  ?></p>
                            <?php } ?>
                        </div>
                        <div class="form-group">
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
                        </div>
                        <div class="form-group">



                        </div>
                        <!-- <div class="form-group">
                            <label>Số Lượng</label>
                            <input type="number" value="getQuantity()" name="so_luong" class="form-control">
                        </div> -->
                        <div class="form-group">
                            <label for="">Số Lượng</label><br>
                            <div class="d-flex col-4">
                                <button type="button" id="decrease" class="btn btn-light flex-grow-1 border">-</button>
                                <div class="border ">
                                    <input type="number" id="quantity" onchange="updateSoLuong()" name="so_luong" class="col-10 mt-1 mx-3 fs-4 " style="border: 0;" value="<?= $so_luong ?? 1 ?>" min="1">
                                </div>
                                <button type="button" id="increase" class="btn btn-light flex-grow-1 border">+</button>
                            </div>
                        </div>
                        <script>
                            document.getElementById('increase').addEventListener('click', function() {
                                let quantity = document.getElementById('quantity');
                                let currentValue = parseInt(quantity.value); // Sử dụng value thay vì textContent
                                quantity.value = currentValue + 1; // Cập nhật giá trị
                            });

                            document.getElementById('decrease').addEventListener('click', function() {
                                let quantity = document.getElementById('quantity');
                                let currentValue = parseInt(quantity.value); // Sử dụng value thay vì textContent
                                if (currentValue > 0) {
                                    quantity.value = currentValue - 1; // Cập nhật giá trị
                                }
                            });
                        </script>
                        <?php if (isset($errors['so_luong'])) { ?>
                            <p class="text-danger"><?= $errors['so_luong']  ?></p>
                        <?php } ?>
                        <div class="form-group">
                            <label>Ghi chú</label>
                            <textarea class="form-control" name="ghi_chu" id="note" placeholder="Ghi chú"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="ship">Đơn Giá:</label>
                            <input type="text" class="form-control" data-dongia="<?= $detailPet['gia_khuyen_mai'] ?? $detailPet['gia_san_pham'] ?>" name="don_gia" value="<?= number_format($detailPet['gia_khuyen_mai'] ?? $detailPet['gia_san_pham'])  ?>" disabled>
                            <input type="hidden" name="don_gia" value="<?= $detailPet['gia_khuyen_mai'] ?? $detailPet['gia_san_pham']  ?>">
                        </div>
                        <div class="form-group">
                            <label for="ship">Tiền Vận Chuyển:</label>
                            <input type="text" class="form-control" name="ship" value="30,000vnđ" disabled>
                            <input type="hidden" name="don_gia" value="<?= $detailPet['gia_khuyen_mai'] ?? $detailPet['gia_san_pham']  ?>">
                        </div>
                        <div class="form-group">
                            <label for="tong_tien">Thành Tiền:</label>
                            <input type="hidden" name="tong_tien" value="<?= $totalPrice ?>">
                            <input type="text" id="totalPrice" class="form-control" value="<?= number_format($totalPrice) ?>đ" disabled>
                        </div>
                        <div class="form-group">
                            <label for="payment">Phương thức thanh toán:</label>
                            <select class="form-control" id="payment" name="phuong_thuc_thanh_toan">
                                <option selected disabled>Xin mời chọn phương thức thanh toán</option>
                                <option value="1">Thanh toán khi nhận hàng (COD)</option>
                                <option value="2">VNPay</option>
                                <option value="3">Thẻ tín dụng</option>
                            </select> <br>

                        </div>
                        <?php if (isset($errors['phuong_thuc_thanh_toan'])) { ?>
                            <p class="text-danger"><?= $errors['phuong_thuc_thanh_toan']  ?></p>
                        <?php } ?>
                        <input type="hidden" name="trang_thai">
                        <a href="<?= BASE_URL . '?act=donHang&id_don_hang=' . $detailPet['id'] ?>"><button type="submit" name="xacnhan" class="btn btn-primary">Xác nhận đơn hàng</button></a>
                </div>
                </form>
                <div class="col-6 col-sm-6" align="center">
                    <input type="hidden" id="pet_id" value="<?= $detailPet['id'] ?>">
                    <h5 class="my-3"><?= $detailPet['ten_san_pham'] ?></h5>
                    <hr>
                    <img src="<?= $detailPet['hinh_anh'] ?>" style="width: 250px;" alt="">
                    <h4 class="mt-3"><small><?= number_format($detailPet['gia_san_pham'] ?? $detailPet['gia_khuyen_mai']) ?>vnđ</small></h4>
                    <h6 class="mt-3"><small><?= $detailPet['mo_ta'] ?></small></h6>
                    <form id="form2" onsubmit="handleSubmit()" method="POST">
                        <input type="text" id="SoLuong">
                        <input type="text" class="col-6 col-sm-6" name="code_Voucher" placeholder="Mã giảm giá">
                        <?php if (isset($voucher)) { ?>
                            <p class="text-danger"><?= $voucher  ?></p>
                        <?php } ?>
                        <button class="col-sm-3 mt-1 btn btn-secondary" name="apply_Voucher">Áp Dụng</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
        require_once './views/layout/footer.php'
        ?>
</body>

<script>
    const itemPrice = <?= $detailPet['gia_khuyen_mai'] ?? $detailPet['gia_san_pham'] ?>; // Giá sản phẩm
    function updateTotalPrice() {
        const quantity = Math.max(0, parseInt(document.getElementById('quantity').value) || 0);
        const totalPrice = quantity * itemPrice + 30000;
        document.getElementById('totalPrice').value = totalPrice.toLocaleString('vi-VN') + 'đ';
        document.getElementById('hiddenTotalPrice').value = totalPrice;
        // console.log(quantity);
    }

    document.getElementById('increase').addEventListener('click', () => {
        updateTotalPrice();
    });
    document.getElementById('decrease').addEventListener('click', () => {
        document.getElementById('quantity').value = Math.max(1, document.getElementById('quantity').value);
        updateTotalPrice();
    });
    document.getElementById('quantity').addEventListener('input', updateTotalPrice);

    updateTotalPrice();
</script>
<script>
</script>
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