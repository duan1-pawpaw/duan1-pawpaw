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
                <h2>Thêm liên hệ</h2>
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
                <div class="table-responsive card-header">
                  <form action="?act=create_lh" enctype="multipart/form-data" method="POST">
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Email</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Nội dung</label>
                      <textarea class="form-control" id="mo_ta" name="noi_dung" rows="3" placeholder="Nội dung"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Ngày tạo</label>
                      <input type="date" class="form-control" id="img" name="ngay_tao" placeholder="Ngày tạo">
                    </div>
                    <button type="submit" name="add" class="btn btn-success">Thêm</button>
                  </form>
                  
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