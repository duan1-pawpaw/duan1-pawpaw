<?php
class Product_Description_Model {
    public $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    // Lấy chi tiết sản phẩm theo ID
    public function getProductById($san_pham_id) {
        try {
            $sql = "SELECT * FROM san_phams WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $san_pham_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
            return false;
        }
    }

    // Lấy bình luận theo ID sản phẩm
    public function getCommentsByProductId($san_pham_id) {
        try {
            $sql = "SELECT binh_luans.*, tai_khoans.ho_ten 
                    FROM binh_luans 
                    JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id 
                    WHERE binh_luans.san_pham_id = :san_pham_id 
                    AND binh_luans.trang_thai = 1 
                    ORDER BY binh_luans.ngay_dang DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':san_pham_id', $san_pham_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
            return [];
        }
    }

    // Thêm bình luận
    public function addComment($san_pham_id, $tai_khoan_id, $noi_dung) {
        try {
            $sql = "INSERT INTO binh_luans (san_pham_id, tai_khoan_id, noi_dung, ngay_dang, trang_thai) 
                    VALUES (:san_pham_id, :tai_khoan_id, :noi_dung, NOW(), 1)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':san_pham_id', $san_pham_id, PDO::PARAM_INT);
            $stmt->bindParam(':tai_khoan_id', $tai_khoan_id, PDO::PARAM_INT);
            $stmt->bindParam(':noi_dung', $noi_dung, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
            return false;
        }
    }

    // Cập nhật trạng thái bình luận
    public function update($id, $trang_thai) {
        try {
            $sql = "UPDATE binh_luans SET trang_thai = :trang_thai WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':trang_thai', $trang_thai, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
            return false;
        }
    }
}
?>
