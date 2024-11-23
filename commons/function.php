<?php

// Kết nối CSDL qua PDO
function connectDB()
{
    // Kết nối CSDL
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);

        // cài đặt chế độ báo lỗi là xử lý ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
    }

}

function formartDate($date)
{
    return date("d-m-Y", strtotime($date));
}
function deleteSession_user()
{
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
        session_destroy();
        header("Location: " . BASE_URL);
        exit();
    }
}
function deleteSessionError()
{
	// Hủy sesion sau khi đã tải trang
	if (isset($_SESSION['old_data'])) {
		// Hủy session `old_data`
		unset($_SESSION['old_data']);
	}
	if (isset($_SESSION['error'])) {
		// Hủy session `error`
		unset($_SESSION['error']);
	}
}

function deleteFile($file){
    $pathDelete = PATH_ROOT . $file;
    if($pathDelete && file_exists($pathDelete)) {
        unlink($pathDelete);
    }
}

// Upload - Update album ảnh
function uploadFileAlbum($file, $folderUpload, $key) {
	// Kiểm tra kích thước tệp (giới hạn 2MB)
    // $maxSize = 2 * 1024 * 1024; // 2MB
    // if ($file['size'][$key] > $maxSize) {
    //     return null; // Kích thước tệp vượt quá giới hạn
    // }

    $pathStorage = $folderUpload . time() . $file['name'][$key];

    $from = $file['tmp_name'][$key];
    $to = PATH_ROOT . $pathStorage;

    if(move_uploaded_file($from, $to)){
        return $pathStorage;
    }
    return null;
}

// upload file ảnh 
function uploadFile($file, $folderUpload)
{
	// $file : thông tin file hình ảnh được upload
	// $folderUpload: Đường dẫn 
	// $file['name']: Tên file gốc mà người dùng đã upload.
	// // Kiểm tra nếu file không tồn tại
    // if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
    //     return null; // Không có tệp hoặc xảy ra lỗi
    // }

    // Kiểm tra kích thước tệp (giới hạn 2MB)
    $maxSize = 2 * 1024 * 1024; // 2MB
    if ($file['size'] > $maxSize) {
        return null; // Kích thước tệp vượt quá giới hạn
    }

    // Kiểm tra loại tệp
    $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    if (!in_array($file['type'], $allowedMimeTypes)) {
        return null; // Loại tệp không được phép
	}
	
	// Làm sạch tên tệp
	$fileName = preg_replace('/[^a-zA-Z0-9-_\.]/', '', basename($file['name']));
	// Đường dẫn đầy đủ
	$pathStorage = $folderUpload . time() . '_' . $fileName;
	$to = PATH_ROOT . $pathStorage;
	// $to: Đường dẫn cuối cùng

	$from = $file['tmp_name'];
	// $from: Đường dẫn tới file tạm thời

	// Di chuyển tệp
	if (move_uploaded_file($from, $to)) {
		return $pathStorage;  // Trả về đường dẫn lưu trữ
	}
	return null; // Nếu di chuyển thất bại
}



// hàm gửi mail tự động khi đăng ký tài khoản: PHP mailler
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($to, $subject, $content)
{


    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    $mail->CharSet = "UTF-8";

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'vuhailam2112@gmail.com';                     //SMTP username
        $mail->Password   = 'prte ckao rexp tayp';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('vuhailam2112@gmail.com', 'Siêu Thị Thú Cưng PawPaw');
        $mail->addAddress($to);
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $content;

        $mail->send();
        // echo 'Gửi thành công';
    } catch (Exception $e) {
        echo "Gửi masil thật bại. Mailer Error: {$mail->ErrorInfo}";
    }
}