<?php 
session_start();


// Require PHP mailer
require_once './commons/phpmailer/Exception.php';
require_once './commons/phpmailer/PHPMailer.php';
require_once './commons/phpmailer/SMTP.php';

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers                                                                                                                                 
require_once './controllers/auth/registerController.php';
require_once './controllers/homeController.php';
require_once './controllers/bannerController.php';
require_once './controllers/danhMucSanPhamController.php';
require_once './controllers/order/checkoutController.php';
require_once './controllers/order/donHangController.php';
//Bai Viet(tin)
require_once './controllers/baiVietController.php';
//Contact
require_once './controllers/contactController.php';

require_once './controllers/productlistController.php';
require_once './controllers/product_descriptionController.php';
require_once './controllers/searchController.php';
require_once './controllers/wishlistController.php';

require_once './controllers/CartController.php';
require_once './controllers/ProductController.php';
require_once './controllers/ProfileController.php';


// Require toàn bộ file Models
require_once './models/auth/registerModel.php';
require_once './models/homeModel.php';
require_once './models/bannerModel.php';
require_once './models/danhMucSanPhamModel.php';
require_once './models/order/checkoutModel.php';
require_once './models/order/donHangModel.php';
//Bai Viet(tin)
require_once './models/baiVietModel.php';
//Contact
require_once './models/contactModel.php';

require_once './models/productlistModel.php';
require_once './models/product_descriptionModel.php';
require_once './models/searchModel.php';
require_once './models/wishlistModel.php';

require_once './models/Category.php';
require_once './models/Comment.php';
require_once './models/Cart.php';
require_once './models/Product.php';
require_once './models/Profile.php';



// Route
$act = $_GET['act'] ?? '/';

// mọi yêu cầu POST có thể được xử lý ngay lập tức khi handleRequest() được gọi.
$controller =  new registerController();
$controller->handleRequest();
match ($act) {
    
    '/' => (new homeController()) -> home(),
    'category' => (new danhMucSanPhamController()) -> productByCategorys(),
    'banners' => (new bannerController())->banners(),

    'registers' => (new registerController()) -> registers(),
    'comfirm_registers' => (new registerController()) -> comfirm_registers(),
    'logins' => (new registerController()) -> logins(),
    'logout' => (new registerController())->logout(),

    // thanh toán
    'checkout' => (new checkoutController()) ->checkout(),
    'Fromcheckout' => (new checkoutController()) ->Fromcheckout(),
    'voucher' => (new checkoutController()) ->voucher(),
    'order' => (new donHangController()) -> order(),
    'thanks' => (new checkoutController()) -> handleVNPayResponse(),    
    'listOrder' => (new donHangController()) -> orderOfUser(),
    'detailOrder' => (new donHangController()) -> detailOrder(),

    'bai_viet' => (new baiVietController()) -> homeBaiViet(),
    'ct_tin' => (new baiVietController()) -> ct_tin(),

    'contact' => (new contactController()) -> homeContact(),
    'add_contact' => (new contactController()) -> add_contact_ctl(),

    'wishlist' => (new wishlistController())->index(),
    'productlist' => (new ProductlistController())->index(),
    'addtowishlist' => (new wishlistController())->add(),
    'removefromwishlist' => (new wishlistController())->remove(),
    'product_description' => (new Product_Description_Controller())->index($product_id),
    'addcomment' => (new Product_Description_Controller())->addComment(), 
    'search' => (new SearchController())->search(), 

    // chi tiết sản phẩm
    'show-product' => (new ProductController())->productShow(),
    // giỏ hàng
    'create-cart' => (new CartController())->cartCreate(),
    'carts' => (new CartController())->cartIndex(),
    'cartDeletes' => (new CartController())->cartDelete(),
    // show profile 
    'form-update-profile'   => (new ProfileController())->profileFormUpdate(),
    'update-profile'        => (new ProfileController())->profileUpdate(),
    'update-password-profile' => (new ProfileController())->passwordProfileUpdate(),

    'reset-password' => (new registerController())->resetPassword(),
    'formResest' => (new registerController())->formResest(),
};