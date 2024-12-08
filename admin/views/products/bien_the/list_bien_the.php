<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biến Thể</title>
</head>

<body>
    <?php require_once './views/layout/header.php' ?>
    <?php require_once './views/layout/nav.php' ?>

    <!-- ConTent -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Quản Lý Biến Thể</h1>
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

                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-header">
                                <input type="text" id="searchProduct" class="form-control" placeholder="Tìm kiếm đơn hàng..." style="width: 300px; margin-left: 75%;">
                                <a href="<?= BASE_URL_ADMIN . '?act=insertVariant&id_san_pham=' . $id_san_pham ?>"><button class="btn btn-success">Thêm Biến Thể</button></a>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Sản Phẩm</th>
                                            <th>Hình Ảnh</th>
                                            <th>Màu Sắc</th>
                                            <th>Độ Tuổi</th>
                                            <th>Giới Tính</th>
                                            <th>Số Lượng</th>
                                            <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listVariants as $key => $listVariant) { ?>
                                            <tr>
                                                <td><?= ++$key ?></td>
                                                <td><?= $listVariant['ten_san_pham'] ?></td>
                                                <td><img src="<?= BASE_URL . $listVariant['hinh_anh'] ?>" width="100" alt=""></td>
                                                <td><?= $listVariant['mau_sac'] ?></td>
                                                <td><?= $listVariant['do_tuoi'] ?></td>
                                                <td><?= $listVariant['so_luong'] ?></td>
                                                <td><?= $listVariant['gioi_tinh'] == 1 ? 'Đực' : 'Cái' ?></td>
                                                <td>
                                                    <div class="btn-group dropleft">
                                                        <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa-solid fa-sliders"></i>

                                                        </button>
                                                        <div class="dropdown-menu dropleft" x-placement="left-start" style="position: absolute; transform: translate3d(-202px, 0px, 0px); top: 0px; left: 0px; will-change: transform; border: 1px solid black;">
                                                            <a class="dropdown-item" href="<?= BASE_URL_ADMIN . '?act=updateVariant&id=' . $listVariant['id'] . '&id_san_pham=' . $id_san_pham?>"><i class="fa-regular fa-pen-to-square" style="color: #FFD43B;"></i><span style="margin-left: 0.5rem">Sửa</span></a>
                                                            <a class="dropdown-item" href="<?= BASE_URL_ADMIN . '?act=delete-product&id=' . $value['id'] ?>" onclick="return confirm('Bạn có đồng ý xóa hay không?')"><i class="fa-solid fa-trash" style="color: #f50529;"></i><span style="margin-left: 0.5rem">Xóa</span></a>
                                                        </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>STT</th>
                                            <th>Sản Phẩm</th>
                                            <th>Hình Ảnh</th>
                                            <th>Màu Sắc</th>
                                            <th>Độ Tuổi</th>
                                            <th>Giới Tính</th>
                                            <th>Số Lượng</th>
                                            <th>Thao Tác</th>
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
    <?php require_once './views/layout/footer.php' ?>
</body>

</html>