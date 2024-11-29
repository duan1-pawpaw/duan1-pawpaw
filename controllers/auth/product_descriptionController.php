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

        
        require_once('views/auth/product_description.php');
    }

    public function addComment() {
        if (!isset($_SESSION['user']['id'])) {
            // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
            header("Location: ?act=registers");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tai_khoan_id = $_SESSION['user']['id'];
            $san_pham_id = $_POST['san_pham_id'];
            $noi_dung = $_POST['noi_dung'];

            $this->productModel->addComment($san_pham_id, $tai_khoan_id, $noi_dung);
            header("Location: ?act=product_description&product_id=" . $san_pham_id);
        }
    }
}
?>



