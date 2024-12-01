<?php
session_start();
ob_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/khuyenMaiController.php';
require_once './controllers/ProductController.php'; // Sản phẩm
require_once './controllers/CategoryController.php'; // Danh mục
require_once './controllers/UserController.php';  // Tài khoản
require_once './controllers/CommentController.php';  // Bình luận
require_once './controllers/OrderController.php'; // Đơn hàng
require_once './controllers/ProfileController.php';  // profile
require_once './controllers/RatingController.php';  // Đánh giá
require_once './controllers/bannerController.php';
require_once './controllers/tinController.php';
require_once './controllers/lhController.php';

// Require toàn bộ file Models
require_once './models/homeModel.php';
require_once './models/khuyenMaiModel.php';
require_once './models/Category.php';
require_once './models/Comment.php';
require_once './models/Order.php';
require_once './models/Product.php';
require_once './models/Rating.php';
require_once './models/User.php';
require_once './models/bannerModel.php';
require_once './models/tinModel.php';
require_once './models/lhModel.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/'                     => (new HomeController())           ->home(),

    // Danh sách khuyến mãi
    'list_vouchers'         => (new khuyenMaiController())      ->list_vouchers(),
    // Thêm mới khuyến mãi
    'insert_vouchers'       => (new khuyenMaiController())      ->insert_vouchers(),
    // Cập nhập khuyến mãi
    'update_Vouchers'       => (new khuyenMaiController())      ->update_Vouchers(),
    'update_Voucher_case_1' => (new khuyenMaiController())      ->update_Voucher_case_1(),
    'update_Voucher_case_2' => (new khuyenMaiController())      ->update_Voucher_case_2(),
    // Ẩn khuyến mãi
    'hidden_Vouchers'       => (new khuyenMaiController())      ->hidden_Vouchers(),

    // route product
    'products'              => (new ProductController())        ->productIndex(),
    'add-product'           => (new ProductController())        ->productCreate(),
    'form-update-product'   => (new ProductController())        ->productFormUpdate(),
    'update-product'        => (new ProductController())        ->productUpdate(),
    'update-album-product'  => (new ProductController())        ->productAlbumUpdate(),
    'show-product'          => (new ProductController())        ->productShow(),
    'delete-product'        => (new ProductController())        ->productDelete(),
    // route biến thể product
    // 'variant-product'    => (new VariantProductController()) -> variantProductIndex(),
    // route category
    'categorys'             => (new CategoryController())       ->categoryIndex(),
    'add-category'          => (new CategoryController())       ->categoryCreate(),
    'update-category'       => (new CategoryController())       ->categoryUpdate(),
    'delete-category'       => (new CategoryController())       ->categoryDelete(),
    // route orders
    'orders'                => (new OrderController())          ->orderIndex(),
    'update-order'          => (new OrderController())          ->orderUpdate(),
    // route user
    'users'                 => (new UserController())           ->userIndex(),
    'update-user'           => (new UserController())           ->userUpdate(),
    'show-user'             => (new UserController())           ->userShow(),
    'delete-user'           => (new UserController())           ->userDelete(),
    // route reset password tài khoản
    'reset-password'        => (new UserController())           ->resetPassword(),
    // show profile admin
    'show-profile'          => (new ProfileController())        ->profileShow(),
    'form-update-profile'   => (new ProfileController())        ->profileFormUpdate(),
    'update-profile'        => (new ProfileController())        ->profileUpdate(),
    'update-password-profile' => (new ProfileController())      ->passwordProfileUpdate(),
    // Bình luận
    'comments'              => (new CommentController())        ->commentIndex(),
    'update-comment'        => (new CommentController())        ->commentUpdate(),
    // Đánh giá
    'ratings'               => (new RatingController())         ->manageRatings(),
    'update-visibility'     => (new RatingController())         ->updateVisibility(),
    //Lien he
    'quan_ly_lh'            => (new controllerLh())             ->get_lh_ctl(),
    'add_lh'                => (new controllerLh())             ->t_add_lh(),
    'create_lh'             => (new controllerLh())             ->add_lh_ctl(),
    'update_lh'             => (new controllerLh())             ->t_update_lh(),
    'update_db_lh'          => (new controllerLh())             ->update_lh_ctl(),
    'delete_lh'             => (new controllerLh())             ->delete_lh_ctl(),
    'td_tt_lh'              => (new controllerLh())             ->td_tt_lh_ctl(),
    //Banner
    'quan_ly_banner'        => (new controllerBanner())         ->get_banner_ctl(),
    'add_banner'            => (new controllerBanner())         ->t_add_banner(),
    'create_banner'         => (new controllerBanner())         ->add_banner_ctl(),
    'update_banner'         => (new controllerBanner())         ->t_update_banner(),
    'update_db_banner'      => (new controllerBanner())         ->update_banner_ctl(),
    'delete_banner'         => (new controllerBanner())         ->delete_banner_ctl(),
    'td_tt_banner'          => (new controllerBanner())         ->td_tt_banner_ctl(),
    //tin
    'quan_ly_tin'           => (new controllerTin())            ->get_tin_tuc(),
    'add_tin'               => (new controllerTin())            ->add_tin(),
    'create'                => (new controllerTin())            ->add_tin_tuc(),
    'update'                => (new controllerTin())            ->t_update(),
    'update_db'             => (new controllerTin())            ->update(),
    'delete'                => (new controllerTin())            ->delete_sp(),
    'td_tt'                 => (new controllerTin())            ->thay_doi_tt(),
};
