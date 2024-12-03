<?php 

class homeModel 
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function thongKe(){
        try {
            $sql = "SELECT danh_mucs .*, COUNT(san_phams.danh_muc_id) AS 'number_cate'
                    FROM san_phams
                    INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id GROUP BY san_phams.danh_muc_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
        }
    }

    public function getRevenueByDate($startDate, $endDate) {
        try {
            $sql = "SELECT DATE(ngay_dat) as date, SUM(tong_tien) as revenue 
                    FROM don_hangs 
                    WHERE ngay_dat BETWEEN ? AND ? 
                    GROUP BY DATE(ngay_dat)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$startDate, $endDate]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Lỗi: " . $e->getMessage());
        }
    }

    public function gettotal(){
        try {
            $sql = "SELECT SUM(tong_tien) as tong_tien FROM don_hangs";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch()['tong_tien'];
        } catch (PDOException $th) {
            echo "Lỗi: ". $th->getMessage();
        }
    }
    public function SoLuongSanPham(){
        try {
            $sql = "SELECT COUNT(*) as san_pham_id FROM san_phams";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch()['san_pham_id'];
        } catch (PDOException $th) {
            echo "Lỗi: ". $th->getMessage();
        }
    }

    public function soDonHang() {
        try {
            $sql = "SELECT COUNT(*) as don_hang_id FROM don_hangs WHERE trang_thai_id < 7";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch()['don_hang_id'];
        } catch (PDOException $th) {
            echo "Lỗi: ". $th->getMessage();
        }
    }
}