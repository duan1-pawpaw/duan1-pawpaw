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
            <h1>Quản Lý Banner</h1>
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
                <h2>Thêm tin tức</h2>
              </div>
              <div class="card-block table-border-style">
                <div class="table-responsive card-header">
                  <form action="?act=create" enctype="multipart/form-data" method="POST">
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Tiêu đề</label>
                      <input type="text" class="form-control" id="tieu_de" name="tieu_de" placeholder="Tiêu đề tin tức">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">File hình ảnh</label>
                      <!-- <input type="text" class="form-control" id="img" name="url_hinh" placeholder="url"> -->
                      <input type="file" class="form-control" id="img" name="url_hinh" placeholder="url">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Ngày đăng</label>
                      <input type="date" class="form-control" id="tieu_de" name="tin_date" placeholder="Tiêu đề tin tức">
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlInput1">Loại tin</label>
                    <select name="loai_tin" class="form-control" id="">
                                            <option value="0">Tin nổi bật</option>
                                            <option value="1">Tin thường</option>
                                        </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Mô tả</label>
                      <textarea class="form-control" id="mo_ta" name="mo_ta" rows="3"></textarea>
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