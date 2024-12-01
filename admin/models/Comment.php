<?php

class Comment
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getByIdComment($id)
    {
        try {
            $sql = 'SELECT * FROM binh_luans WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetch();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function statusComment($id, $trang_thai)
    {
        try {
            $sql = 'UPDATE binh_luans SET
            trang_thai = :trang_thai
            WHERE id = :id';
            // var_dump($sql);die;

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':trang_thai' => $trang_thai,
                ':id' => $id
            ]);

            // Lấy id sản phẩm vừa thêm
            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function commentFromProduct($id)
    {
        try {
            $sql = 'SELECT binh_luans.*, tai_khoans.ho_ten
            FROM binh_luans
            INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
            WHERE binh_luans.san_pham_id = :id
            ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function commentFromUser($id)
    {
        try {
            $sql = 'SELECT binh_luans.*, san_phams.ten_san_pham
            FROM binh_luans
            INNER JOIN san_phams ON binh_luans.san_pham_id = san_phams.id
            WHERE binh_luans.tai_khoan_id = :id
            ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }  

    public function getAllComment() {
        try {
            $sql = "SELECT binh_luans .*, tai_khoans.ho_ten, san_phams.ten_san_pham
                    FROM binh_luans 
                    JOIN san_phams ON  binh_luans.san_pham_id = san_phams.id
                    INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function updateComment($id, $trang_thai) {
        try {
            $sql = "UPDATE binh_luans SET trang_thai = :trang_thai WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':trang_thai' => $trang_thai, ':id' => $id]);
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