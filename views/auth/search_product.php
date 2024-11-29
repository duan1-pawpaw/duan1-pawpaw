<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm Kiếm Sản Phẩm</title>
</head>
<?php require_once './views/layout/header.php' ?>
<?php require_once './views/layout/menu.php' ?>
<body>
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
            <div class="heading text-center">
                <div>
                    <form action="?act=search" method="POST">
                        <input type="text" name="search" style="border-color: black; width: 50%; height: 45px;" placeholder="Mèo Anh Lông Dài">
                        <button type="submit" class="tf-btn btn-outline-dark fw-6 btn-comment-review btn-write-review">Tìm Kiếm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <section class="flat-spacing-2">
        <div class="container">
            <div class="wrapper-control-shop">
                <div class="meta-filter-shop"></div>
                <div class="grid-layout wrapper-shop" data-grid="grid-4">
                    <?php if (isset($searchs) && !empty($searchs)): ?>
                        <?php foreach ($searchs as $product): ?>
                            <div class="card-product" data-price="<?= $product['gia_san_pham']; ?>">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.php?id=<?= $product['id']; ?>" class="product-img">
                                        <img class="img-product" src="<?= $product['hinh_anh']; ?>" alt="<?= $product['ten_san_pham']; ?>">
                                        <img class="img-hover" src="<?= $product['hinh_anh']; ?>" alt="<?= $product['ten_san_pham']; ?>">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Quick Add</span>
                                        </a>
                                        <a href="?act=addtowishlist&product_id=<?php echo $product['id']; ?>" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
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
                                    <a href="product-detail.php?id=<?= $product['id']; ?>" class="title link"><?= $product['ten_san_pham']; ?></a>
                                    <span class="price"><?= number_format($product['gia_san_pham'], 2); ?> VND</span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Không tìm thấy sản phẩm nào.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</body>
<?php require_once './views/layout/footer.php' ?>
</html>
