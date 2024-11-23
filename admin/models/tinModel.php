<?php
class ModelTin
{
    public $db;
    public function __construct()
    {
        $this->db = connectDB();
    }
    public function get_tin()
    {
        $query = "SELECT * FROM tin_tucs";
        $resua = $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $resua;
    }
    public function insert($tieu_de, $mo_ta, $url_hinh)
    {
        $query = "INSERT INTO tin_tucs(tieu_de,mo_ta,url_hinh) VALUES ('$tieu_de','$mo_ta','$url_hinh')";
        if ($this->db->exec($query)) {
            return true;
        }
    }
    public function get_product_byID($id)
    {
        $query = "SELECT * FROM tin_tucs WHERE (id_tin = $id)";
        $res = $this->db->query($query)->fetch();
        return $res;
    }
    public function update($id, $tieu_de, $mo_ta, $url_hinh)
    {
        if (empty($url_hinh)) {
            $query = "UPDATE tin_tucs SET tieu_de='$tieu_de', mo_ta='$mo_ta'  WHERE id_tin=$id";
        } else {
            $query = "UPDATE tin_tucs SET tieu_de='$tieu_de', mo_ta='$mo_ta', url_hinh='$url_hinh'  WHERE id_tin=$id";
        }
        if ($this->db->exec($query)) {
            return true;
        }
    }
    public function deletesp($id)
    {
        $query = "DELETE FROM tin_tucs WHERE(id_tin=$id)";
        if ($this->db->exec($query)) {
            return true;
        }
    }
    public function td_tt($id)
    {
        $query = "UPDATE tin_tucs SET trang_thai= !trang_thai  WHERE id_tin=$id";
        if ($this->db->exec($query)) {
            return true;
        }
    }
}
