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
                                        Giới tính: <span class="fw-6 variant-picker-label-value value-currentColor"><?= $product['gioi_tinh'] == 1 ? 'Đực' : 'Cái'; ?></span>
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
                                    <input type="text" class="quantity-product" name="number" value="1">
                                    <span class="btn-quantity btn-increase">+</span>
                                </div>
                            </div>
                            <div class="tf-product-info-buy-button">
                                <form class="">
                                    <a href="javascript:void(0);" class="tf-btn btn-fill justify-content-center fw-6 fs-16 flex-grow-1 animate-hover-btn btn-add-to-cart">
                                        <span>Thêm vào giỏ hàng</span>
                                        <span class="tf-qty-price total-price">
                                            <?php if ($product['gia_khuyen_mai']) { ?>
                                                <?= formatPrice($product['gia_khuyen_mai']) . 'VND'; ?>
                                            <?php } else { ?>
                                                <?= formatPrice($product['gia_san_pham']) . 'VND'; ?>
                                            <?php } ?>
                                        </span></a>
                                    <a href="javascript:void(0);" class="tf-product-btn-wishlist hover-tooltip box-icon bg_white wishlist btn-icon-action">
                                        <span class="icon icon-heart"></span>
                                        <span class="tooltip">Add to Wishlist</span>
                                        <span class="icon icon-delete"></span>
                                    </a>
                                    <div class="w-100">
                                        <a href="#" class="btns-full">Mau ngay <img src="images/payments/paypal.png" alt=""></a>
                                        <a href="#" class="payment-more-option">More payment options</a>
                                    </div>
                                </form>
                            </div>
                            <div class="tf-product-info-extra-link">
                                <a href="#" data-bs-toggle="modal" class="tf-product-extra-icon">
                                    <div class="icon">
                                        <i class="icon-question"></i>
                                    </div>
                                    <div class="text fw-6">Ask a question</div>
                                </a>
                                <a href="#" data-bs-toggle="modal" class="tf-product-extra-icon">
                                    <div class="icon">
                                        <svg class="d-inline-block" xmlns="http://www.w3.org/2000/svg" width="22" height="18" viewBox="0 0 22 18" fill="currentColor">
                                            <path d="M21.7872 10.4724C21.7872 9.73685 21.5432 9.00864 21.1002 8.4217L18.7221 5.27043C18.2421 4.63481 17.4804 4.25532 16.684 4.25532H14.9787V2.54885C14.9787 1.14111 13.8334 0 12.4255 0H9.95745V1.69779H12.4255C12.8948 1.69779 13.2766 2.07962 13.2766 2.54885V14.5957H8.15145C7.80021 13.6052 6.85421 12.8936 5.74468 12.8936C4.63515 12.8936 3.68915 13.6052 3.33792 14.5957H2.55319C2.08396 14.5957 1.70213 14.2139 1.70213 13.7447V2.54885C1.70213 2.07962 2.08396 1.69779 2.55319 1.69779H9.95745V0H2.55319C1.14528 0 0 1.14111 0 2.54885V13.7447C0 15.1526 1.14528 16.2979 2.55319 16.2979H3.33792C3.68915 17.2884 4.63515 18 5.74468 18C6.85421 18 7.80021 17.2884 8.15145 16.2979H13.423C13.7742 17.2884 14.7202 18 15.8297 18C16.9393 18 17.8853 17.2884 18.2365 16.2979H21.7872V10.4724ZM16.684 5.95745C16.9494 5.95745 17.2034 6.08396 17.3634 6.29574L19.5166 9.14894H14.9787V5.95745H16.684ZM5.74468 16.2979C5.27545 16.2979 4.89362 15.916 4.89362 15.4468C4.89362 14.9776 5.27545 14.5957 5.74468 14.5957C6.21392 14.5957 6.59575 14.9776 6.59575 15.4468C6.59575 15.916 6.21392 16.2979 5.74468 16.2979ZM15.8298 16.2979C15.3606 16.2979 14.9787 15.916 14.9787 15.4468C14.9787 14.9776 15.3606 14.5957 15.8298 14.5957C16.299 14.5957 16.6809 14.9776 16.6809 15.4468C16.6809 15.916 16.299 16.2979 15.8298 16.2979ZM18.2366 14.5957C17.8853 13.6052 16.9393 12.8936 15.8298 12.8936C15.5398 12.8935 15.252 12.943 14.9787 13.04V10.8511H20.0851V14.5957H18.2366Z"></path>
                                        </svg>
                                    </div>
                                    <div class="text fw-6">Delivery & Return</div>
                                </a>
                                <a href="#" data-bs-toggle="modal" class="tf-product-extra-icon">
                                    <div class="icon">
                                        <i class="icon-share"></i>
                                    </div>
                                    <div class="text fw-6">Share</div>
                                </a>
                            </div>
                        </div>
                    </div>
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
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Quick Add</span>
                                        </a>
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
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