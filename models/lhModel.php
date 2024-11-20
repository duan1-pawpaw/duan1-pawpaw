<?php
class YourModel
{
    public $db;
    public function __construct()
    {
        $this->db = connectDB();
    }
    public function get_lh(){
        $query = "SELECT * FROM lien_hes";
        $resua=$this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $resua;
    }
    public function insert_lh($email,$noi_dung,$ngay_tao){
        $query = "INSERT INTO lien_hes(email,noi_dung,ngay_tao) VALUES ('$email','$noi_dung','$ngay_tao')";
        if($this->db->exec($query)){
            return true;
            
        }
    }
    public function get_lh_byID($id){
        $query= "SELECT * FROM lien_hes WHERE (id = $id)";
        $res = $this->db->query($query)->fetch();
        return $res;
    }
    public function update_lh($id,$email,$noi_dung,$ngay_tao){
        $query = "UPDATE lien_hes SET email='$email', noi_dung='$noi_dung',ngay_tao='$ngay_tao'  WHERE id=$id";
        if($this->db->exec($query)){
            return true;
        }
    }
    public function delete_lh($id){
        $query = "DELETE FROM lien_hes WHERE(id=$id)";
        if($this->db->exec($query)){
            return true;
        }
    }
        public function td_tt_lh($id){
        $query = "UPDATE lien_hes SET trang_thai= !trang_thai  WHERE id=$id";
        if($this->db->exec($query)){
            return true;
        }
    }
}