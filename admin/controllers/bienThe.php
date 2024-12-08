<?php
class bienTheController
{
    public $bienTheModel;

    public function __construct()
    {
        $this->bienTheModel = new bienTheModel();
    }

    public function listBienThe()
    {
        // var_dump(123);die;
        $id_san_pham = $_GET['id'];
        $listVariants = $this->bienTheModel->listVariant($id_san_pham);
        require_once './views/products/bien_the/list_bien_the.php';
    }

    public function insertVariant()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu
            $id_san_pham = $_GET['id_san_pham'];
            $mau_sac = $_POST['mau_sac'] ?? '';
            $do_tuoi = $_POST['do_tuoi'] ?? '';
            $gioi_tinh = $_POST['gioi_tinh'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';

            $hinh_anh = $_FILES['hinh_anh'] ?? '';
            // var_dump($hinh_anh);die();
            // Lưu hình ảnh vào 
            $file_thumb = uploadFile($hinh_anh, './uploads/imgSanPham/');
            if (empty($mau_sac)) {
                $errors['mau_sac'] = 'Tên pet không được để trống';
            }
            if (empty($do_tuoi)) {
                $errors['do_tuoi'] = 'Độ tuổi pet không được để trống';
            }
            if (empty($gioi_tinh)) {
                $errors['gioi_tinh'] = 'Giới tính pet không được để trống';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số Luọngư pet không được để trống';
            }
            if (empty($hinh_anh)) {
                $errors['hinh_anh'] = 'Số Luọngư pet không được để trống';
            }

            // var_dump($_POST);die;
            if(!empty($errors)){
                $_SESSION['errors'] = $errors;
                header('location: ' . BASE_URL_ADMIN . '?act=insertVariant&id_san_pham=' . $id_san_pham);
                exit();
            }

            if($this->bienTheModel->themBienThe($id_san_pham, $file_thumb, $mau_sac, $do_tuoi, $so_luong, $gioi_tinh)){
                header('location: ' . BASE_URL_ADMIN . '?act=listBienThe&id=' . $id_san_pham);
            }
        }
        require_once './views/products/bien_the/them_bien_the.php';
    }

    public function updateVariant(){
        $id_variant = $_GET['id'];
        $variant = $this->bienTheModel->detailVariant($id_variant);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu
            $id_san_pham = $_GET['id_san_pham'];
            $mau_sac = $_POST['mau_sac'] ?? '';
            $do_tuoi = $_POST['do_tuoi'] ?? '';
            $gioi_tinh = $_POST['gioi_tinh'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $old_file = $variant['hinh_anh'];
            $hinh_anh = $_FILES['hinh_anh'] ?? '';
            if(isset($hinh_anh)){
                // var_dump($old_file);die;
                $file_thumb = $old_file;
            }else{
                $file_thumb = uploadFile($hinh_anh, './uploads/imgSanPham/');
            }
            // var_dump($hinh_anh);die();
            // Lưu hình ảnh vào 
            
            if (empty($mau_sac)) {
                $errors['mau_sac'] = 'Tên pet không được để trống';
            }
            if (empty($do_tuoi)) {
                $errors['do_tuoi'] = 'Độ tuổi pet không được để trống';
            }
            if (empty($gioi_tinh)) {
                $errors['gioi_tinh'] = 'Giới tính pet không được để trống';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số Luọngư pet không được để trống';
            }
            if (empty($hinh_anh)) {
                $errors['hinh_anh'] = 'Số Luọngư pet không được để trống';
            }

            // var_dump($_POST);die;
            if(!empty($errors)){
                $_SESSION['errors'] = $errors;
                header('location: ' . BASE_URL_ADMIN . '?act=insertVariant&id_san_pham=' . $id_san_pham);
                exit();
            }

            if($this->bienTheModel->updateVariant($id_variant, $file_thumb, $mau_sac, $do_tuoi, $so_luong, $gioi_tinh)){
                header('location: ' . BASE_URL_ADMIN . '?act=listBienThe&id=' . $id_san_pham);
            }
        }
        require_once './views/products/bien_the/sua_bien_the.php';
    }
}
