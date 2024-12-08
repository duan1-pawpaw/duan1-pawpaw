<?php

class ProductController
{
    public $productModel;
    public $commentModel;
    public $categoryModel;

    public function __construct()
    {
        $this->productModel = new Product();
        $this->commentModel = new Comment();
        $this->categoryModel = new Category();
    }
    // Hiển thị chi tiết sản phẩm
    public function productShow()
    {
        $id = $_GET['id'] ;
        // var_dump($id); die;
        $product = $this->productModel->getByIdProducts($id);
        // var_dump($product);die;
        $albumProduct = $this->productModel->albumProduct($id);
        // var_dump($listAnhSanPham);die;
        $comments = $this->commentModel->commentFromProduct($id);
        $ratings = $this->productModel->getRatingsByProductId($id);
        $hasPurchased = isset($_SESSION['user']['id']) ? $this->productModel->hasPurchased($_SESSION['user']['id'], $id) : false;
        // var_dump($hasPurchased);die;
        $category = $this->categoryModel->prodctFromCategory($product['danh_muc_id']);
        // var_dump($categorys);die;
        if ($product) {
            require_once './Views/product/show.php';
        } else {
            header("Location: " . BASE_URL);
            exit();
        }
    }

    public function addRating() {
        // var_dump(125);die;
        if (!isset($_SESSION['user']['id'])) {
            header("Location: ?act=registers");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = $_SESSION['user']['id'];
            $product_id = $_GET['id'];
            $rating = $_POST['danh_gia_sao'];
            $comment = $_POST['binh_luan'] ?? '';
            // var_dump($user_id, $product_id, $rating, $comment); die;

            if ($this->productModel->hasPurchased($user_id, $product_id)) {
                // var_dump(123);die;
                if ($this->productModel->addRating($user_id, $product_id, $rating, $comment)) {
                    echo "Đánh giá của bạn đã được lưu.";
                } else {
                    echo "Lỗi khi lưu đánh giá.";
                }
            } else {
                echo "Bạn chưa mua sản phẩm này, không thể đánh giá.";
            }
            header("Location: ?act=show-product&id=" . $product_id);
            exit();
        }
    }
  
}
?>