<?php 
    class danhMucSanPhamController{
        public $danhMucSanPhamModel;

        public function __construct()
        {
            $this->danhMucSanPhamModel = new danhMucSanPhamModel();
        }

        public function productByCategorys() {
            $listCategorys = $this->danhMucSanPhamModel->getAllCate();
            $id_cate = $_GET['id_cate'];
            // var_dump($id_cate);die;
            $listCategory = $this->danhMucSanPhamModel->getAllCategory($id_cate);
            // var_dump($listCategory);die;
            $listProductSales = $this->danhMucSanPhamModel->getProductSale();
            // var_dump($listProductSale);die;
            $productByCategorys = $this->danhMucSanPhamModel->productByCategory($id_cate);
            // var_dump($productByCategorys);die;
            require_once './views/category/petByCate.php';
        }
    }

?>