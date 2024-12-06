<?php
class orderController
{
    public $orderModel;

    public function __construct()
    {
        $this->orderModel = new orderModel;
    }

    public function list_order()
    {
        $list_orders = $this->orderModel->getAllOrder();
        // var_dump($list_orders);die;
        require_once './views/donHang/danhSachDonHang.php';
    }

    public function update_order()
    {
        $order_id = $_GET['order_id'];
        $getProductOrders = $this->orderModel->getProductOrder($order_id);
        $detailOrder = $this->orderModel->getDetailOrder($order_id);
        // var_dump($getProductOrders);die;
        $listTrangThaiDonHang = $this->orderModel->getAllTrangThaiDonHang();
        // var_dump($detailOrder);die;
        $content = "<table>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Sản Phẩm</th>
                                <th>Số Lượng</th>
                                <th>Tổng Tiền</th>
                            </tr>
                        </thead>
                        <tbody>";
        foreach ($getProductOrders as $key => $sanPham) {
            $content .= "
                            <tr>
                                <td>" . (++$key) . "</td>
                                <td>{$sanPham['ten_san_pham']}</td>
                                <td>{$sanPham['so_luong']}</td>
                                <td>{$sanPham['thanh_tien']}</td>
                            </tr>";
        }
        $content .= "</tbody></table>";

        // var_dump($content);die;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $subject = 'Đơn Hàng Đã Được Xác Nhận';
            $trang_thai_id = $_POST['trang_thai_id'] ?? '';
            // var_dump($detailOrder['email']);die;
            try {
                if (!sendMail($detailOrder['email'], $subject, $content)){
                    // var_dump(123);die;
                    if ($this->orderModel->updateDonHang($order_id, $trang_thai_id)) {;
                        header("location: " . BASE_URL_ADMIN . '?act=list_order');
                        exit();
                    } else {
                        // var_dump(123);die;
                        header("location: " . BASE_URL_ADMIN . '?act=update_order&order_id=' . $order_id);
                        exit();
                    }
                }  else {
                    echo "Email không được gửi";
                }
            } catch (Exception $th) {
                echo $th->getMessage();
                // var_dump("lỗi");die;
            }
        }
        require_once './views/donHang/updateDonHang.php';
    }
}
