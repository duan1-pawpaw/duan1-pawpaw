<?php
class modelBanner
{
    public $db;
    public function __construct()
    {
        $this->db = connectDB();
    }
    public function get_banner(){
        $query = "SELECT * FROM banners";
        $resua=$this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $resua;
    }
    public function insert_banner($tieu_de,$url_hinh){
        $query = "INSERT INTO banners(tieu_de,hinh_anh) VALUES ('$tieu_de','$url_hinh')";
        if($this->db->exec($query)){
            return true;
            
        }
    }
    public function get_banner_byID($id){
        $query= "SELECT * FROM banners WHERE (id = $id)";
        $res = $this->db->query($query)->fetch();
        return $res;
    }
    public function update_banner($id,$tieu_de,$url_hinh){
        if(empty($url_hinh)){
            $query = "UPDATE banners SET tieu_de='$tieu_de'  WHERE id=$id";
        }
        if(!empty($url_hinh)){
            $query = "UPDATE banners SET tieu_de='$tieu_de', hinh_anh='$url_hinh'  WHERE id=$id";
        }
        if($this->db->exec($query)){
            return true;
        }
    }
    public function delete_banner($id){
        $query = "DELETE FROM banners WHERE(id=$id)";
        if($this->db->exec($query)){
            return true;
        }
    }
        public function td_tt_banner($id){
        $query = "UPDATE banners SET trang_thai= !trang_thai  WHERE id=$id";
        if($this->db->exec($query)){
            return true;
        }
    }
}