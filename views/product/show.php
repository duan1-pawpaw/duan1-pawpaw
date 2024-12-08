<?php require_once './views/layout/header.php' ?>
<?php require_once './views/layout/menu.php' ?>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<style>
    /* Bố cục tổng thể */
    .thumbs-slider {
        display: flex;
        gap: 20px;
        margin: 0 auto;
        max-width: 1200px;
        align-items: center;
    }

    /* Ảnh nhỏ (Thumbnail) - Dọc */
    #gallery-thumbs {
        display: flex;
        flex-direction: column;
        gap: 10px;
        max-height: 500px;
        /* Giới hạn chiều cao */
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: #ddd #f0f0f0;
    }

    /* Thanh cuộn tuỳ chỉnh */
    #gallery-thumbs::-webkit-scrollbar {
        width: 8px;
    }

    #gallery-thumbs::-webkit-scrollbar-thumb {
        background-color: #ddd;
        border-radius: 4px;
    }

    #gallery-thumbs::-webkit-scrollbar-track {
        background-color: #f0f0f0;
    }

    /* Ảnh nhỏ (Thumbnail) */
    #gallery-thumbs .swiper-slide {
        width: 100px;
        /* Kích thước thumbnail */
        height: 80px;
        border: 2px solid transparent;
        border-radius: 4px;
        transition: transform 0.3s, border 0.3s;
        cursor: pointer;
    }

    #gallery-thumbs .swiper-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 4px;
    }

    #gallery-thumbs .swiper-slide:hover {
        transform: scale(1.1);
        border-color: #007bff;
    }

    #gallery-thumbs .swiper-slide-thumb-active {
        border-color: #007bff;
        transform: scale(1.2);
    }

    /* Ảnh chính */
    #gallery-main {
        flex: 1;
        max-width: 700px;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    #gallery-main .swiper-slide img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }
