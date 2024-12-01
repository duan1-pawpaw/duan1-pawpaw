<?php 
    class danhMucSanPhamModel{
        public $conn;

        public function __construct()
        {
            $this->conn = connectDB();
        }

        public function productByCategory($id_cate){
            try {
                $sql = 'SELECT * FROM san_phams WHERE danh_muc_id = :id_cate';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':id_cate' => $id_cate]);
                return $stmt->fetchAll();
            } catch (PDOException $th) {
                echo "Lỗi: " . $th->getMessage();
            }
        }

        public function getAllCategory($id) {
            try {
                $sql = 'SELECT * FROM danh_mucs WHERE id = :id';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':id' => $id]);
                return $stmt->fetch();
            }  catch (PDOException $th) {
                echo "Lỗi: " . $th->getMessage();
            }
        }
    }
?>