<!-- Header -->

<?php require_once './views/layout/header.php' ?>
<!-- Nav -->
<?php require_once './views/layout/nav.php' ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Đánh giá</title>
    <style>
        .hidden {
            background-color: #f2f2f2;
            opacity: 0.6;
        }

        table {
            width: 100%;
        }

        th,
        td {
            word-wrap: break-word;
            white-space: normal;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        td:nth-child(2),
        td:nth-child(4) {
            max-width: 180px;
        }
    </style>
</head>

<body>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản Lý Đánh Giá</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="main-body">
        <div class="page-header">
            <div class="card">
                <div class="card-block ">
                    <div class="card-header">
                        <input type="text" id="searchProduct" class="form-control" placeholder="Tìm kiếm đánh giá..." style="width: 300px; margin-left: 75%;">
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Sản Phẩm</th>
                                    <th>Người dùng</th>
                                    <th>Bình luận</th>
                                    <th>Đánh Giá</th>
                                    <th>Thời gian đánh giá</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($ratings)): ?>
                                    <?php foreach ($ratings as $key => $rating): ?>
                                        <tr class="<?= $rating['trang_thai'] ? '' : 'hidden'; ?>">
                                            <td><?= ++$key ?></td>
                                            <td><?= $rating['ten_san_pham']; ?></td>
                                            <td><?= $rating['ho_ten']; ?></td>
                                            <td><?= $rating['binh_luan']; ?></td>
                                            <td><?php
                                                for ($i = 1; $i <= 5; $i++) {
                                                    if ($i <= $rating['danh_gia_sao']) {
                                                        echo '<span style="color: gold;"><i class="fas fa-star"></i></span>';
                                                    } else {
                                                        echo '<span style="color: gray;"><i class="fas fa-star"></i></span>';
                                                    }
                                                } ?>
                                            </td>
                                            <td><?= formartDate($rating['thoi_gian_danh_gia']) ?></td>
                                            <td>

                                                <?php if (isset($rating['trang_thai']) && $rating['trang_thai']): ?>
                                                    <a href="<?= BASE_URL_ADMIN . '?act=update-visibility&id_rating=' . $rating['id'] . '&visibility=1'; ?>">
                                                        <button class="btn btn-danger">Ẩn</button>
                                                    </a>
                                                <?php else: ?>
                                                    <a href="<?= BASE_URL_ADMIN . '?act=update-visibility&id_rating=' . $rating['id'] . '&visibility=0'; ?>">
                                                        <button class="btn btn-success">Hiển thị</button>
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7">Không có đánh giá nào được tìm thấy.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>STT</th>
                                    <th>Sản Phẩm</th>
                                    <th>Người dùng</th>
                                    <th>Bình luận</th>
                                    <th>Đánh Giá</th>
                                    <th>Thời gian đánh giá</th>
                                    <th>Thao tác</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- Footer -->
<?php require_once './views/layout/footer.php' ?>

</html>