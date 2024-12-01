<?php

class ProductController
{
    public $productModel;
    public $categoryModel;
    public $commentModel;

    public function __construct()
    {
        $this->productModel = new Product();
        $this->categoryModel = new Category();
        $this->commentModel = new Comment();
    }
    // Hiển thị danh sách sản phẩm
    public function productIndex()
    {
        $data = $this->productModel->getAllProducts();

        require_once './Views/products/list.php';
    }
    // Tạo sản phẩm
    // submit báo lỗi vẫn đẩy ảnh về
    public function productCreate()
    {
        // Lấy danh mục
        $categorys = $this->categoryModel->getAllCategory();

        // Hiển thị form nhập
        require_once './Views/products/create.php';
        // Kiểm tra xem dữ liệu có phải đc submit lên không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = str_replace('.', '', $_POST['gia_san_pham'] ?? '');
            $do_tuoi = $_POST['do_tuoi'] ?? '';
            $mau_sac = $_POST['mau_sac'] ?? '';
            $gioi_tinh = $_POST['gioi_tinh'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';

            $hinh_anh = $_FILES['hinh_anh'] ?? '';
            // var_dump($hinh_anh);die();
            // Lưu hình ảnh vào 
            $file_thumb = uploadFile($hinh_anh, 'uploads/imgSanPham/');
            // Mảng hình ảnh
            $img_array = $_FILES['img_array'] ?? null;

            // Tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Tên pet không được để trống';
            }
            if (empty($gia_san_pham)) {
                $errors['gia_san_pham'] = 'Giá pet không được để trống';
            }
            if ($gia_san_pham <= 0) {
                $errors['gia_san_pham'] = 'Giá sản phẩm phải là số dương.';
            }
            if (empty($do_tuoi)) {
                $errors['do_tuoi'] = 'Độ tuổi pet không được để trống';
            }
            if (empty($mau_sac)) {
                $errors['mau_sac'] = 'Màu sắc pet không được để trống';
            }
            if (empty($gioi_tinh)) {
                $errors['gioi_tinh'] = 'Giới tính pet không được để trống';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số lượng pet không được để trống.';
            }
            if ($so_luong < 0) {
                $errors['so_luong'] = 'Số lượng phải là số không âm.';
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Ngày nhập pet không được để trống';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Danh mục pet phải chọn';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái pet phải chọn';
            }
            // Kiểm tra lỗi upload hình ảnh
            if (empty($file_thumb)) {
                $errors['hinh_anh'] = 'Phải chọn ảnh pet hợp lệ.';
                // return 
            }
            // var_dump($errors);die();
            // Nếu không có lỗi, tiến hành thêm sản phẩm vào database
            if (empty($errors)) {
                // Nếu ko có lỗi thì tiến hành thêm pet
                // var_dump('Oke');

                $san_pham_id = $this->productModel->insertProduct(
                    $ten_san_pham,
                    $gia_san_pham,
                    $do_tuoi,
                    $mau_sac,
                    $gioi_tinh,
                    $so_luong,
                    $ngay_nhap,
                    $mo_ta,
                    $danh_muc_id,
                    $trang_thai,
                    $file_thumb,
                );
                // var_dump($san_pham_id);die;

                // Xử lý thêm album ảnh sản phẩm img_array
                if ($img_array && !empty($img_array['name'][0])) {
                    foreach ($img_array['name'] as $key => $value) {
                        $file = [
                            'name' => $img_array['name'][$key],
                            'type' => $img_array['type'][$key],
                            'tmp_name' => $img_array['tmp_name'][$key],
                            'error' => $img_array['error'][$key],
                            'size' => $img_array['size'][$key],
                        ];
                        $link_hinh_anh = uploadFile($file, 'uploads/imgSanPham/');
                        $this->productModel->insertAlbumProduct($san_pham_id, $link_hinh_anh);
                    }
                }
                // Sau khi thêm sản phẩm thành công
                $_SESSION['success'] = 'Thêm sản phẩm thành công.';
                header("location: " . BASE_URL_ADMIN . "?act=products");
                exit();
            } else {
                // Trả về form và lỗi
                $_SESSION['error'] = $errors;
                $_SESSION['old_data'] = [
                    'ten_san_pham' => $ten_san_pham,
                    'gia_san_pham' => $gia_san_pham,
                    'do_tuoi' => $do_tuoi,
                    'mau_sac' => $mau_sac,
                    'gioi_tinh' => $gioi_tinh,
                    'so_luong' => $so_luong,
                    'ngay_nhap' => $ngay_nhap,
                    'mo_ta' => $mo_ta,
                    'danh_muc_id' => $danh_muc_id,
                    'trang_thai' => $trang_thai,
                ];
                header('location: ' . BASE_URL_ADMIN . '?act=add-product');
                exit();
            }
        }
        // Xóa session sau khi hiển thị form
        deleteSessionError();
    }
    public function productFormUpdate()
    {
        // Hiển thị form nhập
        $id = $_GET['id'] ?? '';
        // Lấy ra thông tin của sản phẩm cần sửa
        $product = $this->productModel->getByIdProducts($id);
        // var_dump($product);die;
        $albumProduct = $this->productModel->albumProduct($id);
        // var_dump($albumProduct);die;
        // Lấy danh mục
        $categorys = $this->categoryModel->getAllCategory();
        // var_dump($categorys);die;
        if ($product) {
            require_once './Views/products/update.php';
            deleteSessionError();
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=products');
            exit();
        }
    }
    public function productUpdate()
    {
            // Kiểm tra xem dữ liệu có phải đc submit lên không
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Lấy ra dữ liệu cũ của sản phẩm
                $ten_san_pham = $_POST['ten_san_pham'] ?? '';
                $gia_san_pham = str_replace('.', ',', $_POST['gia_san_pham'] ?? '');
                $do_tuoi = $_POST['do_tuoi'] ?? '';
                $mau_sac = $_POST['mau_sac'] ?? '';
                $gioi_tinh = $_POST['gioi_tinh'] ?? '';
                $so_luong = $_POST['so_luong'] ?? '';
                $ngay_nhap = $_POST['ngay_nhap'] ?? '';
                $mo_ta = $_POST['mo_ta'] ?? '';
                $danh_muc_id = $_POST['danh_muc_id'] ?? '';
                $trang_thai = $_POST['trang_thai'] ?? '';
                $hinh_anh = $_FILES['hinh_anh'] ?? null;
                // var_dump($hinh_anh);die();

                $id = $_GET['id'] ?? '';
                // echo $id;
                // var_dump($id);die;
                // Lấy ra thông tin của sản phẩm cần sửa
                $product = $this->productModel->getByIdProducts($id);
                $old_file = $product['hinh_anh']; // Lấy ảnh cũ để phục vụ cho sửa ảnh

                // Tạo 1 mảng trống để chứa dữ liệu
                $errors = [];
                if (empty($ten_san_pham)) {
                    $errorFs['ten_san_pham'] = 'Tên pet không được để trống';
                }
                if (empty($gia_san_pham)) {
                    $errors['gia_san_pham'] = 'Giá pet không được để trống';
                }
                if ($gia_san_pham <= 0) {
                    $errors['gia_san_pham'] = 'Giá sản phẩm phải là số dương.';
                }
                if (empty($do_tuoi)) {
                    $errors['do_tuoi'] = 'Độ tuổi pet không được để trống';
                }
                if (empty($mau_sac)) {
                    $errors['mau_sac'] = 'Màu sắc pet không được để trống';
                }
                if (empty($gioi_tinh)) {
                    $errors['gioi_tinh'] = 'Giới tính pet không được để trống';
                }
                if (empty($so_luong)) {
                    $errors['so_luong'] = 'Số lượng pet không được để trống';
                }
                if ($so_luong < 0) {
                    $errors['so_luong'] = 'Số lượng phải là số không âm.';
                }
                if (empty($ngay_nhap)) {
                    $errors['ngay_nhap'] = 'Ngày nhập pet không được để trống';
                }
                if (empty($danh_muc_id)) {
                    $errors['danh_muc_id'] = 'Danh mục pet phải chọn';
                }
                if (empty($trang_thai)) {
                    $errors['trang_thai'] = 'Trạng thái pet phải chọn';
                }
                if (isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK) {
                    // upload ảnh mới lên
                    $new_file = uploadFile($hinh_anh, 'uploads/imgSanPham/');
                    if ($new_file && !empty($old_file)) {
                        // Nếu có ảnh cũ thì xóa đi
                        deleteFile($old_file); // Xóa file cũ chỉ khi upload thành công
                    }
                } else {
                    $new_file = $old_file;  // Giữ nguyên file cũ nếu không upload mới
                }
                // Nếu không có lỗi, tiến hành thêm sản phẩm vào database
                if (empty($errors)) {
                    // Nếu ko có lỗi thì tiến hành thêm pet
                    var_dump('Oke');
                    // test
                    $gia_san_pham = floatval($gia_san_pham);
                    $this->productModel->updateProduct(
                        $id,
                        $ten_san_pham,
                        $gia_san_pham,
                        $do_tuoi,
                        $mau_sac,
                        $gioi_tinh,
                        $so_luong,
                        $ngay_nhap,
                        $mo_ta,
                        $danh_muc_id,
                        $trang_thai,
                        $new_file
                    );
                    // var_dump($update);die;
                    // Sau khi thêm sản phẩm thành công
                    $_SESSION['success'] = 'Cập nhật phẩm thành công.';
                    header("location: " . BASE_URL_ADMIN . "?act=products");
                    exit();
                } else {
                    // Trả về form và lỗi
                    $_SESSION['error'] = $errors;
                    $_SESSION['old_data'] = [
                        'ten_san_pham' => $ten_san_pham,
                        'gia_san_pham' => $gia_san_pham,
                        'do_tuoi' => $do_tuoi,
                        'mau_sac' => $mau_sac,
                        'gioi_tinh' => $gioi_tinh,
                        'so_luong' => $so_luong,
                        'ngay_nhap' => $ngay_nhap,
                        'mo_ta' => $mo_ta,
                        'danh_muc_id' => $danh_muc_id,
                        'trang_thai' => $trang_thai,
                    ];
                    header('location: ' . BASE_URL_ADMIN . '?act=form-update-product&id=' . $id);
                    exit();
                }
            }
    }
    public function productAlbumUpdate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $san_pham_id = $_POST['id'] ?? '';
            $albumProduct = $this->productModel->albumProduct($san_pham_id);
            // Xử lý các ảnh được gửi từ form
            $img_array = $_FILES['img_array'] ?? [];
            $img_delete = isset($_POST['img_delete']) ? explode(',', $_POST['img_delete']) : [];
            // var_dump($_POST['current_img_ids']);
            // die;
            $current_img_ids = $_POST['current_img_ids'] ?? [];

            // Khai báo mảng để lưu ảnh thêm mới hoặc thay thế ảnh cũ
        $upload_file = [];

            // Upload ảnh mới hoặc thay thế ảnh cũ
            // var_dump($img_array['name']);
            // die;
            foreach ($img_array['name'] as $key => $value) {
                // echo $key;
                // var_dump($key);
                // die;
                if ($img_array['error'][$key] == UPLOAD_ERR_OK) {
                    $new_file_album = uploadFileAlbum($img_array, 'uploads/imgSanPham/', $key);
                    if ($new_file_album) {
                        // var_dump($new_file_album);die;
                        // var_dump($current_img_ids);
                        // var_dump($current_img_ids[$key]);
                        // var_dump($key);
                        // die;
                        $upload_file[] = [
                            'id' => $current_img_ids[$key] ?? null,
                            'file' => $new_file_album
                        ];
                        
                    }
                }
            }
            // Lưu ảnh mới vào db và xóa ảnh cũ nếu có
            foreach ($upload_file as $file_info) {
                // var_dump($file_info);die();
                // $old_file_album = null; // Gán giá trị mặc định
                if ($file_info['id']) {
                    // Lấy ảnh cũ theo ID
                    // var_dump($file_info['id']);die;
                    $old_file_album = $this->productModel->getByIdAlbum($file_info['id'])['link_hinh_anh'] ;
                    // var_dump($old_file_album);die;
                    // if (!empty($album)) {
                    //     $old_file_album = $album[0]['link_hinh_anh'] ?? null;
                    // }
                    // Cập nhật ảnh cũ
                    $this->productModel->updateAlbumProduct($file_info['id'], $file_info['file']);
                    if ($old_file_album) {
                        // Xóa ảnh cũ
                        deleteFile($old_file_album);
                    }
                } else {
                    // Thêm ảnh mới
                    // var_dump($file_info);die;
                    $this->productModel->insertAlbumProduct($san_pham_id, $file_info['file']);
                }
            }
            // Xủa lý xóa ảnh
            foreach ($albumProduct as $imgPr) {
                $img_id = $imgPr['id'];
                if (in_array($img_id, $img_delete)) {
                    // Xóa ảnh trong db
                    $this->productModel->destroyAlbumProduct($img_id);

                    // Xóa file
                    deleteFile($imgPr['link_hinh_anh']);
                }
            }
            // Nếu không có lỗi, tiến hành thêm sản phẩm vào database
            $_SESSION['success'] = 'Cập nhật album thành công.';
            header('location: ' . BASE_URL_ADMIN . '?act=form-update-product&id=' . $san_pham_id);
            exit();
        }
    }
    // Hiển thị chi tiết sản phẩm
    public function productShow()
    {
        $id = $_GET['id'] ?? null;

        $product = $this->productModel->getByIdProducts($id);
        // var_dump($product);die;
        $albumProduct = $this->productModel->albumProduct($id);
        // var_dump($listAnhSanPham);die;
        $comments = $this->commentModel->commentFromProduct($id);

        if ($product) {
            require_once './Views/products/show.php';
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=products');
            exit();
        }
    }
    // Xóa sản phẩm
    public function productDelete()
    {
        $id = $_GET['id'];
        $product = $this->productModel->getByIdProducts($id);
        // var_dump($product);die;
        $albumProduct = $this->productModel->albumProduct($id);
        // var_dump($albumProduct);die;
        if ($product) {
            deleteFile($product['hinh_anh']);
            $this->productModel->deleteProduct($id);
        }
        if ($albumProduct) {
            foreach ($albumProduct as $key => $imgPr) {
                deleteFile(($imgPr['link_hinh_anh']));
                $this->productModel->destroyAlbumProduct($imgPr['id']);
            }
        }
        header('location: ' . BASE_URL_ADMIN . '?act=products');
        exit();
    }
}
