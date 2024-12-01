<?php

class Order
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllOrder()
    {
        try {
            $sql = 'SELECT don_hangs.*, trang_thai_don_hangs.ten_trang_thai
                        FROM don_hangs
                        INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
        }
    }

    public function getDetailOrder($id)
    {
        try {
            // var_dump($id);die;
            // $sql = 'SELECT don_hangs.*, 
            //             trang_thai_don_hangs.ten_trang_thai,
            //             tai_khoans.ho_ten,
            //             tai_khoans.email,
            //             tai_khoans.so_dien_thoai,
            //             phuong_thuc_thanh_toans.ten_phuong_thuc
            //         FROM don_hangs
            //         INNER JOIN tai_khoans ON don_hangs.tai_khoan_id = tai_khoans.id 
            //         INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id 
            //         INNER JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id
            //         WHERE don_hangs.id = :id ';
            $sql = 'SELECT don_hangs.*, 
               trang_thai_don_hangs.ten_trang_thai,
               tai_khoans.ho_ten,
               tai_khoans.email,
               tai_khoans.so_dien_thoai,
               phuong_thuc_thanh_toans.ten_phuong_thuc
        FROM don_hangs
        LEFT JOIN tai_khoans ON don_hangs.tai_khoan_id = tai_khoans.id 
        LEFT JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id 
        LEFT JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id
        WHERE don_hangs.id = :id ';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
        }
    }

    public function getProductOrder()
    {
        try {
            $sql = 'SELECT chi_tiet_don_hangs.*, san_phams.ten_san_pham 
                FROM chi_tiet_don_hangs
                INNER JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    
    public function getAllTrangThaiDonHang()
    {
        try {
            $sql = 'SELECT * FROM trang_thai_don_hangs ORDER BY id ASC';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function updateDonHang($id, $trang_thai_id)
    {
        try {
            $sql = 'UPDATE don_hangs SET trang_thai_id = :trang_thai_id WHERE id = :id ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':trang_thai_id' => $trang_thai_id,
                ':id' => $id
            ]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function getDonHangOfKhachHang($id)
    {
        try {
            $sql = 'SELECT don_hangs.*, trang_thai_don_hangs.ten_trang_thai 
                        FROM don_hangs
                        INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
                        WHERE don_hangs.tai_khoan_id = :id ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
            return null; // Hoặc xử lý ngoại lệ ở đây, ví dụ: throw $e;
        }
    }
    // Hủy kết nối CSDL
    public function __destruct()
    {
        $this->conn = null;
    }
}
