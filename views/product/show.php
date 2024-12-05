<?php require_once './views/layout/header.php' ?>
<?php require_once './views/layout/menu.php' ?>
<div id="header" class="header-default">
    <div class="px_15 lg-px_40">
        <div class="row wrapper-header align-items-center">
            <div class="col-md-4 col-3 tf-lg-hidden">
                <a href="#mobileMenu" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"></a>
            </div>
        </div>
    </div>
</div>
<div class="tf-breadcrumb">
    <div class="container">
        <div class="tf-breadcrumb-wrap d-flex justify-content-between flex-wrap align-items-center">
            <div class="tf-breadcrumb-list">
                <a href="index.php" class="text">Trang Chủ</a>
                <i class="icon icon-arrow-right"></i>
                <a href="#" class="text">Danh Mục</a>
                <i class="icon icon-arrow-right"></i>
                <span class="text"><?= $product['ten_san_pham']; ?></span>
            </div>
        </div>
    </div>
</div>
<!-- default -->
<section class="flat-spacing-4 pt_0">
    <div class="tf-main-product section-image-zoom">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="tf-product-media-wrap sticky-top">
                        <div class="thumbs-slider">
                            <div dir="ltr" class="swiper tf-product-media-thumbs other-image-zoom" data-direction="vertical">
                                <div class="swiper-wrapper stagger-wrap">
                                    <div class="swiper-slide stagger-item stagger-finished" data-color="beige" style="transition-delay: 0.2s;">
                                        <div class="item">
                                            <?php foreach ($albumProduct as $key => $imgPrduct): ?>
                                                <img class="ls-is-cached lazyloaded" data-src="<?= BASE_URL . $imgPrduct['link_hinh_anh']; ?>" src="<?= BASE_URL . $imgPrduct['link_hinh_anh']; ?>" alt="img-product">
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr" class="swiper tf-product-media-main" id="gallery-swiper-started">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide" data-color="beige">
                                        <a href="<?= BASE_URL . $product['hinh_anh']; ?>" target="_blank" class="item" data-pswp-width="770px" data-pswp-height="1075px">
                                            <img class="tf-image-zoom ls-is-cached lazyloaded" data-zoom="<?= BASE_URL . $product['hinh_anh']; ?>" data-src="<?= BASE_URL . $product['hinh_anh']; ?>" src="<?= BASE_URL . $product['hinh_anh']; ?>" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <form action="<?= BASE_URL . '?act=create-cart' ?>" method="POST">
                        <!-- Lưu ID sản phẩm và Số lượng sản phẩm -->
                        <input type="hidden" name="san_pham_id" value="<?= $product['id'] ?>">

                        <div class="tf-product-info-wrap position-relative">
                            <div class="tf-zoom-main"></div>
                            <div class="tf-product-info-list other-image-zoom">
                                <div class="tf-product-info-title">
                                    <h5><?= $product['ten_san_pham'] ?></h5>
                                </div>
                                <div class="tf-product-info-badges">
                                    <div class="badges"><?= $product['ten_danh_muc'] ?></div>
                                </div>
                                <div class="tf-product-info-price">
                                    <?php if ($product['gia_khuyen_mai']) { ?>
                                        <div class="price-on-sale"><?= formatPrice($product['gia_khuyen_mai']) . 'VND'; ?></div>
                                        <div class="compare-at-price"><?= formatPrice($product['gia_san_pham']) . 'VND'; ?></div>
                                    <?php } else { ?>
                                        <div class="price-on-sale"><?= formatPrice($product['gia_san_pham']) . 'VND'; ?></div>
                                    <?php } ?>
                                    <div class="badges-on-sale"><span>20</span>% OFF</div>
                                </div>
                                <div class="availability">
                                    <i class="fa fa-check-circle"></i>
                                    <span><?= $product['so_luong'] . ' trong kho' ?></span>
                                </div>
                                <div class="tf-product-info-variant-picker">
                                    <div class="variant-picker-item">
                                        <div class="variant-picker-label">
                                            Giới tính: <span class="fw-6 variant-picker-label-value"><?= $product['gioi_tinh'] == 1 ? 'Đực' : 'Cái'; ?></span>
                                        </div>
                                    </div>
                                    <div class="variant-picker-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="variant-picker-label">
                                                Độ tuổi: <span class="fw-6 variant-picker-label-value"><?= $product['do_tuoi'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="variant-picker-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="variant-picker-label">
                                                <span class="fw-6 variant-picker-label-value"><?= $product['mo_ta'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-product-info-quantity">
                                    <div class="quantity-title fw-6">Số lượng</div>
                                    <div class="wg-quantity">
                                        <span class="btn-quantity btn-decrease">-</span>
                                        <input type="number" class="quantity-product" name="so_luong" value="1" min="1"  required>
                                        <span class="btn-quantity btn-increase">+</span>
                                    </div>
                                </div>
                                <div class="tf-product-info-buy-button d-flex">
                                    <button type="submit" class="col-9 tf-btn btn-fill justify-content-center fw-6 fs-16 flex-grow-1 animate-hover-btn btn-add-to-cart">
                                        <span>Thêm vào giỏ hàng</span>
                                    </button>
                                    <a href="<?= BASE_URL . '?act=addtowishlist&san_pham_id=' . $product['id'] ?>" class="col-3 tf-product-btn-wishlist hover-tooltip box-icon bg_white wishlist btn-icon-action">
                                        <span class="icon icon-heart"></span>
                                        <span class="tooltip">Add to Wishlist</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- /default -->
<!-- Hiển thị bình luận -->
<section class="flat-spacing-17 pt_0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="widget-tabs style-has-border">
                    <ul class="widget-menu-tab">
                        <li class="item-title active">
                            <span class="inner">Bình Luận</span>
                        </li>
                    </ul>
                    <div class="widget-content-tab">
                        <div class="widget-content-inner active">
                            <div class="reply-comment cancel-review-wrap">
                                <div class="reply-comment-wrap">
                                    <?php foreach ($comments as $comment): ?>
                                        <div class="reply-comment-item">
                                            <div class="user">
                                                <div class="image">
                                                    <img src="<?= $comment['anh_dai_dien']; ?>" alt="">
                                                </div>
                                                <div>
                                                    <p><?= $comment['ho_ten']; ?></p>
                                                    <div class="day text_black-3"><?= $comment['ngay_dang']; ?></div>
                                                </div>
                                            </div>
                                            <p class="text_black-3"><?= $comment['noi_dung']; ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <br>
                            <form action="?act=addcomment" method="POST" class="form-write-review write-review-wrap">
                                <div class="form-content">
                                    <fieldset class="box-field">
                                        <label class="label">Viết Bình Luận</label>
                                        <textarea name="noi_dung" rows="4" placeholder="Viết Bình Luận Của Bạn Tại Đây" tabindex="2" aria-required="true" required=""></textarea>
                                        <input type="hidden" name="san_pham_id" value="<?= $product['id']; ?>">
                                    </fieldset>
                                </div>
                                <div class="button-submit">
                                    <button class="tf-btn btn-fill animate-hover-btn" type="submit">Bình Luận</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product -->
<section class="flat-spacing-1 pt_0">
    <div class="container">
        <div class="flat-title">
            <span class="title">Sản phẩm liên quan</span>
        </div>
        <div class="hover-sw-nav hover-sw-2">
            <div dir="ltr" class="swiper tf-sw-product-sell wrap-sw-over" data-preview="4" data-tablet="3" data-mobile="2" data-space-lg="30" data-space-md="15" data-pagination="2" data-pagination-md="3" data-pagination-lg="3">
                <div class="swiper-wrapper">
                    <?php foreach ($category as $key => $productFromCategory): ?>
                        <div class="swiper-slide" lazy="true">
                            <div class="card-product">
                                <div class="card-product-wrapper">
                                    <?php
                                    // var_dump($productFromCategory['hinh_anh']);die;
                                    ?>
                                    <a href="<?= BASE_URL . '?act=show-product&id=' . $productFromCategory['id'] ?>" class="product-img">
                                        <img class="lazyload img-product" data-src="<?= BASE_URL . $productFromCategory['hinh_anh'] ?>" src="<?= BASE_URL . $productFromCategory['hinh_anh'] ?>" alt="image-product">
                                        <img class="lazyload img-hover" data-src="<?= BASE_URL . $productFromCategory['hinh_anh'] ?>" src="<?= BASE_URL . $productFromCategory['hinh_anh'] ?>" alt="image-product">
                                    </a>
                                    <div class="product-badge">
                                        <?php
                                        $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                        $ngayHienTai = new DateTime();
                                        $tinhNgay = $ngayHienTai->diff($ngayNhap);

                                        if ($tinhNgay->days <= 7) {
                                        ?>
                                            <div class="product-label new">
                                                <span>Mới</span>
                                            </div>
                                        <?php
                                        }
                                        if ($sanPham['gia_khuyen_mai']) {
                                        ?>
                                            <div class="product-label discount">
                                                <span>Giảm giá</span>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <div class="list-product-btn">
                                        <a href="<?= BASE_URL . 'create-cart&san_pham_id=' . $productFromCategory['id'] ?>" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Thêm Vào Giỏ Hàng</span>
                                        </a>
                                        <a href="<?= BASE_URL . '?act=addtowishlist' . $productFromCategory['id'] ?>" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Thêm Sản Phẩm Yêu Thích</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="<?= BASE_URL . '?act=show-product&id=' . $productFromCategory['id'] ?>" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Xem chi tiết</span>
                                        </a>
                                    </div>
                                    <div class="size-list">
                                        <div class="variant-picker-label">
                                            Độ tuổi: <?= $product['do_tuoi'] ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $productFromCategory['id'] ?>" class="title link"><?= $productFromCategory['ten_san_pham'] ?></a>
                                    <?php if ($productFromCategory['gia_khuyen_mai']) { ?>
                                        <span class="price-regular"><?= formatPrice($productFromCategory['gia_khuyen_mai']) . 'đ'; ?></span>
                                        <span class="price-old"><del><?= formatPrice($productFromCategory['gia_san_pham']) . 'đ'; ?></del></span>
                                    <?php } else { ?>
                                        <span class="price-regular"><?= formatPrice($productFromCategory['gia_san_pham']) . 'đ' ?></span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="nav-sw nav-next-slider nav-next-product box-icon w_46 round"><span class="icon icon-arrow-left"></span></div>
            <div class="nav-sw nav-prev-slider nav-prev-product box-icon w_46 round"><span class="icon icon-arrow-right"></span></div>
            <div class="sw-dots style-2 sw-pagination-product justify-content-center"></div>
        </div>
    </div>
</section>
<!-- /product -->
<?php require_once './views/layout/footer.php' ?>