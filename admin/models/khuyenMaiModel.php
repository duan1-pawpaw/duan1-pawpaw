<?php
class khuyenMaiModel
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // lấy tất cả trạng thái khuyến mãi
    public function getAllStatusVoucher() {
        try {
            $sql = 'SELECT * FROM trang_thai_khuyen_mais WHERE id != 4';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
        }
    }

    // truy vấn lấy ra danh sách khuyến mãi
    public function getAllVoucher() {
        try {
            $sql = 'SELECT khuyen_mais .*, trang_thai_khuyen_mais.ten_trang_thai_khuyen_mai, san_phams.ten_san_pham
                    FROM khuyen_mais
                    INNER JOIN trang_thai_khuyen_mais ON khuyen_mais.trang_thai_khuyen_mai_id  = trang_thai_khuyen_mais.id
                    INNER JOIN san_phams ON khuyen_mais.id_san_pham  = san_phams.id
                    WHERE khuyen_mais.trang_thai_khuyen_mai_id != 4';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
            flush();
        }
    }

    // truy vấn chi tiết các khuyến mãi theo id
    public function getDetailVoucher($id) {
        try {
            $sql = 'SELECT khuyen_mais .*, trang_thai_khuyen_mais.ten_trang_thai_khuyen_mai, san_phams.ten_san_pham
                    FROM khuyen_mais
                    INNER JOIN trang_thai_khuyen_mais ON khuyen_mais.trang_thai_khuyen_mai_id  = trang_thai_khuyen_mais.id
                    INNER JOIN san_phams ON khuyen_mais.id_san_pham  = san_phams.id
                    WHERE khuyen_mais.trang_thai_khuyen_mai_id != 4 AND khuyen_mais.id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
            flush();
        }
        
    }

    // truy vấn thêm mới khuyến mãi
    public function insert_voucher($id_san_pham, $ten_khuyen_mai, $ma_khuyen_mai, $gia_tri, $ngay_bat_dau, $ngay_ket_thuc, $mo_ta, $trang_thai_khuyen_mai_id) {
        try {
            $sql = 'INSERT INTO khuyen_mais (id_san_pham, ten_khuyen_mai, ma_khuyen_mai, gia_tri, ngay_bat_dau, ngay_ket_thuc, mo_ta, trang_thai_khuyen_mai_id)
                    VALUE (:id_san_pham, :ten_khuyen_mai, :ma_khuyen_mai, :gia_tri, :ngay_bat_dau, :ngay_ket_thuc, :mo_ta, :trang_thai_khuyen_mai_id)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id_san_pham' => $id_san_pham,
                ':ten_khuyen_mai' => $ten_khuyen_mai,
                ':ma_khuyen_mai' => $ma_khuyen_mai,
                ':gia_tri' => $gia_tri,
                ':ngay_bat_dau' => $ngay_bat_dau,
                ':ngay_ket_thuc' => $ngay_ket_thuc,
                ':mo_ta' => $mo_ta,
                ':trang_thai_khuyen_mai_id' => $trang_thai_khuyen_mai_id,
            ]);
            return true;
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
        }
    }

    // truy vấn trường hợp 1: khuyến mãi chưa kích hoạt
    public function update_Voucher_case_1($id, $id_san_pham, $ten_khuyen_mai, $ma_khuyen_mai, $gia_tri, $ngay_bat_dau, $ngay_ket_thuc, $mo_ta, $trang_thai_khuyen_mai_id){
        try {
            $sql = 'UPDATE khuyen_mais SET id_san_pham = :id_san_pham, ten_khuyen_mai = :ten_khuyen_mai, ma_khuyen_mai = :ma_khuyen_mai, gia_tri = :gia_tri, ngay_bat_dau = :ngay_bat_dau, ngay_ket_thuc = :ngay_ket_thuc, mo_ta = :mo_ta, trang_thai_khuyen_mai_id = :trang_thai_khuyen_mai_id WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':id_san_pham' => $id_san_pham,
                ':ten_khuyen_mai' => $ten_khuyen_mai,
                ':ma_khuyen_mai' => $ma_khuyen_mai,
                ':gia_tri' => $gia_tri,
                ':ngay_bat_dau' => $ngay_bat_dau,
                ':ngay_ket_thuc' => $ngay_ket_thuc,
                ':mo_ta' => $mo_ta,
                ':trang_thai_khuyen_mai_id' => $trang_thai_khuyen_mai_id,
            ]);
            return true;
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
            flush();
        }
    }

    // truy vấn trường hợp 2: khuyễn mãi đang hoạt động
    public function update_Voucher_case_2($id, $trang_thai_khuyen_mai_id){
        try {
            $sql = 'UPDATE khuyen_mais SET trang_thai_khuyen_mai_id = :trang_thai_khuyen_mai_id WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':trang_thai_khuyen_mai_id' => $trang_thai_khuyen_mai_id,
            ]);
            return true;
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
            flush();
        }
    }

    // truy vấn ẩn khuyến mãi 
    public function hidden_Voucher($id) {
        try {
            $sql = 'UPDATE khuyen_mais SET trang_thai_khuyen_mai_id = 4 WHERE id =:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return true;
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
        }
    }
}
