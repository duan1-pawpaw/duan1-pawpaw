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
    </style>
</head>
<body>
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-header card">
                    <div class="card">
                        <div class="card-header">
                            <h2>Quản lý Đánh giá</h2>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
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
                                            <?php foreach($ratings as $rating): ?>
                                                <tr class="<?= $rating['visibilitys'] ? '' : 'hidden'; ?>">
                                                    <td><?= $rating['ten_san_pham']; ?></td>
                                                    <td><?= $rating['ho_ten']; ?></td>
                                                    <td><?= $rating['comment']; ?></td>
                                                    <td><?= $rating['rating']; ?></td>
                                                    <td><?= $rating['created_at']; ?></td>
                                                    <td>

                                                        <?php if (isset($rating['visibilitys']) && $rating['visibilitys']): ?>
                                                            <a href="<?= BASE_URL_ADMIN . '?act=update-visibility&id_rating=' . $rating['id'] . '&visibility=0'; ?>">
                                                                <button>Ẩn</button>
                                                            </a>
                                                        <?php else: ?>
                                                            <a href="<?= BASE_URL_ADMIN . '?act=update-visibility&id_rating=' . $rating['id'] . '&visibility=1'; ?>">
                                                                <button>Hiển thị</button>
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
                                </table>
                            </div>
                        </div>
                    </div>      
                </div>
            </div>
        </div>
   </div>
</body>
<!-- Footer -->
<?php require_once './views/layout/footer.php' ?>
</html>









