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
                                        <th class="fw-6">Xem Chi Tiết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($donhang as $key=>$row){ ?>
                                    <tr class="tf-order-item">
                                        <td><?= ++$key ?></td>
                                        <td><?= $row['ma_don_hang'] ?></td>
                                        <td><?= formartDate($row['ngay_dat'] )?></td>
                                        <td><?= $row['ten_trang_thai'] ?></td>
                                        <td><?= number_format($row['tong_tien']) ?>vnđ</td>
                                        <td>
                                            <a href="<?= BASE_URL . '?act=detailOrder&id_don_hang=' . $row['id'] ?>" class="tf-btn btn-fill animate-hover-btn rounded-0 justify-content-center">
                                                <span>Xem Chi Tiết</span>
                                            </a>
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