<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>BizNews - Free News Website Template</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Free HTML Templates" name="keywords">
  <meta content="Free HTML Templates" name="description">

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>

  <?php
  require_once './views/layout/header.php';
  require_once './views/layout/menu.php';
  ?>
  <!-- Main News Slider Start -->
  <div class="container-fluid" style="margin-top: 100px;">
    <div class="row">
      <div class="col-lg-7 px-0">
        <div class="owl-carousel main-carousel position-relative">
          <?php
          $count = 0;
          foreach ($baiViets as $index => $baiViet) {
            $count++;
            if ($count < 4) {
          ?>
              <div class="position-relative overflow-hidden" style="height: 500px;">
                <img class="img-fluid h-100" src="<?= $baiViet['url_hinh'] ?>" style="object-fit: cover;">
                <div class="overlay">
                  <div class="mb-2">
                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                      href="?act=ct_tin&id=<?= $baiViet['id_tin'] ?>">Business</a>
                    <a class="text-white" href="?act=ct_tin&id=<?= $baiViet['id_tin'] ?>"><?= $baiViet['tin_date'] ?></a>
                  </div>
                  <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="?act=ct_tin&id=<?= $baiViet['id_tin'] ?>"><?= $baiViet['tieu_de'] ?></a>
                </div>
              </div>

          <?php }
          } ?>
        </div>
      </div>
      <div class="col-lg-5 px-0">
        <div class="row mx-0">
          <?php
          $count = 0;
          foreach ($baiViets as $index => $baiViet) {
            $count++;
            if ($count < 5) {
          ?>
              <div class="col-md-6 px-0">
                <div class="position-relative overflow-hidden" style="height: 250px;">
                  <img class="img-fluid w-100 h-100" src="<?= $baiViet['url_hinh'] ?>" style="object-fit: cover;">
                  <div class="overlay">
                    <div class="mb-2">
                      <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                        href="?act=ct_tin&id=<?= $baiViet['id_tin'] ?>">Business</a>
                      <a class="text-white" href="?act=ct_tin&id=<?= $baiViet['id_tin'] ?>"><small><?= $baiViet['tin_date'] ?></small></a>
                    </div>
                    <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="?act=ct_tin&id=<?= $baiViet['id_tin'] ?>"><?= $baiViet['tieu_de'] ?></a>
                  </div>
                </div>
              </div>
          <?php }
          } ?>
        </div>
      </div>
    </div>
  </div>
  <!-- Main News Slider End -->


  <!-- Breaking News Start -->
  <div class="container-fluid bg-dark py-3 mb-3">
    <div class="container">
      <div class="row align-items-center bg-dark">
        <div class="col-12">
          <div class="d-flex justify-content-between">
            <div class="bg-primary text-dark text-center font-weight-medium py-2" style="width: 170px;">Tin tức mới nhất</div>
            <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center ml-3"
              style="width: calc(100% - 170px); padding-right: 90px;">
              <?php foreach ($baiVietMois as $index => $baiVietMoi) { ?>
                <div class="text-truncate"><a class="text-white text-uppercase font-weight-semi-bold" href="?act=ct_tin&id=<?= $baiVietMoi['id_tin'] ?>"><?= $baiVietMoi['tieu_de'] ?></a></div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Breaking News End -->


  <!-- Tin nổi bật Slider Start -->
  <div class="container-fluid pt-5 mb-3">
    <div class="container">
      <div class="section-title">
        <h4 class="m-0 text-uppercase font-weight-bold">Tin Nổi Bật</h4>
      </div>
      <div class="owl-carousel news-carousel carousel-item-4 position-relative">
        <?php foreach ($baiVietNoiBats as $index => $baiVietNb) { ?>
          <div class="position-relative overflow-hidden" style="height: 300px;">
            <img class="img-fluid h-100" src="<?= $baiVietNb['url_hinh'] ?>" style="object-fit: cover;">
            <div class="overlay">
              <div class="mb-2">
                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                  href="?act=ct_tin&id=<?= $baiVietNb['id_tin'] ?>">Business</a>
                <a class="text-white" href="?act=ct_tin&id=<?= $baiVietNb['id_tin'] ?>"><small><?= $baiVietNb['tin_date'] ?></small></a>
              </div>
              <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="?act=ct_tin&id=<?= $baiVietNb['id_tin'] ?>"><?= $baiVietNb['tieu_de'] ?></a>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <!-- Tin nổi bật Slider End -->


  <!-- News With Sidebar Start -->
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="row">
            <div class="col-12">
              <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Tin mới nhất</h4>
                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
              </div>
            </div>
            <?php foreach ($baiVietMois as $index => $baiVietMoi) { ?>
              <div class="col-lg-6">
                <div class="position-relative mb-3">
                  <img class="img-fluid w-100" src="<?= $baiVietMoi['url_hinh'] ?>" style="object-fit: cover; height:350px">
                  <div class="bg-white border border-top-0 p-4">
                    <div class="mb-2">
                      <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                        href="?act=ct_tin&id=<?= $baiVietMoi['id_tin'] ?>">Business</a>
                      <a class="text-body" href="?act=ct_tin&id=<?= $baiVietMoi['id_tin'] ?>"><small><?= $baiVietMoi['tin_date'] ?></small></a>
                    </div>
                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="?act=ct_tin&id=<?= $baiVietMoi['id_tin'] ?>"><?php
                                                                                                                                                  $ghkt = substr($baiVietMoi['tieu_de'], 0, 55);
                                                                                                                                                  echo $ghkt . '...' ?></a>
                    <p class="m-0"> <a href="?act=ct_tin&id=<?= $baiVietMoi['id_tin'] ?>"><?php
                                                                                          $ghkt = substr($baiVietMoi['mo_ta'], 0, 100);
                                                                                          echo $ghkt . '...' ?></a></p>
                  </div>
                  <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                    <div class="d-flex align-items-center">
                      <img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25" alt="">
                      <small>John Doe</small>
                    </div>
                    <div class="d-flex align-items-center">
                      <small class="ml-3"><i class="far fa-eye mr-2"></i>12345</small>
                      <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
            <div class="col-lg-12 mb-3">
              <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Các tin khác</h4>
              </div>
            </div>

            <?php
            $count = 0;
            foreach ($baiViets as $index => $baiViet) {
              $count++;
              if ($count < 7) {
            ?>
                <div class="col-lg-6">
                  <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                    <img class="img-fluid" src="<?= $baiViet['url_hinh'] ?>" alt="" style="width: 110px; height:110px">
                    <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                      <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="?act=ct_tin&id=<?= $baiViet['id_tin'] ?>">Business</a>
                        <a class="text-body" href="?act=ct_tin&id=<?= $baiViet['id_tin'] ?>"><small><?= $baiViet['tin_date'] ?></small></a>
                      </div>
                      <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="?act=ct_tin&id=<?= $baiViet['id_tin'] ?>"><?= $baiViet['tieu_de'] ?></a>
                    </div>
                  </div>
                </div>
            <?php }
            } ?>
          </div>
        </div>

        <div class="col-lg-4">
          <!-- Social Follow Start -->
          <div class="mb-3">
            <div class="section-title mb-0">
              <h4 class="m-0 text-uppercase font-weight-bold">Follow Us</h4>
            </div>
            <div class="bg-white border border-top-0 p-3">
              <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #39569E;">
                <i class="fab fa-facebook-f text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                <span class="font-weight-medium">12,345 Fans</span>
              </a>
              <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #52AAF4;">
                <i class="fab fa-twitter text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                <span class="font-weight-medium">12,345 Followers</span>
              </a>
              <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #0185AE;">
                <i class="fab fa-linkedin-in text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                <span class="font-weight-medium">12,345 Connects</span>
              </a>
              <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #C8359D;">
                <i class="fab fa-instagram text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                <span class="font-weight-medium">12,345 Followers</span>
              </a>
              <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #DC472E;">
                <i class="fab fa-youtube text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                <span class="font-weight-medium">12,345 Subscribers</span>
              </a>
              <a href="" class="d-block w-100 text-white text-decoration-none" style="background: #055570;">
                <i class="fab fa-vimeo-v text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                <span class="font-weight-medium">12,345 Followers</span>
              </a>
            </div>
          </div>
          <!-- Social Follow End -->

          <!-- Ads Start -->
          <div class="mb-3">
            <div class="section-title mb-0">
              <h4 class="m-0 text-uppercase font-weight-bold">Advertisement</h4>
            </div>
            <div class="bg-white text-center border border-top-0 p-3">
              <a href=""><img class="img-fluid" src="https://th.bing.com/th/id/OIP.Az4PEihJm5U7_BuoLpQBHwHaFj?w=240&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt=""></a>
            </div>
          </div>
          <!-- Ads End -->

          <!-- Popular News Start -->
          <div class="mb-3">
            <div class="section-title mb-0">
              <h4 class="m-0 text-uppercase font-weight-bold">Tin Tranding</h4>
            </div>
            <div class="bg-white border border-top-0 p-3">
              <?php
              $count = 0;
              foreach ($baiVietNoiBats as $index => $baiViet) {
                $count++;
                if ($count < 7) {
              ?>
                  <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                    <img class="img-fluid" src="<?= $baiViet['url_hinh'] ?>" alt="" style="width: 110px; height:110px">
                    <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                      <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="?act=ct_tin&id=<?= $baiViet['id_tin'] ?>">Business</a>
                        <a class="text-body" href="?act=ct_tin&id=<?= $baiViet['id_tin'] ?>"><small><?= $baiViet['tin_date'] ?></small></a>
                      </div>
                      <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="?act=ct_tin&id=<?= $baiViet['id_tin'] ?>"><?= $baiViet['tieu_de'] ?></a>
                    </div>
                  </div>
              <?php  }
              } ?>
            </div>
          </div>
          <!-- Popular News End -->

          <!-- Newsletter Start -->
          <div class="mb-3">
            <div class="section-title mb-0">
              <h4 class="m-0 text-uppercase font-weight-bold">Newsletter</h4>
            </div>
            <div class="bg-white text-center border border-top-0 p-3">
              <p>Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd</p>
              <div class="input-group mb-2" style="width: 100%;">
                <input type="text" class="form-control form-control-lg" placeholder="Your Email">
                <div class="input-group-append">
                  <button class="btn btn-primary font-weight-bold px-3">Sign Up</button>
                </div>
              </div>
              <small>Lorem ipsum dolor sit amet elit</small>
            </div>
          </div>
          <!-- Newsletter End -->

          <!-- Tags Start -->
          <div class="mb-3">
            <div class="section-title mb-0">
              <h4 class="m-0 text-uppercase font-weight-bold">Tags</h4>
            </div>
            <div class="bg-white border border-top-0 p-3">
              <div class="d-flex flex-wrap m-n1">
                <a href="" class="btn btn-sm btn-outline-secondary m-1">Politics</a>
                <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>
                <a href="" class="btn btn-sm btn-outline-secondary m-1">Corporate</a>
                <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>
                <a href="" class="btn btn-sm btn-outline-secondary m-1">Health</a>
                <a href="" class="btn btn-sm btn-outline-secondary m-1">Education</a>
                <a href="" class="btn btn-sm btn-outline-secondary m-1">Science</a>
                <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>
                <a href="" class="btn btn-sm btn-outline-secondary m-1">Foods</a>
                <a href="" class="btn btn-sm btn-outline-secondary m-1">Travel</a>
              </div>
            </div>
          </div>
          <!-- Tags End -->
        </div>
      </div>
    </div>
  </div>
  <!-- News With Sidebar End -->
  <!-- Back to Top -->
  <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>


  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Template Javascript -->
  <script src="js/main.js"></script>
  <?php require_once './views/layout/footer.php' ?>
</body>

</html>