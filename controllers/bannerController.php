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
            $url_hinh=$_FILES['url_hinh']['name'];
            move_uploaded_file($_FILES['url_hinh']['tmp_name'],'./imgBanner/'.$url_hinh);
            $su = $this->controllerBanner->insert_banner($tieu_de, $url_hinh);
            if ($su) {
                // header('location:?action=loai_hang');
                echo '<script> alert("Thêm thành công"); 
                window.location.href = "?act=quan_ly_banner"; </script>';
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
            move_uploaded_file($_FILES['url_hinh']['tmp_name'],'./imgBanner/'.$url_hinh);
            $su = $this->controllerBanner->update_banner($id, $tieu_de, $url_hinh);
            if ($su) {
                echo '<script> alert("Cập nhật thành công"); 
                window.location.href = "?act=quan_ly_banner"; </script>';
                // header('location:?act=quan_ly_tin');
            }
        }
    }
    public function delete_banner_ctl(){
        $id = $_GET['id'];
        $su=$this->controllerBanner->delete_banner($id);
        if ($su) {
            echo '<script> alert("Xóa thành công"); 
            window.location.href = "?act=quan_ly_banner"; </script>';
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
