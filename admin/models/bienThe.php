<?php 
    class bienTheModel{
        public $conn;

        public function  __construct()
        {
            $this->conn = connectDB();
        }

        public function themBienThe($id_san_pham, $hinh_anh, $mau_sac, $do_tuoi, $so_luong, $gioi_tinh){
            try {
                $sql = 'INSERT INTO san_pham_bien_thes (id_san_pham, hinh_anh, mau_sac, do_tuoi, so_luong, gioi_tinh)
                        VALUE (:id_san_pham, :hinh_anh, :mau_sac, :do_tuoi, :so_luong, :gioi_tinh)';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':id_san_pham' => $id_san_pham,
                    ':hinh_anh' => $hinh_anh,
                    ':mau_sac' => $mau_sac,
                    ':do_tuoi' => $do_tuoi,
                    ':so_luong' => $so_luong,
                    ':gioi_tinh' => $gioi_tinh
                ]);
                return true;
            } catch (PDOException $th) {
                echo 'Lỗi: ' . $th->getMessage();
            }
        }

        public function listVariant($id_san_pham){
            try {
                $sql = 'SELECT san_pham_bien_thes .*, san_phams.ten_san_pham
                        FROM san_pham_bien_thes
                        INNER JOIN san_phams ON san_pham_bien_thes.id_san_pham = san_phams.id
                        WHERE san_pham_bien_thes.id_san_pham = :id_san_pham';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':id_san_pham' => $id_san_pham
                ]);
                return $stmt->fetchAll();
            } catch (PDOException $th) {
                echo 'Lỗi: ' . $th->getMessage();
            }
        }

        public function detailVariant($id_bien_the){
            try {
                $sql = 'SELECT * FROM san_pham_bien_thes WHERE id = :id ';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':id' => $id_bien_the
                ]);
                return $stmt->fetch();
            }catch (PDOException $th) {
                echo 'Lỗi: ' . $th->getMessage();
            }
        }
        

        public function updateVariant($id_bien_the, $hinh_anh, $mau_sac, $do_tuoi, $so_luong, $gioi_tinh) {
            try {
                $sql = 'UPDATE san_pham_bien_thes SET 
                        hinh_anh = :hinh_anh,
                        mau_sac = :mau_sac,
                        do_tuoi = :do_tuoi,
                        so_luong = :so_luong,
                        gioi_tinh = :gioi_tinh
                        WHERE id = :id_bien_the';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':hinh_anh' => $hinh_anh,
                    ':mau_sac' => $mau_sac,
                    ':do_tuoi' => $do_tuoi,
                    ':so_luong' => $so_luong,
                    ':gioi_tinh' => $gioi_tinh,
                    ':id_bien_the' => $id_bien_the,
                ]);
                return true;
            } catch (PDOException $th) {
                echo 'Lỗi: ' . $th->getMessage();
            }
        }
    }

?>