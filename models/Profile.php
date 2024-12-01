<?php

class Profile
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getByIdUser($id)
    {
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return $stmt->fetch();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function userFromEmail($id)
    {
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return $stmt->fetch();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function resetPassword($id, $mat_khau)
    {
        try {
            // var_dump($id);die;
            $sql = 'UPDATE tai_khoans 
                    SET
                        mat_khau = :mat_khau
                    WHERE id = :id';
            // var_dump($sql);die;

            $stmt = $this->conn->prepare($sql);

            // var_dump($stmt);die;
            $stmt->execute([
                ':mat_khau' => $mat_khau,
                ':id' => $id
            ]);

            // Lấy id vừa thêm
            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function updateProfile($id, $ho_ten, $ngay_sinh, $email, $so_dien_thoai, $gioi_tinh, $dia_chi, $trang_thai)
    {
        try {
            // var_dump($email);die;
            $sql = 'UPDATE tai_khoans SET
            ho_ten = :ho_ten,
            ngay_sinh = :ngay_sinh,
            email = :email,
            so_dien_thoai = :so_dien_thoai,
            gioi_tinh = :gioi_tinh,
            dia_chi = :dia_chi,
            trang_thai = :trang_thai          
            WHERE id = :id';
            // var_dump($sql);die;

            $stmt = $this->conn->prepare($sql);
            // var_dump($stmt);die;

            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':ngay_sinh' => $ngay_sinh,
                ':email' => $email,
                ':so_dien_thoai' => $so_dien_thoai,
                ':gioi_tinh' => $gioi_tinh,
                ':dia_chi' => $dia_chi,
                ':trang_thai' => $trang_thai,
                ':id' => $id
            ]);

            // Lấy id đơn hàng vừa thêm
            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    // Hủy kết nối CSDL
    public function __destruct()
    {
        $this->conn = null;
    }
}
