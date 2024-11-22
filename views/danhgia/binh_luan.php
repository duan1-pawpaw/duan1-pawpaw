<?php require_once './views/layout/header.php' ?>
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
                            <h2>Quản lý Bình Luận</h2>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sản Phẩm</th>
                                            <th>Người dùng</th>
                                            <th>Bình luận</th>
                                            <th>Thời gian đánh giá</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($Commets)): ?>
                                            <?php foreach($Commets as $comment): ?>
                                                <tr class="<?= $comment['trang_thai'] ? '' : 'hidden'; ?>">
                                                    <td><?= $comment['ten_san_pham']; ?></td>
                                                    <td><?= $comment['ho_ten']; ?></td>
                                                    <td><?= $comment['noi_dung']; ?></td>
                                                    <td><?= $comment['ngay_dang']; ?></td>
                                                    <td>
                                                        <?php if ($comment['trang_thai']): ?>
                                                            <a href="<?= BASE_URL_ADMIN . '?act=update-Binhluan&id_binh_luan=' . $comment['id'] . '&trang_thai=0'; ?>">
                                                                <button class="button">Ẩn</button>
                                                            </a>
                                                        <?php else: ?>
                                                            <a href="<?= BASE_URL_ADMIN . '?act=update-Binhluan&id_binh_luan=' . $comment['id'] . '&trang_thai=1'; ?>">
                                                                <button  class="button">Hiển thị</button>
                                                            </a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="7">Không có bình luận nào được tìm thấy.</td>
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
<?php require_once './views/layout/footer.php' ?>
</html>
<!-- HTML !-->
<button class="button-1" role="button">Button 1</button>


