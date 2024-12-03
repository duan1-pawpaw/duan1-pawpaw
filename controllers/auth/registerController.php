<?php
class registerController
{
    public $registerModel;
    public $danhMucSanPhamModel;

    public function __construct()
    {
        $this->registerModel = new registerModel();
        $this->danhMucSanPhamModel = new danhMucSanPhamModel();
    }

    // hàm này sẽ kiểm tra action khi người dùng submit form đăng ký
    public function handleRequest()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // var_dump($_POST['action']);die;  
            // nếu action là : register 
            if (isset($_POST['action']) && $_POST['action'] === 'register') {
                $this->registers();
            }
            // nếu action là : xác minh tài khoản 
            else if (isset($_POST['action']) && $_POST['action'] === 'comfirm_register') {
                $this->comfirm_registers();
            }
        }
    }

    public function registers()
    {
        if (empty($_POST['email'])) {
            require_once './views/auth/register.php';
            die;
        }
        $errors = [];
        $email = $_POST['email'];
        // Kiểm tra email có tồn tại không
        if ($this->registerModel->checkEmailExist($email)) {
            $errors['email'] = "Email đã tồn tại.";
            $_SESSION['errors'] = $errors;
            require_once './views/auth/register.php';
            die;
        }
        $ho_ten = $_POST['ho_ten'];
        $mat_khau = md5($_POST['mat_khau']);
        $xac_nhan_mat_khau = md5($_POST['xac_nhan_mat_khau']);

        if ($mat_khau != $xac_nhan_mat_khau) {
            $errors['xac_nhan_mat_khau'] = "Nhập lại mật khẩu không trùng khớp.";
            $_SESSION['errors'] = $errors;
            require_once './views/auth/register.php';
            die;
        }

        $ma_xac_thuc = $this->registerModel->register($ho_ten, $email, $mat_khau);
        // var_dump($ma_xac_thuc);die;
        if ($ma_xac_thuc) {
            $account = $this->registerModel->getAccountByEmail($email);
            if (!empty($account)) {
                $_SESSION['user'] = [
                    'id' => $account['id'],
                    'ho_ten' => $account['ho_ten'],
                    'email' => $account['email'],
                    'chuc_vu_id' => $account['chuc_vu_id'],
                    'trang_thai' => $account['trang_thai'],
                ];
            }
            $subject = 'Đăng Ký Tại PawPaw';
            $content = 'Vui lòng không chia sẽ mã này với bất kỳ ai. Mã xác thực của bạn là: ' . $ma_xac_thuc;
            sendMail($email, $subject, $content);

            // Chuyển đến view yêu cầu mã xác thực
            require_once './views/auth/comfirm_register.php';
            die;
        } else {
            $_SESSION['errors']['email'] = "Email đã tồn tại.";
            require_once './views/auth/register.php';
            die;
        }
    }



    public function comfirm_registers()
    {

        $ma_xac_thuc = isset($_POST['ma_xac_thuc']) ? $_POST['ma_xac_thuc'] : null;
        if ($this->registerModel->comfirm_register($ma_xac_thuc)) {
            if (isset($_SESSION['user'])) {
                $_SESSION['user']['trang_thai'] = 1; // active
            }
            header('location: ' . BASE_URL);
            exit();
            // Bạn có thể chuyển hướng hoặc cập nhật trạng thái tài khoản tại đây
        } else {
            $errors = [];
            $errors['ma_xac_thuc'] = 'Nhập Sai Mã Xác Thực!!';
            $_SESSION['errors'] = $errors;
            require_once './views/auth/comfirm_register.php';
            exit();
        }
    }

    public function logins()
    {
        // var_dump(123);die;
        if ($_SERVER['REQUEST_METHOD'] = 'POST') {
            $email = $_POST['email'];
            $mat_khau = $_POST['mat_khau'];
            // var_dump($_POST);die;
            $errors = [];
            $accounts = $this->registerModel->login($email, md5($mat_khau));
            // var_dump($accounts);die;
            if (empty($accounts)) {
                $errors['mat_khau'] = 'Email hoặc mật khẩu không chính xác';
            }
            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                header('location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }
            foreach ($accounts as $account) {
                if ($email = $account['email'] && md5($mat_khau) === $account['mat_khau']) {
                    $_SESSION['user'] = [
                        'id' => $account['id'],
                        'ho_ten' => $account['ho_ten'],
                        'email' => $account['email'],
                        'chuc_vu_id' => $account['chuc_vu_id'],
                        'trang_thai' => $account['trang_thai'],
                        'avata' => $account['anh_dai_dien'],
                    ];
                    // var_dump($_SESSION['user']);die;
                    if ($_SESSION['user']['chuc_vu_id'] === 3 && $_SESSION['user']['trang_thai'] == 1) {
                        header('location: ' . BASE_URL);
                        exit();
                    } else if ($_SESSION['user']['chuc_vu_id'] == 1 && $_SESSION['user']['trang_thai'] == 1) {
                        header('location: ' . BASE_URL_ADMIN);
                        exit();
                    }
                }
            }
        }
    }
    public function formResest()
    {
        require './views/auth/quenMatKhau.php';
    }
    public function resetPassword()
    {
        $email = $_POST['email'];
        $user = $this->registerModel->getByEmailUser($email);

        // Đặt password mặc định -123@123abc
        $mat_khau = ('123456');
        $check_email = $this->registerModel->checkEmailExist($email);
        if (!$check_email) {
            $errors['email'] = "Email không đã tồn tại.";
            $_SESSION['errors'] = $errors;
            require_once './views/auth/quenMatKhau.php';
            die;
        }
        $status = $this->registerModel->resetPassword($email, md5($mat_khau));
        // var_dump($status);die;
        $subject = 'Lấy Lại Mật Khẩu PawPaw';
        $content = 'Mật khẩu mới của bạn là:  ' . $mat_khau;
        sendMail($email, $subject, $content);
            if ($status && $user['chuc_vu_id'] == 3) {
                header("Location: " . BASE_URL . '?act=registers');
                exit();
            } else {
                var_dump('Lỗi khi reset tài khoản');
                die;
            }
    }
    public function logout()
    {
        deleteSession_user();
        header("location: " . BASE_URL . '?act=home');
        exit();
    }
}
