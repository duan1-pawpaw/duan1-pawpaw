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

    // Kiểm tra nếu người dùng đã mua sản phẩm hay chưa
    public function hasPurchased($user_id, $san_pham_id) {
        try {
            $sql = "SELECT COUNT(*)
                    FROM don_hangs
                    INNER JOIN chi_tiet_don_hangs ON don_hangs.id = chi_tiet_don_hangs.don_hang_id
                    WHERE don_hangs.tai_khoan_id = :user_id AND chi_tiet_don_hangs.san_pham_id = :san_pham_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':san_pham_id', $san_pham_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchColumn() > 0;
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
            return false;
        }
    }
     // Thêm đánh giá
     public function addRating($user_id, $product_id, $rating, $comment) {
        try {
            // var_dump(1289);die;
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
    // Hủy kết nối CSDL
    public function __destruct()
    {
        $this->conn = null;
    }
}