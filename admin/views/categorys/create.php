<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- header  -->
    <?php require './views/layout/header.php'; ?>
    <!-- Navbar -->
    <?php include './views/layout/nav.php'; ?>
    <!-- /.navbar -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Quản Lý Danh Mục</h1>
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
                        <div class="card card-primary">
                        <div class="card-header">
                                <h3 class="card-title">Thêm Danh Mục</h3>
                            </div>

                                <form action="<?= BASE_URL_ADMIN . '?act=add-category' ?>" method="POST">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Tên sản phẩm</label>
                                            <input type="text" class="form-control"
                                                value="<?= $_SESSION['old_data']['ten_danh_muc'] ?? '' ?>"
                                                name="ten_danh_muc" placeholder="Nhập tên danh mục">
                                            <?php if (isset($_SESSION['error']['ten_danh_muc'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['error']['ten_danh_muc'] ?></p>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả</label>
                                            <textarea name="mo_ta" id="" class="form-control" placeholder="Nhập mô tả"><?= $_SESSION['old_data']['mo_ta'] ?? '' ?></textarea>
                                        </div>

                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Tạo</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- Footer  -->
    <?php include './views/layout/footer.php'; ?>
    <!-- End footer  -->
</body>

</html>