<?php
class wishlistController {
    private $wishlistModel;

    public function __construct() {
        $this->wishlistModel = new wishlistModel();
    }

    public function wishlist() {
        if (isset($_SESSION['user']['id'])) {
            $tai_khoan_id = $_SESSION['user']['id'];
            $wishlists = $this->wishlistModel->getWistList($tai_khoan_id);
        } else {
            $wishlists = [];
        }
        require_once('./views/auth/wishlist.php');
    }

    public function add($product_id) {
        if (!isset($_SESSION['user']['id'])) {
            // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
            header("Location: ?act=registers");
            exit();
        }

        $tai_khoan_id = $_SESSION['user']['id'];
        $this->wishlistModel->addToWishlist($tai_khoan_id, $product_id);

        // Thông báo thêm thành công
        
        // Chuyển hướng trở lại trang ban đầu
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }

    public function remove($product_id) {
        if (!isset($_SESSION['user']['id'])) {
            // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
            header("Location: ?act=registers");
            exit();
        }

        $tai_khoan_id = $_SESSION['user']['id'];
        $this->wishlistModel->removeFromWishlist($tai_khoan_id, $product_id);
        
        // Thông báo xóa thành công

        // Chuyển hướng trở lại trang ban đầu
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }
}
?>
