<?php

class User
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getByIdUser($id)
    {
        try {
            $sql = 'SELECT tai_khoans .*, chuc_vus.ten_chuc_vu
                    FROM tai_khoans
                    INNER JOIN chuc_vus ON chuc_vus.id = tai_khoans.chuc_vu_id
                    WHERE tai_khoans.id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
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

    // // Khách hàng
    public function getAllUser($chuc_vu_id)
    {
        try {
            $sql = 'SELECT * FROM tai_khoans 
            WHERE chuc_vu_id = :chuc_vu_id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':chuc_vu_id' => $chuc_vu_id]);

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function updateUser($id, $ho_ten, $ngay_sinh, $email, $so_dien_thoai, $gioi_tinh, $dia_chi, $trang_thai)
    {
        try {
            // var_dump($id);die;
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
                ':id' => $id,
                ':ho_ten' => $ho_ten,
                ':ngay_sinh' => $ngay_sinh,
                ':email' => $email,
                ':so_dien_thoai' => $so_dien_thoai,
                ':gioi_tinh' => $gioi_tinh,
                ':dia_chi' => $dia_chi,
                ':trang_thai' => $trang_thai,
            ]);

            // Lấy id đơn hàng vừa thêm
            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function deleteUser($id)
    {
        try {
            $sql = "DELETE FROM tai_khoans WHERE id = :id";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function userFromEmail($email)
    {
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE email = :email';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':email' => $email
            ]);

            return $stmt->fetch();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function updateProfile($id, $ho_ten, $anh_dai_dien, $ngay_sinh, $email, $so_dien_thoai, $gioi_tinh, $dia_chi, $trang_thai)
    {
        try {
            // var_dump($email);die;
            $sql = 'UPDATE tai_khoans SET
            ho_ten = :ho_ten,
            anh_dai_dien = :anh_dai_dien,
            ngay_sinh = :ngay_sinh,
            so_dien_thoai = :so_dien_thoai,
            gioi_tinh = :gioi_tinh,
            dia_chi = :dia_chi,
            trang_thai = :trang_thai,
            email = :email            
            WHERE id = :id';
            // var_dump($sql);die;

            $stmt = $this->conn->prepare($sql);
            // var_dump($stmt);die;

            $stmt->execute([
                ':id' => $id,
                ':ho_ten' => $ho_ten,
                ':anh_dai_dien' => $anh_dai_dien,
                ':ngay_sinh' => $ngay_sinh,
                ':email' => $email,
                ':so_dien_thoai' => $so_dien_thoai,
                ':gioi_tinh' => $gioi_tinh,
                ':dia_chi' => $dia_chi,
                ':trang_thai' => $trang_thai,
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
