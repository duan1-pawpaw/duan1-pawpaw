<?php 
    class bannerController {
        public $bannerModel;

        public function __construct()
        {
            $this->bannerModel = new bannerModel();
        }

        public function banners(){
            $listBanners = $this->bannerModel->getAllBanner();
            // var_dump($listBanners);die;
            require_once './views/layout/banner.php';
        }

    }
?>