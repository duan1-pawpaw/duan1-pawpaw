<?php

class RatingController {
    public $RatingModel;

    public function __construct() {
        $this->RatingModel = new RatingModel();
    }

    public function manageRatings() {
        $ratings = $this->RatingModel->getAllRating();
        require './views/danhgia/rating.php';
    }

    // Xóa Đánh Giá

    // public function deleteRatings() {
    //     if (isset($_GET['id_rating'])) {
    //         $id = $_GET['id_rating'];
    //         $this->RatingModel->destroyRating($id);
    //     }
    //     header('Location: ' . BASE_URL_ADMIN . '?act=rating');
    //     exit();
    // }

    public function updateVisibility() {
        ob_start();
        if (isset($_GET['id_rating']) && isset($_GET['visibility'])) {
            $id = $_GET['id_rating'];
            $visibilitys = $_GET['visibility'] === '1' ? 0 : 1; 
            // var_dump($visibilitys);die;
            $this->RatingModel->updateVisibility($id, $visibilitys);
        }
        header('Location: ' . BASE_URL_ADMIN . '?act=rating');
        exit();
    }
}
class CommnetCotroller {
    public $Commet;

    public function __construct() {
        $this->Commet = new CommetModel();
    }

    public function manageComment() {
        $Commets = $this->Commet->getAllComment();
        require './views/danhgia/binh_luan.php';
    }

    public function updateBinhluan() {
        if (isset($_GET['id_binh_luan']) && isset($_GET['trang_thai'])) {
            $id = $_GET['id_binh_luan'];
            $trang_thai = $_GET['trang_thai'] === '1' ? 1 : 0; 
            // var_dump($trang_thai); die;
            $this->Commet->updateBinhluan($id, $trang_thai);
        }
        header('Location: ' . BASE_URL_ADMIN . '?act=binh_luan');
        exit();
    }
}


?>