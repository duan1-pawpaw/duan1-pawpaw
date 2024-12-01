<?php

class CartController
{
    public $modelCart;

    public function __construct()
    {
        $this->modelCart = new Cart();
    }
    public function addGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['user_client'])) {
                $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);

                // Lấy dữ liệu giỏ hàng của người dùng
                // var_dump($mail['id']);die;
                $gioHang = $this->modelCart->getGioHangFromId($mail['id']);
                if (!$gioHang) {
                    $gioHangId = $this->modelCart->addGioHang($mail['id']);
                    $gioHang = ['id' => $gioHangId];
                    $chiTietGioHang = $this->modelCart->getDetailGioHang($gioHang['id']);
                } else {
                    $chiTietGioHang = $this->modelCart->getDetailGioHang($gioHang['id']);
                }
                $san_pham_id = $_POST['san_pham_id'];
                $so_luong = $_POST['so_luong'];

                $checkSanPham = false;
                foreach ($chiTietGioHang as $detail) {
                    if ($detail['san_pham_id'] == $san_pham_id) {
                        $newSoLuong = $detail['so_luong'] + $so_luong;
                        $this->modelCart->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
                        $checkSanPham = true;
                        break;
                    }
                }
                if (!$checkSanPham) {
                    $this->modelCart->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong);
                }
                // var_dump('Thêm giỏ hàng thành công');die;
                header("Location: " . BASE_URL . '?act=gio-hang');
            } else {
                var_dump('Chưa đăng nhập');
                die;
            }
        }
    }

    public function gioHang()
    {
        if (isset($_SESSION['user_client'])) {
            $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);

            // Lấy dữ liệu giỏ hàng của người dùng
            // var_dump($mail['id']);die;
            $gioHang = $this->modelCart->getGioHangFromId($mail['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelCart->addGioHang($mail['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelCart->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelCart->getDetailGioHang($gioHang['id']);
            }
            // var_dump($chiTietGioHang);die;

            require_once './views/gioHang.php';
        } else {
            header("Location: " . BASE_URL . '?act=login');
        }
    }
    public function thanhToan()
    {
        if (isset($_SESSION['user_client'])) {
            $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);

            // Lấy dữ liệu giỏ hàng của người dùng
            // var_dump($mail['id']);die;
            $gioHang = $this->modelGioHang->getGioHangFromId($mail['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
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

            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            $ma_don_hang = 'DH' . rand(1000,9999);

            // Thêm thông tin vào db
            $this->modelDonHang->adDonHang(
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
