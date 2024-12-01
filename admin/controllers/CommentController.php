<?php

class CommentController
{
    public $commentModel;

    public function __construct()
    {
        $this->commentModel = new Comment();
    }
     // Hiển thị danh sách 
     public function commentIndex()
     {
         $data = $this->commentModel->getAllComment();
 
         require_once './Views/comments/list.php';
     }
    public function commentUpdate()
    {
        // Hiển thị form nhập
        $id = $_GET['id'];
        $view = $_POST['view'];
        // Lấy ra thông tin của danh mục cần sửa
        $comment = $this->commentModel->getByIdComment($id);
        // var_dump($comment);die;
        if ($comment) {
            $trang_thai = '';
            if ($comment['trang_thai'] == 1) {
                $trang_thai = 2;
            } else {
                $trang_thai = 1;
            }
            $status = $this->commentModel->statusComment($id, $trang_thai);
            if ($status) {
                if ($view == 'user') {
                    header("Location: " . BASE_URL_ADMIN . '?act=show-user&id=' . $comment['tai_khoan_id']);
                } elseif ($view == 'product')  {
                    header("Location: " . BASE_URL_ADMIN . '?act=show-product&id=' . $comment['san_pham_id']);
                } else {
                    header("Location: " . BASE_URL_ADMIN . '?act=comments');
                }
            }
        }
    }
    // $comments = $this->commentModel->CommentFromProduct($id);
    // $comments = $this->commentModel->CommentFromUser($id);

}
