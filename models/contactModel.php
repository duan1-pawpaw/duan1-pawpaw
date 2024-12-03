<?php
class contactModel
{
    public $db;
    public function __construct()
    {
        $this->db = connectDB();
    }
    public function get_baiViet()
    {
        $query = "SELECT * FROM tin_tucs";
        $resua = $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $resua;
    }
    public function insert_contact($email,$noi_dung,$ngay_tao,$sdt,$name){
        $query = "INSERT INTO lien_hes(email,noi_dung,ngay_tao,sdt,name) VALUES ('$email','$noi_dung','$ngay_tao','$sdt','$name')";
        if($this->db->exec($query)){
            return true;
            
        }
    }
}