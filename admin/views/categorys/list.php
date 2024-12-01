<!-- header  -->
<?php require_once './views/layout/header.php'; ?>
<!-- Navbar -->
<?php require_once './views/layout/nav.php'; ?>
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
        <!-- Dashboard / Categorys / Table  -->
        <!-- <div class="breadcrumb-item active"><a href="<?= BASE_URL_ADMIN ?>">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="<?= BASE_URL_ADMIN . '?act=categorys' ?>">Danh mục</a></div>
        <div class="breadcrumb-item"><a>Danh sách</a></div> -->
        <!-- Thêm danh mục -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <a href="<?= BASE_URL_ADMIN . '?act=add-category' ?>" class="btn btn-success">Thêm danh mục</a>
                            <input type="text" id="searchProduct" class="form-control" placeholder="Tìm kiếm giỏ hàng..." style="max-width: 300px; margin-left: 65%;">
                        </div>
                        <?php
                        if (isset($_SESSION['success'])) {
                        ?>
                            <div class="alert alert-success">
                                <?= $_SESSION['success']; ?>
                            </div>
                        <?php
                            unset($_SESSION['success']); // Xóa thông báo sau khi hiển thị
                        }
                        ?>
                        <!-- Bảng -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên danh mục</th>
                                        <th>Mô tả</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $key => $value) : ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $value['ten_danh_muc'] ?></td>
                                            <td><?= $value['mo_ta'] ?></td>
                                            <td>
                                                <a href="<?= BASE_URL_ADMIN . '?act=update-category&id=' . $value['id'] ?>">
                                                    <button class="btn btn-warning">Sửa</button>
                                                </a>
                                                <a onclick="return confirm('Bạn có chắc muốn xóa category: <?php echo $value['ten_danh_muc'] ?>')"
                                                    href="<?= BASE_URL_ADMIN . '?act=delete-category&id=' . $value['id'] ?>">
                                                    <button class="btn btn-danger">Ẩn</i></button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên danh mục</th>
                                        <th>Mô tả</th>
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

    </section>
    <!-- /.content -->
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Footer  -->
<?php require_once './views/layout/footer.php'; ?>
<!-- End footer  -->