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
                    <h1>Quản Lý Khuyễn Mãi</h1>
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
                        <!-- Thêm danh mục -->
                        <div class="card-header ">
                            <a href="<?= BASE_URL_ADMIN . '?act=add-product' ?>" class="btn btn-success">Thêm sản phẩm</a>
                            <input type="text" id="searchProduct" class="form-control" placeholder="Tìm kiếm sản phẩm..." style="width: 300px; margin-left: 75%;">
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped display">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Ảnh sản phẩm</th>
                                        <th>Giá tiền</th>
                                        <!-- <th>Giá khuyến mãi</th> -->
                                        <!-- <th>Độ tuổi</th> -->
                                        <!-- <th>Màu sắc</th> -->
                                        <!-- <th>Giới tính</th> -->

                                        <th>Số lượng</th>
                                        <!-- <th>Lượt xem</th> -->
                                        <!-- <th>Ngày nhập</th> -->
                                        <!-- <th>Mô tả</th> -->
                                        <th>Danh mục</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $key => $value) :  ?>
                                        <?php
                                        // class change status color
                                        $checkStyleStatus = $value['trang_thai'] == 1 ? 'badge-success' : 'badge-secondary';
                                        ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $value['ten_san_pham'] ?></td>
                                            <td>
                                                <?php
                                                // var_dump(BASE_URL . $value['hinh_anh']);die;
                                                ?>
                                                <img src="<?= BASE_URL . $value['hinh_anh'] ?>" alt=""
                                                    width="100"
                                                    onerror="this.onerror=null; this.src='https://img6.thuthuatphanmem.vn/uploads/2022/01/27/anh-cho-cung-cute_014112077.jpg'">
                                            </td>
                                            <td><?= number_format($value['gia_san_pham'], 0, '.', '.') ?> đ</td>
                                            <td><?= $value['so_luong'] ?></td>
                                            <td><?= $value['ten_danh_muc'] ?></td>
                                            <td>
                                                <div class="badge <?= $checkStyleStatus ?>"><?= $value['trang_thai'] == 1 ? 'Còn bán' : 'Dừng bán'; ?></div>
                                            </td>
                                            <td>
                                                <div class="btn-group dropleft">
                                                    <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa-solid fa-sliders"></i>

                                                    </button>
                                                    <div class="dropdown-menu dropleft" x-placement="left-start" style="position: absolute; transform: translate3d(-202px, 0px, 0px); top: 0px; left: 0px; will-change: transform; border: 1px solid black;">
                                                        <a class="dropdown-item" href="<?= BASE_URL_ADMIN . '?act=show-product&id=' . $value['id'] ?>"><i class="fa-regular fa-eye" style="color: #ababab;"></i><span style="margin-left: 0.5rem">Xem</span></a>
                                                        <a class="dropdown-item" href="<?= BASE_URL_ADMIN . '?act=update-product&id=' . $value['id'] ?>"><i class="fa-regular fa-pen-to-square" style="color: #FFD43B;"></i><span style="margin-left: 0.5rem">Sửa</span></a>
                                                        <a class="dropdown-item" href="<?= BASE_URL_ADMIN . '?act=delete-product&id=' . $value['id'] ?>" onclick="return confirm('Bạn có đồng ý xóa hay không?')"><i class="fa-solid fa-trash" style="color: #f50529;"></i><span style="margin-left: 0.5rem">Xóa</span></a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;  ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Ảnh sản phẩm</th>
                                        <th>Giá tiền</th>
                                        <!-- <th>Giá khuyến mãi</th> -->
                                        <!-- <th>Độ tuổi</th> -->
                                        <!-- <th>Màu sắc</th> -->
                                        <!-- <th>Giới tính</th> -->

                                        <th>Số lượng</th>
                                        <!-- <th>Lượt xem</th> -->
                                        <!-- <th>Ngày nhập</th> -->
                                        <!-- <th>Mô tả</th> -->
                                        <th>Danh mục</th>
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
<!-- /.card-body -->
<!-- Footer  -->
<?php include './views/layout/footer.php'; ?>
<!-- End footer  -->

