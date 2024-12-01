<?php

class ProfileController
{
    public $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }
    public function profileShow()
    {
        $id_user = $_SESSION['user']['id'];

        $user = $this->userModel->getByIdUser($id_user);
        // var_dump($user);die;

        require_once './Views/users/profile/show.php';
    }

    public function profileFormUpdate()
    {
        $id_user = $_SESSION['user']['id'];
        // var_dump($id_user);die;
        $user = $this->userModel->abc($id_user);
        // var_dump($user);die;
        if ($user) {
            require_once './Views/users/profile/update.php';
            deleteSessionError();
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=show-profile');
            exit();
        }
    }

    public function profileUpdate()
    {
        // Kiểm tra xem dữ liệu có phải đc submit lên không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu
            $id_user = $_SESSION['user']['id'];
            $ho_ten = $_POST['ho_ten'] ?? '';
            $ngay_sinh = !empty($_POST['ngay_sinh']) ? date('Y-m-d', strtotime($_POST['ngay_sinh'])) : null;
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? null;
            $gioi_tinh = $_POST['gioi_tinh'] ?? null;
            $dia_chi = $_POST['dia_chi'] ?? null;
            $trang_thai = $_POST['trang_thai'] ?? '';
            // var_dump($ngay_sinh);die;

            // Tạo 1 mảng trống để chứa dữ liệu
            $errors = [];

            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên người dùng không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email người dùng không được để trống';
            }
            if (empty($ngay_sinh)) {
                $errors['ngay_sinh'] = 'Ngày sinh người dùng không được để trống';
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

                $this->userModel->updateProfile(
                    $id_user,
                    $ho_ten,
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
                header('location: ' . BASE_URL_ADMIN . '?act=form-update-profile');
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
                header('location: ' . BASE_URL_ADMIN . '?act=form-update-profile');
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

            $user = $this->userModel->abc($id_user);
            // var_dump($user);die;
            $checkPass = password_verify($old_pass, $user['mat_khau']);

            // Tạo 1 mảng trống để chứa dữ liệu
            $errors = [];

            if (empty($old_pass)) {
                $errors['old_pass'] = 'Vui lòng nhập mật khẩu cũ';
            } elseif (!$checkPass) {
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
                $hashPass = password_hash($new_pass, PASSWORD_BCRYPT);

                $status = $this->userModel->resetPassword($user['id'], $hashPass);
                // var_dump(status);die;
                if ($status) {
                    $_SESSION['password'] = "Đã đổi mật khẩu thành công";
                    header("location: " . BASE_URL_ADMIN . '?act=form-update-profile');
                    exit();
                }
            } else {
                $_SESSION['error'] = $errors;
                $_SESSION['old_data'] = $_POST;
                header('location: ' . BASE_URL_ADMIN . '?act=form-update-profile');
                exit();
            }
        }
    }
}
