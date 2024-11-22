<?php
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/khuyenMaiController.php';
require_once './controllers/donHangController.php';
require_once './controllers/danhMucController.php'; // Danh mục
require_once './controllers/sanPhamController.php';
require_once './controllers/taiKhoanController.php';

// Require toàn bộ file Models
require_once './models/homeModel.php';
require_once './models/khuyenMaiModel.php';
require_once './models/donHangModel.php';
require_once './models/danhMucModel.php';
require_once './models/sanPhamModel.php';
require_once './models/binhLuanModel.php';
require_once './models/taiKhoanModel.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/' => (new HomeController())->home(),

    // Danh sách khuyến mãi
    'list_vouchers' => (new khuyenMaiController())->list_vouchers(),
    // Thêm mới khuyến mãi
    'insert_vouchers' => (new khuyenMaiController())->insert_vouchers(),
    // Cập nhập khuyến mãi
    'update_Vouchers' => (new khuyenMaiController())->update_Vouchers(),
    'update_Voucher_case_1' => (new khuyenMaiController())->update_Voucher_case_1(),
    'update_Voucher_case_2' => (new khuyenMaiController())->update_Voucher_case_2(),
    // Ẩn khuyến mãi
    'hidden_Vouchers' => (new khuyenMaiController())->hidden_Vouchers(),

    // insert đơn hàng
    'list_order' => (new orderController())->list_order(),
    'update_order' => (new orderController())->update_order(),
    //danh mục
    'categorys' => (new CategoryController())->categoryIndex(),
    'add-category' => (new CategoryController())->categoryCreate(),
    'update-category' => (new CategoryController())->categoryUpdate(),
    'delete-category' => (new CategoryController())->categoryDelete(),
    //sản phẩm
    'products' => (new ProductController())->productIndex(),
    'add-product' => (new ProductController())->productCreate(),
    'update-product' => (new ProductController())->productUpdate(),
    'show-product' => (new ProductController())->productShow(),
    'delete-product' => (new ProductController())->productDelete(),
    // route bình luận
    'updateComment' => (new ProductController())->updateComment(),
    // route tài khoản khách hàng
    'users-khachHang' => (new UserController())->userIndex(),
    'update-user-khachHang' => (new UserController())->userUpdate(),
    'show-user-khachHang' => (new UserController())->userShow(),
    'delete-user-khachHang' => (new UserController())->userDelete(),
    // route tài khoản quản trị
    'users-admin' => (new UserController()) -> profileShow(),
    'update-admin' => (new UserController()) -> profileShow(),
    'update-password-admin' => (new UserController()) -> changePasswordAdmin(),
};
