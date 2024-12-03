<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cảm Ơn Bạn Đã Đặt Hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .text-header {
            color: #28a745;
        }

        .order-info,
        .shipping-info,
        .payment-info {
            margin: 40px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .cta {
            margin-top: 20px;
            padding: 10px;
            background: #007bff;
            color: #fff;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <?php require_once './views/layout/header.php' ?>
    <?php require_once './views/layout/menu.php' ?>
    <div class="container" style="margin-top: 100px; max-width: 1000px;">
        <h3 class="text-header">Cảm ơn bạn đã đặt hàng!</h3>
        <h6 class="ms-2">Chúng tôi rất vui khi nhận được đơn hàng của bạn.</h6>
        
        <div class="order-info">
            <h5>Thông tin đơn hàng: <?= $donhang['ma_don_hang'] ?></h5>
            <?php $tong_tien = 0; foreach ($sanphamDonhang as $sanPham) { ?>
                <p style="font-size: medium;" class="ms-2 mt-1"><strong>Sản phẩm: </strong> <?= $sanPham['ten_san_pham'] ?></p>
                <p style="font-size: medium;" class="ms-2 mt-1"><strong>Số lượng: </strong><?= $sanPham['so_luong'] ?></p>
                <?php $tong_tien += ($sanPham['don_gia'] * $sanPham['so_luong']); } ?>
                <p style="font-size: medium;" class="ms-2 mt-1"><strong>Tổng tiền: </strong><?= number_format($tong_tien + 30000) ?>đ</p>
            </div>
            
            <div class="shipping-info">
                <h5>Thông Tin Người Nhận:</h5>
                <p style="font-size: medium;" class="ms-2 mt-1"><strong>Tên: </strong> <?= $donhang['ten_nguoi_nhan'] ?></p>
                <p style="font-size: medium;" class="ms-2 mt-1"><strong>Địa chỉ: </strong> <?= $donhang['dia_chi_nguoi_nhan'] ?></p>
                <p style="font-size: medium;" class="ms-2 mt-1"><strong>Số điện thoại: </strong><?= $donhang['sdt_nguoi_nhan'] ?></p>
            </div>
            
            <div class="payment-info">
                <h5>Thông tin thanh toán:</h5>
                    <p style="font-size: medium;" class="ms-2 mt-1"><strong>Phương thức thanh toán:</strong> <?= $donhang['ten_phuong_thuc'] ?></p>
                <p style="font-size: medium;" class="ms-2 mt-1"><strong>Tình trạng thanh toán:</strong> <?= $donhang['ten_trang_thai'] ?></p>
        </div>
        
        <p style="font-size: medium;" class="ms-2 mt-1"><strong>Thời gian giao hàng dự kiến:</strong> 3-5 ngày làm việc</p>
        
        <div class="promotion">
            <p style="font-size: medium;" class="ms-2 mt-1"><strong>Đừng bỏ lỡ!</strong></p>
            <p style="font-size: medium;" class="ms-2 mt-1">Nhập mã giảm giá: <strong class="text-danger">GIAM10</strong> cho đơn hàng tiếp theo của bạn.</p>
        </div>
        
        <p style="font-size: medium;" class="ms-2 mt-1">Nếu bạn cần bất kỳ hỗ trợ nào, hãy liên hệ với chúng tôi qua <a href="mailto:support@example.com">email</a> hoặc gọi đến số hotline: 1800-1234.</p>
        
        <a href="<?= BASE_URL  ?>" class="cta">Xem thêm sản phẩm</a>
    </div>
    <?php require_once './views/layout/footer.php' ?>
</body>

</html>