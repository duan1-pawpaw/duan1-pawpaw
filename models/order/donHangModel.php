<?php
class donHangModel
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getDetailDonHang($id)
    {
        try {
            // $sql = 'SELECT * FROM don_hangs WHERE id = :id';
            // Truy vấn SQL để lấy chi tiết đơn hàng
            $sql = 'SELECT don_hangs.*, 
                           trang_thai_don_hangs.ten_trang_thai, 
                           tai_khoans.ho_ten, 
                           tai_khoans.email, 
                           tai_khoans.so_dien_thoai, 
                           phuong_thuc_thanh_toans.ten_phuong_thuc
                    FROM don_hangs
                    INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
                    INNER JOIN tai_khoans ON don_hangs.tai_khoan_id = tai_khoans.id
                    INNER JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id
                    WHERE don_hangs.id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function getSPDonHang($id)
    {
        try {
            $sql = 'SELECT don_hangs.*, chi_tiet_don_hangs.*, san_phams.ten_san_pham 
                FROM don_hangs
                INNER JOIN chi_tiet_don_hangs ON don_hangs.id = chi_tiet_don_hangs.don_hang_id
                INNER JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
                WHERE don_hangs.id = :id ';
            // var_dump($sql);die;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function getAllTrangThaiDonHang()
    {
        try {
            $sql = 'SELECT * FROM trang_thai_don_hangs';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function orderOfUser($tai_khoan_id)
    {
        try {
            $sql = "SELECT don_hangs.*, 
                           trang_thai_don_hangs.ten_trang_thai, 
                           tai_khoans.ho_ten, 
                           tai_khoans.email, 
                           tai_khoans.so_dien_thoai, 
                           phuong_thuc_thanh_toans.ten_phuong_thuc
                    FROM don_hangs
                    INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
                    INNER JOIN tai_khoans ON don_hangs.tai_khoan_id = tai_khoans.id
                    INNER JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id
                    WHERE tai_khoan_id = :tai_khoan_id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tai_khoan_id' => $tai_khoan_id,
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'lỗi' . $e;
        }
    }

    public function produtcOfOrder($don_hang_id)
    {
        try {
            $sql = 'SELECT don_hangs.*, trang_thai_don_hangs.ten_trang_thai
                    FROM don_hangs
                    INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
                    WHERE don_hangs.id = :don_hang_id;';
            // var_dump($sql);die;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':don_hang_id' => $don_hang_id,
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function productOfDetailOrder($don_hang_id) {
        try {
            $sql = 'SELECT chi_tiet_don_hangs.*, san_phams.ten_san_pham, san_phams.hinh_anh, san_phams.gia_san_pham, san_phams.danh_muc_id, danh_mucs.ten_danh_muc
                    FROM chi_tiet_don_hangs
                    INNER JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
                    INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                    WHERE chi_tiet_don_hangs.don_hang_id = :don_hang_id
                    ORDER BY chi_tiet_don_hangs.id DESC;';
            // var_dump($sql);die;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':don_hang_id' => $don_hang_id,
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
}
