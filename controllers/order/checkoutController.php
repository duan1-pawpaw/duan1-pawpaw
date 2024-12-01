<?php
class checkoutController
{
    public $checkoutModel;

    public function __construct()
    {
        $this->checkoutModel = new checkoutModel();
    }

    public function checkout()
    {
        $id = $_GET['id_san_pham'];
        // var_dump($id);die;
        $so_luong = 2;
        $detailPet = $this->checkoutModel->detailPet($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form
            $data = [
                'ma_don_hang' => "HL-" . rand(10000,99999),
                'tai_khoan_id' => $_POST['tai_khoan_id'] ?? '',
                'ten_nguoi_nhan' => $_POST["ten_nguoi_nhan"] ?? '',
                'email_nguoi_nhan' => $_POST["email_nguoi_nhan"] ?? '',
                'sdt_nguoi_nhan' => $_POST["sdt_nguoi_nhan"] ?? '',
                'ghi_chu' => $_POST["ghi_chu"] ?? '',
                'dia_chi_nguoi_nhan' =>  $_POST["dia_chi_nguoi_nhan"] . ', ' .  $_POST['ten_phuong'] . ', ' . $_POST['ten_quan']. ', ' .  $_POST['ten_tinh'],
                'tong_tien' => $_POST['tong_tien'],
                'phuong_thuc_thanh_toan' => $_POST["phuong_thuc_thanh_toan"] ?? '',
                'trang_thai' => 1,
                'san_pham_id' => $_GET['id_san_pham'],
                'so_luong' => $_POST['so_luong'],
                'don_gia' => $_POST['don_gia'],
            ];
            $errors = [];
// var_dump($data);die;
            if (empty($data['ten_nguoi_nhan'])) {
                $errors['ten_nguoi_nhan'] = 'Họ tên không được để trống';
            }

            if (empty($data['email_nguoi_nhan'])) {
                $errors['email_nguoi_nhan'] = 'Email không được để trống';
            }

            if (empty($data['sdt_nguoi_nhan'])) {
                $errors['sdt_nguoi_nhan'] = 'Số điện thoại không được để trống';
            }

            if (empty($_POST['ten_phuong'] && $_POST['ten_quan'] && $_POST['ten_tinh'])) {
                $errors['APIAddress'] = 'Địa chỉ không được để trống';
            }
            if (empty($data['phuong_thuc_thanh_toan'])) {
                $errors['phuong_thuc_thanh_toan'] = 'Phương thức thanh toán không được để trống';
            }

            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                header("Location: " . BASE_URL . '?act=checkout&id_san_pham=' . $data['san_pham_id']);
                exit();
            }

            // var_dump($data);die;
            // Kiểm tra phương thức thanh toán
            if ($data['phuong_thuc_thanh_toan'] == 2) { // VNPay
                $vnp_Returnurl = "http://localhost:81/personal_product/?act=thanks";
                $vnpUrl = $this->createVNPayUrl($data, $vnp_Returnurl);
                // var_dump($vnpUrl);die;
                // Lưu thông tin tạm thời vào session
                $_SESSION['order_data'] = $data;

                // Chuyển hướng đến VNPay
                header('Location: ' . $vnpUrl);
                exit();
            } else {
                // Thanh toán COD, lưu vào DB
                $don_hang_id = $this->checkoutModel->buy_product($data['ma_don_hang'], $data['tai_khoan_id'], $data['ten_nguoi_nhan'], $data['email_nguoi_nhan'], $data['sdt_nguoi_nhan'], $data['dia_chi_nguoi_nhan'], $data['tong_tien'], $data['ghi_chu'], $data['phuong_thuc_thanh_toan']);
                $this->checkoutModel->addDetailDonHang(
                    $don_hang_id['id'],
                    $data['san_pham_id'],
                    $data['don_gia'],
                    $data['so_luong'],
                    $data['tong_tien'],
                );
            }
        }
        require_once './views/order/checkout.php';
    }

    public function handleVNPayResponse()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $responseData = $_GET;
            // var_dump($responseData);
            // die;
            $isVerified = $this->verifyVNPayResponse($responseData);
            // var_dump($isVerified);
            // die;
            if ($isVerified && $responseData['vnp_ResponseCode'] === '00') {
                // Lưu thông tin đơn hàng sau khi thanh toán thành công
                $don_hang_id = $this->checkoutModel->buy_product($_GET['vnp_TxnRef'], $_SESSION['order_data']['tai_khoan_id'], $_SESSION['order_data']['ten_nguoi_nhan'], $_SESSION['order_data']['email_nguoi_nhan'], $_SESSION['order_data']['sdt_nguoi_nhan'], $_SESSION['order_data']['dia_chi_nguoi_nhan'], $_SESSION['order_data']['tong_tien'], $_SESSION['order_data']['ghi_chu'], $_SESSION['order_data']['phuong_thuc_thanh_toan'],);
                $this->checkoutModel->addDetailDonHang(
                    $don_hang_id['id'],
                    $_SESSION['order_data']['san_pham_id'],
                    $_SESSION['order_data']['don_gia'],
                    $_SESSION['order_data']['so_luong'],
                    $_SESSION['order_data']['tong_tien'],
                );
                header('Location: ' . BASE_URL . '?act=donHang&id_don_hang=' . $don_hang_id['id']);
                echo "Thanh toán thành công!";
            } else {
                echo "Thanh toán thất bại hoặc bị hủy!";
            }
        }
    }

    public function createVNPayUrl($data, $vnp_Returnurl)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $vnp_TmnCode = "QPXWR5AA"; //Mã định danh merchant kết nối (Terminal Id)
        $vnp_HashSecret = "QIHQDAWOX1AH1P0CZ96RBWLLB00N3NZE"; //Secret key
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
        $apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
        //Config input format
        //Expire
        $startTime = date("YmdHis");
        $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));

        $vnp_TxnRef = "HL-" .  rand(1, 10000); //Mã giao dịch thanh toán tham chiếu của merchant
        $vnp_Amount = $data['tong_tien'] *  100; // Số tiền thanh toán
        $vnp_Locale = 'vn'; //Ngôn ngữ chuyển hướng thanh toán
        $vnp_BankCode = 'NCB'; //Mã phương thức thanh toán
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => "Thanh toan GD:",
            "vnp_OrderType" => "other",
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
            // "vnp_ExpireDate" => $expire
        );

        // Nếu có mã ngân hàng
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        // Sắp xếp mảng theo thứ tự key
        ksort($inputData);
        $query = "";
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            $hashdata .= urlencode($key) . "=" . urlencode($value) . '&';
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $query = rtrim($query, '&');
        $hashdata = rtrim($hashdata, '&');

        // Tạo vnp_SecureHash
        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
        $vnp_Url = $vnp_Url . "?" . $query . '&vnp_SecureHash=' . $vnpSecureHash;

        return $vnp_Url; // Trả về URL thanh toán

    }

    public function verifyVNPayResponse($responseData)
    {
        $vnp_HashSecret = "QIHQDAWOX1AH1P0CZ96RBWLLB00N3NZE"; // Secret Key
        $inputData = array();

        // Loại bỏ vnp_SecureHash khỏi danh sách tham số
        foreach ($responseData as $key => $value) {
            if (substr($key, 0, 4) === "vnp_" && $key !== "vnp_SecureHash") {
                $inputData[$key] = $value;
            }
        }

        // Sắp xếp tham số theo key tăng dần
        ksort($inputData);
        $hashData = "";
        foreach ($inputData as $key => $value) {
            $hashData .= urlencode($key) . "=" . urlencode($value) . "&";
        }
        $hashData = rtrim($hashData, '&'); // Xóa dấu `&` cuối cùng

        // Tạo SecureHash từ dữ liệu
        $calculatedHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        // So sánh chữ ký
        return $calculatedHash === $responseData['vnp_SecureHash'];
    }
}
