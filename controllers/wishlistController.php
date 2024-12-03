<?php
class wishlistController
{
    private $wishlistModel;

    public function __construct()
    {
        $this->wishlistModel = new wishlistModel();
    }

    public function index()
    {
        if (isset($_SESSION['user']['id'])) {
            $tai_khoan_id = $_SESSION['user']['id'];
            $wishlists = $this->wishlistModel->getWistList($tai_khoan_id);
        } else {
            $wishlists = [];
        }
        require_once('./views/thang/wishlist.php');
    }

    public function add()
    {
        $product_id = $_GET['product_id'];
        // var_dump($product_id);die;
        if (!isset($_SESSION['user']['id'])) {
            // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
            header("Location: ?act=registers");
            exit();
        }

        $tai_khoan_id = $_SESSION['user']['id'];
        // var_dump($tai_khoan_id);die;
        if ($this->wishlistModel->addToWishlist($tai_khoan_id, $product_id)) {
            header("Location: " . BASE_URL . '?act=wishlist');
            exit();
        } else {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }

    public function remove()
    {
        $product_id = $_GET['product_id'];
        if (!isset($_SESSION['user']['id'])) {
            // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
            header("Location: ?act=registers");
            exit();
        }

        $tai_khoan_id = $_SESSION['user']['id'];
        $this->wishlistModel->removeFromWishlist($tai_khoan_id, $product_id);

        // Xóa báo khi thêm thành công

        // Chuyển hướng trở lại trang ban đầu
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }
}
