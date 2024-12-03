<?php
class registerModel
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function register($ho_ten, $email, $mat_khau) {
        try {
            $chuc_vu_id = 3;
            $trang_thai = 0;
            $ngay_dang_ky = date('Y-m-d');
            $ma_xac_thuc = rand(100000, 999999);
            $sql = 'INSERT INTO tai_khoans (ho_ten, email, mat_khau, ngay_dang_ky, trang_thai, chuc_vu_id, ma_xac_thuc)
                    VALUE (:ho_ten, :email, :mat_khau, :ngay_dang_ky, :trang_thai, :chuc_vu_id, :ma_xac_thuc)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':mat_khau' => $mat_khau,
                ':trang_thai' => $trang_thai,
                ':ngay_dang_ky' => $ngay_dang_ky,
                ':chuc_vu_id' => $chuc_vu_id,
                ':ma_xac_thuc' => $ma_xac_thuc,
            ]);
            return $ma_xac_thuc;
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
            flush();
        }
    }

    public function checkEmailExist($email) {
        try {
            // Truy vấn để kiểm tra email đã tồn tại trong cơ sở dữ liệu chưa
            $sql = "SELECT COUNT(*) FROM tai_khoans WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':email' => $email]);
            
            // Lấy số lượng kết quả
            $count = $stmt->fetchColumn();
            // var_dump($count);die;
            // Nếu số lượng kết quả > 0, tức là email đã tồn tại
            return $count > 0;
            
        } catch (PDOException $th) {
            // Xử lý lỗi PDOException nếu có
            echo "Lỗi: " . $th->getMessage();
            return false; 
        }
    }

    public function comfirm_register($ma_xac_thuc) {
        try {
                // Kiểm tra mã xác thực
                $sql = "SELECT * FROM tai_khoans WHERE ma_xac_thuc = :ma_xac_thuc";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':ma_xac_thuc' => $ma_xac_thuc]);
                $user = $stmt->fetch();
                if ($user) {
                    // Cập nhật trạng thái người dùng đã xác thực
                    $updateSql = "UPDATE tai_khoans SET trang_thai = 1, so_lan_xac_thuc = 1 WHERE ma_xac_thuc = :ma_xac_thuc";
                    $updateStmt = $this->conn->prepare($updateSql);
                    $updateStmt->execute([':ma_xac_thuc' => $ma_xac_thuc]);
        
                    return true;
                }
        
                return false;
        }  catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
        }
    }

    public function login($email, $mat_khau){
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE email = :email AND mat_khau = :mat_khau';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':email' => $email,
                ':mat_khau' => $mat_khau,
            ]);
            return $stmt->fetchAll();
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
        }
    }

    public function getAccountByEmail($email) {
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE email = :email';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':email' => $email]);
            return $stmt->fetch();
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
        }
    }

    public function getByEmailUser($email)
    {
        try {
            $sql = 'SELECT tai_khoans .*, chuc_vus.ten_chuc_vu
                    FROM tai_khoans
                    INNER JOIN chuc_vus ON chuc_vus.id = tai_khoans.chuc_vu_id
                    WHERE tai_khoans.email = :email';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':email' => $email
            ]);

            return $stmt->fetch();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function resetPassword($email, $mat_khau)
    {
        try {
            // var_dump($email);die;
            $sql = 'UPDATE tai_khoans 
                    SET
                        mat_khau = :mat_khau
                    WHERE email = :email';
            // var_dump($sql);die;

            $stmt = $this->conn->prepare($sql);

            // var_dump($stmt);die;
            $stmt->execute([
                ':mat_khau' => $mat_khau,
                ':email' => $email
            ]);

            // Lấy id vừa thêm
            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
