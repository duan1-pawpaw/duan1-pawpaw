<head>
    <meta charset="utf-8">
    <title>Ecomus - Ultimate HTML</title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- font -->
    <link rel="stylesheet" href="./assets/assets_font/fonts/fonts.css">
    <link rel="stylesheet" href="./assets/assets_font/fonts/font-icons.css">
    <link rel="stylesheet" href="./assets/assets_font/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/assets_font/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="./assets/assets_font/css/animate.css">
    <link rel="stylesheet" type="text/css" href="./assets/assets_font/css/styles.css" />

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="./assets/assets_font/images/logo/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="./assets/assets_font/images/logo/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

</head>
<style>
.header-default {
    background-color: white; /* Mặc định là trắng */
    top: 0;
    left: 0;
    width: 100%;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
    z-index: 1000;
}

.header-default.scrolled {
    background-color: white; /* Khi cuộn thì vẫn trắng */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.header-default.home {
    background-color: transparent; /* Chỉ trong suốt trên trang chủ */
}
.header-default.home.scrolled {
    background-color: white; /* Khi cuộn thì vẫn trắng */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}




</style>

<body class="preload-wrapper popup-loader">
