<!-- <?php 
    class contactController{
        public $contactModel;
        public function __construct()
        {
            $this->contactModel = new contactModel();
        }

        public function homeContact() 
        {
            // $baiViets= $this->baiVietModel->get_baiViet();
            require_once './views/contact/contact.php';
        }
        public function add_contact_ctl()
        {
            if (isset($_POST['add_contact'])) {
                $email = $_POST['email'];
                $ngay_tao = date('Y-m-d');
                $noi_dung = $_POST['message'];
                $sdt = $_POST['sdt'];
                $name = $_POST['name'];
                $su = $this->contactModel->insert_contact($email, $noi_dung,$ngay_tao,$sdt,$name);
                if ($su) {
                    // header('location:?action=loai_hang');
                    echo '<script> alert("Thêm thành công"); 
                    window.location.href = "?act=contact"; </script>';
                }
            }
        }
    }


?> -->