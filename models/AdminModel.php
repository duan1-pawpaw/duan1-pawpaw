<?php
require_once './commons/function.php';

class RatingModel {
    private $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function getAllRating() {
        try {
            $sql = "SELECT binh_luan_danh_gias .*, tai_khoans.ho_ten, san_phams.ten_san_pham
                    FROM binh_luan_danh_gias 
                    JOIN san_phams ON binh_luan_danh_gias.product_id = san_phams.id
                    JOIN tai_khoans ON binh_luan_danh_gias.user_id = tai_khoans.id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
            return [];
        }
    }

    public function updateVisibility($id, $visibilitys) {
        try {
            $sql = "UPDATE binh_luan_danh_gias SET visibilitys = :visibilitys WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':visibilitys' => $visibilitys, ':id' => $id]);
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
class CommetModel {
    private $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function getAllComment() {
        try {
            $sql = "SELECT binh_luans .*, tai_khoans.ho_ten, san_phams.ten_san_pham
                    FROM binh_luans 
                    JOIN san_phams ON  binh_luans.san_pham_id = san_phams.id
                    INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
            return [];
        }
    }

    public function updateBinhluan($id, $trang_thai) {
        try {
            $sql = "UPDATE binh_luans SET trang_thai = :trang_thai WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':trang_thai' => $trang_thai, ':id' => $id]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
?>
