<?php

class CartController
{
    public $cartModel;
    public $profileModel;
    public $orderModel;
    public $productModel;
    public $categoryModel;

    public function __construct()
    {
        $this->cartModel = new Cart();
        $this->profileModel = new Profile();
        $this->orderModel = new Order();
        $this->productModel = new Product();
        $this->categoryModel = new Category();
    }
    public function cartCreate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['user']['id'])) {
                $user = $this->profileModel->getByIdUser($_SESSION['user']['id']);
                // var_dump($categorys);die;

                // Lấy dữ liệu giỏ hàng của người dùng
                // var_dump($user['id']);die;
                $cart = $this->cartModel->getByIdCart($user['id']);
                if (!$cart) {
                    $cartId = $this->cartModel->createCart($user['id']);
                    $cart = ['id' => $cartId];
                    $chiTietGioHang = $this->cartModel->getDetailGioHang($cart['id']);
                } else {
                    $chiTietGioHang = $this->cartModel->getDetailGioHang($cart['id']);
                }
                $san_pham_id = $_POST['san_pham_id'];
                $so_luong = $_POST['so_luong'];

                $checkSanPham = false;
                foreach ($chiTietGioHang as $detail) {
                    if ($detail['san_pham_id'] == $san_pham_id) {
                        $newSoLuong = $detail['so_luong'] + $so_luong;
                        $this->cartModel->updateSoLuong($cart['id'], $san_pham_id, $newSoLuong);
                        $checkSanPham = true;
                        break;
                    }
                }
                if (!$checkSanPham) {
                    $this->cartModel->addDetailGioHang($cart['id'], $san_pham_id, $so_luong);
                }
                // var_dump('Thêm giỏ hàng thành công');die;
                header("Location: " . BASE_URL . '?act=carts');
            } else {
                var_dump('Chưa đăng nhập');
                die;
            }
        }
    }

    public function cartIndex()
    {
        if (isset($_SESSION['user']['id'])) {
            $user = $this->profileModel->getByIdUser($_SESSION['user']['id']);

            // Lấy dữ liệu giỏ hàng của người dùng
            // var_dump($user['id']);die;
            $cart = $this->cartModel->getByIdCart($user['id']);
            if (!$cart) {
                $cartId = $this->cartModel->createCart($user['id']);
                $cart = ['id' => $cartId];
                $chiTietGioHang = $this->cartModel->getDetailGioHang($cart['id']);
            } else {
                $chiTietGioHang = $this->cartModel->getDetailGioHang($cart['id']);
            }
            // var_dump($chiTietGioHang);die;

            require_once './views/cart/cart.php';
        } else {
            header("Location: " . BASE_URL . '?act=login');
        }
    }
    public function thanhToan()
    {
        if (isset($_SESSION['user']['id'])) {
            $user = $this->profileModel->getByIdUser($_SESSION['user']['id']);

            // Lấy dữ liệu giỏ hàng của người dùng
            // var_dump($user['id']);die;
            $cart = $this->cartModel->getByIdCart($user['id']);
            if (!$cart) {
                $cartId = $this->cartModel->createCart($user['id']);
                $cart = ['id' => $cartId];
                $chiTietGioHang = $this->cartModel->getDetailGioHang($cart['id']);
            } else {
                $chiTietGioHang = $this->cartModel->getDetailGioHang($cart['id']);
            }
            // var_dump($chiTietGioHang);die;

            require_once './views/thanhToan.php';
        } else {
            var_dump('Chưa đăng nhập');
            die;
        }
    }
    public function postThanhToan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // var_dump($_POST);die;

            // Lấy ra dữ liệu
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $ghi_chu = $_POST['ghi_chu'];
            $tong_tien = $_POST['tong_tien'];
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];

            $ngay_dat = date('Y-m-d');
            $trang_thai_id = 1;

            $user = $this->profileModel->getByIdUser($_SESSION['user']['id']);
            $tai_khoan_id = $user['id'];

            $ma_don_hang = 'DH' . rand(1000,9999);

            // Thêm thông tin vào db
            $this->orderModel->adDonHang(
                $tai_khoan_id,
                $ten_nguoi_nhan,
                $email_nguoi_nhan,
                $sdt_nguoi_nhan,
                $dia_chi_nguoi_nhan,
                $ghi_chu,
                $tong_tien,
                $phuong_thuc_thanh_toan_id,
                $ngay_dat,
                $ma_don_hang,
                $trang_thai_id
            );
            var_dump('Thêm thành công');die;
        }
    }
}
