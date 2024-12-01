<?php

class Product
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllProducts()
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    // thêm sản phảm
    function insertProduct($ten_san_pham, $gia_san_pham, $do_tuoi, $mau_sac, $gioi_tinh, $so_luong, $ngay_nhap,  $mo_ta, $danh_muc_id, $trang_thai, $hinh_anh)
    {
        try {
            $sql = 'INSERT INTO san_phams ( ten_san_pham, gia_san_pham, do_tuoi, mau_sac, gioi_tinh, so_luong, ngay_nhap,  mo_ta , danh_muc_id, trang_thai, hinh_anh)
                    VALUES (:ten_san_pham, :gia_san_pham, :do_tuoi, :mau_sac, :gioi_tinh, :so_luong, :ngay_nhap,  :mo_ta , :danh_muc_id, :trang_thai, :hinh_anh)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ten_san_pham' => $ten_san_pham,
                ':gia_san_pham' => $gia_san_pham,
                ':do_tuoi' => $do_tuoi,
                ':mau_sac' => $mau_sac,
                ':gioi_tinh' => $gioi_tinh,
                ':so_luong' => $so_luong,
                ':ngay_nhap' => $ngay_nhap,
                ':mo_ta' => $mo_ta,
                ':danh_muc_id' => $danh_muc_id,
                ':trang_thai' => $trang_thai,
                ':hinh_anh' => $hinh_anh
            ]);

            // Lấy id sản phẩm vừa thêm
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function insertAlbumProduct($san_pham_id, $link_hinh_anh)
    {
        try {
            $sql = 'INSERT INTO hinh_anh_san_phams (san_pham_id, link_hinh_anh)
                    VALUES (:san_pham_id, :link_hinh_anh)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':san_pham_id' => $san_pham_id,
                ':link_hinh_anh' => $link_hinh_anh
            ]);
            // Lấy id sản phẩm vừa thêm
            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getByIdProducts($id)
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            WHERE san_phams.id = :id';
            $stmt = $this->conn->prepare($sql);
            
            $stmt->execute([':id' => $id]);

            // var_dump($stmt);die;
            return $stmt->fetch();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function albumProduct($san_pham_id)
    {
        try {
            $sql = 'SELECT * FROM hinh_anh_san_phams WHERE san_pham_id = :san_pham_id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':san_pham_id' => $san_pham_id]);

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getByIdAlbum($id)
    {
        try {
            $sql = 'SELECT * FROM hinh_anh_san_phams WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetch();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function updateProduct($id, $ten_san_pham, $gia_san_pham, $do_tuoi, $mau_sac, $gioi_tinh, $so_luong, $ngay_nhap, $mo_ta, $danh_muc_id, $trang_thai, $hinh_anh)
    {
        // var_dump($id, $ten_san_pham, $gia_san_pham, $do_tuoi, $mau_sac, $gioi_tinh, $so_luong, $ngay_nhap, $mo_ta, $danh_muc_id, $trang_thai, $hinh_anh);die();
        try {
            $sql = 'UPDATE san_phams SET
            ten_san_pham = :ten_san_pham,
            gia_san_pham = :gia_san_pham,
            do_tuoi = :do_tuoi,
            mau_sac = :mau_sac,
            gioi_tinh = :gioi_tinh,
            so_luong = :so_luong,
            ngay_nhap = :ngay_nhap,
            mo_ta = :mo_ta,
            danh_muc_id = :danh_muc_id,
            trang_thai = :trang_thai,
            hinh_anh = :hinh_anh
            WHERE id = :id';
            // var_dump($sql);die;

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ten_san_pham' => $ten_san_pham,
                ':gia_san_pham' => $gia_san_pham,
                ':do_tuoi' => $do_tuoi,
                ':mau_sac' => $mau_sac,
                ':gioi_tinh' => $gioi_tinh,
                ':so_luong' => $so_luong,
                ':ngay_nhap' => $ngay_nhap,
                ':mo_ta' => $mo_ta,
                ':danh_muc_id' => $danh_muc_id,
                ':trang_thai' => $trang_thai,
                ':hinh_anh' => $hinh_anh,
                ':id' => $id
            ]);
            // var_dump($stmt);die;

            // Lấy id sản phẩm vừa thêm
            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
            flush();
        }
    }

    public function updateAlbumProduct($id, $new_file)
    {
        try {
            $sql = 'UPDATE hinh_anh_san_phams SET
            link_hinh_anh = :new_file
            WHERE id = :id';
            // var_dump($sql);die;

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':new_file' => $new_file,
                ':id' => $id
            ]);

            // Lấy id sản phẩm vừa thêm
            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function destroyAlbumProduct($id)
    {
        try {
            $sql = 'DELETE FROM hinh_anh_san_phams WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function commentProduct($id)
    {
        try {
            $sql = 'SELECT binh_luans.*, tai_khoans.ho_ten
            FROM binh_luans
            INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
            WHERE binh_luans.san_pham_id = :id
            ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deleteProduct($id)
    {
        try {
            $sql = "DELETE FROM san_phams WHERE id = :id";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    // Hủy kết nối CSDL
    public function __destruct()
    {
        $this->conn = null;
    }
}
