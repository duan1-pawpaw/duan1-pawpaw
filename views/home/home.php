<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php require_once './views/layout/header.php' ?>
    <?php require_once './views/layout/nav.php' ?>
    <?php require_once './views/layout/banner.php' ?>
    <!-- Content -->
    <section id="categories">
        <div class="container my-3 py-5">
            <div class="row my-5">
                <div class="col text-center">
                    <a href="#" class="categories-item">
                        <iconify-icon class="category-icon" icon="ph:bowl-food"></iconify-icon>
                        <h5>Foodies</h5>
                    </a>
                </div>
                <div class="col text-center">
                    <a href="#" class="categories-item">
                        <iconify-icon class="category-icon" icon="ph:bird"></iconify-icon>
                        <h5>Bird Shop</h5>
                    </a>
                </div>
                <div class="col text-center">
                    <a href="#" class="categories-item">
                        <iconify-icon class="category-icon" icon="ph:dog"></iconify-icon>
                        <h5>Dog Shop</h5>
                    </a>
                </div>
                <div class="col text-center">
                    <a href="#" class="categories-item">
                        <iconify-icon class="category-icon" icon="ph:fish"></iconify-icon>
                        <h5>Fish Shop</h5>
                    </a>
                </div>
                <div class="col text-center">
                    <a href="#" class="categories-item">
                        <iconify-icon class="category-icon" icon="ph:cat"></iconify-icon>
                        <h5>Cat Shop</h5>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--  -->
    <section id="clothing" class="my-5 overflow-hidden">
        <div class="container pb-5">

            <div class="section-header d-md-flex justify-content-between align-items-center mb-3">
                <h2 class="display-3 fw-normal">Pet Clothing</h2>
                <div>
                    <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                        shop now
                        <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                            <use xlink:href="#arrow-right"></use>
                        </svg></a>
                </div>
            </div>

            <div class="products-carousel swiper">
                <div class="swiper-wrapper">

                    <?php foreach ($listPets as $listPet) { ?>
                    <div class="swiper-slide">
                            <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
                                New
                            </div>
                            <div class="card position-relative">
                                <a href="single-product.html"><img src="<?= $listPet['hinh_anh'] ?>" class="img-fluid rounded-4" alt="<?= $listPet['ten_san_pham'] ?>"></a>
                                <div class="card-body p-0">
                                    <a href="single-product.html">
                                        <h3 class="card-title pt-4 m-0"><?= $listPet['ten_san_pham'] ?></h3>
                                    </a>

                                    <div class="card-text">
                                        <span class="rating secondary-font">
                                            <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                            <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                            <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                            <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                            <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                            5.0</span>

                                        <h3 class="secondary-font text-primary"><?= number_format($listPet['gia_san_pham']) ?></h3>

                                        <div class="d-flex flex-wrap mt-3">
                                            <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                                                <h5 class="text-uppercase m-0">Add to Cart</h5>
                                            </a>
                                            <a href="#" class="btn-wishlist px-4 pt-3 ">
                                                <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                            </a>
                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php } ?>

                </div>
            </div>
            <!-- / products-carousel -->


        </div>
    </section>
    <!-- food -->
    <section id="foodies" class="my-5">
        <div class="container my-5 py-5">

            <div class="section-header d-md-flex justify-content-between align-items-center">
                <h2 class="display-3 fw-normal">Pet Foodies</h2>
                <div class="mb-4 mb-md-0">
                    <p class="m-0">
                        <button class="filter-button me-4  active" data-filter="*">ALL</button>
                        <button class="filter-button me-4 " data-filter=".cat">CAT</button>
                        <button class="filter-button me-4 " data-filter=".dog">DOG</button>
                        <button class="filter-button me-4 " data-filter=".bird">BIRD</button>
                    </p>
                </div>
                <div>
                    <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                        shop now
                        <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                            <use xlink:href="#arrow-right"></use>
                        </svg></a>
                </div>
            </div>

            <div class="isotope-container row">

                <div class="item cat col-md-4 col-lg-3 my-4">
                    <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
            New
          </div> -->
                    <div class="card position-relative">
                        <a href="single-product.html"><img src="images/item9.jpg" class="img-fluid rounded-4" alt="image"></a>
                        <div class="card-body p-0">
                            <a href="single-product.html">
                                <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                            </a>

                            <div class="card-text">
                                <span class="rating secondary-font">
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    5.0</span>

                                <h3 class="secondary-font text-primary">$18.00</h3>

                                <div class="d-flex flex-wrap mt-3">
                                    <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                                        <h5 class="text-uppercase m-0">Add to Cart</h5>
                                    </a>
                                    <a href="#" class="btn-wishlist px-4 pt-3 ">
                                        <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                    </a>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>

                <div class="item dog col-md-4 col-lg-3 my-4">
                    <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
                        New
                    </div>
                    <div class="card position-relative">
                        <a href="single-product.html"><img src="images/item10.jpg" class="img-fluid rounded-4" alt="image"></a>
                        <div class="card-body p-0">
                            <a href="single-product.html">
                                <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                            </a>

                            <div class="card-text">
                                <span class="rating secondary-font">
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    5.0</span>

                                <h3 class="secondary-font text-primary">$18.00</h3>

                                <div class="d-flex flex-wrap mt-3">
                                    <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                                        <h5 class="text-uppercase m-0">Add to Cart</h5>
                                    </a>
                                    <a href="#" class="btn-wishlist px-4 pt-3 ">
                                        <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                    </a>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>

                <div class="item dog col-md-4 col-lg-3 my-4">
                    <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
            New
          </div> -->
                    <div class="card position-relative">
                        <a href="single-product.html"><img src="images/item11.jpg" class="img-fluid rounded-4" alt="image"></a>
                        <div class="card-body p-0">
                            <a href="single-product.html">
                                <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                            </a>

                            <div class="card-text">
                                <span class="rating secondary-font">
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    5.0</span>

                                <h3 class="secondary-font text-primary">$18.00</h3>

                                <div class="d-flex flex-wrap mt-3">
                                    <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                                        <h5 class="text-uppercase m-0">Add to Cart</h5>
                                    </a>
                                    <a href="#" class="btn-wishlist px-4 pt-3 ">
                                        <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                    </a>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>

                <div class="item cat col-md-4 col-lg-3 my-4">
                    <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
                        Sold
                    </div>
                    <div class="card position-relative">
                        <a href="single-product.html"><img src="images/item12.jpg" class="img-fluid rounded-4" alt="image"></a>
                        <div class="card-body p-0">
                            <a href="single-product.html">
                                <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                            </a>

                            <div class="card-text">
                                <span class="rating secondary-font">
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    5.0</span>

                                <h3 class="secondary-font text-primary">$18.00</h3>

                                <div class="d-flex flex-wrap mt-3">
                                    <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                                        <h5 class="text-uppercase m-0">Add to Cart</h5>
                                    </a>
                                    <a href="#" class="btn-wishlist px-4 pt-3 ">
                                        <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                    </a>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>

                <div class="item bird col-md-4 col-lg-3 my-4">
                    <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
            New
          </div> -->
                    <div class="card position-relative">
                        <a href="single-product.html"><img src="images/item13.jpg" class="img-fluid rounded-4" alt="image"></a>
                        <div class="card-body p-0">
                            <a href="single-product.html">
                                <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                            </a>

                            <div class="card-text">
                                <span class="rating secondary-font">
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    5.0</span>

                                <h3 class="secondary-font text-primary">$18.00</h3>

                                <div class="d-flex flex-wrap mt-3">
                                    <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                                        <h5 class="text-uppercase m-0">Add to Cart</h5>
                                    </a>
                                    <a href="#" class="btn-wishlist px-4 pt-3 ">
                                        <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                    </a>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>

                <div class="item bird col-md-4 col-lg-3 my-4">
                    <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
            New
          </div> -->
                    <div class="card position-relative">
                        <a href="single-product.html"><img src="images/item14.jpg" class="img-fluid rounded-4" alt="image"></a>
                        <div class="card-body p-0">
                            <a href="single-product.html">
                                <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                            </a>

                            <div class="card-text">
                                <span class="rating secondary-font">
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    5.0</span>

                                <h3 class="secondary-font text-primary">$18.00</h3>

                                <div class="d-flex flex-wrap mt-3">
                                    <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                                        <h5 class="text-uppercase m-0">Add to Cart</h5>
                                    </a>
                                    <a href="#" class="btn-wishlist px-4 pt-3 ">
                                        <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                    </a>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>

                <div class="item dog col-md-4 col-lg-3 my-4">
                    <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
                        Sale
                    </div>
                    <div class="card position-relative">
                        <a href="single-product.html"><img src="images/item15.jpg" class="img-fluid rounded-4" alt="image"></a>
                        <div class="card-body p-0">
                            <a href="single-product.html">
                                <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                            </a>

                            <div class="card-text">
                                <span class="rating secondary-font">
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    5.0</span>

                                <h3 class="secondary-font text-primary">$18.00</h3>

                                <div class="d-flex flex-wrap mt-3">
                                    <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                                        <h5 class="text-uppercase m-0">Add to Cart</h5>
                                    </a>
                                    <a href="#" class="btn-wishlist px-4 pt-3 ">
                                        <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                    </a>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>

                <div class="item cat col-md-4 col-lg-3 my-4">
                    <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
            New
          </div> -->
                    <div class="card position-relative">
                        <a href="single-product.html"><img src="images/item16.jpg" class="img-fluid rounded-4" alt="image"></a>
                        <div class="card-body p-0">
                            <a href="single-product.html">
                                <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                            </a>

                            <div class="card-text">
                                <span class="rating secondary-font">
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    5.0</span>

                                <h3 class="secondary-font text-primary">$18.00</h3>

                                <div class="d-flex flex-wrap mt-3">
                                    <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                                        <h5 class="text-uppercase m-0">Add to Cart</h5>
                                    </a>
                                    <a href="#" class="btn-wishlist px-4 pt-3 ">
                                        <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                    </a>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>


            </div>


        </div>
    </section>
    <!-- footer -->
    <section id="register" style="background: url('images/background-img.png') no-repeat;">
        <div class="container ">
            <div class="row my-5 py-5">
                <div class="offset-md-3 col-md-6 my-5 ">
                    <h2 class="display-3 fw-normal text-center">Get 20% Off on <span class="text-primary">first Purchase</span>
                    </h2>
                    <form>
                        <div class="mb-3">
                            <input type="email" class="form-control form-control-lg" name="email" id="email"
                                placeholder="Enter Your Email Address">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control form-control-lg" name="email" id="password1"
                                placeholder="Create Password">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control form-control-lg" name="email" id="password2"
                                placeholder="Repeat Password">
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-dark btn-lg rounded-1">Register it now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php require_once './views/layout/footer.php' ?>
</body>

</html>