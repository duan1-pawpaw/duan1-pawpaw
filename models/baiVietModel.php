<?php
class baiVietModel
{
    public $db;
    public function __construct()
    {
        $this->db = connectDB();
    }
    public function get_baiViet()
    {
        $query = "SELECT * FROM tin_tucs where trang_thai=1";
        $resua = $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $resua;
    }
    public function get_baiViet_noiBat()
    {
        $query = "SELECT * FROM tin_tucs WHERE loai_tin=0 AND trang_thai=1";
        $resua = $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $resua;
    }
    public function get_baiViet_moi()
    {
        $query = "SELECT * FROM tin_tucs WHERE trang_thai=1 ORDER BY tin_date DESC LIMIT 10;";
        $resua = $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $resua;
    }
    public function get_baiViet_byID($id)
    {
        $query = "SELECT * FROM tin_tucs WHERE id_tin = $id AND trang_thai=1 ";
        $res = $this->db->query($query)->fetch();
        return $res;
    }
}
