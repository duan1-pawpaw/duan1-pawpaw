<!-- header  -->
<?php require_once './views/layout/header.php'; ?>
<!-- Navbar -->
<?php require_once './views/layout/nav.php'; ?>
<!-- /.navbar -->

<section class="section">
    <div class="breadcrumb-item active"><a href="<?= BASE_URL_ADMIN ?>">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="<?= BASE_URL_ADMIN ?>?act=products">Product</a></div>
    <div class="breadcrumb-item"><a>Thêm mới</a></div>

    <h1 class="section-title">Thêm mới</h1>
    <div class="section-header-back">
        <a href="<?= BASE_URL_ADMIN ?>?act=products" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>

    <form class="row" action="<?= BASE_URL_ADMIN . '?act=add-product' ?>" method="POST" enctype="multipart/form-data">
        <div class="row card-body">
            <div class="form-group col-6">
                <label>Tên pet</label>
                <input type="text" class="form-control"
                    value="<?= $_SESSION['old_data']['ten_san_pham'] ?? '' ?>"
                    name="ten_san_pham" placeholder="Nhập tên pet">
                <?php if (isset($_SESSION['error']['ten_san_pham'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></p>
                <?php } ?>
            </div>

            <div class="form-group col-6">
                <label>Độ tuổi</label>
                <input type="text" class="form-control"
                    value="<?= $_SESSION['old_data']['do_tuoi'] ?? '' ?>"
                    name="do_tuoi" placeholder="Nhập độ tuổi">
                <?php if (isset($_SESSION['error']['do_tuoi'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['do_tuoi'] ?></p>
                <?php } ?>
            </div>

            <div class="form-group col-6">
                <label>Màu sắc</label>
                <input type="text" class="form-control"
                    value="<?= $_SESSION['old_data']['mau_sac'] ?? '' ?>"
                    name="mau_sac" placeholder="Nhập màu sắc">
                <?php if (isset($_SESSION['error']['mau_sac'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['mau_sac'] ?></p>
                <?php } ?>
            </div>

            <div class="form-group col-6">
                <label>Giới tính</label>
                <select class="form-control" name="gioi_tinh" id="exempleFormControlSelect1">
                    <option selected disabled>Chọn gới tính pet</option>
                    <option value="1" <?= isset($_SESSION['old_data']['gioi_tinh']) && $_SESSION['old_data']['gioi_tinh'] == "1" ? 'selected' : '' ?>>Đực</option>
                    <option value="2" <?= isset($_SESSION['old_data']['gioi_tinh']) && $_SESSION['old_data']['gioi_tinh'] == "2" ? 'selected' : '' ?>>Cái</option>
                </select>
                <?php if (isset($_SESSION['error']['gioi_tinh'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['gioi_tinh'] ?></p>
                <?php } ?>
            </div>
            <div class="form-group col-6">
                <label>Hình ảnh</label>
                <input type="file" class="form-control" name="hinh_anh">
                <?php if (isset($_SESSION['error']['hinh_anh'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['hinh_anh'] ?></p>
                <?php } ?>
            </div>
            <div class="form-group col-6">
                <label>Mô tả</label>
                <textarea class="form-control" name="mo_ta" placeholder="Nhập mô tả"><?= $_SESSION['old_data']['mo_ta'] ?? '' ?></textarea>
                <?php if (isset($_SESSION['error']['mo_ta'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['mo_ta'] ?></p>
                <?php } ?>
            </div>

            <div class="form-group col-6">
                <label>Số lượng</label>
                <input type="number" class="form-control"
                    value="<?= $_SESSION['old_data']['so_luong'] ?? '' ?>"
                    name="so_luong" placeholder="Nhập số lượng">
                <?php if (isset($_SESSION['error']['so_luong'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['so_luong'] ?></p>
                <?php } ?>
            </div>

            <div class="form-group col-6">
                <label>Ngày nhập</label>
                <input type="date" class="form-control"
                    value="<?= $_SESSION['old_data']['ngay_nhap'] ?? '' ?>"
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
                        <option value="<?= $category['id'] ?>" <?= isset($_SESSION['old_data']['danh_muc_id']) && $_SESSION['old_data']['danh_muc_id'] == $category['id'] ? 'selected' : '' ?>><?= $category['ten_danh_muc'] ?></option>
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
                    <option value="1" <?= isset($_SESSION['old_data']['trang_thai']) && $_SESSION['old_data']['trang_thai'] == "1" ? 'selected' : '' ?>>Còn bán</option>
                    <option value="2" <?= isset($_SESSION['old_data']['trang_thai']) && $_SESSION['old_data']['trang_thai'] == "2" ? 'selected' : '' ?>>Dừng bán</option>
                </select>
                <?php if (isset($_SESSION['error']['trang_thai'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></p>
                <?php } ?>
            </div>
            <div class="form-group col-6">
                <label>Giá pet</label>
                <input type="number" class="form-control"
                    value="<?= $_SESSION['old_data']['gia_san_pham'] ?? '' ?>"
                    name="gia_san_pham" placeholder="Nhập giá pet">
                <?php if (isset($_SESSION['error']['gia_san_pham'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['gia_san_pham'] ?></p>
                <?php } ?>
            </div>

            <div class="form-group col-6">
                <label>Album ảnh</label>
                <input type="file" class="form-control" name="img_array[]" multiple>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</section>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Footer  -->
<?php require_once './views/layout/footer.php'; ?>
<!-- End footer  -->