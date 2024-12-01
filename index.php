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
require_once './controllers/homeController.php';
require_once './controllers/bannerController.php';
require_once './controllers/danhMucSanPhamController.php';
require_once './controllers/order/checkoutController.php';

require_once './controllers/ProductController.php';

// Require toàn bộ file Models
require_once './models/auth/registerModel.php';
require_once './models/homeModel.php';
require_once './models/bannerModel.php';
require_once './models/danhMucSanPhamModel.php';
require_once './models/order/checkoutModel.php';

require_once './models/Product.php';
require_once './models/Comment.php';



// Route
$act = $_GET['act'] ?? '/';

// mọi yêu cầu POST có thể được xử lý ngay lập tức khi handleRequest() được gọi.
$controller =  new registerController();
$controller->handleRequest();
match ($act) {

    
    '/' => (new homeController()) -> home(),
    'category' => (new danhMucSanPhamController()) -> productByCategorys(),
    'banners' => (new bannerController())->banners(),

    'registers' => (new registerController()) -> registers(),
    'comfirm_registers' => (new registerController()) -> comfirm_registers(),
    'logins' => (new registerController()) -> logins(),
    'logout' => (new registerController())->logout(),

    // thanh toán
    'checkout' => (new checkoutController()) ->checkout(),
    // chi tiết sản phẩm
    'product' => (new ProductController())->productShow(),

    

};