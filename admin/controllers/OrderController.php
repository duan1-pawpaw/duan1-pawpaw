<?php

class OrderController
{
    public $orderModel;

    public function __construct()
    {
        $this->orderModel = new Order();
    }
    public function orderIndex(){
        $list_orders = $this->orderModel->getAllOrder();
        // var_dump($list_order);die;
        require_once './views/orders/list.php';
    }

    public function orderUpdate(){
        $order_id = $_GET['order_id'];
        // var_dump($order_id);die;
        $getProductOrders = $this->orderModel->getProductOrder($order_id);
        $detailOrder = $this->orderModel->getDetailOrder($order_id);
        $listTrangThaiDonHang = $this->orderModel->getAllTrangThaiDonHang();
        // var_dump($detailOrder);die;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $trang_thai_id = $_POST['trang_thai_id'] ?? '';
             if($this->orderModel->updateDonHang($order_id,$trang_thai_id )){;
                header("location: " . BASE_URL_ADMIN . '?act=orders');
                exit();
            } else {
                header("location: " . BASE_URL_ADMIN . '?act=update-order&order_id=' . $order_id);
                exit();
            }
        }
        require_once './views/orders/update.php';
    }

}