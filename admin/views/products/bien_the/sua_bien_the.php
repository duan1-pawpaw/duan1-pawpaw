<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhập </title>
</head>
<style>
    form select {
        width: 15%;
        padding: 5px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        outline: none;
        background-color: #fff;
        margin-bottom: 8px;
        transition: border-color 0.3s ease;
    }

    form select:focus {
        border-color: #007bff;
        /* Màu viền khi chọn */
    }

    /* CSS cho nút Submit */
    /* form button[type="submit"] {
    width: 7%;
    padding: 4px 0;
    font-size: 16px;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
} */

    form button[type="submit"]:hover {
        background-color: #0056b3;
        /* Màu khi hover */
    }
</style>

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
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Cập Nhật Biến Thể</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="row" method="POST" enctype="multipart/form-data">
                                <div class="row card-body">
                                    <div class="form-group col-6">
                                        <label>Màu Sắc</label>
                                        <input type="text" class="form-control"
                                            value="<?= $variant['mau_sac'] ?? '' ?>"
                                            name="mau_sac" placeholder="Nhập tên pet">
                                        <?php if (isset($_SESSION['error']['mau_sac'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['error']['mau_sac'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Hình ảnh</label>
                                        <input type="file" class="form-control" name="hinh_anh">
                                        <img src="<?= BASE_URL . $variant['hinh_anh'] ?>" width="100" alt="">
                                        <?php if (isset($_SESSION['error']['hinh_anh'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['error']['hinh_anh'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Độ tuổi</label>
                                        <input type="text" class="form-control"
                                            value="<?= $variant['do_tuoi'] ?? '' ?>"
                                            name="do_tuoi" placeholder="Nhập độ tuổi">
                                        <?php if (isset($_SESSION['error']['do_tuoi'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['error']['do_tuoi'] ?></p>
                                        <?php } ?>
                                    </div>

                                    <div class="form-group col-6">
                                        <label>Số Lượng</label>
                                        <input type="text" class="form-control"
                                            value="<?= $variant['so_luong'] ?? '' ?>"
                                            name="so_luong" placeholder="Nhập màu sắc">
                                        <?php if (isset($_SESSION['error']['so_luong'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['error']['so_luong'] ?></p>
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
                                     <div class="form-group">
                                        <button type="submit" style="margin-left: 30px;" class="btn btn-primary ">Submit</button>
                                    </div>
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
    </div>
    <?php require_once './views/layout/footer.php' ?>
</body>

</html>