<?php

class Cart
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    
    public function getByIdCart($id)
    {
        try {
            $sql = 'SELECT * FROM gio_hangs WHERE tai_khoan_id = :tai_khoan_id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':tai_khoan_id'=>$id]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lõi" . $e->getMessage();
        }
    }

    public function getDetailGioHang($id)
    {
        try {
            $sql = 'SELECT chi_tiet_gio_hangs.*, san_phams.ten_san_pham, san_phams.hinh_anh, san_phams.gia_san_pham, san_phams.gia_khuyen_mai, san_phams.do_tuoi, san_phams.gioi_tinh
            FROM chi_tiet_gio_hangs
            INNER JOIN san_phams ON chi_tiet_gio_hangs.san_pham_id = san_phams.id
            WHERE chi_tiet_gio_hangs.gio_hang_id = :gio_hang_id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':gio_hang_id'=>$id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lõi" . $e->getMessage();
        }
    }
    public function createCart($id)
    {
        try {
            $sql = 'INSERT INTO gio_hangs (tai_khoan_id) VALUES (:id)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id'=>$id]);

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "Lõi" . $e->getMessage();
        }
    }
    public function updateSoLuong($gio_hang_id, $san_pham_id, $so_luong)
    {
        try {
            // var_dump($gio_hang_id, $san_pham_id, $so_luong);die;
            $sql = 'UPDATE chi_tiet_gio_hangs 
                SET
                    so_luong = :so_luong
                WHERE id = :gio_hang_id AND  san_pham_id = :san_pham_id';
            // var_dump($sql);die;

            $stmt = $this->conn->prepare($sql);
            // var_dump($stmt);die;

            $stmt->execute([
                ':gio_hang_id' => $gio_hang_id,
                ':san_pham_id' => $san_pham_id,
                ':so_luong' => $so_luong
            ]);

            // Lấy id đơn hàng vừa thêm
            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
            flush();
        }
    }
    public function addDetailGioHang($gio_hang_id, $san_pham_id, $so_luong)
    {
        try {
            $sql = 'INSERT INTO chi_tiet_gio_hangs (gio_hang_id, san_pham_id, so_luong)
                    VALUES (:gio_hang_id, :san_pham_id, :so_luong)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':gio_hang_id' => $gio_hang_id,
                ':san_pham_id' => $san_pham_id,
                ':so_luong' => $so_luong
            ]);

            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function removeCart($id)
    {
        try {
            $sql = "DELETE FROM chi_tiet_gio_hangs WHERE id = :id ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return true;
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
            flush();
        }
    }
    // Hủy kết nối CSDL
    public function __destruct()
    {
        $this->conn = null;
    }
}