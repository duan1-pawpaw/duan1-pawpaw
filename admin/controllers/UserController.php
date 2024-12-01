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
        $this->orderModel = new Order();
        $this->productModel = new Product();
        $this->commentModel = new Comment();
    }
    public function resetPassword()
    {
        $id = $_GET['id'];
        $user = $this->userModel->getByIdUser($id);

        // Đặt password mặc định -123456789
        $mat_khau = password_hash('123456789', PASSWORD_BCRYPT);

        $status = $this->userModel->resetPassword($id, $mat_khau);
        // var_dump($status);die;

        if ($status && $user['chuc_vu_id'] == 3) {
            header("Location: " . BASE_URL_ADMIN . '?act=users');
            exit();
        } else {
            var_dump('Lỗi khi reset tài khoản');
            die;
        }
    }
    // Khách hàng
    public function userIndex()
    {
        $data = $this->userModel->getAllUser(3);

        require_once './Views/users/clients/list.php';
    }

    public function userUpdate()
    {
        // Hiển thị form nhập
        $id = $_GET['id'] ?? '';
        $user = $this->userModel->getByIdUser($id);
        if ($user) {
            require_once './Views/users/clients/update.php';
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
                if (empty($gioi_tinh)) {
                    $errors['gioi_tinh'] = 'Giới tính người dùng không được để trống';
                }
                if (empty($trang_thai)) {
                    $errors['trang_thai'] = 'Vui lòng chọn trạng thái';
                }
                // Nếu không có lỗi, tiến hành thêm sản phẩm vào database
                if (empty($errors)) {
                    // Nếu ko có lỗi thì tiến hành thêm pet
                    // var_dump('Oke');
                    $this->userModel->updateUser(
                        $id,
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
                    header("location: " . BASE_URL_ADMIN . "?act=users");
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
                    header('location: ' . BASE_URL_ADMIN . '?act=update-user&id=' . $id);
                    exit();
                }
            }
            deleteSessionError();
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=users');
            exit();
        }
    }

    public function userShow()
    {
        $id = $_GET['id'] ?? '';

        $user = $this->userModel->getByIdUser($id);
        // var_dump($user);die;
        $orders = $this->orderModel->getDonHangOfKhachHang($id);

        $comments = $this->commentModel->commentFromUser($id);

        if ($user) {
            require_once './Views/users/clients/show.php';
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=users');
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
        header('location: ' . BASE_URL_ADMIN . '?act=users');
        exit();
    }
}
