<?php 
    class orderController{
        public $orderModel;

        public function __construct()
        {
            $this->orderModel = new orderModel;
        }

        public function list_order(){
            $list_orders = $this->orderModel->getAllOrder();
            // var_dump($list_order);die;
            require_once './views/donHang/danhSachDonHang.php';
        }

        public function update_order(){
            $order_id = $_GET['order_id'];
            $getProductOrders = $this->orderModel->getProductOrder($order_id);
            $detailOrder = $this->orderModel->getDetailOrder($order_id);
            $listTrangThaiDonHang = $this->orderModel->getAllTrangThaiDonHang();
            // var_dump($detailOrder);die;
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $trang_thai_id = $_POST['trang_thai_id'] ?? '';
                 if($this->orderModel->updateDonHang($order_id,$trang_thai_id )){;
                    header("location: " . BASE_URL_ADMIN . '?act=list_order');
                    exit();
                } else {
                    header("location: " . BASE_URL_ADMIN . '?act=update_order&order_id=' . $order_id);
                    exit();
                }
            }
            require_once './views/donHang/updateDonHang.php';
        }

        
        
    }

?>