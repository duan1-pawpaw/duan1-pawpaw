<?php
class ModelLh
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
    public function insert_lh($email,$noi_dung,$ngay_tao,$sdt,$name){
        $query = "INSERT INTO lien_hes(email,noi_dung,ngay_tao,sdt,name) VALUES ('$email','$noi_dung','$ngay_tao','$sdt','$name')";
        if($this->db->exec($query)){
            return true;
            
        }
    }
    public function get_lh_byID($id){
        $query= "SELECT * FROM lien_hes WHERE (id = $id)";
        $res = $this->db->query($query)->fetch();
        return $res;
    }
    public function update_lh($id,$email,$noi_dung,$ngay_tao,$sdt,$name){
        $query = "UPDATE lien_hes SET email='$email', noi_dung='$noi_dung',ngay_tao='$ngay_tao',sdt='$sdt',name='$name'  WHERE id=$id";
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
}