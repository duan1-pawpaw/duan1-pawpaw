<?php
class controllerTin
{
    public $controllerCou;
    public function __construct()
    {
        $this->controllerCou = new ModelTin;
    }
    public function get_tin_tuc()
    {
        $products = $this->controllerCou->get_tin();
        require_once './views/tin_tuc/list_tin.php';
    }
    public function add_tin()
    {
        include './views/tin_tuc/add_tin.php';
    }
    public function add_tin_tuc()
    {
        if (isset($_POST['add'])) {
            // $id= $_POST["ma_loai"];
            $tieu_de = $_POST['tieu_de'];
            $mo_ta = $_POST['mo_ta'];
            // $url_hinh = $_POST['url_hinh'];
            $url_hinh=$_FILES['url_hinh'];
            $file_thumb = uploadFile($url_hinh, './uploads/imgTinTuc/');
            $su = $this->controllerCou->insert($tieu_de, $mo_ta, $file_thumb);
            if ($su) {
                // header('location:?action=loai_hang');
                echo '<script>window.location.href = "?act=quan_ly_tin"; </script>';
            }
        }
    }
    public function t_update()
    {
        $id = $_GET['id'];
        $products = $this->controllerCou->get_product_byID($id);
        include './views/tin_tuc/update_tin.php';
    }
    public function update()
    {
        $id = $_GET['id'];
        if (isset($_POST['update'])) {
            $tieu_de = $_POST['tieu_de'];
            $mo_ta = $_POST['mo_ta'];
            $url_hinh=$_FILES['url_hinh'];
            $file_thumb = uploadFile($url_hinh, './uploads/imgTinTuc/');
            $su = $this->controllerCou->update($id, $tieu_de, $mo_ta, $file_thumb);
            if ($su) {
                echo '<script> window.location.href = "?act=quan_ly_tin"; </script>';
                // header('location:?act=quan_ly_tin');
            }
        }
    }
    public function delete_sp(){
        $id = $_GET['id'];
        $su=$this->controllerCou->deletesp($id);
        if ($su) {
            echo '<script> window.location.href = "?act=quan_ly_tin"; </script>';
        }
    }
    // public function thay_doi_tt()
    // {
    //     $products = $this->controllerCou->get_tin();
    //     $products["trang_thai"]= !$products["trang_thai"];
    // }
    public function thay_doi_tt(){
        $id = $_GET['id'];
        $su=$this->controllerCou->td_tt($id);
        if ($su) {
                header('location:?act=quan_ly_tin');
        }
    }
}
