<?php
class controllerCou
{
    public $controllerCou;
    public function __construct()
    {
        $this->controllerCou = new YourModel;
    }
    public function get_lh_ctl()
    {
        $products = $this->controllerCou->get_lh();
        require_once './views/lien_he/list_lh.php';
    }
    public function t_add_lh()
    {
        include './views/lien_he/add_lh.php';
    }
    public function add_lh_ctl()
    {
        if (isset($_POST['add'])) {
            // $id= $_POST["ma_loai"];
            $email = $_POST['email'];
            $ngay_tao = $_POST['ngay_tao'];
            $noi_dung = $_POST['noi_dung'];

            $su = $this->controllerCou->insert_lh($email, $noi_dung,$ngay_tao);
            if ($su) {
                // header('location:?action=loai_hang');
                echo '<script> alert("Thêm thành công"); 
                window.location.href = "?act=quan_ly_lh"; </script>';
            }
        }
    }
    public function t_update_lh()
    {
        $id = $_GET['id'];
        $products = $this->controllerCou->get_lh_byID($id);
        include './views/lien_he/update_lh.php';
    }
    public function update_lh_ctl()
    {
        $id = $_GET['id'];
        if (isset($_POST['update_lh'])) {
            $email = $_POST['email'];
            $noi_dung = $_POST['noi_dung'];
            $ngay_tao = $_POST['ngay_tao'];
            $su = $this->controllerCou->update_lh($id,$email, $noi_dung,$ngay_tao);
            if ($su) {
                echo '<script> alert("Cập nhật thành công"); 
                window.location.href = "?act=quan_ly_lh"; </script>';
                // header('location:?act=quan_ly_tin');
            }
        }
    }
    public function delete_lh_ctl(){
        $id = $_GET['id'];
        $su=$this->controllerCou->delete_lh($id);
        if ($su) {
            echo '<script> alert("Xóa thành công"); 
            window.location.href = "?act=quan_ly_lh"; </script>';
        }
    }
    // public function thay_doi_tt()
    // {
    //     $products = $this->controllerCou->get_tin();
    //     $products["trang_thai"]= !$products["trang_thai"];
    // }
    public function td_tt_lh_ctl(){
        $id = $_GET['id'];
        $su=$this->controllerCou->td_tt_lh($id);
        if ($su) {
                header('location:?act=quan_ly_lh');
        }
    }
}
