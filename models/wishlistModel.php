<?php
class wishlistModel
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getWistList($tai_khoan_id)
    {
        try {
            $sql = "SELECT san_phams.* FROM san_pham_yeu_thichs
                    JOIN san_phams ON san_pham_yeu_thichs.san_pham_id = san_phams.id
                    WHERE san_pham_yeu_thichs.tai_khoan_id = :tai_khoan_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':tai_khoan_id', $tai_khoan_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
            return [];
        }
    }

    public function addToWishlist($tai_khoan_id, $san_pham_id)
    {
        // var_dump($tai_khoan_id, $san_pham_id);die;
        try {
            // Kiểm tra nếu sản phẩm đã tồn tại trong danh sách yêu thích
            $sql_check = "SELECT * FROM san_pham_yeu_thichs WHERE tai_khoan_id = :tai_khoan_id AND san_pham_id = :san_pham_id";
            $stmt_check = $this->conn->prepare($sql_check);
            $stmt_check->execute([
                ':tai_khoan_id' => $tai_khoan_id,
                ':san_pham_id' => $san_pham_id
            ]);
            // var_dump($stmt_check->rowCount());die;
            if ($stmt_check->rowCount() > 0) {
                return false; // Sản phẩm đã tồn tại trong danh sách yêu thích
            }

            // Thêm sản phẩm vào danh sách yêu thích
            $sql = "INSERT INTO san_pham_yeu_thichs (tai_khoan_id, san_pham_id) VALUES (:tai_khoan_id, :san_pham_id)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tai_khoan_id' => $tai_khoan_id,
                ':san_pham_id' => $san_pham_id
            ]);
            return true;
        } catch (PDOException $th) {
            // Ghi lại lỗi hoặc làm gì đó trong trường hợp lỗi xảy ra
            echo "lỗi: " . $th->getMessage();
            flush();
        }
    }


    public function removeFromWishlist($tai_khoan_id, $san_pham_id)
    {
        try {
            $sql = "DELETE FROM san_pham_yeu_thichs WHERE tai_khoan_id = :tai_khoan_id AND san_pham_id = :san_pham_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':tai_khoan_id', $tai_khoan_id, PDO::PARAM_INT);
            $stmt->bindParam(':san_pham_id', $san_pham_id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
            return false;
        }
    }

    public function getProductById($san_pham_id)
    {
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
}
