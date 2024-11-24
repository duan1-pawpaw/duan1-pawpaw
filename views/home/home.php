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
    <?php require_once './views/layout/banner.php' ?>
    <!-- Category -->
    <section class="flat-spacing-4 flat-categorie">
        <div class="container-full">
            <div class="flat-title-v2">
                <span class="text-3 fw-7 text-uppercase title wow fadeInUp" data-wow-delay="0s">Danh Mục Thú Cưng</span>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-8 col-md-8">
                    <div dir="ltr" class="swiper tf-sw-collection" data-preview="4" data-tablet="3" data-mobile="3" data-space-lg="30" data-space-md="30" data-space="15" data-loop="false" data-auto-play="false">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide" lazy="true">
                                <div class="collection-item style-left hover-img">
                                    <div class="collection-inner">
                                        <a href="<?= BASE_URL . '?act=category&id_cate=7' ?>" class="collection-image img-style">
                                            <img class="lazyload" data-src="./assets/assets_font/images/cates/cat.jpg" src="./assets/assets_font/images/cates/cat.jpg" alt="collection-img">
                                        </a>
                                        <div class="collection-content">
                                            <a href="<?= BASE_URL . '?act=category&id_cate=7' ?>" class="tf-btn collection-title hover-icon fs-15"><span>Mèo Cảnh</span><i class="icon icon-arrow1-top-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" lazy="true">
                                <div class="collection-item style-left hover-img">
                                    <div class="collection-inner">
                                        <a href="<?= BASE_URL . '?act=category&id_cate=8' ?>" class="collection-image img-style">
                                            <img class="lazyload" src="./assets/assets_font/images/cates/dog.jpg" alt="collection-img">
                                        </a>
                                        <div class="collection-content">
                                            <a href="<?= BASE_URL . '?act=category&id_cate=8' ?>" class="tf-btn collection-title hover-icon fs-15"><span>Chó Cảnh</span><i class="icon icon-arrow1-top-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" lazy="true">
                                <div class="collection-item style-left hover-img">
                                    <div class="collection-inner">
                                        <a href="<?= BASE_URL . '?act=category&id_cate=9' ?>" class="collection-image img-style">
                                            <img class="lazyload" data-src="./assets/assets_font/images/cates/mouse.jpg" src="./assets/assets_font/images/cates/mouse.jpg" alt="collection-demo-1">
                                        </a>
                                        <div class="collection-content">
                                            <a href="<?= BASE_URL . '?act=category&id_cate=9' ?>" class="tf-btn collection-title hover-icon fs-15"><span>Chuột Hamster</span><i class="icon icon-arrow1-top-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" lazy="true">
                                <div class="collection-item style-left hover-img">
                                    <div class="collection-inner">
                                        <a href="<?= BASE_URL . '?act=category&id_cate=10' ?>" class="collection-image img-style">
                                            <img class="lazyload" data-src="./assets/assets_font/images/cates/soc.webp" src="./assets/assets_font/images/cates/soc.webp" alt="collection-demo-1">
                                        </a>
                                        <div class="collection-content">
                                            <a href="<?= BASE_URL . '?act=category&id_cate=10' ?>" class="tf-btn collection-title hover-icon fs-15"><span>Sóc Bay Úc</span><i class="icon icon-arrow1-top-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" lazy="true">
                                <div class="collection-item style-left hover-img">
                                    <div class="collection-inner">
                                        <a href="<?= BASE_URL . '?act=category&id_cate=11' ?>" class="collection-image img-style">
                                            <img class="lazyload" data-src="./assets/assets_font/images/cates/habit.jpg" src="./assets/assets_font/images/cates/habit.jpg" alt="collection-demo-1">
                                        </a>
                                        <div class="collection-content">
                                            <a href="<?= BASE_URL . '?act=category&id_cate=11' ?>" class="tf-btn collection-title hover-icon fs-15"><span>Thỏ cảnh</span><i class="icon icon-arrow1-top-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Sản Phẩm Nổi Bật  -->
    <section class="flat-spacing-5 pt_0 flat-seller">
        <div class="container">
            <div class="flat-title">
                <span class="title wow fadeInUp" data-wow-delay="0s">Sản Phẩm Nổi Bật</span>
                <p class="sub-title wow fadeInUp" data-wow-delay="0s">Shop the Latest Styles: Stay ahead of the curve with our newest arrivals</p>
            </div>
            <div class="grid-layout  wow fadeInUp" data-wow-delay="0s" data-grid="grid-4">
                <?php foreach ($top5Pets as $top5Pet) { ?>
                    <div class="card-product fl-item">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="<?= BASE_URL . $top5Pet['hinh_anh'] ?>" src="<?= BASE_URL . $top5Pet['hinh_anh'] ?>" alt="image-product">
                                <img class="lazyload img-hover" data-src="<?= BASE_URL . $top5Pet['hinh_anh'] ?>" src="<?= BASE_URL . $top5Pet['hinh_anh'] ?>" alt="image-product">
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
                            <a href="product-detail.html" class="title link"><?= $top5Pet['ten_san_pham'] ?></a>
                            <span class="price"><?= number_format($top5Pet['gia_khuyen_mai'] ?? $top5Pet['gia_san_pham']) ?>vnđ</span>
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