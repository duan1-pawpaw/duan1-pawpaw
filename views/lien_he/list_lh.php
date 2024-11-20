<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <!-- <?php var_dump($products) ?> -->
    <?php require_once './views/layout/header.php' ?>
    <?php require_once './views/layout/nav.php' ?>
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <!-- Main-body start -->
            <div class="main-body">
                <div class="page-wrapper">

                    <!-- Page-body start -->
                    <div class="page-body">
                        <!-- Basic table card start -->
                        <div class="card">
                            <div class="card-header">
                                <h2>Quản lý liên hệ</h2>

                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="icofont icofont-simple-left "></i></li>
                                        <li><i class="icofont icofont-maximize full-card"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                                        <li><i class="icofont icofont-error close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block table-border-style">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>STT</th>
                                                <th>Email</th>
                                                <th>Nội dung</th>
                                                <th>Ngày tạo</th>
                                                <th>Ẩn/Hiện</th>
                                                <th>
                                                    <a class="d-inline p-2 text-bg-dark" href="?act=add_lh"><button type="button" class="btn btn-success  ">Thêm Mới</button></a>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($products as $index => $ds) { ?>

                                                <tr>
                                                    <th scope="row"><?= $index+1 ?></th>
                                                    <th> <?= $ds["email"] ?> </th>
                                                    <th><?= $ds["noi_dung"] ?></th>
                                                    <th><?= $ds["ngay_tao"] ?></th>
                                                    <th>
                                                        <a class="btn btn-secondary" href="?act=td_tt_lh&id=<?= $ds['id'] ?>">
                                                            <?php
                                                            if ($ds["trang_thai"] == true) {
                                                                echo "Hiện";
                                                            } else {
                                                                echo "Ẩn";
                                                            }
                                                            ?>
                                                        </a>
                                                    </th>
                                                    <TH>
                                                        <a class="btn btn-warning" href="?act=update_lh&id=<?= $ds['id'] ?>">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                            </svg>
                                                        </a>
                                                        <a class="btn btn-danger" onclick="return confirm('YOU ARE SURE')" href="?act=delete_lh&id=<?= $ds['id'] ?>">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                            </svg>
                                                        </a>
                                                    </TH>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once './views/layout/footer.php' ?>
</body>

</html>