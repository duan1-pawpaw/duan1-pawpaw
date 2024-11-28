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
//Bai Viet(tin)
require_once './controllers/baiVietController.php';
//Contact
require_once './controllers/contactController.php';


// Require toàn bộ file Models
require_once './models/auth/registerModel.php';
require_once './models/homeModel.php';
require_once './models/bannerModel.php';
require_once './models/danhMucSanPhamModel.php';
//Bai Viet(tin)
require_once './models/baiVietModel.php';
//Contact
require_once './models/contactModel.php';




// Route
$act = $_GET['act'] ?? '/';

// mọi yêu cầu POST có thể được xử lý ngay lập tức khi handleRequest() được gọi.
$controller =  new registerController();
$controller->handleRequest();
match ($act) {

    
    '/' => (new homeController()) -> home(),
    'banners' => (new bannerController())->banners(),

    'registers' => (new registerController()) -> registers(),
    'comfirm_registers' => (new registerController()) -> comfirm_registers(),
    'logins' => (new registerController()) -> logins(),
    'logout' => (new registerController())->logout(),

    'category' => (new danhMucSanPhamController()) -> productByCategorys(),
    'bai_viet' => (new baiVietController()) -> homeBaiViet(),
    'ct_tin' => (new baiVietController()) -> ct_tin(),

    'contact' => (new contactController()) -> homeContact(),
    'add_contact' => (new contactController()) -> add_contact_ctl(),


    

};