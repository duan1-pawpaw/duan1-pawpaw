<?php 

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/lhController.php';

// Require toàn bộ file Models
require_once './models/homeModel.php';
require_once './models/lhModel.php';


// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/' => (new HomeController()) -> home(),
    'quan_ly_lh' => (new controllerCou()) -> get_lh_ctl(),
    'add_lh' => (new controllerCou()) -> t_add_lh(),
    'create_lh' => (new controllerCou()) -> add_lh_ctl(),
    'update_lh' => (new controllerCou()) -> t_update_lh(),
    'update_db_lh' => (new controllerCou()) -> update_lh_ctl(),
    'delete_lh' => (new controllerCou()) -> delete_lh_ctl(),
    'td_tt_lh' => (new controllerCou()) -> td_tt_lh_ctl(),
};