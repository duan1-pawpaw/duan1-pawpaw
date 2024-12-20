<?php

class CartController
{
    public $cartModel;
    public $profileModel;
    public $orderModel;
    public $productModel;
    public $categoryModel;
    public $checkoutModel;

    public function __construct()
    {
        $this->cartModel = new Cart();
        $this->profileModel = new Profile();
        $this->productModel = new Product();
        $this->categoryModel = new Category();
        $this->checkoutModel = new checkoutModel();
    }
    public function cartCreate()
    {
        // var_dump(123);die;
        if (isset($_SESSION['user']['id'])) {
            $user = $this->profileModel->getByIdUser($_SESSION['user']['id']);
            // var_dump($categorys);die;

            // Lấy dữ liệu giỏ hàng của người dùng
            // var_dump($user['id']);die;
            $cart = $this->cartModel->getByIdCart($_SESSION['user']['id']);
            // var_dump($cart['id']);die;
            if (!$cart) {
                // var_dump(123);die;
                $cartId = $this->cartModel->createCart($_SESSION['user']['id']);
                $cart = ['id' => $cartId];
                $chiTietGioHang = $this->cartModel->getDetailGioHang($cart['id']);
            } else {
                $chiTietGioHang = $this->cartModel->getDetailGioHang($cart['id']);
            }
            $san_pham_id = $_POST['san_pham_id'];
            $so_luong = $_POST['so_luong'];
            // var_dump($san_pham_id);die;
            // var_dump($_POST);die;
            $check_soLuong = $this->checkoutModel->check_soLuongTonKho($san_pham_id);
            if ($so_luong > $check_soLuong) {
                // var_dump(123);die;
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Không Đủ Số Lượng Tồn Kho',
                            text: 'Vui lòng kiểm tra lại số lượng bạn muốn mua.',
                            confirmButtonText: 'OK'
                        });
                    });
                </script>";
                // die;
                header("Refresh: 1; URL=" . BASE_URL . '?act=show-product&id=' . $san_pham_id);
                exit();
            }

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
            // var_dump($this->cartModel->addDetailGioHang($cart['id'], $san_pham_id, $so_luong));die;
            // var_dump('Thêm giỏ hàng thành công');die;
            header("Location: " . BASE_URL . '?act=carts');
        } else {
            header("Location: " . BASE_URL . '?act=registers');
            die;
        }
    }

    public function cartIndex()
    {
        if (isset($_SESSION['user']['id'])) {
            $user = $this->profileModel->getByIdUser($_SESSION['user']['id']);

            // Lấy dữ liệu giỏ hàng của người dùng
            // var_dump($user['id']);die;
            $cart = $this->cartModel->getByIdCart($_SESSION['user']['id']);
            if (!$cart) {
                $cartId = $this->cartModel->createCart($_SESSION['user']['id']);
                $cart = ['id' => $cartId];
                $chiTietGioHang = $this->cartModel->getDetailGioHang($cart['id']);
            } else {
                $chiTietGioHang = $this->cartModel->getDetailGioHang($cart['id']);
            }
            // var_dump($chiTietGioHang);die;

            require_once './views/cart/cart.php';
        } else {
            header("Location: " . BASE_URL . '?act=registers');
        }
    }

    public function cartDelete()
    {
        $id = $_GET['id_cart'];
        if ($this->cartModel->removeCart($id)) {
            header("Location: " . BASE_URL . '?act=carts');
            exit();
        } else {
            echo "<script> alert('Xóa giỏ hàng thất bại!') </script>";
            header("Location: " . BASE_URL . '?act=carts');
            exit();
        }
    }

    public function updateCart()
    {
        $updateResults = [];

        if (isset($_POST['san_pham']) && is_array($_POST['san_pham'])) {
            foreach ($_POST['san_pham'] as $key => $san_pham) {
                $san_pham_id = $san_pham['san_pham_id'];
                $so_luong = $san_pham['so_luong'];
                $so_luong_cu = $san_pham['so_luong_cu'];
                $gio_hang_id = $san_pham['gio_hang_id'];

                $check_soLuong = $this->checkoutModel->check_soLuongTonKho($san_pham_id);
                if (($so_luong + $so_luong_cu) > $check_soLuong) {
                    $updateResults[$san_pham_id] = 'Hết hàng';
                } else {
                    if ($this->cartModel->updateSoLuong($gio_hang_id, $san_pham_id, $so_luong)) {
                        $updateResults[$san_pham_id] = 'Cập nhật thành công';
                    } else {
                        $updateResults[$san_pham_id] = 'Cập nhật thất bại';
                    }
                }
            }

            // Chuyển mảng kết quả về view hoặc frontend
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {";

            foreach ($updateResults as $id => $message) {
                if ($message === 'Cập nhật thành công') {
                    echo "Swal.fire({
                    icon: 'success',
                    title: 'Cập nhật thành công',
                    text: '$message'
                });";
                } else if($message === 'Hết hàng') {
                    echo "Swal.fire({
                    icon: 'error',
                    title: 'Sản phẩm không dủ số lượng hàng tồn kho',
                    text: '$message'
                });";
                }else{
                    echo "Swal.fire({
                        icon: 'error',
                        title: 'Cập nhật thất bại',
                        text: '$message'
                    });"; 
                }
            }

            echo "});</script>";
            header('Refresh: 1; URL=' . BASE_URL . '?act=carts');
            exit();
        }
    }
}
