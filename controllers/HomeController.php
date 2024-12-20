<?php 
    // require_once './controllers/danhMucSanPhamController.php';
    class homeController{
        public $homeModel;
        public $bannerModel;
        public $danhMucSanPhamModel;

        public function __construct()
        {
            $this->homeModel = new homeModel();
            $this->bannerModel = new bannerModel();
            $this->danhMucSanPhamModel = new danhMucSanPhamModel();
        }

       

        public function home() 
        {
            // lấy tất cả banner
            $listBanners = $this->bannerModel->getAllBanner();
            // lấy  top 5 pet có lượt xem cao nhất
            $top5Pets = $this->homeModel->top5Pet();
            // lấy danh sách thú cưng
            $listProducts = $this->homeModel->getAllProduct();
            // lấy  top 4 đánh giá có sao cao nhất
            $top4DanhGias = $this->homeModel->top4DanhGia();
            // lấy danh sách tin tức
            $listCategorys = $this->danhMucSanPhamModel->getAllCate();
            $listNews = $this->homeModel->getAllTinTuc();
            // var_dump($top4DanhGias);die;
            if (isset($_SESSION['used_vouchers'])) {
                unset($_SESSION['used_vouchers']);
                unset($_SESSION['discount']);
            }
            require_once './views/home/home.php';
        }
    }


?>
