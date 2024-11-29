<?php 
session_start();

// Require PHP mailer
require_once './commons/phpmailer/Exception.php';
require_once './commons/phpmailer/PHPMailer.php';
require_once './commons/phpmailer/SMTP.php';

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/auth/registerController.php';
require_once './controllers/auth/productlistController.php';
require_once './controllers/auth/product_descriptionController.php';
require_once './controllers/auth/searchController.php';
require_once './controllers/auth/wishlistController.php';
require_once './controllers/homeController.php';
require_once './controllers/bannerController.php';

// Require toàn bộ file Models
require_once './models/auth/registerModel.php';
require_once './models/auth/productlistModel.php';
require_once './models/auth/product_descriptionModel.php';
require_once './models/auth/searchModel.php';
require_once './models/auth/wishlistModel.php';
require_once './models/homeModel.php';
require_once './models/bannerModel.php';

// Route
$act = $_GET['act'] ?? '/';

$product_id = $_GET['product_id'] ?? $_GET['id'] ?? null; // Đảm bảo biến $product_id được xác định

// mọi yêu cầu POST có thể được xử lý ngay lập tức khi handleRequest() được gọi.
$controller = new registerController();
$controller->handleRequest();
match ($act) {
    '/' => (new homeController())->home(),
    'banners' => (new bannerController())->banners(),

    'wishlist' => (new wishlistController())->index(),
    'productlist' => (new ProductController())->index(),
    'addtowishlist' => (new wishlistController())->add($product_id),
    'removefromwishlist' => (new wishlistController())->remove($product_id),
    'product_description' => (new Product_Description_Controller())->index($product_id),
    'addcomment' => (new Product_Description_Controller())->addComment(), 
    'search' => (new SearchController())->search(), 
    

    'registers' => (new registerController())->registers(),
    'comfirm_registers' => (new registerController())->comfirm_registers(),
    'logins' => (new registerController())->logins(),
    'logout' => (new registerController())->logout(),
    default => throw new UnhandledMatchError(),
};
?>


