<?php

class RatingController
{
    public $ratingModel;

    public function __construct()
    {
        $this->ratingModel = new Rating();
    }

    public function manageRatings()
    {
        $ratings = $this->ratingModel->getAllRating();
        require './views/ratings/list.php';
    }

    // Xóa Đánh Giá

    // public function deleteRatings() {
    //     if (isset($_GET['id_rating'])) {
    //         $id = $_GET['id_rating'];
    //         $this->ratingModel->destroyRating($id);
    //     }
    //     header('Location: ' . BASE_URL_ADMIN . '?act=ratings');
    //     exit();
    // }

    public function updateVisibility()
    {
        if (isset($_GET['id_rating']) && isset($_GET['visibility'])) {
            $id = $_GET['id_rating'];
            $visibilitys = $_GET['visibility'] === '1' ? 0 : 1;
            // var_dump($visibilitys);die;
            $this->ratingModel->updateVisibility($id, $visibilitys);
        }
        header('Location: ' . BASE_URL_ADMIN . '?act=ratings');
        exit();
    }
}
