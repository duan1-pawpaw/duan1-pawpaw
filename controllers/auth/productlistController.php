<?php
class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new ProductModel();
    }

    public function index() {
        $products = $this->productModel->getAllProducts();
        require_once('views/auth/products_list.php');
    }
}
?>
