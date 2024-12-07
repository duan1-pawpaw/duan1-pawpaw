<?php
class Product_Description_Controller {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product_Description_Model();
    }

    public function product_description($product_id) {
        if ($product_id === null) {
            echo "Không Tìm Thấy ID Sản Phẩm.";
            return;
        }
        $product = $this->productModel->getProductById($product_id);
        if (!$product) {
            echo "Không Tìm Thấy Sản Phẩm.";
            return;
        }

        // Lấy bình luận và đánh giá của sản phẩm
        $comments = $this->productModel->getCommentsByProductId($product_id);
        $ratings = $this->productModel->getRatingsByProductId($product_id);

        // Kiểm tra xem người dùng đã mua sản phẩm hay chưa
        $hasPurchased = isset($_SESSION['user']['id']) ? $this->productModel->hasPurchased($_SESSION['user']['id']) : false;

        require_once('views/auth/product_description.php');
    }

    public function addComment() {
        if (!isset($_SESSION['user']['id'])) {
            header("Location: ?act=registers");
            exit();
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = $_SESSION['user']['id'];
            $product_id = $_POST['san_pham_id'];
            $comment = $_POST['noi_dung'];
    
            // var_dump($user_id, $product_id, $comment); die;
    
            if ($this->productModel->addComment($product_id, $user_id, $comment)) {
                // echo "Bình luận của bạn đã được lưu.";
            } else {
                // echo "Lỗi khi lưu bình luận.";
            }
            header("Location: ?act=product_description&product_id=" . $product_id);
            var_dump($user_id, $product_id, $comment);
            exit();
        }
    }
    
    
    

    public function addRating() {
        if (!isset($_SESSION['user']['id'])) {
            header("Location: ?act=registers");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = $_SESSION['user']['id'];
            $product_id = $_POST['san_pham_id'];
            $rating = $_POST['danh_gia_sao'];
            $comment = $_POST['binh_luan'] ?? '';
            // var_dump($user_id, $product_id, $rating, $comment); die;

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
}

?>
