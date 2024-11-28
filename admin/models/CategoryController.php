<?php

class CategoryController
{
    public $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new Category();
    }
    // Hiển thị danh sách danh mục
    public function categoryIndex()
    {
        $data = $this->categoryModel->getAllCategory();

        require_once './Views/categorys/list.php';
    }
    // Tạo danh mục
    public function categoryCreate()
    {
        // Hiển thị form thêm danh mục
        require_once './Views/categorys/create.php';
        // Kiểm tra xem dữ liệu có được submit lên không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu
            $ten_danh_muc = $_POST['ten_danh_muc'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';

            // Tạo 1 mảng trống để lưu lỗi
            $errors = [];

            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }

            if (empty($errors)) {
                // Nếu ko có lỗi thì tiến hành thêm danh mục
                // var_dump('Oke');

                // Thêm danh mục vào database
                $this->categoryModel->insertCategory($ten_danh_muc, $mo_ta);

                // Lưu thông báo thành công và chuyển hướng
                $_SESSION['success'] = 'Thêm danh mục thành công.';
                header("location: " . BASE_URL_ADMIN . "?act=categorys");
                exit();
            } else {
                // Nếu có lỗi, lưu lại lỗi và dữ liệu cũ vào SESSION
                $_SESSION['error'] = $errors;
                $_SESSION['old_data'] = [
                    'ten_danh_muc' => $ten_danh_muc,
                    'mo_ta' => $mo_ta,
                ];
                // Chuyển hướng về form thêm danh mục
                header('location: ' . BASE_URL_ADMIN . '?act=add-category');
                exit();
            }
        }

        // Xóa session sau khi load trang
        deleteSessionError();
    }
    // Cập nhật danh mục
    public function categoryUpdate()
    {
        // Hiển thị form nhập
        $id = $_GET['id'];
        // Lấy ra thông tin của danh mục cần sửa
        $category = $this->categoryModel->getByIdCategory($id);
        // var_dump($category);die;

        if ($category) {

            require_once './Views/categorys/update.php';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // var_dump(123);
                // Lấy ra dữ liệu cũ của danh mục
                $id = $_POST['id'] ?? '';
                $ten_danh_muc = $_POST['ten_danh_muc'] ?? '';
                $mo_ta = $_POST['mo_ta'] ?? '';
                // var_dump($_POST);die;
                // Tạo 1 mảng trống để chứa dữ liệu
                $errors = [];

                if (empty($ten_danh_muc)) {
                    $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
                }
                // Nếu ko có lỗi thì tiến hành sửa danh mục
                if (empty($errors)) {
                    // Nếu ko có lỗi thì tiến hành sửa danh mục
                    // var_dump('Oke');

                    $this->categoryModel->updateCategory($id, $ten_danh_muc, $mo_ta);
                    header('location: ' . BASE_URL_ADMIN . '?act=categorys');
                    exit();
                } else {
                    // Nếu có lỗi, lưu lại lỗi và dữ liệu cũ vào SESSION
                    $_SESSION['error'] = $errors;
                    $_SESSION['old_data'] = [
                        'ten_danh_muc' => $ten_danh_muc,
                        'mo_ta' => $mo_ta,
                    ];
                    // Chuyển hướng về form sửa danh mục
                    header('location: ' . BASE_URL_ADMIN . '?act=update-category&id=' . $id);
                    exit();
                }
            }
            deleteSessionError();
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=categorys');
            exit();
        }
      
    }
    // Xóa danh mục
    public function categoryDelete()
    {
        $id = $_GET['id'];

        $category = $this->categoryModel->getByIdCategory($id);
        if ($category) {
            $this->categoryModel->destroyCategory($id);
        }
        header('location: ' . BASE_URL_ADMIN . '?act=categorys');
        exit();
    }
}
