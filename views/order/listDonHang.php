<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php require_once './views/layout/header.php' ?>
    <?php require_once './views/layout/menu.php' ?>
    <div class="tf-page-title" style="margin-top: 100px;">
        <div class="container-full">
            <div class="heading text-center">My Orders</div>
        </div>
    </div>
    <section class="flat-spacing-11">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="my-account-content account-order">
                        <div class="wrap-account-order">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="fw-6">STT</th>
                                        <th class="fw-6">Mã Đơn Hàng</th>
                                        <th class="fw-6">Ngày Đặt</th>
                                        <th class="fw-6">Trạng Thái</th>
                                        <th class="fw-6">Tổng Tiền</th>
                                        <th class="fw-6">Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($donhang as $key => $row) { ?>
                                        <tr class="tf-order-item">
                                            <td><?= ++$key ?></td>
                                            <td><?= $row['ma_don_hang'] ?></td>
                                            <td><?= formartDate($row['ngay_dat']) ?></td>
                                            <td><?= $row['ten_trang_thai'] ?></td>
                                            <td><?= number_format($row['tong_tien']) ?>vnđ</td>
                                            <td>
                                                <a href="<?= BASE_URL . '?act=detailOrder&id_don_hang=' . $row['id'] ?>" class="animate-hover-btn ">
                                                    <button class="btn btn-info">Xem Chi Tiết</button>
                                                </a>
                                                <?php if ($row['trang_thai_id'] == 3) {  ?>
                                                    <a href="<?= BASE_URL . '?act=detroyOrder&order_id=' . $row['id'] ?>" class="animate-hover-btn "><button class="btn " style="background-color:#9f9d9d;">Hủy Đơn</button></a>
                                                <?php } else { ?>
                                                    <a class="animate-hover-btn "><button disabled class="btn " style="background-color:#9f9d9d;">Hủy Đơn</button></a>
                                                <?php } ?>
                                                <?php ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php require_once './views/layout/footer.php' ?>
</body>

</html>