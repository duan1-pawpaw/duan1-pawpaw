<?php
class khuyenMaiController
{
    public $khuyenMaiModel;
    public $productModel;

    public function __construct()
    {
        $this->khuyenMaiModel = new khuyenMaiModel();
        $this->productModel = new Product();
    }

    // Danh sách khuyến mãi
    public function list_vouchers()
    {
        $listVouchers = $this->khuyenMaiModel->getAllVoucher();
        // var_dump($listVouchers);die;
        require_once 'views/khuyenMai/danhSachKhuyenMai.php';
    }

    // Thêm mới khuyến mãi
    public function insert_vouchers()
    {

        $listStatusVouchers = $this->khuyenMaiModel->getAllStatusVoucher();
        $listProducts = $this->productModel->getAllProducts();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_san_pham = $_POST['id_san_pham'] ?? '';
            $ten_khuyen_mai = $_POST['ten_khuyen_mai'] ?? '';
            $ma_khuyen_mai = $_POST['ma_khuyen_mai'] ?? '';
            $gia_tri = $_POST['gia_tri'] ?? '';
            $ngay_bat_dau = $_POST['ngay_bat_dau'] ?? '';
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            $trang_thai_khuyen_mai = $_POST['trang_thai_khuyen_mai'] ?? '';

            // var_dump($_POST);die;

            $errors = [];
            if (empty($ten_khuyen_mai)) {
                $errors['ten_khuyen_mai'] = 'Tên Khuyễn Mãi Không Không Đưuọc Để Trống';
            }
            if (empty($ma_khuyen_mai)) {
                $errors['ma_khuyen_mai'] = 'Mã Khuyến Mãi Không Được Để Trống';
            }
            if (empty($gia_tri)) {
                $errors['gia_tri'] = 'Giá khuyễn mãi Không Được Để Trống';
            }
            if (empty($ngay_bat_dau)) {
                $errors['ngay_bat_dau'] = 'Ngày Bắt Đầu Không Được Để Trống';
            }
            if (empty($ngay_ket_thuc)) {
                $errors['ngay_ket_thuc'] = 'Ngày Kết Thúc Không Được Để Trống';
            }
            if (empty($trang_thai_khuyen_mai)) {
                $errors['trang_thai_khuyen_mai'] = 'Trạng Thái Không Được Để Trống';
            }
            if (empty($id_san_pham)) {
                $errors['id_san_pham'] = 'Sản Phẩm Không Được Để Trống';
            }

            // Nếu có lỗi, lưu thông báo lỗi vào session
            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                // var_dump($_SESSION['errors']);die();
                header("Location: " . BASE_URL_ADMIN . '?act=insert_vouchers');
                exit();
            }

