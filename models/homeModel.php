<?php
class homeModel
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }


    public function top5Pet()
    {
        try {
            $sql = 'SELECT * FROM san_phams ORDER BY luot_xem DESC LIMIT 4';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
        }
    }

    public function getAllProduct()
    {
        try {
            // lấy ra 8 sản phẩm trừ 4 sản phẩm nổi bật
            $sql = 'SELECT sp.*
                    FROM san_phams sp LEFT JOIN (SELECT id FROM san_phams ORDER BY luot_xem DESC LIMIT 4) AS san_pham_noi_bat ON sp.id = san_pham_noi_bat.id
                    WHERE san_pham_noi_bat.id IS NULL
                    LIMIT 8;';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
        }
    }

    public function top4DanhGia() {
        try {
            $sql = 'SELECT danh_gias . *, san_phams.ten_san_pham, san_phams.gia_san_pham, san_phams.gia_khuyen_mai, san_phams.hinh_anh, san_phams.id, tai_khoans.ho_ten
                    FROM danh_gias
                    INNER JOIN san_phams ON danh_gias.san_pham_id = san_phams.id
                    INNER JOIN tai_khoans ON danh_gias.tai_khoan_id = tai_khoans.id
                    WHERE danh_gias.danh_gia_sao > 3 LIMIT 4';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
        }
    }
    public function getAllTinTuc() {
        try {
            $sql = 'SELECT * FROM tin_tucs WHERE trang_thai = 1';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
        }
    }
}
