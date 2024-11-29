<?php
class SearchController {
    private $productModel;

    public function __construct() {
        $this->productModel = new searchModel();
    }

    public function search() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $query = $_POST['search'];
            $searchs = $this->productModel->searchProducts($query);
            require_once('./views/auth/search_product.php');
        } else {
            $searchs = [];
            require_once('./views/auth/search_product.php');
        }
    }
}
?>