            if ($this->khuyenMaiModel->insert_voucher($id_san_pham, $ten_khuyen_mai, $ma_khuyen_mai, $gia_tri, $ngay_bat_dau, $ngay_ket_thuc, $mo_ta, $trang_thai_khuyen_mai)) {
                header("Location: " . BASE_URL_ADMIN . '?act=list_vouchers');
                exit();
            } else {
                echo "<script> alert('Thêm Thất Bại') </script>";
                header("Location: " . BASE_URL_ADMIN . '?act=insert_vouchers');
                exit();
            }
        }
        require_once 'views/khuyenMai/insertKhuyenMai.php';
    }

    // dẫn đến form sửa
    public function update_Vouchers()
    {
        $voucher_id = $_GET['voucher_id'];
        $detailVoucher = $this->khuyenMaiModel->getDetailVoucher($voucher_id);
        $listStatusVouchers = $this->khuyenMaiModel->getAllStatusVoucher();
        $listProducts = $this->productModel->getAllProducts();
        require_once 'views/khuyenMai/updateKhuyenMai.php';
    }

    // sửa trường hợp 1: khuyến mãi chưa kích hoạt
    public function update_Voucher_case_1()
    {
        $voucher_id = $_GET['voucher_id'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_san_pham = $_POST['id_san_pham'] ?? '';
            $ten_khuyen_mai = $_POST['ten_khuyen_mai'] ?? '';
            $ma_khuyen_mai = $_POST['ma_khuyen_mai'] ?? '';
            $gia_tri = $_POST['gia_tri'] ?? '';
            $ngay_bat_dau = $_POST['ngay_bat_dau'] ?? '';
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            $trang_thai_khuyen_mai = $_POST['trang_thai_khuyen_mai'] ?? '';

            // var_dump($voucher_id, $_POST);die;

            $errors = [];
            if (empty($ten_khuyen_mai)) {
                $errors['ten_khuyen_mai'] = 'Tên Khuyễn Mãi Không Không Đưuọc Để Trống';
            }
            if (empty($ma_khuyen_mai)) {
                $errors['ma_khuyen_mai'] = 'Mã Khuyến Mãi Không Được Để Trống';
            }
            if (empty($gia_tri)) {
                $errors['gia_tri'] = 'Giá khuyễn mãi Không Được Để Trống';
            }
            if (empty($ngay_bat_dau)) {
                $errors['ngay_bat_dau'] = 'Ngày Bắt Đầu Không Được Để Trống';
            }
            if (empty($ngay_ket_thuc)) {
                $errors['ngay_ket_thuc'] = 'Ngày Kết Thúc Không Được Để Trống';
            }
            if (empty($trang_thai_khuyen_mai)) {
                $errors['trang_thai_khuyen_mai'] = 'Trạng Thái Không Được Để Trống';
            }
            if (empty($id_san_pham)) {
                $errors['id_san_pham'] = 'Sản Phẩm Không Được Để Trống';
            }

            // Nếu có lỗi, lưu thông báo lỗi vào session
            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                // var_dump($_SESSION['errors']);die();
                header("Location: " . BASE_URL_ADMIN . '?act=update_Vouchers');
                exit();
            }

            if ($this->khuyenMaiModel->update_Voucher_case_1($voucher_id, $id_san_pham, $ten_khuyen_mai, $ma_khuyen_mai, $gia_tri, $ngay_bat_dau, $ngay_ket_thuc, $mo_ta, $trang_thai_khuyen_mai)) {
                header("Location: " . BASE_URL_ADMIN . '?act=list_vouchers');
                exit();
            } else {
                echo "<script> alert('Sửa Thất Bại') </script>";
                header("Location: " . BASE_URL_ADMIN . '?act=update_Vouchers&voucher_id=' . $voucher_id);
                exit();
            }
        }
    }

    // sửa trường hợp 2: khuyễn mãi đang hoạt động
    public function update_Voucher_case_2()
    {
        $voucher_id = $_GET['voucher_id'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $trang_thai_khuyen_mai_id = $_POST['trang_thai_khuyen_mai'];

            if ($this->khuyenMaiModel->update_Voucher_case_2($voucher_id, $trang_thai_khuyen_mai_id)) {
                header("Location: " . BASE_URL_ADMIN . '?act=list_vouchers');
                exit();
            } else {
                echo "<script> alert('Sửa Thất Bại') </script>";
                header("Location: " . BASE_URL_ADMIN . '?act=update_Vouchers&voucher_id=' . $voucher_id);
                exit();
            }
        }
    }

    // Ẩn khuyến mãi khỏi giao diện
    public function hidden_Vouchers()
    {
        $voucher_id = $_GET['voucher_id'];
        if ($this->khuyenMaiModel->hidden_Voucher($voucher_id)) {
            header("Location: " . BASE_URL_ADMIN . '?act=list_vouchers');
            exit();
        } else {
            echo "<script> alert('Sửa Thất Bại') </script>";
            header("Location: " . BASE_URL_ADMIN . '?act=list_vouchers');
            exit();
        }
    }
}
