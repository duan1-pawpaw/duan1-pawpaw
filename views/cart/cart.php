<?php require_once './views/layout/header.php' ?>
<?php require_once './views/layout/menu.php' ?>
<!-- page-title -->
<div class="tf-page-title" style="margin-top: 100px;">
    <div class="container-full">
        <div class="heading text-center">Shopping Cart</div>
    </div>
</div>
<!-- /page-title -->

<!-- page-cart -->
<section class="flat-spacing-11">
    <div class="container">
        <form action="<?= BASE_URL . '?act=Fromcheckout' ?>" method="POST">
        <div class="tf-page-cart-wrap ">
                <div class="tf-page-cart-item">
                    <table class="tf-table-page-cart">
                        <thead>
                            <tr>
                                <th class="pro-thumbnail">Ảnh sản phẩm</th>
                                <th class="pro-title">Tên sản phẩm</th>
                                <th class="pro-price">Giá tiền</th>
                                <th class="pro-quantity">Số lượng</th>
                                <th class="pro-subtotal">Tổng tiền</th>
                                <th class="pro-remove">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tongGioHang = 0;
                            foreach ($chiTietGioHang as $key => $sanPham) :
                            ?>
                            <input type="hidden" name="san_pham[<?= $key ?>][san_pham_id]" value="<?= $sanPham['san_pham_id'] ?>">
                            <input type="hidden" name="san_pham[<?= $key ?>][so_luong]" value="<?= $sanPham['so_luong'] ?>">
                                <tr class="tf-cart-item file-delete">
                                    <td class="tf-cart-item_product">
                                        <a href="<?= BASE_URL . '?act=show-product&id=' . $sanPham['san_pham_id'] ?>" class="img-box">
                                            <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="img-product">
                                        </a>

                                    </td>
                                    <td class="tf-cart-item">
                                        <div class="cart-info">
                                            <a href="<?= BASE_URL . '?act=show-product&id=' . $sanPham['san_pham_id'] ?>" class="cart-title link"><?= $sanPham['ten_san_pham'] ?></a>
                                            <div class="cart-meta-variant">Giới tính: <?= $sanPham['gioi_tinh'] = 1 ? 'Đực' : 'Cái' ?></div>
                                        </div>
                                    </td>
                                    <td class="tf-cart-item_price">
                                        <div class="cart-price">
                                            <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                                <input type="hidden" class="don_gia" value="<?= $sanPham['gia_khuyen_mai'] ?>">
                                                <span><?= formatPrice($sanPham['gia_khuyen_mai']) . 'VND'; ?></span>
                                            <?php } else { ?>
                                                <input type="hidden" class="don_gia" value="<?= $sanPham['gia_san_pham'] ?>">
                                                <span><?= formatPrice($sanPham['gia_san_pham']) . 'VND'; ?></span>
                                            <?php } ?>
                                        </div>
                                    </td>
                                    <td class="tf-cart-item_quantity" cart-data-title="Quantity">
                                        <div class="cart-quantity">
                                            <div class="wg-quantity">
                                                <span class="btn-quantity minus-btn">
                                                    <button type="text" class="decrease" style="width: 20px; border: 0;">-</button>
                                                </span>
                                                <input type="text" class="quantity" name="so_luong" value="<?= $sanPham['so_luong'] ?>" >
                                                <span class="btn-quantity plus-btn">
                                                    <button type="text" class="increase" style="width: 20px; border: 0;">+</button>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="tf-cart-item_total" cart-data-title="Total">
                                        <div class="cart-total">
                                            <?php
                                            $tongTien = 0;
                                            if ($sanPham['gia_khuyen_mai']) {
                                                $tongTien = $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'];
                                            } else {
                                                $tongTien = $sanPham['gia_san_pham'] * $sanPham['so_luong'];
                                            }
                                            $tongGioHang += $tongTien;

                                            ?>
                                            <span id="totalPrice"><?= number_format($tongTien) ?>Đ</span>
                                        </div>
                                    </td>
                                    <td class="tf-cart-item">
                                        <a href="<?= BASE_URL . '?act=cartDeletes&id_cart=' . $sanPham['id'] ?>"><i style="border: 0;" class="fa-regular fa-trash-can"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="tf-page-cart-footer">
                    <div class="tf-cart-footer-inner mt-3">
                        <div class="tf-page-cart-checkout">
                            <div class="shipping-calculator">
                                <summary class="accordion-shipping-header d-flex justify-content-between align-items-center collapsed" data-bs-target="#shipping" data-bs-toggle="collapse" aria-controls="shipping">
                                    <h2 class="shipping-calculator-title">Tổng:</h2>
                                </summary>
                            </div>

                            <div class="tf-cart-totals-discounts">
                                <h3>Tạm Tính: </h3>
                                <span class="total-value"><?= number_format($tongGioHang) ?>đ</span>
                            </div>
                            <div class="tf-cart-totals-discounts">
                                <h3>Tiền Vận Chuyển: </h3>
                                <span class="total-value" data-dongia="30000">30.000đ</span>
                            </div>
                            <div class="tf-cart-totals-discounts">
                                <h3>Thành Tiền:</h3>
                                <input type="hidden" name="tong_gio_hang" value="<?= $tongGioHang + 30000 ?>">
                                <span class="total-value"><?= number_format($tongGioHang + 30000) ?>đ</span>
                            </div>
                            <div class=" mt-5">
                                <button class="tf-btn w-100 btn-fill animate-hover-btn radius-3 justify-content-center">
                                    Check out
                                </button>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- page-cart -->

