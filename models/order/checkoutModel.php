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
            if ($phuong_thuc_thanh_toan_id == 1) {
                $trang_thai_id = 3;
            } else {
                $trang_thai_id = 2;
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
            flush();
        }
    }
    public function addDetailDonHang($don_hang_id, $products)
    {
        // var_dump($products);die;
        try {
            foreach ($products as $product) {
                $san_pham_id = $product['id'];
                $don_gia = $product['gia_san_pham'];
                $so_luong = $product['so_luong'];
                $ten_san_pham = $product['ten_san_pham'];
                $tong_tien = $don_gia * $so_luong;
                // var_dump($product);die;
                // Kiểm tra số lượng tồn kho
                $sql_check = 'SELECT so_luong FROM san_phams WHERE id = :san_pham_id';
                $stmt_check = $this->conn->prepare($sql_check);
                $stmt_check->execute([':san_pham_id' => $san_pham_id]);
                $so_luong_ton = $stmt_check->fetchColumn();
                var_dump($so_luong);
                var_dump($san_pham_id);
                var_dump($so_luong_ton);
                if ($so_luong_ton < $so_luong) {
                    return "Sản phẩm ID $ten_san_pham không đủ số lượng trong kho.";
                }

                // Thêm chi tiết đơn hàng
                $sql = 'INSERT INTO chi_tiet_don_hangs (don_hang_id, san_pham_id, don_gia, so_luong, thanh_tien) 
                    VALUES (:don_hang_id, :san_pham_id, :don_gia, :so_luong, :thanh_tien)';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':don_hang_id' => $don_hang_id,
                    ':san_pham_id' => $san_pham_id,
                    ':don_gia' => $don_gia,
                    ':so_luong' => $so_luong,
                    ':thanh_tien' => $tong_tien,
                ]);

                // Cập nhật số lượng tồn kho
                $sql_update = 'UPDATE san_phams SET so_luong = so_luong - :so_luong WHERE id = :san_pham_id';
                $stmt_update = $this->conn->prepare($sql_update);
                $stmt_update->execute([
                    ':so_luong' => $so_luong,
                    ':san_pham_id' => $san_pham_id,
                ]);

                // Kiểm tra số dòng bị cập nhật
                $rows_updated = $stmt_update->rowCount();
                if ($rows_updated === 0) {
                    return "Không thể cập nhật số lượng tồn kho cho sản phẩm ID $san_pham_id.";
                }
            }

            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            flush();
        }
    }
    public function check_voucher($code)
    {
        $sql = "SELECT * FROM khuyen_mais WHERE ma_khuyen_mai = :code AND trang_thai_khuyen_mai_id = 1 AND ngay_bat_dau <= NOW() AND ngay_ket_thuc >= NOW() AND so_luong_su_dung_con_lai > 0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':code' => $code]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateNumberOfUse($code)
    {
        $sql = "UPDATE khuyen_mais 
            SET so_luong_su_dung_con_lai = so_luong_su_dung_con_lai - 1 
            WHERE ma_khuyen_mai = :code";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':code' => $code]);
    }
}
