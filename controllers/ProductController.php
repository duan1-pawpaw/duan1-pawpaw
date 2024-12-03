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

        $category = $this->categoryModel->prodctFromCategory($product['danh_muc_id']);
        // var_dump($categorys);die;
        if ($product) {
            require_once './Views/product/show.php';
        } else {
            header("Location: " . BASE_URL);
            exit();
        }
    }
  
}
?>