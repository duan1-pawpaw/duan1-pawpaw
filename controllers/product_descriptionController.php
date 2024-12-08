<?php
class Product_Description_Controller {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product_Description_Model();
    }

    public function index() {
        $product_id = $_GET['id'];
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
        $ratings = $this->productModel->getRatingsByProductId($product_id);
        
        // Kiểm tra xem người dùng đã mua sản phẩm hay chưa
        $hasPurchased = isset($_SESSION['user']['id']) ? $this->productModel->hasPurchased($_SESSION['user']['id']) : false;
        
        require_once('views/thang/product_description.php');
    }

    public function addComment() {
        var_dump(123);die;
        if (!isset($_SESSION['user']['id'])) {
            // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
            header("Location: ?act=registers");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tai_khoan_id = $_SESSION['user']['id'];
            $san_pham_id = $_POST['san_pham_id'];
            // var_dump($san_pham_id);die;
            $noi_dung = $_POST['noi_dung'];

            $this->productModel->addComment($san_pham_id, $tai_khoan_id, $noi_dung);
            header("Location: ?act=show-product&id=" . $san_pham_id);
        }
    }
    public function addRating() {
        var_dump(125);die;
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



