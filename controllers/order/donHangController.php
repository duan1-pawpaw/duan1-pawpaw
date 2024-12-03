<?php
class donHangController
{
    public $donHangModel;

    public function __construct()
    {
        $this->donHangModel = new donHangModel();
    }

    public function order()
    {
        $don_hang_id = $_GET['id_don_hang'];
        // var_dump($don_hang_id);die;
        $donhang = $this->donHangModel->getDetailDonHang($don_hang_id);
        // var_dump($donhang);die;
        $sanphamDonhang = $this->donHangModel->getSPDonHang($don_hang_id);
        $listTrangThaiDonHang = $this->donHangModel->getAllTrangThaiDonHang();
        require_once './views/order/donhang.php';
    }

    public function orderOfUser()
    {
        $tai_khoan_id = $_SESSION['user']['id'];
        // lấy thoogn tin đơn hàng ở bảng đơn hàng
        $donhang = $this->donHangModel->orderOfUser($tai_khoan_id);
        // var_dump($donhang);die;
        $listTrangThaiDonHang = $this->donHangModel->getAllTrangThaiDonHang();
        require_once './views/order/listDonHang.php';
    }
    public function detailOrder()
    {
        $don_hang_id = $_GET['id_don_hang'];
        // lấy danh sách sản phẩm đã đặt của đơn hàng ở bẳng chi_tiet_dan_hangs
        $sanphamDonhang = $this->donHangModel->produtcOfOrder($don_hang_id);
        $productOfDetailOrder = $this->donHangModel->productOfDetailOrder($don_hang_id);
        // var_dump($productOfDetailOrder);die;
        $listTrangThaiDonHang = $this->donHangModel->getAllTrangThaiDonHang();
        require_once './views/order/detailDonHang.php';
    }
}
