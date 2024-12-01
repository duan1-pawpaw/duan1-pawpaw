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
                    <h1>Cập nhật sản phẩm</h1>
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
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin sản phẩm</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <form action="<?= BASE_URL_ADMIN . '?act=update-product&id='.$product['id']  ?>" class="row" action="" method="POST" enctype="multipart/form-data">
                            <div class="row card-body">
                                <div class="form-group col-6">
                                    <label>Tên pet</label>
                                    <input type="text" class="form-control"
                                        value="<?= $_SESSION['old_data']['ten_san_pham'] ?? $product['ten_san_pham'] ?? '' ?>"
                                        name="ten_san_pham" placeholder="Nhập tên pet">
                                    <?php if (isset($_SESSION['error']['ten_san_pham'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>Độ tuổi</label>
                                    <input type="text" class="form-control"
                                        value="<?= $_SESSION['old_data']['do_tuoi'] ?? $product['do_tuoi'] ?? '' ?>"
                                        name="do_tuoi" placeholder="Nhập độ tuổi">
                                    <?php if (isset($_SESSION['error']['do_tuoi'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['do_tuoi'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>Màu sắc</label>
                                    <input type="text" class="form-control"
                                        value="<?= $_SESSION['old_data']['mau_sac'] ?? $product['mau_sac'] ?? '' ?>"
                                        name="mau_sac" placeholder="Nhập màu sắc">
                                    <?php if (isset($_SESSION['error']['mau_sac'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['mau_sac'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>Giới tính</label>
                                    <select class="form-control" name="gioi_tinh" id="exempleFormControlSelect1">
                                        <option selected disabled>Chọn gới tính pet</option>
                                        <option value="1" <?= (isset($_SESSION['old_data']['gioi_tinh']) ? $_SESSION['old_data']['gioi_tinh'] : $product['gioi_tinh']) == "1" ? 'selected' : '' ?>>Đực</option>
                                        <option value="2" <?= (isset($_SESSION['old_data']['gioi_tinh']) ? $_SESSION['old_data']['gioi_tinh'] : $product['gioi_tinh']) == "2" ? 'selected' : '' ?>>Cái</option>
                                    </select>
                                    <?php if (isset($_SESSION['error']['gioi_tinh'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['gioi_tinh'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label for="hinh_anh">Hình ảnh</label>
                                    <input type="file" class="form-control" id="hinh_anh" name="hinh_anh">
                                    <?php if (!empty($product['hinh_anh'])) { ?>
                                        <div class="mt-2">
                                            <img src="<?= BASE_URL . $product['hinh_anh'] ?>" alt="Hình ảnh pet" width="100">
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_SESSION['error']['hinh_anh'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['hinh_anh'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label>Mô tả</label>
                                    <textarea class="form-control" name="mo_ta" placeholder="Nhập mô tả"><?= $_SESSION['old_data']['mo_ta'] ?? $product['mo_ta'] ?? '' ?></textarea>
                                    <?php if (isset($_SESSION['error']['mo_ta'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['mo_ta'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>Số lượng</label>
                                    <input type="number" class="form-control"
                                        value="<?= $_SESSION['old_data']['so_luong'] ?? $product['so_luong'] ?? '' ?>"
                                        name="so_luong" placeholder="Nhập số lượng">
                                    <?php if (isset($_SESSION['error']['so_luong'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['so_luong'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>Ngày nhập</label>
                                    <input type="date" class="form-control"
                                        value="<?= $_SESSION['old_data']['ngay_nhap'] ?? $product['ngay_nhap'] ?? '' ?>"
                                        name="ngay_nhap">
                                    <?php if (isset($_SESSION['error']['ngay_nhap'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['ngay_nhap'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label>Danh mục</label>
                                    <select class="form-control" name="danh_muc_id" id="exempleFormControlSelect1">
                                        <option selected disabled>Chọn danh mục pet</option>
                                        <?php foreach ($categorys as $category) : ?>
                                            <option value="<?= $category['id'] ?>" <?= (isset($_SESSION['old_data']['danh_muc_id']) && $_SESSION['old_data']['danh_muc_id'] == $category['id']) || $product['danh_muc_id'] == $category['id'] ? 'selected' : '' ?>><?= $category['ten_danh_muc'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php if (isset($_SESSION['error']['danh_muc_id'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['danh_muc_id'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label>Trạng thái</label>
                                    <select class="form-control" name="trang_thai" id="exempleFormControlSelect1">
                                        <option selected disabled>Chọn trạng thái pet</option>
                                        <option value="1" <?= (isset($_SESSION['old_data']['trang_thai']) ? $_SESSION['old_data']['trang_thai'] : $product['trang_thai']) == "1" ? 'selected' : '' ?>>Còn bán</option>
                                        <option value="2" <?= (isset($_SESSION['old_data']['trang_thai']) ? $_SESSION['old_data']['trang_thai'] : $product['trang_thai']) == "2" ? 'selected' : '' ?>>Dừng bán</option>
                                    </select>
                                    <?php if (isset($_SESSION['error']['trang_thai'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label>Giá pet</label>
                                    <input type="number" step="0.01" class="form-control"
                                        value="<?= $_SESSION['old_data']['gia_san_pham'] ?? $product['gia_san_pham'] ?? '' ?>"
                                        name="gia_san_pham" placeholder="Nhập giá pet">
                                    <?php if (isset($_SESSION['error']['gia_san_pham'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['gia_san_pham'] ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">Sửa thông tin</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
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
                    <!-- /.card -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Album ảnh sản phẩm</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <form action="<?= BASE_URL_ADMIN . '?act=update-album-product' ?>" method="POST" enctype="multipart/form-data">
                                <div class="table-responsive">
                                    <table id="faqs" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Ảnh</th>
                                                <th>File</th>
                                                <th>
                                                    <div class="text-center"><button onclick="addfaqs();" type="button" class="badge badge-success"><i class="fa fa-plus"></i>Add</button></div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                            <input type="hidden" id="img_delete" name="img_delete">
                                            <?php 
                                                // var_dump($albumProduct);
                                                // die();
                                                ?>                
                                            <?php foreach ($albumProduct as $key => $value) : ?>
                                                <tr id="faqs-row-<?= $key ?>">
                                                    <input type="hidden" name="current_img_ids[]" value="<?= $value['id'] ?>">
                                                    <td><img src="<?= BASE_URL . $value['link_hinh_anh'] ?>" style="width:50px; height:50px;" alt=""></td>
                                                    <td><input type="file" name="img_array[]" class="form-control"></td>
                                                    <td class="mt-10"><button class="badge badge-danger" type="button" onclick="removeRow(<?= $key ?>, <?= $value['id'] ?>)"><i class="fa fa-trash"></i> Delete</button></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-primary">Cập nhật ablum</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<script>
    var faqs_row = <?= count($albumProduct); ?>;

    function addfaqs() {
        html = '<tr id="faqs-row-' + faqs_row + '">';
        html += '<td><img src="https://img6.thuthuatphanmem.vn/uploads/2022/01/27/anh-cho-cung-cute_014112077.jpg" style="width:50px; height:50px;" alt=""></td>';
        html += '<td><input type="file" name="img_array[]" class="form-control"></td>';
        html += '<td class="mt-10"><button type="button" class="badge badge-danger" onclick="removeRow(' + faqs_row + ', null);"><i class="fa fa-trash"></i> Delete</button></td>';

        html += '</tr>';

        $('#faqs tbody').append(html);

        faqs_row++;
    }

    function removeRow(rowId, imgId) {
        $('#faqs-row-' + rowId).remove();
        if (imgId !== null) {
            var imgDeleteInput = document.getElementById('img_delete');
            var currentValue = imgDeleteInput.value;
            imgDeleteInput.value = currentValue ? currentValue + ',' + imgId : imgId;
        }
    }
</script>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Footer  -->
<?php require_once './views/layout/footer.php'; ?>
<!-- End footer  -->
