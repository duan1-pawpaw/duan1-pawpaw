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
                    <div dir="ltr" class="swiper tf-sw-collection" data-preview="4" data-tablet="3" data-mobile="3" data-space-lg="30" data-space-md="30" data-space="15" data-loop="false" data-auto-play="true">
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
                <p class="sub-title wow fadeInUp" data-wow-delay="0s">Top 4 Thú Cưng Nổi Bật Nhất Tháng 12</p>
            </div>
            <div class="grid-layout  wow fadeInUp" data-wow-delay="0s" data-grid="grid-4">
                <?php foreach ($top5Pets as $top5Pet) { ?>
                    <div class="card-product fl-item">
                        <div class="card-product-wrapper">
                            <a href="<?= BASE_URL . '?act=checkout&id_san_pham=23' ?>" class="product-img">
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
        </div>
    </section>

    <!-- dánh sách sản phẩm -->
    <section class="flat-spacing-5 pt_0 flat-seller">
        <div class="container">
            <div class="flat-title">
                <span class="title wow fadeInUp" data-wow-delay="0s">Danh Sách Sản Phẩm</span>
                <p class="sub-title wow fadeInUp" data-wow-delay="0s"></p>
            </div>
            <div class="grid-layout  wow fadeInUp" data-wow-delay="0s" data-grid="grid-4">
                <?php foreach ($listProducts as $listProduct) { ?>
                    <div class="card-product fl-item">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="<?= BASE_URL . $listProduct['hinh_anh'] ?>" src="<?= BASE_URL . $listProduct['hinh_anh'] ?>" alt="image-product">
                                <img class="lazyload img-hover" data-src="<?= BASE_URL . $listProduct['hinh_anh'] ?>" src="<?= BASE_URL . $listProduct['hinh_anh'] ?>" alt="image-product">
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
                            <a href="product-detail.html" class="title link"><?= $listProduct['ten_san_pham'] ?></a>
                            <span class="price"><?= number_format($listProduct['gia_khuyen_mai'] ?? $listProduct['gia_san_pham']) ?>vnđ</span>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="tf-pagination-wrap view-more-button text-center">
                <button class="tf-btn-loading tf-loading-default style-2 btn-loadmore "><span class="text">Xem Thêm</span></button>
            </div>
        </div>
    </section>


    <!-- đánh Giá -->
    <section class="flat-spacing-5 pt_0 flat-testimonial">
        <div class="container">
            <div class="flat-title wow fadeInUp" data-wow-delay="0s">
                <span class="title">Đánh Giá Khách Hàng</span>
                <p class="sub-title">Khách Hàng Nói Gì Về Thú Cưng Của Chúng Tôi</p>
            </div>
            <div class="wrap-carousel">
                <div dir="ltr" class="swiper tf-sw-testimonial" data-preview="3" data-tablet="2" data-mobile="1" data-space-lg="30" data-space-md="15">
                    <div class="swiper-wrapper">
                        <?php foreach ($top4DanhGias as $top4DanhGia) { ?>
                            <div class="swiper-slide ">
                                <div class="testimonial-item style-column wow fadeInUp" data-wow-delay="0s">
                                    <div class="mb-2 ms-1">
                                        <?php
                                        for ($i = 1; $i <= 5; $i++) {
                                            if ($i <= $top4DanhGia['danh_gia_sao']) { ?>
                                                <span style="color: gold;"><i class="fas fa-star"></i></span>
                                            <?php } else { ?>
                                                <span style="color: gray;"><i class="fas fa-star"></i></span>
                                        <?php }
                                        } ?>
                                    </div>
                                    <div class="text">
                                        “<?= $top4DanhGia['binh_luan'] ?>”
                                    </div>
                                    <div class="author">
                                        <div class="name"><?= $top4DanhGia['ho_ten'] ?></div>
                                    </div>
                                    <div class="product">
                                        <div class="image">
                                            <a href="product-detail.html">
                                                <img class="lazyload" data-src="<?= BASE_URL . $top4DanhGia['hinh_anh'] ?>" src="<?= BASE_URL . $top4DanhGia['hinh_anh'] ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="content-wrap">
                                            <div class="product-title">
                                                <a href="product-detail.html"><?= $top4DanhGia['ten_san_pham'] ?></a>
                                            </div>
                                            <div class="price"><?= number_format($top4DanhGia['gia_khuyen_mai'] ?? $top4DanhGia['gia_san_pham']) ?></div>
                                        </div>
                                        <a href="product-detail.html" class=""><i class="icon-arrow1-top-left"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="nav-sw nav-next-slider nav-next-testimonial lg"><span class="icon icon-arrow-left"></span></div>
                <div class="nav-sw nav-prev-slider nav-prev-testimonial lg"><span class="icon icon-arrow-right"></span></div>
                <div class="sw-dots style-2 sw-pagination-testimonial justify-content-center"></div>
            </div>
        </div>
    </section>

    <!-- tin tức -->
    <section class="mb_30">
            <div class="container">
                <div class="flat-title">
                    <h5 class="">Bài Viết hay</h5>
                </div>
                <div class="hover-sw-nav view-default hover-sw-5">
                    <div dir="ltr" class="swiper tf-sw-recent" data-preview="3" data-tablet="2" data-mobile="1" data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-pagination-md="1" data-pagination-lg="1">
                        <div class="swiper-wrapper">
                            <?php  foreach($listNews as $listNew){ ?>
                            <div class="swiper-slide" lazy="true">
                                <div class="blog-article-item">
                                    <div class="article-thumb radius-10">
                                        <a href="blog-detail.html">
                                            <img class="lazyload" style="width: 430px; height: 240px;" data-src="<?= $listNew['url_hinh'] ?>" src="<?= $listNew['url_hinh'] ?>" alt="img-blog">
                                        </a>
                                    </div>
                                    <div class="article-content">
                                        <div class="article-title">
                                            <a href="blog-detail.html" class=""><?= substr($listNew['tieu_de'],0,50) . '...' ?></a>
                                        </div>
                                        <div class="article-btn">
                                            <a href="blog-detail.html" class="tf-btn btn-line fw-6">Đọc Tiếp<i class="icon icon-arrow1-top-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="nav-sw nav-next-slider nav-next-recent box-icon w_46 round"><span class="icon icon-arrow-left"></span></div>
                    <div class="nav-sw nav-prev-slider nav-prev-recent box-icon w_46 round"><span class="icon icon-arrow-right"></span></div>
                    <div class="sw-dots d-flex style-2 sw-pagination-recent justify-content-center"></div>
                </div>
            </div>
        </section>
    <?php require_once './views/layout/footer.php' ?>
</body>

</html>