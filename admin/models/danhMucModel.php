<?php

class Category
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    // select danh sách Category
    public function getAllCategory()
    {
    try {
        $sql = "SELECT * FROM danh_mucs";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    }
    // Thêm danh mục
    public function insertCategory($ten_danh_muc, $mo_ta)
    {
    try {
        $sql = 'INSERT INTO danh_mucs (ten_danh_muc, mo_ta)
                    VALUES (:ten_danh_muc, :mo_ta)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ten_danh_muc' => $ten_danh_muc,
                ':mo_ta' => $mo_ta
            ]);

            return true;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    }
    // lấy ra ID
    function getByIdCategory($id)
    {
        try {
            $sql = "SELECT * FROM danh_mucs WHERE id = :id";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return $stmt->fetch();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    // Sửa danh mục
    public function updateCategory($id, $ten_danh_muc, $mo_ta)
    {
    try {
        $sql = 'UPDATE danh_mucs 
            SET 
            ten_danh_muc = :ten_danh_muc,
            mo_ta = :mo_ta
            WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ten_danh_muc' => $ten_danh_muc,
                ':mo_ta' => $mo_ta,
                ':id' => $id
            ]);

            return true;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    }

    // Xóa danh mục
    public function destroyCategory($id)
    {
    try {
        $sql = "DELETE FROM danh_mucs WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            ':id' => $id
        ]);

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