<?php
class Product_Description_Controller {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product_Description_Model();
    }

    public function index($product_id) {
        if ($product_id === null) {
            echo "Missing product_id.";
            return;
        }
        $product = $this->productModel->getProductById($product_id);
        if (!$product) {
            echo "Product not found.";
            return;
        }

        // Lấy bình luận của sản phẩm
        $comments = $this->productModel->getCommentsByProductId($product_id);

        // Lấy đánh giá của sản phẩm
        $ratings = $this->productModel->getRatingsByProductId($product_id);

        // Kiểm tra xem người dùng đã mua sản phẩm này chưa
        $hasPurchased = isset($_SESSION['user']['id']) ? $this->productModel->hasPurchased($_SESSION['user']['id']) : false;

        require_once('views/auth/product_description.php');
    }

    public function addRating() {
        if (!isset($_SESSION['user']['id'])) {
            header("Location: ?act=registers");
            exit();
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = $_SESSION['user']['id'];
            $product_id = $_POST['san_pham_id'];
            $rating = $_POST['rating'];
            $comment = $_POST['binh_luan'] ?? '';
    
            if ($this->productModel->hasPurchased($user_id)) {
                if ($this->productModel->addRating($user_id, $product_id, $rating, $comment)) {
                    echo "Đánh giá của bạn đã được lưu.";
                } else {
                    echo "Lỗi khi lưu đánh giá.";
                }
            } else {
                echo "Bạn chưa mua sản phẩm này, không thể đánh giá.";
            }
            header("Location: ?act=product_description&product_id=" . $product_id);
            exit();
        }
    }
    

    public function addComment() {
        if (!isset($_SESSION['user']['id'])) {
            // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
            header("Location: ?act=registers");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = $_SESSION['user']['id'];
            $product_id = $_POST['san_pham_id'];
            $content = $_POST['noi_dung'];

            $this->productModel->addComment($product_id, $user_id, $content);
            header("Location: ?act=product_description&product_id=" . $product_id);
        }
    }
}
?>
