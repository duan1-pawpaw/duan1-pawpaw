<?php 

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS

define('BASE_URL'       , 'http://localhost:81/duan1-pawpaw/duan1-pawpaw/');
define('BASE_URL_ADMIN'       , 'http://localhost:81/duan1-pawpaw/duan1-pawpaw/admin/');

define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME'    , 'duan1-pawpaw');  // Tên database

define('PATH_ROOT'    , __DIR__ . '/../');
