<?php 

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/AdminController.php';


// Require toàn bộ file Models
require_once './models/homeModel.php';
require_once './models/AdminModel.php';

// =======

// Require toàn bộ file Models
require_once './models/homeModel.php';



// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/' => (new HomeController()) -> home(),

    'rating' => (new RatingController())->manageRatings(),
    'binh_luan' => (new CommnetCotroller())->manageComment(),
    // 'delete-rating' => (new RatingController())->deleteRatings(),

    'update-visibility' => (new RatingController())->updateVisibility(),
    'update-Binhluan' => (new CommnetCotroller())->updateBinhluan(),


};