<?php 
    class danhMucSanPhamController{
        public $danhMucSanPhamModel;

        public function __construct()
        {
            $this->danhMucSanPhamModel = new danhMucSanPhamModel();
        }

        public function productByCategorys() {
            $id_cate = $_GET['id_cate'];
            $listCategory = $this->danhMucSanPhamModel->getAllCategory($id_cate);
            $productByCategorys = $this->danhMucSanPhamModel->productByCategory($id_cate);
            // var_dump($productByCategorys);die;
            require_once './views/category/petByCate.php';
        }
    }

?>