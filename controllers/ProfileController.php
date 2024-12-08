<?php

class ProfileController
{
    public $profileModel;

    public function __construct()
    {
        $this->profileModel = new Profile();
    }

    public function profileFormUpdate()
    {
        $id_user = $_SESSION['user']['id'];
        // var_dump($id_user);die;
        $user = $this->profileModel->userFromEmail($id_user);
        // var_dump($user);die;
        if ($user) {
            require_once './views/profile/update.php';
            deleteSessionError();
        } else {
            header("Location: " . BASE_URL . '?act=show-profile');
            exit();
        }
    }

    public function profileUpdate()
    {
        // Kiểm tra xem dữ liệu có phải đc submit lên không
        $id_user = $_SESSION['user']['id'];
        // var_dump($id_user);die;
        $user = $this->profileModel->userFromEmail($id_user);
        $Old_file = $user['anh_dai_dien'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu
            $id_user = $_SESSION['user']['id'];
            $ho_ten = $_POST['ho_ten'] ?? '';
            $ngay_sinh = !empty($_POST['ngay_sinh']) ? date('Y-m-d', strtotime($_POST['ngay_sinh'])) : null;
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? null;
            $gioi_tinh = $_POST['gioi_tinh'] ?? null;
            $dia_chi = $_POST['dia_chi'] ?? null;
            // var_dump($ngay_sinh);die;
            // var_dump($_FILES['avata']['name']);die;
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

            // Tạo 1 mảng trống để chứa dữ liệu
            $errors = [];

            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên người dùng không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email người dùng không được để trống';
            }
            // Đảm bảo độ dài là 10
            if (strlen($so_dien_thoai) > 11) {
                $errors['so_dien_thoai'] = 'Số điện thoại phải có 10 số';
            }
            if (empty($gioi_tinh)) {
                $errors['gioi_tinh'] = 'Giới tính người dùng không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Vui lòng chọn trạng thái';
            }
            // Nếu không có lỗi, tiến hành thêm sản phẩm vào database
            if (empty($errors)) {
                // var_dump('Oke');die;

                $this->profileModel->updateProfile(
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
                header('location: ' . BASE_URL . '?act=form-update-profile');
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
                header('location: ' . BASE_URL . '?act=form-update-profile');
                exit();
            }
        }
    }
    public function passwordProfileUpdate()
    {
        $id_user = $_SESSION['user']['id'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu
            $old_pass = $_POST['old_pass'];
            $new_pass = $_POST['new_pass'];
            $confirm_pass = $_POST['confirm_pass'];

            $user = $this->profileModel->userFromEmail($id_user);
            // var_dump($user);die;
            $old_pass = md5($user['mat_khau']);
            $checkPass = $old_pass;

            // Tạo 1 mảng trống để chứa dữ liệu
            $errors = [];

            if (empty($old_pass)) {
                $errors['old_pass'] = 'Vui lòng nhập mật khẩu cũ';
            } elseif ($checkPass != $old_pass) {
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

                $status = $this->profileModel->resetPassword($user['id'], $hashPass);
                // var_dump(status);die;
                if ($status) {
                    $_SESSION['password'] = "Đã đổi mật khẩu thành công";
                    header("location: " . BASE_URL . '?act=form-update-profile');
                    exit();
                }
            } else {
                $_SESSION['error'] = $errors;
                $_SESSION['old_data'] = $_POST;
                header('location: ' . BASE_URL . '?act=form-update-profile');
                exit();
            }
        }
    }
}