</style>
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
                            <!-- Danh sách ảnh nhỏ (Thumbnail) -->
                            <div class="swiper tf-product-media-thumbs other-image-zoom" id="gallery-thumbs">
                                <div class="swiper-wrapper">
                                    <?php foreach ($albumProduct as $key => $imgPrduct): ?>
                                        <div class="swiper-slide">
                                            <img
                                                src="<?= BASE_URL . $imgPrduct['link_hinh_anh']; ?>"
                                                alt="Thumbnail <?= $key; ?>">
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <!-- Ảnh chính -->
                            <div class="swiper tf-product-media-main" id="gallery-main">
                                <div class="swiper-wrapper">
                                    <?php foreach ($albumProduct as $key => $imgPrduct): ?>
                                        <div class="swiper-slide">
                                            <a href="<?= BASE_URL . $imgPrduct['link_hinh_anh']; ?>" target="_blank">
                                                <img
                                                    src="<?= BASE_URL . $imgPrduct['link_hinh_anh']; ?>"
                                                    alt="Main Image <?= $key; ?>">
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
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
                                        <input type="number" class="quantity-product" name="so_luong" value="1" min="1" required>
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
<!-- <section class="flat-spacing-17 pt_0">
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
                                                    <img src="<?= isset($comment['anh_dai_dien']) ? $comment['anh_dai_dien'] : 'https://static.vecteezy.com/system/resources/previews/000/439/863/original/vector-users-icon.jpg' ?>" alt="">
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
</section> -->
<section class="flat-spacing-17 pt_0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="widget-tabs style-has-border">
                    <ul class="widget-menu-tab">
                        <li class="item-title active">
                            <a href="#comments" data-toggle="tab"><span class="inner">Bình Luận</span></a>
                        </li>
                        <li class="item-title">
                            <a href="#ratings" data-toggle="tab"><span class="inner">Đánh Giá</span></a>
                        </li>
                    </ul>
                    <div class="widget-content-tab">
                        <div class="widget-content-inner active">
                            <!-- Hiển thị các bình luận -->
                            <div class="widget-content-tab">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="comments">
                                        <!-- Hiển thị các bình luận -->
                                        <div class="reply-comment cancel-review-wrap">
                                            <div class="reply-comment-wrap">
                                                <?php foreach ($comments as $comment): ?>
                                                    <div class="reply-comment-item">
                                                        <div class="user">
                                                            <div class="image">
                                                            <img src="<?= !empty($rating['anh_dai_dien']) ? htmlspecialchars($rating['anh_dai_dien']) : 'https://tse4.mm.bing.net/th?id=OIP.-Zanaodp4hv0ry2WpuuPfgHaEf&pid=Api&P=0&h=220'; ?>" alt="">
                                                            </div>
                                                            <div>
                                                                <p><?= htmlspecialchars($comment['ho_ten']); ?></p>
                                                                <div class="day text_black-3"><?= htmlspecialchars($comment['ngay_dang']); ?></div>
                                                            </div>
                                                        </div>
                                                        <p class="text_black-3"><?= htmlspecialchars($comment['noi_dung']); ?></p>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <br>
                                        <!-- Form viết bình luận -->
                                        <?php if (isset($_SESSION['user']['id'])): ?>
                                            <form action="?act=addcomment" method="POST" class="form-write-review write-review-wrap">
                                                <div class="form-content">
                                                    <fieldset class="box-field">
                                                        <label class="label">Viết Bình Luận</label>
                                                        <textarea name="noi_dung" rows="4" placeholder="<?= 'Bình Luận Dưới tên ' . htmlspecialchars($_SESSION['user']['ho_ten']) ?>" tabindex="2" aria-required="true" required=""></textarea>
                                                        <input type="hidden" name="san_pham_id" value="<?= htmlspecialchars($product['id']); ?>">
                                                    </fieldset>
                                                </div>
                                                <div class="button-submit">
                                                    <button class="tf-btn btn-fill animate-hover-btn" type="submit">Gửi bình luận</button>
                                                </div>
                                            </form>
                                        <?php else: ?>
                                            <p>Vui lòng <a href="?act=registers" style="color: blue;">đăng nhập</a> để bình luận.</p>
                                        <?php endif; ?>
                                    </div>

                                    <div class="tab-pane" id="ratings">
                                        <!-- Hiển thị các đánh giá (nếu có) -->
                                        <?php if (!empty($ratings)): ?>
                                            <div class="reply-comment cancel-review-wrap">
                                                <div class="reply-comment-wrap">
                                                    <?php foreach ($ratings as $rating): ?>
                                                        <div class="reply-comment-item">
                                                            <div class="user">
                                                                <div class="image">
                                                                    <img src="<?= !empty($rating['anh_dai_dien']) ? htmlspecialchars($rating['anh_dai_dien']) : 'https://tse4.mm.bing.net/th?id=OIP.-Zanaodp4hv0ry2WpuuPfgHaEf&pid=Api&P=0&h=220'; ?>" alt="">
                                                                </div>
                                                                <div>
                                                                    <p><?= htmlspecialchars($rating['ho_ten']); ?>
                                                                        <span class="rating-stars">
                                                                            <?php for ($i = 0; $i < $rating['danh_gia_sao']; $i++): ?>
                                                                                <span><i style="color: yellow;" class="fa-solid fa-star"></i></span>
                                                                            <?php endfor; ?>
                                                                            <?php for ($i = $rating['danh_gia_sao']; $i < 5; $i++): ?>
                                                                                <span ><i class="fa-solid fa-star"></i></span>
                                                                            <?php endfor; ?>
                                                                        </span>
                                                                    </p>
                                                                    <div class="day text_black-3"><?= htmlspecialchars($rating['thoi_gian_danh_gia']); ?></div>
                                                                </div>
                                                            </div>
                                                            <p class="text_black-3"><?= htmlspecialchars($rating['binh_luan']); ?></p>
                                                            <br>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <p>Sản Phẩm Này Chưa Có Đánh Giá.</p>
                                        <?php endif ?>

                                        <!-- Form viết đánh giá -->
                                        <?php if (isset($_SESSION['user']['id']) && $hasPurchased): ?>
                                            <form action="<?= BASE_URL . '?act=addRating&id=' . $product['id'] ?>"  method="POST" class="form-write-review write-review-wrap">
                                                <div class="form-content">
                                                    <fieldset class="box-field">
                                                        <label class="label">Viết Đánh Giá</label>
                                                        <textarea name="binh_luan" rows="4" placeholder="<?= 'Đánh Giá Dưới tên ' . htmlspecialchars($_SESSION['user']['ho_ten']) ?>" tabindex="2" aria-required="true" required=""></textarea>
                                                        <input type="hidden" name="san_pham_id" value="<?= htmlspecialchars($product['id']); ?>">
                                                    </fieldset>
                                                </div>
                                                <div class="heading">
                                                    <h6>Đánh Giá Của Bạn</h6>
                                                    <div class="list-rating-check">
                                                        <input type="radio" id="star5" name="danh_gia_sao" value="5">
                                                        <label for="star5" title="5 sao"></label>
                                                        <input type="radio" id="star4" name="danh_gia_sao" value="4">
                                                        <label for="star4" title="4 sao"></label>
                                                        <input type="radio" id="star3" name="danh_gia_sao" value="3">
                                                        <label for="star3" title="3 sao"></label>
                                                        <input type="radio" id="star2" name="danh_gia_sao" value="2">
                                                        <label for="star2" title="2 sao"></label>
                                                        <input type="radio" id="star1" name="danh_gia_sao" value="1">
                                                        <label for="star1" title="1 sao"></label>
                                                    </div>
                                                </div>
                                                <div class="button-submit">
                                                    <button class="tf-btn btn-fill animate-hover-btn" type="submit">Gửi đánh giá</button>
                                                </div>
                                            </form>
                                        <?php elseif (isset($_SESSION['user']['id'])): ?>
                                            <p>Bạn cần mua sản phẩm này để có thể đánh giá.</p>
                                        <?php else: ?>
                                            <p>Vui lòng <a href="?act=registers" style="color: blue;">đăng nhập</a> để đánh giá.</p>
                                        <?php endif; ?>
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

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    const galleryThumbs = new Swiper('#gallery-thumbs', {
        direction: 'vertical', // Hiển thị ảnh con theo chiều dọc
        spaceBetween: 10,
        slidesPerView: 4, // Số ảnh con hiển thị cùng lúc
        freeMode: true,
        watchSlidesProgress: true,
    });

    const galleryMain = new Swiper('#gallery-main', {
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        thumbs: {
            swiper: galleryThumbs,
        },
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tabLinks = document.querySelectorAll('.widget-menu-tab a');
        var tabContent = document.querySelectorAll('.tab-pane');

        tabLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                var targetId = this.getAttribute('href').substring(1);

                tabLinks.forEach(function(link) {
                    link.parentElement.classList.remove('active');
                });
                tabContent.forEach(function(content) {
                    content.classList.remove('active');
                });

                this.parentElement.classList.add('active');
                document.getElementById(targetId).classList.add('active');
            });
        });
    });
</script>