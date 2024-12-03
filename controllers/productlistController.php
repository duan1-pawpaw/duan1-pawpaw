<?php
class ProductlistController {
    private $productModel;
    public $danhMucSanPhamModel;

    public function __construct() {
        $this->productModel = new ProductModel();
        $this->danhMucSanPhamModel = new danhMucSanPhamModel();
    }

    public function index() {
        $products = $this->productModel->getAllProducts();
        $listCategorys = $this->danhMucSanPhamModel->getAllCate();
        $listProductSales = $this->danhMucSanPhamModel->getProductSale();
        require_once('views/thang/products_list.php');
    }
}
?>
