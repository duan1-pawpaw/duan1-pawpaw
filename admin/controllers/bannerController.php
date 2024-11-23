<?php
class controllerBanner
{
    public $controllerBanner;
    public function __construct()
    {
        $this->controllerBanner = new modelBanner;
    }
    public function get_banner_ctl()
    {
        $products = $this->controllerBanner->get_banner();
        require_once './views/banners/list_banner.php';
    }
    public function t_add_banner()
    {
        include './views/banners/add_banner.php';
    }
    public function add_banner_ctl()
    {
        if (isset($_POST['add'])) {
            $tieu_de = $_POST['tieu_de'];
            $url_hinh=$_FILES['url_hinh'];
            $file_thumb = uploadFile($url_hinh, './uploads/imgBanner/');
            $su = $this->controllerBanner->insert_banner($tieu_de, $file_thumb);
            if ($su) {
                // header('location:?action=loai_hang');
                echo '<script> window.location.href = "?act=quan_ly_banner"; </script>';
            }
        }
    }
    public function t_update_banner()
    {
        $id = $_GET['id'];
        $products = $this->controllerBanner->get_banner_byID($id);
        include './views/banners/update_banner.php';
    }
    public function update_banner_ctl()
    {
        $id = $_GET['id'];
        if (isset($_POST['update_banner'])) {
            $tieu_de = $_POST['tieu_de'];
            $url_hinh=$_FILES['url_hinh']['name'];
            $file_thumb = uploadFile($url_hinh, './uploads/imgTinTuc/');
            $su = $this->controllerBanner->update_banner($id, $tieu_de, $file_thumb);
            if ($su) {
                echo '<script>window.location.href = "?act=quan_ly_banner"; </script>';
                // header('location:?act=quan_ly_tin');
            }
        }
    }
    public function delete_banner_ctl(){
        $id = $_GET['id'];
        $su=$this->controllerBanner->delete_banner($id);
        if ($su) {
            echo '<script> window.location.href = "?act=quan_ly_banner"; </script>';
        }
    }
    public function td_tt_banner_ctl(){
        $id = $_GET['id'];
        $su=$this->controllerBanner->td_tt_banner($id);
        if ($su) {
                header('location:?act=quan_ly_banner');
        }
    }
}
