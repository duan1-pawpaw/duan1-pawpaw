<?php 
    class bannerModel {
        public $conn;

        public function __construct()
        {
            $this->conn = connectDB();
        }
        public function getAllBanner(){
            try { 
               $sql = 'SELECT * FROM banners WHERE trang_thai = 1 LIMIT 3';
               $stmt = $this->conn->prepare($sql);
               $stmt->execute();
               return $stmt->fetchAll();
            } catch (PDOException $th) {
                echo 'Lỗi: ' .$th->getMessage();
            }
        }
    }
?>