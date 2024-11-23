<?php 
    class homeController{
        public $homeModel;
        public $bannerModel;

        public function __construct()
        {
            $this->homeModel = new homeModel();
            $this->bannerModel = new bannerModel();
        }

        public function home() 
        {
            $listBanners = $this->bannerModel->getAllBanner();
            $listPets = $this->homeModel->getAllPet();
            require_once './views/home/home.php';
        }
    }


?>