<!-- Testimonial -->
<!-- <section class="flat-spacing-17 pt_0 flat-testimonial">
    <div class="container">
        <div class="flat-title">
            <span class="title">Đánh giá</span>
        </div>
        <div class="wrap-carousel">
            <div dir="ltr" class="swiper tf-sw-testimonial" data-preview="3" data-tablet="2" data-mobile="1" data-space-lg="30" data-space-md="15">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimonial-item style-column">
                            <div class="rating">
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                            </div>
                            <div class="heading">Best Online Fashion Site</div>
                            <div class="text">
                                “ I always find something stylish and affordable on this web fashion site ”
                            </div>
                            <div class="author">
                                <div class="name">Robert smith</div>
                                <div class="metas">Customer from USA</div>
                            </div>
                            <div class="product">
                                <div class="image">
                                    <a href="<?= BASE_URL . '?act=show-product&id=' . $sanPham['san_pham_id'] ?>">
                                        <img class="lazyload" data-src="images/shop/products/img-p2.png" src="images/shop/products/img-p2.png" alt="">
                                    </a>
                                </div>
                                <div class="content-wrap">
                                    <div class="product-title">
                                        <a href="product-detail.html">Jersey thong body</a>
                                    </div>
                                    <div class="price">$105.95</div>
                                </div>
                                <a href="product-detail.html" class=""><i class="icon-arrow1-top-left"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav-sw nav-next-slider nav-next-testimonial lg"><span class="icon icon-arrow-left"></span></div>
            <div class="nav-sw nav-prev-slider nav-prev-testimonial lg"><span class="icon icon-arrow-right"></span></div>
            <div class="sw-dots style-2 sw-pagination-testimonial justify-content-center"></div>
        </div>
    </div>
</section> -->
<!-- /Testimonial -->

<!-- product -->
<!-- <section class="flat-spacing-17 pt_0">
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
                                        <span class="price-regular"><?= formatPrice($productFromCategory['gia_khuyen_mai']) . 'VND'; ?></span>
                                        <span class="price-old"><del><?= formatPrice($productFromCategory['gia_san_pham']) . 'VND'; ?></del></span>
                                    <?php } else { ?>
                                        <span class="price-regular"><?= formatPrice($productFromCategory['gia_san_pham']) . 'VND' ?></span>
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
</section> -->
<!-- /product -->
<?php require_once './views/layout/footer.php' ?>
<script>

</script>