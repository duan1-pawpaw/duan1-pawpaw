<?php

class binhLuanModel
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getByIdComment($id)
    {
        try {
            $sql = 'SELECT binh_luans.*, tai_khoans.ho_ten
                    FROM binh_luans
                    INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
                    WHERE binh_luans.san_pham_id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
            return null; // Hoặc xử lý ngoại lệ ở đây, ví dụ: throw $e;
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
    public function getBinhLuanOfKhachHang($id){
        try {
            $sql = 'SELECT binh_luans.*, san_phams.ten_san_pham 
                    FROM binh_luans
                    INNER JOIN san_phams ON binh_luans.san_pham_id = san_phams.id
                    WHERE binh_luans.tai_khoan_id = :id ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
            return null; // Hoặc xử lý ngoại lệ ở đây, ví dụ: throw $e;
        }
    }
    public function BinhLuan($id){
        try {
            $sql = 'SELECT * FROM binh_luans WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
            return null; // Hoặc xử lý ngoại lệ ở đây, ví dụ: throw $e;
        }
    }
    public function updateComment($id, $trang_thai) {
        try {
            $sql = "UPDATE binh_luans SET trang_thai = :trang_thai WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':trang_thai' => $trang_thai, ':id' => $id]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    // Hủy kết nối CSDL
    public function __destruct()
    {
        $this->conn = null;
    }
}
