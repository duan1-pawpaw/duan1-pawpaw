<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
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
                <div class="heading text-center">Danh sách sản phẩm</div>
            </div>
        </div>

        <section class="flat-spacing-1">
            <div class="container">
                <div class="tf-shop-control grid-3 align-items-center">
                    <div class="tf-control-filter">
                        <!-- <a href="#filterShop" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="tf-btn-filter"><span class="icon icon-filter"></span><span class="text">Filter</span></a> -->
                    </div>

                </div>
                <div class="tf-row-flex">
                    <aside class="tf-shop-sidebar wrap-sidebar-mobile">
                    <div class="widget-facet wd-categories">
                        <div class="widget-facet wd-categories">
                            <div class="facet-title" data-bs-target="#categories" data-bs-toggle="collapse" aria-expanded="true" aria-controls="categories">
                                <span>Danh Mục Thú Cưng</span>
                                <span class="icon icon-arrow-up"></span>
                            </div>
                            <div id="categories" class="collapse show">
                                <ul class="list-categoris current-scrollbar mb_36">
                                    <?php foreach($listCategorys as $listCategory){ ?>
                                    <li class="cate-item current"><a href="<?= BASE_URL . '?act=category&id_cate=' . $listCategory['id'] ?>"><span><?= $listCategory['ten_danh_muc'] ?></span>&nbsp;<span></span></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>

                        </div>
                        <div class="widget-facet">
                            <div class="facet-title" data-bs-target="#sale-products" data-bs-toggle="collapse" aria-expanded="true" aria-controls="sale-products">
                                <span>Sale products</span>
                                <span class="icon icon-arrow-up"></span>
                            </div>
                            <div id="sale-products" class="collapse show">
                                <div class="widget-featured-products mb_36">
                                    <?php foreach($listProductSales as $listProductSale){ ?>
                                    <div class="featured-product-item">
                                        <a href="<?= BASE_URL . '?act=show-product&id=' . $listProductSale['id_san_pham'] ?>" class="card-product-wrapper">
                                            <img class="img-product ls-is-cached lazyloaded" data-src="<?= BASE_URL . $listProductSale['hinh_anh'] ?>" alt="image-feature" src="<?= BASE_URL . $listProductSale['hinh_anh'] ?>">
                                        </a>
                                        <div class="card-product-info">
                                            <a href="<?= BASE_URL . '?act=show-product&id=' . $listProductSale['id_san_pham'] ?>" class="title link"><?= $listProductSale['ten_san_pham'] ?></a>
                                            <span class="price"><?= number_format($listProductSale['gia_san_pham'] * $listProductSale['gia_tri'] / 100) ?></span>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <div class="tf-shop-content">
                        <div class="grid-layout wrapper-shop" data-grid="grid-3">
                            <?php foreach ($products as $product): ?>
                                <div class="card-product">
                                    <div class="card-product-wrapper">
                                        <a href="<?= BASE_URL . '?act=show-product&id=' . $product['id'] ?>" class="product-img"> 
                                            <img class="img-product" src="<?php echo $product['hinh_anh']; ?>" alt="<?php echo $product['ten_san_pham']; ?>"> 
                                            <img class="img-hover" src="<?php echo $product['hinh_anh']; ?>" alt="<?php echo $product['ten_san_pham']; ?>"> 
                                        </a>
                                        <div class="list-product-btn absolute-2">
                                            <a href="<?= BASE_URL . '?act=create-cart&san_pham_id=' . $product['id'] ?>" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Thêm Vào Giỏ Hàng</span>
                                            </a>
                                            <a href="<?= BASE_URL . '?act=addtowishlist&product_id=' . $product['id'] ?>" class="box-icon bg_white wishlist btn-icon-action"> 
                                                <span class="icon icon-heart"></span> 
                                                <span class="tooltip">Thêm Vào Danh Sách Yêu Thích</span> 
                                                <span class="icon icon-delete"></span> 
                                            </a>
                                            <a href="<?= BASE_URL . '?act=show-product&id=' . $product['id'] ?>" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Xem CHi Tiết</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.php?id=<?php echo $product['id']; ?>" class="title link"><?php echo $product['ten_san_pham']; ?></a>
                                        <span class="price"><?php echo number_format($product['gia_san_pham'], 2); ?> VND</span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <!-- pagination -->
                        <ul class="tf-pagination-wrap tf-pagination-list">
                            <li class="active">
                                <a href="#" class="pagination-link">1</a>
                            </li>
                            <li>
                                <a href="#" class="pagination-link animate-hover-btn">2</a>
                            </li>
                            <li>
                                <a href="#" class="pagination-link animate-hover-btn">3</a>
                            </li>
                            <li>
                                <a href="#" class="pagination-link animate-hover-btn">4</a>
                            </li>
                            <li>
                                <a href="#" class="pagination-link animate-hover-btn">
                                    <span class="icon icon-arrow-right"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </section>
</body>
    <?php require_once './views/layout/footer.php' ?>
</html>
