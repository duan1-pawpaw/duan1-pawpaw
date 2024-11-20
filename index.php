<?php 

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
// Require file ControllersLienhe
require_once './controllers/lhController.php';
// Require file ControllersBaner
require_once './controllers/bannerController.php';
// Require file ControllersTin
require_once './controllers/tinController.php';

// Require toàn bộ file Models
require_once './models/homeModel.php';
// Require file ModelsLienhe
require_once './models/lhModel.php';
// Require file ModelsBanner
require_once './models/bannerModel.php';
// Require file ModelsTin
require_once './models/tinModel.php';


// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/' => (new HomeController()) -> home(),
    //Lien he
    'quan_ly_lh' => (new controllerLh()) -> get_lh_ctl(),
    'add_lh' => (new controllerLh()) -> t_add_lh(),
    'create_lh' => (new controllerLh()) -> add_lh_ctl(),
    'update_lh' => (new controllerLh()) -> t_update_lh(),
    'update_db_lh' => (new controllerLh()) -> update_lh_ctl(),
    'delete_lh' => (new controllerLh()) -> delete_lh_ctl(),
    'td_tt_lh' => (new controllerLh()) -> td_tt_lh_ctl(),
    //Banner
    'quan_ly_banner' => (new controllerBanner()) -> get_banner_ctl(),
    'add_banner' => (new controllerBanner()) -> t_add_banner(),
    'create_banner' => (new controllerBanner()) -> add_banner_ctl(),
    'update_banner' => (new controllerBanner()) -> t_update_banner(),
    'update_db_banner' => (new controllerBanner()) -> update_banner_ctl(),
    'delete_banner' => (new controllerBanner()) -> delete_banner_ctl(),
    'td_tt_banner' => (new controllerBanner()) -> td_tt_banner_ctl(),
    //tin
    'quan_ly_tin' => (new controllerTin()) -> get_tin_tuc(),
    'add_tin' => (new controllerTin()) -> add_tin(),
    'create' => (new controllerTin()) -> add_tin_tuc(),
    'update' => (new controllerTin()) -> t_update(),
    'update_db' => (new controllerTin()) -> update(),
    'delete' => (new controllerTin()) -> delete_sp(),
    'td_tt' => (new controllerTin()) -> thay_doi_tt(),
};