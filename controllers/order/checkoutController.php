<?php
class checkoutController
{
    public $checkoutModel;
    public $cartModel;

    public function __construct()
    {
        $this->checkoutModel = new checkoutModel();
        $this->cartModel = new Cart();
    }
    public function Fromcheckout()
    {
        $tong_tien = $_POST['tong_gio_hang'] ?? $_SESSION['tong_tien'] ?? $_POST['tong_tien'] ?? $_GET['tong_tien'];
        // var_dump($tong_tien);die;
        
        // var_dump($_POST);die;
        // $check_soLuong = $this->checkoutModel->check_soLuongTonKho();    
        $cart = $this->cartModel->getByIdCart($_SESSION['user']['id']);
        if (!$cart) {
            $cartId = $this->cartModel->createCart($_SESSION['user']['id']);
            $cart = ['id' => $cartId];
            $chiTietGioHang = $this->cartModel->getDetailGioHang($cart['id']);
        } else {
            $chiTietGioHang = $this->cartModel->getDetailGioHang($cart['id']);
        }
        require_once('./views/order/checkout2.php');
    }

    public function voucher()
    {
        // $tong_tien = $_POST['tong_gio_hang'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $totalPrice = $_POST['tong_gio_hang'];
            // $formData = $_POST;
            // var_dump($formData);die;
            // Lấy dữ liệu từ form
            // var_dump($_POST);die;
            if (isset($_POST['apply_Voucher'])) {
                $code_Voucher = $_POST['code_Voucher'];

                // var_dump($totalPrice);die;
                // die;
                // Gọi hàm applyDiscount
                $result = $this->applyDiscount($code_Voucher, $totalPrice);
                // var_dump($result);die;
                $_SESSION['voucher_message'] = $result['errors']['code_Voucher'];
                // Kiểm tra nếu kết quả là thông báo giảm giá thành công
                if (isset($result['errors']['code_Voucher']) && strpos($result['errors']['code_Voucher'], 'Giảm giá thành công') !== false) {
                    $totalPrice = $result['totalPrice'];
                    $_SESSION['tong_tien'] = $totalPrice;
                    var_dump($totalPrice);
                    // die;
                } else {
                    $totalPrice = $result['totalPrice'];
                    $_SESSION['tong_tien'] = $totalPrice;
                    // var_dump($totalPrice);die;
                }
            }
            header('Location: ' . BASE_URL . '?act=Fromcheckout');
            exit();
        }
    }
    public function checkout()
    {
        ob_start();
        // $id = $_GET['id_san_pham'];
        // // var_dump($id);die;
        // $detailPet = $this->checkoutModel->detailPet($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [
                'ma_don_hang' => "HL-" . rand(10000, 99999),
                'tai_khoan_id' => $_SESSION['user']['id'] ?? '',
                'ten_nguoi_nhan' => $_POST["ten_nguoi_nhan"] ?? '',
                'email_nguoi_nhan' => $_POST["email_nguoi_nhan"] ?? '',
                'sdt_nguoi_nhan' => $_POST["sdt_nguoi_nhan"] ?? '',
                'ghi_chu' => $_POST["ghi_chu"] ?? '',
                'dia_chi_nguoi_nhan' =>  $_POST["dia_chi_nguoi_nhan"] . ', ' .  $_POST['ten_phuong'] . ', ' . $_POST['ten_quan'] . ', ' .  $_POST['ten_tinh'],
                'tong_tien' => $_POST['tong_tien'],
                'phuong_thuc_thanh_toan' => $_POST["phuong_thuc_thanh_toan"] ?? '',
                'san_pham_list' => $_POST['san_pham'],
            ];

            $errors = [];
            if ($_POST['confirmOrder'] != 'on') {
                $errors['confirmOrder'] = 'Bạn phải xác nhận trước khi đặt hàng ';
            }

            // var_dump($data['san_pham_list']);die;
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
            // var_dump($errors);die;
            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                header("Location: " . BASE_URL . '?act=Fromcheckout&tong_tien=' . $data['tong_tien']);
                exit();
            }


            // var_dump($data);die;
            // Kiểm tra phương thức thanh toán
            if ($data['phuong_thuc_thanh_toan'] == 2) { // VNPay
                $vnp_Returnurl = "http://localhost:81/duan1-pawpaw/duan1-pawpaw/?act=thanks";
                $vnpUrl = $this->createVNPayUrl($data, $vnp_Returnurl);
                // var_dump($vnpUrl);die;
                // Lưu thông tin tạm thời vào session
                $_SESSION['order_data'] = $data;

                // Chuyển hướng đến VNPay
                header('Location: ' . $vnpUrl);
                exit();
            } else {
                // Thanh toán COD, lưu vào DB
                // var_dump(123);die;
                if (
                    $don_hang_id = $this->checkoutModel->buy_product($data['ma_don_hang'], $data['tai_khoan_id'], $data['ten_nguoi_nhan'], $data['email_nguoi_nhan'], $data['sdt_nguoi_nhan'], $data['dia_chi_nguoi_nhan'], $data['tong_tien'], $data['ghi_chu'], $data['phuong_thuc_thanh_toan'])
                ) {
                    // var_dump($don_hang_id);die;
                    // Lưu chi tiết sản phẩm vào cơ sở dữ liệu
                    $detail = $this->checkoutModel->addDetailDonHang(
                        $don_hang_id['id'],
                        $data['san_pham_list']
                    );
                    // var_dump($detail);die;
                    header('Location: ' . BASE_URL . '?act=order&vnp_TxnRef=' . $data['ma_don_hang'] . '&id_don_hang=' . $don_hang_id['id']);
                    exit();
                } else {
                    header('Location: ' . BASE_URL . '?act=carts');
                    exit();
                }
            }
        }
    }

    public function applyDiscount($code_Voucher, $totalPrice)
    {
        // Kiểm tra mã giảm giá từ model
        $_SESSION['total_price'] = $totalPrice;
        // var_dump($totalPrice);die;
        $discount = $this->checkoutModel->check_voucher($code_Voucher);
        // var_dump($discount);die;
        if (!isset($_SESSION['used_vouchers'])) {
            $_SESSION['used_vouchers'] = [];
        }
        $errors = [];
        $_SESSION['discount'] = $_SESSION['total_price'];
        // Kiểm tra xem mã đã được sử dụng chưa
        if (in_array($code_Voucher, $_SESSION['used_vouchers'])) {
            $totalPrice = $_SESSION['discount'];
            return [
                'totalPrice' => $totalPrice,
                'errors' => ['code_Voucher' => "Mã giảm giá này đã được sử dụng trước đó!"]
            ];
        }
        if ($discount) {
            // Tính toán số tiền giảm giá
            // var_dump($discount['gia_tri']);die;
            $discount_amount = ($totalPrice * $discount['gia_tri']) / 100;
            $totalPrice -= $discount_amount; // Cập nhật tổng tiền sau khi giảm giá
            $_SESSION['used_vouchers'][] = $code_Voucher;
            $_SESSION['discount'] = $totalPrice;
            return [
                'totalPrice' => $_SESSION['discount'],
                'errors' => ['code_Voucher' => "Giảm giá thành công! Bạn đã được giảm " . number_format($discount_amount) . " VND."]
            ];
        } else if (!$discount) {
            $totalPrice = isset($_SESSION['discount']) ? $_SESSION['discount'] : $totalPrice;
            return [
                'totalPrice' => $totalPrice,
                'errors' => ['code_Voucher' => "Mã giảm giá không hợp lệ!"]
            ];
        }
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
            if ($isVerified && $responseData['vnp_ResponseCode'] == '00') {
                // Lưu thông tin đơn hàng sau khi thanh toán thành công
                // var_dump(1234550);die;
                if (
                    $don_hang_id = $this->checkoutModel->buy_product($_GET['vnp_TxnRef'], $_SESSION['order_data']['tai_khoan_id'], $_SESSION['order_data']['ten_nguoi_nhan'], $_SESSION['order_data']['email_nguoi_nhan'], $_SESSION['order_data']['sdt_nguoi_nhan'], $_SESSION['order_data']['dia_chi_nguoi_nhan'], $_SESSION['order_data']['tong_tien'], $_SESSION['order_data']['ghi_chu'], $_SESSION['order_data']['phuong_thuc_thanh_toan'])
                ) {
                    $detail = $this->checkoutModel->addDetailDonHang(
                        $don_hang_id['id'],
                        $_SESSION['order_data']['san_pham_list']
                    );
                    header('Location: ' . BASE_URL . '?act=order&id_don_hang=' . $don_hang_id['id']);
                    echo "Thanh toán thành công!";
                } else {
                    echo "Thanh toán thất bại!";
                }
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
