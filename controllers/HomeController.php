<?php 

class HomeController
{
    public $homeModel;

    public function __construct(){
        $this->homeModel = new homeModel();
    }

    public function home(){
        require_once './views/home/homePage.php';
    }
    public function quan_ly_tin(){
        require_once './views/home/quan_ly_tin.php';
    }

}