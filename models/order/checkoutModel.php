<?php
class checkoutModel
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function detailPet($id)
    {
        try {
            $sql = 'SELECT * FROM san_phams WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (PDOException $th) {
            echo "Lỗi: " . $th->getMessage();
        }
    }

    public function buy_product($ma_don_hang, $tai_khoan_id, $ten_nguoi_nhan, $email_nguoi_nhan, $sdt_nguoi_nhan, $dia_chi_nguoi_nhan, $tong_tien, $ghi_chu, $phuong_thuc_thanh_toan_id)
    {
        try {
            if($phuong_thuc_thanh_toan_id == 1){
                $trang_thai_id = 3;
            }else{
                $trang_thai_id = 11;
            }
            $sql = 'INSERT INTO don_hangs (ma_don_hang, tai_khoan_id, ten_nguoi_nhan, email_nguoi_nhan, sdt_nguoi_nhan, dia_chi_nguoi_nhan, ngay_dat, tong_tien, ghi_chu, phuong_thuc_thanh_toan_id, trang_thai_id)
                        VALUES (:ma_don_hang, :tai_khoan_id, :ten_nguoi_nhan, :email_nguoi_nhan, :sdt_nguoi_nhan, :dia_chi_nguoi_nhan, :ngay_dat, :tong_tien, :ghi_chu, :phuong_thuc_thanh_toan_id, :trang_thai_id)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ma_don_hang' => $ma_don_hang,
                ':trang_thai_id' => $trang_thai_id,
                ':tai_khoan_id' => $tai_khoan_id,
                ':ten_nguoi_nhan' => $ten_nguoi_nhan,
                ':email_nguoi_nhan' => $email_nguoi_nhan,
                ':sdt_nguoi_nhan' => $sdt_nguoi_nhan,
                ':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
                ':ngay_dat' => date('Y-m-d H:i:s'),
                ':tong_tien' => $tong_tien,
                ':ghi_chu' => $ghi_chu,
                ':phuong_thuc_thanh_toan_id' => $phuong_thuc_thanh_toan_id,
            ]);
            // lấy id sản phẩm vừa thêmm
            $lastInsertId =  $this->conn->lastInsertId();
            // var_dump($lastInsertId);die;
            // return $lastInsertId;
            // viết câu truy vấn đơn hàng
            $sql = 'SELECT * FROM don_hangs WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $lastInsertId,
            ]);
            $detailDon = $stmt->fetch();
            return [
                'id' => $lastInsertId,
                'detailDon' => $detailDon
            ];
            // return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function addDetailDonHang($don_hang_id, $san_pham_id, $don_gia, $so_luong, $tong_tien)
    {
        try {
            $sql = 'INSERT INTO chi_tiet_don_hangs (don_hang_id, san_pham_id,don_gia, so_luong,  thanh_tien) 
                           VALUES (:don_hang_id, :san_pham_id, :don_gia, :so_luong,  :thanh_tien)';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':don_hang_id' => $don_hang_id,
                ':san_pham_id' => $san_pham_id,
                ':don_gia' => $don_gia,
                ':so_luong' => $so_luong,
                ':thanh_tien' => $tong_tien,
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
