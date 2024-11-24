<?php 
    class homeModel{
        public $conn;

        public function __construct()
        {
            $this->conn = connectDB();
        }

        public function getAllPet() 
        {
            try {
                $sql = 'SELECT * FROM san_phams WHERE trang_thai = 1 LIMIT 4';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();
            } catch (PDOException $th) {
                echo "Lỗi: " . $th->getMessage();
            }   
        }

        public function top5Pet(){
            try {
                $sql = 'SELECT * FROM san_phams ORDER BY luot_xem DESC LIMIT 4';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();
            } catch (PDOException $th) {
                echo "Lỗi: " . $th->getMessage();
            }
        }

    }

?>