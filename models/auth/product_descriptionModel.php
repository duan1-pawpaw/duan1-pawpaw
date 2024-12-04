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

    // Kiểm tra nếu người dùng đã mua sản phẩm
    public function hasPurchased($user_id) {
        try {
            $sql = "SELECT COUNT(*)
                    FROM don_hangs
                    WHERE tai_khoan_id = :user_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchColumn() > 0;
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
            return false;
        }
    }

    // Lấy bình luận theo ID sản phẩm
    public function getCommentsByProductId($san_pham_id) {
        try {
            $sql = "SELECT binh_luans.*, tai_khoans.ho_ten, tai_khoans.anh_dai_dien
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

    // Thêm đánh giá
    public function addRating($user_id, $product_id, $rating, $comment) {
        try {
            $sql = "INSERT INTO danh_gias (tai_khoan_id, san_pham_id, danh_gia_sao, binh_luan, thoi_gian_danh_gia) 
                    VALUES (:tai_khoan_id, :san_pham_id, :danh_gia_sao, :binh_luan, NOW())";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':tai_khoan_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':san_pham_id', $product_id, PDO::PARAM_INT);
            $stmt->bindParam(':danh_gia_sao', $rating, PDO::PARAM_INT);
            $stmt->bindParam(':binh_luan', $comment, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
            return false;
        }
    }
    

    // Lấy đánh giá theo ID sản phẩm
    public function getRatingsByProductId($product_id) {
        try {
            $sql = "SELECT danh_gias.*, tai_khoans.ho_ten, tai_khoans.anh_dai_dien 
                    FROM danh_gias 
                    JOIN tai_khoans ON danh_gias.tai_khoan_id = tai_khoans.id 
                    WHERE danh_gias.san_pham_id = :san_pham_id 
                    ORDER BY danh_gias.thoi_gian_danh_gia DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':san_pham_id', $product_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
            return [];
        }
    }
}
?>
