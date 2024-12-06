<?php

class UserController
{
    public $userModel;
    public $orderModel;
    public $productModel;
    public $commentModel;

    public function __construct()
    {
        $this->userModel = new User();
        $this->orderModel = new orderModel();
        $this->productModel = new Product();
        $this->commentModel = new binhLuanModel();
    }
    

    public function profileShow()
    {
        $id_user = $_SESSION['user']['id'];

        $user = $this->userModel->getByIdUser($id_user);
        $Old_file = $user['anh_dai_dien'];
        // var_dump($user['anh_dai_dien']);die;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu
            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $ngay_sinh = !empty($_POST['ngay_sinh']) ? date('Y-m-d', strtotime($_POST['ngay_sinh'])) : null;
            // var_dump($ngay_sinh);die;
            // $email = $_POST['email'] ?? null;
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? null;
            $gioi_tinh = $_POST['gioi_tinh'] ?? null;
            $dia_chi = $_POST['dia_chi'] ?? null;
            // $hinh_anh = $_FILES['avata']['name'];
            // var_dump($hinh_anh);die;
            if (empty($_FILES['avata']['name'])) {
                $file_thumb = $Old_file;
            } else {
                $anh_dai_dien = $_FILES['avata'];
                // var_dump($anh_dai_dien);die;
                //lưu hình ảnh vào 
                $file_thumb = uploadFile($anh_dai_dien, './uploads/');
                // nếu có ảnh mới thì xóa ảnh cũ
                if (!empty($Old_file)) {
                    deleteFile($Old_file);
                }
            }
            // Đảm bảo độ dài là 10
            if (strlen($so_dien_thoai) > 11) {
                $errors['so_dien_thoai'] = 'Số điện thoại phải có 10 số';
            }
            // Nếu không có lỗi, tiến hành thêm sản phẩm vào database
            if (empty($errors)) {
                // var_dump('Oke');die;

                $this->userModel->updateProfile(
                    $id_user,
                    $ho_ten,
                    $file_thumb,
                    $ngay_sinh,
                    $email,
                    $so_dien_thoai,
                    $gioi_tinh,
                    $dia_chi
                );
                // var_dump($update);die;

                // Sau khi thêm sản phẩm thành công
                $_SESSION['success'] = 'Cập nhật thành công.';
                header('location: ' . BASE_URL_ADMIN . '?act=users-admin');
                exit();
            } else {
                // Trả về form và lỗi
                $_SESSION['error'] = $errors;
                $_SESSION['old_data'] = [
                    'ho_ten' => $ho_ten,
                    'ngay_sinh' => $ngay_sinh,
                    'email' => $email,
                    'so_dien_thoai' => $so_dien_thoai,
                    'gioi_tinh' => $gioi_tinh,
                    'dia_chi' => $dia_chi
                ];
                header('location: ' . BASE_URL_ADMIN . '?act=users-admin');
                exit();
            }
        }
        require_once './Views/users/quanTri/profile.php';
    }

    public function changePasswordAdmin()
    {
        $id_user = $_SESSION['user']['id'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu
            $old_pass = $_POST['old_pass'];
            $new_pass = $_POST['new_pass'];
            $confirm_pass = $_POST['confirm_pass'];

            $user = $this->userModel->getByIdUser($id_user);
            $old_pass = md5($user['mat_khau']);
            $checkPass = $old_pass;
            // Tạo 1 mảng trống để chứa dữ liệu
            $errors = [];

            if (empty($old_pass)) {
                $errors['old_pass'] = 'Vui lòng nhập mật khẩu cũ';
            } elseif ($old_pass != $checkPass) {
                $errors['old_pass'] = 'Mật khẩu cũ không chính xác';
            }
            if (empty($new_pass)) {
                $errors['new_pass'] = 'Vui lòng nhập mật khẩu mới';
            }
            if (empty($confirm_pass)) {
                $errors['confirm_pass'] = 'Vui lòng điền trường dữ liệu này';
            } elseif ($new_pass !== $confirm_pass) {
                $errors['confirm_pass'] = 'Mật khẩu nhập lại không khớp';
            }
            // Nếu không có lỗi, tiến hành thêm sản phẩm vào database
            if (!$errors) {
                // var_dump('Oke');die;

                // Thực hiện đổi mật khẩu
                $hashPass = md5($new_pass);

                $status = $this->userModel->resetPassword($id_user, $hashPass);
                // var_dump(status);die;
                if ($status) {
                    $_SESSION['password'] = "Đã đổi mật khẩu thành công";
                    deleteSessionError();
                    header("location: " . BASE_URL_ADMIN . '?act=users-admin');
                    exit();
                }
            } else {
                // Trả về form và lỗi
                $_SESSION['error'] = $errors;
                $_SESSION['old_data'] = $_POST;
                deleteSessionError();
                header('location: ' . BASE_URL_ADMIN . '?act=users-admin');
                exit();
            }
        }
    }





    // Khách hàng
    public function userIndex()
    {
        $data = $this->userModel->getAllUser(3);
        require_once './Views/users/khachHang/list.php';
    }

    public function userUpdate()
    {
        ob_start();
        // Hiển thị form nhập
        $id = $_GET['id'] ?? null;
        $user = $this->userModel->getByIdUser($id);
        require_once './Views/users/khachHang/update.php';
        if ($user) {
            // Kiểm tra xem dữ liệu có phải đc submit lên không
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Lấy ra dữ liệu
                $ho_ten = $_POST['ho_ten'] ?? '';
                $ngay_sinh = !empty($_POST['ngay_sinh']) ? date('Y-m-d', strtotime($_POST['ngay_sinh'])) : null;
                $email = $_POST['email'] ?? '';
                $so_dien_thoai = $_POST['so_dien_thoai'] ?? null;
                $gioi_tinh = $_POST['gioi_tinh'] ?? '';
                $dia_chi = $_POST['dia_chi'] ?? null;
                $trang_thai = $_POST['trang_thai'] ?? '';
                $file_thumb = $user['anh_dai_dien'];
                // Tạo 1 mảng trống để chứa dữ liệu
                $errors = [];

                if (empty($ho_ten)) {
                    $errors['ho_ten'] = 'Tên người dùng không được để trống';
                }
                if (empty($email)) {
                    $errors['email'] = 'Email người dùng không được để trống';
                }
                // Nếu không có lỗi, tiến hành thêm sản phẩm vào database
                if (empty($errors)) {
                    // Nếu ko có lỗi thì tiến hành thêm pet
                    // var_dump('Oke');
                    $this->userModel->updateUser(
                        $id,
                        $ho_ten,
                        $file_thumb,
                        $ngay_sinh,
                        $email,
                        $so_dien_thoai,
                        $gioi_tinh,
                        $dia_chi,
                        $trang_thai
                    );
                    // var_dump($update);die;

                    // Sau khi thêm sản phẩm thành công
                    $_SESSION['success'] = 'Cập nhật thành công.';
                    header("location: " . BASE_URL_ADMIN . "?act=users-khachHang");
                    exit();
                } else {
                    // Trả về form và lỗi
                    $_SESSION['error'] = $errors;
                    $_SESSION['old_data'] = [
                        'ho_ten' => $ho_ten,
                        'ngay_sinh' => $ngay_sinh,
                        'email' => $email,
                        'so_dien_thoai' => $so_dien_thoai,
                        'gioi_tinh' => $gioi_tinh,
                        'dia_chi' => $dia_chi,
                        'trang_thai' => $trang_thai,
                    ];
                    header('location: ' . BASE_URL_ADMIN . '?act=update-user-khachHang&id=' . $id);
                    exit();
                }
            }
            deleteSessionError();
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=users-khachHang');
            exit();
        }
    }

    public function userShow()
    {
        $id = $_GET['id'] ?? null;

        $user = $this->userModel->getByIdUser($id);
        // var_dump($user);die;
        $listDonHang = $this->orderModel->getDonHangOfKhachHang($id);
        $listBinhLuan = $this->commentModel->getBinhLuanOfKhachHang($id);

        if ($user) {
            require_once './Views/users/khachHang/show.php';
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=users-khachHang');
            exit();
        }
    }

    // Xóa
    public function userDelete()
    {
        $id = $_GET['id'];
        $user = $this->userModel->getByIdUser($id);
        // var_dump($user);die;
        if ($user) {
            deleteFile($user['hinh_anh']);
            $this->userModel->deleteUser($id);
        }
        header('location: ' . BASE_URL_ADMIN . '?act=users-khachHang');
        exit();
    }
}
