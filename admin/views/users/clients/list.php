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
                    <h1>Quản Lý Tài Khoản Người Dùng</h1>
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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <input type="text" id="searchProduct" class="form-control" placeholder="Tìm kiếm khách hàng..." style="max-width: 300px; margin-left: 65%;">
                        </div>
                        <!-- /.card-header -->
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
                        <div class="card-header">
                            <h4>Danh sách tài khoản người dùng</h4>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Họ tên</th>
                                        <th>Ảnh đại diện</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $key => $value) :  ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $value['ho_ten'] ?></td>
                                            <td>
                                                <img src="<?= BASE_URL . $value['anh_dai_dien'] ?>"
                                                    width="100px" alt="" class="gallery-item"
                                                    onerror="this.onerror=null; this.src='https://static.vecteezy.com/system/resources/previews/019/879/186/large_2x/user-icon-on-transparent-background-free-png.png'">
                                            </td>
                                            <td><?= $value['email'] ?></td>
                                            <td><?= $value['so_dien_thoai'] ?></td>
                                            <td><?= $value['trang_thai'] == 1 ? 'Active' : 'Inactive' ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?= BASE_URL_ADMIN . '?act=show-user&id=' . $value['id'] ?>" class="btn btn-primary">
                                                        <i class="far fa-eye"></i>
                                                    </a>
                                                    <a href="<?= BASE_URL_ADMIN . '?act=update-user&id=' . $value['id'] ?>" class="btn btn-warning">
                                                        <i class="fas fa-wrench"></i>
                                                    </a>
                                                    <a href="<?= BASE_URL_ADMIN . '?act=reset-password&id=' . $value['id'] ?>" class="btn bg-danger"
                                                        onclick="return confirm('Bạn có muốn reset password tài khoản này hay không?')">
                                                        <i class="fas fa-undo-alt"></i>
                                                    </a>
                                                    <a href="<?= BASE_URL_ADMIN . '?act=delete-user&id=' . $value['id'] ?>" class="btn btn-danger"
                                                        onclick="return confirm('Bạn có muốn xóa tài khoản này hay không?')">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Họ tên</th>
                                        <th>Ảnh đại diện</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Trạng thái</th>
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
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Footer  -->
<?php require_once './views/layout/footer.php'; ?>
<!-- End footer  -->