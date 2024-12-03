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
        
        public function getAllCate(){
            try {
                $sql = 'SELECT * FROM danh_mucs';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();
            }  catch (PDOException $th) {
                echo "Lỗi: " . $th->getMessage();
            }
        }

        public function getProductSale()  {
            try {
                $SQL = 'SELECT khuyen_mais.*, san_phams.hinh_anh, san_phams.ten_san_pham, san_phams.gia_san_pham
                        FROM khuyen_mais
                        INNER JOIN san_phams ON khuyen_mais.id_san_pham = san_phams.id
                        WHERE khuyen_mais.trang_thai_khuyen_mai_id = 1 AND ngay_bat_dau <= NOW() AND ngay_ket_thuc >= NOW() AND so_luong_su_dung_con_lai > 0 ';
                $stmt = $this->conn->prepare($SQL);
                $stmt->execute();
                return $stmt->fetchAll();
            }catch (PDOException $th) {
                echo "Lỗi: " . $th->getMessage();
            }
        }
    }
?>