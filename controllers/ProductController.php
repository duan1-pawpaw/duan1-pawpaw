<?php

class ProductController
{
    public $productModel;
    public $commentModel;

    public function __construct()
    {
        $this->productModel = new Product();
        $this->commentModel = new Comment();
    }
    // Hiển thị chi tiết sản phẩm
    public function productShow()
    {
        // $id = $_GET['id'] ?? null;
        // var_dump($id); die;
        $product = $this->productModel->getByIdProducts(19);
        // var_dump($product);die;
        $albumProduct = $this->productModel->albumProduct(19);
        // var_dump($listAnhSanPham);die;
        $comments = $this->commentModel->commentFromProduct(19);
        if ($product) {
            require_once './Views/products/show.php';
        } else {
            header("Location: " . BASE_URL);
            exit();
        }
    }
  
}
?>