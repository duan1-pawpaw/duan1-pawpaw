<?php 
    class homeController{
        public $homeModel;

        public function __construct()
        {
            $this->homeModel = new homeModel();
        }

        public function home() {
            $listPets = $this->homeModel->getAllPet();
            require_once './views/home/home.php';
        }
    }

?>