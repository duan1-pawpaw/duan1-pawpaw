<?php
class searchModel {
    public $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function searchProducts($query) {
        try {
            $sql = "SELECT * FROM san_phams WHERE ten_san_pham LIKE :query";
            $stmt = $this->conn->prepare($sql);
            $query = "%" . $query . "%";
            $stmt->bindParam(':query', $query, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
            return [];
        }
    }
}
?>
