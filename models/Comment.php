<?php

class Comment
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function commentFromProduct($id)
    {
        try {
            $sql = 'SELECT binh_luans.*, tai_khoans.ho_ten
            FROM binh_luans
            INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
            WHERE binh_luans.san_pham_id = :id AND binh_luans.trang_thai = 1
            ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();
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