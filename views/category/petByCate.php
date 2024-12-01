<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php require_once './views/layout/header.php' ?>
    <?php require_once './views/layout/menu.php' ?>
    <!-- banner theo từng danh mục-->
     <div>
     <div class="col-12" >
        <?php if($id_cate == 8){ ?>
        <img style="height: 800px; width: 100%;" src="http://www.atyourbusiness.com/blog/wp-content/uploads/2019/07/petsupply.jpg" alt="">
        <?php }elseif($id_cate == 7){ ?>
        <img style="height: 800px; width: 100%;" src="https://cdn.webshopapp.com/shops/256009/files/414175514/xiaomi-xiaomi-smart-pet-food-feeder.jpg" alt="">
        <?php }elseif($id_cate == 11){ ?>
        <img style="height: 800px; width: 100%;" src="https://naototnhat.com/wp-content/uploads/2020/05/Shop-ban-tho-canh-kieng-tai-tp-hcm-uy-tin-nhat-1.jpg" alt="">
        <?php }elseif($id_cate == 10){?>
        <img style="height: 800px; width: 100%;" src="https://www.worldatlas.com/r/w1200/upload/65/c1/fa/shutterstock-1188558835.jpg" alt="">
        <?php }elseif($id_cate == 9){ ?>
        <img style="height: 800px; width: 100%;" src="https://img5.thuthuatphanmem.vn/uploads/2021/11/27/anh-chuot-hamster-hd_092432103.jpg" alt="">
        <?php } ?>
     </div>
     </div>
    <section class="flat-spacing-5 pt_0 flat-seller mt-5">
        <div class="container">
            <div class="flat-title">
                <span class="title wow fadeInUp" data-wow-delay="0s"><?= $listCategory['ten_danh_muc'] ?></span>
                <p class="sub-title wow fadeInUp" data-wow-delay="0s"><?= $listCategory['mo_ta'] ?? "" ?></p>
            </div>
            <div class="grid-layout  wow fadeInUp" data-wow-delay="0s" data-grid="grid-4">
                <?php foreach ($productByCategorys as $productByCategory) { ?>  
                    <div class="card-product fl-item">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="<?= BASE_URL . $productByCategory['hinh_anh'] ?>" src="<?= BASE_URL . $productByCategory['hinh_anh'] ?>" alt="image-product">
                                <img class="lazyload img-hover" data-src="<?= BASE_URL . $productByCategory['hinh_anh'] ?>" src="<?= BASE_URL . $productByCategory['hinh_anh'] ?>" alt="image-product">
                            </a>
                            <div class="list-product-btn">
                                <a href="#quick_add" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Thêm Giỏ Hàng</span>
                                </a>
                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Thêm Sản Phẩm Yêu Thích</span>
                                    <span class="icon icon-delete"></span>
                                </a>
                                <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                    <span class="icon icon-view"></span>
                                    <span class="tooltip">Xem Sản Phẩm</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link"><?= $productByCategory['ten_san_pham'] ?></a>
                            <span class="price"><?= number_format( $productByCategory['gia_khuyen_mai'] ?? $productByCategory['gia_san_pham']) ?>vnđ</span>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="tf-pagination-wrap view-more-button text-center">
                <button class="tf-btn-loading tf-loading-default style-2 btn-loadmore "><span class="text">Load more</span></button>
            </div>
        </div>
    </section>
    <?php require_once './views/layout/footer.php' ?>
</body>

</html>