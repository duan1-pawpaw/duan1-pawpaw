<?php
class Product
{
    public $conn; // Khai báo phương thức

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getByIdProducts($id)
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            WHERE san_phams.id = :id';
            $stmt = $this->conn->prepare($sql);
            
            $stmt->execute([':id' => $id]);

            // var_dump($stmt);die;
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            flush();

        }
    }
    public function albumProduct($san_pham_id)
    {
        try {
            $sql = 'SELECT * FROM hinh_anh_san_phams WHERE san_pham_id = :san_pham_id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':san_pham_id' => $san_pham_id]);

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