<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản Phẩm Yêu Thích</title>
</head>
<body>
    <?php require_once './views/layout/header.php'; ?>
    <?php require_once './views/layout/menu.php'; ?>
    <div id="header" class="header-default">
            <div class="px_15 lg-px_40">
                <div class="row wrapper-header align-items-center">
                    <div class="col-md-4 col-3 tf-lg-hidden">
                        <a href="#mobileMenu" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="tf-page-title">
            <div class="container-full">
                <div class="heading text-center">Sản Phẩm Yêu Thích</div>
            </div>
        </div>
        </section><section class="flat-spacing-2">
        <div class="container">
            <div class="grid-layout wrapper-shop" data-grid="grid-4">
                <?php if (!empty($wishlists)): ?>
                    <?php foreach ($wishlists as $product): ?>
                        <div class="card-product">
                            <div class="card-product-wrapper">
                                <a href="?act=product_description&id=<?php echo $product['id']; ?>" class="product-img">
                                    <img class="img-product" src="<?php echo $product['hinh_anh']; ?>" alt="<?php echo $product['ten_san_pham']; ?>">
                                    <img class="img-hover" src="<?php echo $product['hinh_anh']; ?>" alt="<?php echo $product['ten_san_pham']; ?>">
                                </a>
                                <div class="list-product-btn type-wishlist">
                                <a href="?act=removefromwishlist&id=<?php echo $product['id']; ?>" class="box-icon bg_white wishlist">
                                    <span class="tooltip">Remove Wishlist</span>
                                    <span class="icon icon-delete"></span>
                                </a>
                            </div>
                                <div class="list-product-btn">
                                <a href="#quick_add" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Quick Add</span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                    <span class="icon icon-compare"></span>
                                    <span class="tooltip">Add to Compare</span>
                                    <span class="icon icon-check"></span>
                                </a>
                                <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                    <span class="icon icon-view"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                            </div>
                            <div class="card-product-info">
                                <a href="product-detail.php?id=<?php echo $product['id']; ?>" class="title link"><?php echo $product['ten_san_pham']; ?></a>
                                <span class="price"><?php echo number_format($product['gia_san_pham'], 2); ?> VND</span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Không có sản phẩm yêu thích nào.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php require_once './views/layout/footer.php'; ?>
    </script>
</body>
</html>
