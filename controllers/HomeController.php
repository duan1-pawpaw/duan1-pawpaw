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
            $top5Pets = $this->homeModel->top5Pet();
            // var_dump($top5Pets);die;
            require_once './views/home/home.php';
        }
    }


?>
