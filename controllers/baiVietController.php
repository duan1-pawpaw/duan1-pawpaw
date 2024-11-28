<?php 
    class baiVietController{
        public $baiVietModel;
        public function __construct()
        {
            $this->baiVietModel = new baiVietModel();
        }

        public function homeBaiViet() 
        {
            $baiViets= $this->baiVietModel->get_baiViet();
            $baiVietNoiBats= $this->baiVietModel->get_baiViet_noiBat();
            $baiVietMois= $this->baiVietModel->get_baiViet_moi();
            require_once './views/tin_tuc/news.php';
        }
        public function ct_tin() 
        {
            $id=$_GET['id'];
            $baiViets= $this->baiVietModel->get_baiViet();
            $baiVietNoiBats= $this->baiVietModel->get_baiViet_noiBat();
            $baiVietMois= $this->baiVietModel->get_baiViet_moi();
            $baiVietById= $this->baiVietModel->get_baiViet_byID($id);
            require_once './views/tin_tuc/chiTietTin.php';
        }
    }


?>
