<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    /* Container chính */
    .product-image {
        max-width: 100%;
        /* Ảnh không vượt quá chiều rộng vùng chứa */
        max-height: 600px;
        /* Giới hạn chiều cao */
        object-fit: contain;
        /* Giữ nguyên tỷ lệ ảnh */
        margin-bottom: 20px;
        /* Tạo khoảng cách với thumbnail */
        border: 1px solid #ccc;
        /* Thêm viền nhẹ */
        border-radius: 8px;
        /* Bo góc ảnh */
    }

    /* Container cho danh sách thumbnail */
    .product-image-thumbs {
        display: flex;
        /* Hiển thị các ảnh theo hàng ngang */
        justify-content: center;
        /* Căn giữa ảnh thumbnail */
        gap: 10px;
        /* Khoảng cách giữa các ảnh thumbnail */
    }

    /* Thumbnail ảnh */
    .product-image-thumb {
        width: 80px;
        /* Chiều rộng thumbnail */
        height: 80px;
        /* Chiều cao thumbnail */
        overflow: hidden;
        /* Ẩn phần thừa nếu ảnh lớn hơn khung */
        border: 2px solid transparent;
        /* Viền mặc định */
        border-radius: 6px;
        /* Bo góc thumbnail */
        cursor: pointer;
        /* Con trỏ chỉ tay khi di chuột qua */
        transition: all 0.3s ease;
        /* Hiệu ứng mượt mà khi hover */
    }

    .product-image-thumb img {
        width: 100%;
        /* Ảnh thumbnail chiếm toàn bộ khung */
        height: 100%;
        /* Chiều cao vừa khung */
        object-fit: cover;
        /* Cắt ảnh vừa khung nhưng không bị méo */
    }

    /* Thumbnail được chọn (active) */
    .product-image-thumb.active {
        border-color: #007bff;
        /* Viền nổi bật khi được chọn */
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        /* Hiệu ứng đổ bóng */
    }

    /* Hiệu ứng khi hover vào thumbnail */
    .product-image-thumb:hover {
        border-color: #333;
        /* Đổi màu viền */
        transform: scale(1.1);
        /* Phóng to nhẹ */
    }

    /* Nút trạng thái */
    .btn-status {
        width: 80px;
        /* Độ rộng nút */
        height: 25px;
        /* Chiều cao nút */
        font-size: 10px;
        /* Cỡ chữ */
        padding: 2px;
        /* Khoảng cách bên trong */
        border-radius: 5px;
        /* Bo góc */
        text-align: center;
        margin-left: 10px;
        /* Căn giữa văn bản */
    }

    .btn-status.success {
        background-color: #28a745;
        /* Màu nền xanh lá */
        color: #fff;
        /* Màu chữ trắng */
        border: none;
        /* Bỏ viền */
    }

    .btn-status.secondary {
        background-color: #6c757d;
        /* Màu nền xám */
        color: #fff;
        border: none;
    }
</style>

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
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="section-title">Chi tiết sản phẩm</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div align="center" class="col-12">
                                            <img src="<?= BASE_URL . $product['hinh_anh'] ?>" class="product-image" style="width: auto; height: 600px;" alt="Product Image">
                                        </div>
                                        <div align="center" class="col-12 product-image-thumbs">
                                            <?php foreach ($albumProduct as $key => $anh_SP) {
                                            ?>
                                                <div class="product-image-thumb <?= $anh_SP[$key] == 0 ? 'active' : '' ?> "><img src="<?= BASE_URL . $anh_SP['link_hinh_anh'] ?>" alt="Product Image"></div>
                                            <?php
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="d-flex align-items-center">
                                            <h3 class="my-3"><?= $product['ten_san_pham'] ?></h3>
                                            <?php if ($product['trang_thai'] == 1) { ?>
                                                <button class="btn-status success mt-1">Còn hàng</button>
                                            <?php } else { ?>
                                                <button class="btn-status secondary mt-1">Hết hàng</button>
                                            <?php } ?>
                                        </div>

                                        <hr>
                                        <h4 class="mt-3">Giá tiền: <small><?= $product['gia_san_pham'] ?></small></h4>
                                        <h4 class="mt-3">Gía khuyến mãi: <small><?= $product['gia_khuyen_mai'] ?></small></h4>
                                        <h4 class="mt-3">Độ tuổi: <small><?= $product['do_tuoi'] ?> Tháng Tuổi</small></h4>
                                        <h4 class="mt-3">Màu sắc: <small><?= $product['mau_sac'] ?></small></h4>
                                        <h4 class="mt-3">Giới tính: <small><?= $product['gioi_tinh'] == 1 ?  "Đực" : "Cái" ?></small></h4>

                                        <h4 class="mt-3">Số lượng: <small><?= $product['so_luong'] ?></small></h4>
                                        <h4 class="mt-3">Lượt xem: <small><?= $product['luot_xem'] ?></small></h4>
                                        <h4 class="mt-3">Ngày nhập: <small><?= formartDate($product['ngay_nhap'])  ?></small></h4>
                                        <h4 class="mt-3">Mô tả: <small><?= $product['mo_ta'] ?></small></h4>
                                        <h4 class="mt-3">Danh mục: <small><?= $product['ten_danh_muc'] ?></small></h4>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr>
                                    <h3>Bình luận của sản phẩm</h3>
                                    <div>
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Người bình luận</th>
                                                    <th>Nội dung</th>
                                                    <th>Ngày đăng</th>
                                                    <th>Trạng thái</th>
                                                    <th>Thao Tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($listComment as $key => $comment) : ?>
                                                    <tr>
                                                        <td><?= $key + 1 ?></td>
                                                        <td><a target="_blank" href="<?= BASE_URL_ADMIN . '?act=chi_tiet_khach_hang&id_khach_hang=' . $comment['tai_khoan_id'] ?>"><?= $comment['ho_ten'] ?></a></td>
                                                        <td><?= $comment['noi_dung'] ?></td>
                                                        <td><?= formartDate($comment['ngay_dang']) ?></td>
                                                        <td><?= $comment['trang_thai'] == 1 ? 'Hiển thị' : 'Bị ẩn' ?></td>
                                                        <td>
                                                     <?php if ($comment['trang_thai'] == 1) { ?>
                                                         <a href="<?= BASE_URL_ADMIN . '?act=updateComment&id_binh_luan=' . $comment['id'] .'&id_san_pham=' .$product['id'] . '&trang_thai=0' ?>"><button class="btn btn-danger">Ẩn</button></a>
                                                     <?php } else { ?>
                                                         <a href="<?= BASE_URL_ADMIN . '?act=updateComment&id_binh_luan=' . $comment['id'] .'&id_san_pham=' .$product['id']  . '&trang_thai=1' ?>"><button class="btn btn-info">Bỏ Ẩn</button></a>
                                                 </td>
                                                    </tr>
                                                <?php } endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
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
    <!-- Footer  -->
    <?php include './views/layout/footer.php'; ?>
    <!-- End footer  -->
</body>
<script>
    const thumbs = document.querySelectorAll('.product-image-thumb');

    // Lấy ảnh chính
    const mainImage = document.querySelector('.product-image');

    // Gán sự kiện click cho mỗi thumbnail
    thumbs.forEach((thumb, index) => {
        thumb.addEventListener('click', () => {
            // Xóa lớp active khỏi tất cả thumbnail
            thumbs.forEach(t => t.classList.remove('active'));

            // Thêm lớp active cho thumbnail hiện tại
            thumb.classList.add('active');

            // Thay đổi ảnh chính
            mainImage.src = thumb.querySelector('img').src;
        });
    });
</script>

</html>