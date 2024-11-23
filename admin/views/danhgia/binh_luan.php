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
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Quản Lý Bình Luận</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->

                        <div class="card mt-4">
                            <!-- /.card-header -->
                             <div class="card-header">
                             <input type="text" id="searchProduct" class="form-control" placeholder="Tìm kiếm bình luận..." style="width: 300px; margin-left: 75%;">
                             </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Sản Phẩm</th>
                                            <th>Người dùng</th>
                                            <th>Bình luận</th>
                                            <th>Thời gian đánh giá</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($Commets)): ?>
                                            <?php foreach ($Commets as $key => $comment): ?>
                                                <tr class="<?= $comment['trang_thai'] ? '' : 'hidden'; ?>">
                                                    <td><?= ++$key ?></td>
                                                    <td><?= $comment['ten_san_pham']; ?></td>
                                                    <td><?= $comment['ho_ten']; ?></td>
                                                    <td><?= $comment['noi_dung']; ?></td>
                                                    <td><?= formartDate($comment['ngay_dang']) ?></td>
                                                    <td>
                                                        <?php if ($comment['trang_thai']): ?>
                                                            <a href="<?= BASE_URL_ADMIN . '?act=update-Binhluan&id_binh_luan=' . $comment['id'] . '&trang_thai=0'; ?>">
                                                                <button class="btn btn-danger">Ẩn</button>
                                                            </a>
                                                        <?php else: ?>
                                                            <a href="<?= BASE_URL_ADMIN . '?act=update-Binhluan&id_binh_luan=' . $comment['id'] . '&trang_thai=1'; ?>">
                                                                <button class="btn btn-success">Hiển thị</button>
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
                                    <tfoot>
                                        <tr>
                                            <th>STT</th>
                                            <th>Sản Phẩm</th>
                                            <th>Người dùng</th>
                                            <th>Bình luận</th>
                                            <th>Thời gian đánh giá</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</body>
<?php require_once './views/layout/footer.php' ?>

</html>