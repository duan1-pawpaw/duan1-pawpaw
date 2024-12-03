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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản Lý Liên Hệ</h1>
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
                <h2>Thêm liên hệ</h2>
              </div>
              <div class="card-block table-border-style">
                <div class="table-responsive card-header">
                  <form action="?act=create_lh" enctype="multipart/form-data" method="POST">
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Email</label>
                      <input type="email" class="form-control" id="tieu_de" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Ngày gửi</label>
                      <input type="date" class="form-control" id="tieu_de" name="ngay_tao" placeholder="Ngày gửi">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Họ và tên</label>
                      <input type="text" class="form-control" id="tieu_de" name="name" placeholder="Họ và tên">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Số điện thoại</label>
                      <input type="number" class="form-control" id="tieu_de" name="sdt" placeholder="Số điện thoại">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Mô tả</label>
                      <textarea class="form-control" id="mo_ta" name="noi_dung" rows="3"></textarea>
                    </div>
                    <button type="submit" name="add" class="btn btn-success">Thêm</button>
                  </form>

                </div>
              </div>
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