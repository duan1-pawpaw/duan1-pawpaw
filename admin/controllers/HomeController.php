<?php 

class HomeController
{
    public $homeModel;

    public function __construct(){
        $this->homeModel = new homeModel();
    }

    public function home(){
        $data = [];
        if($result = $this->homeModel->thongKe()){
            $data1 = $result;
        }
        $startDate = $_GET['start_date'] ?? date('Y-m-01');
        $endDate = $_GET['end_date'] ?? date('Y-m-d');
        $total = $this->homeModel->gettotal();
        $SoLuongSanPham = $this->homeModel->SoLuongSanPham();
        $soDonHang = $this->homeModel->soDonHang();
        // var_dump($total);die;
        $data = $this->homeModel->getRevenueByDate($startDate, $endDate);
        // var_dump($data);die;
        require_once './views/home/homePage.php';
    }


}