<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once './views/layout/header.php' ?>
    <?php require_once './views/layout/menu.php' ?>
    <section class="flat-spacing-9">
            <div class="container">
                <div class="tf-grid-layout gap-0 lg-col-2">
                    <div class="tf-content-left has-mt">
                        <div class="sticky-top">
                            <h5 class="mb_20">Ghé thăm cửa hàng của chúng tôi</h5>
                            <div class="mb_20">
                                <p class="mb_15"><strong>Địa chỉ</strong></p>
                                <p>66 Mott St, New York, New York, Zip Code: 10006, AS</p>
                            </div>
                            <div class="mb_20">
                                <p class="mb_15"><strong>Điện thoại</strong></p>
                                <p>090999999</p>
                            </div>
                            <div class="mb_20">
                                <p class="mb_15"><strong>Email</strong></p>
                                <p>cuongcool2k51@gmail.com</p>
                            </div>
                            <div class="mb_36">
                                <p class="mb_15"><strong>Thời gian mở cửa</strong></p>
                                <p class="mb_15">Cửa hàng của chúng tôi đã mở cửa trở lại để mua sắm, </p>
                                <p>trao đổi Mỗi ngày từ 11 giờ sáng đến 7 giờ tối</p>
                            </div>
                            <div>
                                <ul class="tf-social-icon d-flex gap-20 style-default">
                                    <li><a href="#" class="box-icon link round social-facebook border-line-black"><i class="icon fs-14 icon-fb"></i></a></li>
                                    <li><a href="#" class="box-icon link round social-twiter border-line-black"><i class="icon fs-12 icon-Icon-x"></i></a></li>
                                    <li><a href="#" class="box-icon link round social-instagram border-line-black"><i class="icon fs-14 icon-instagram"></i></a></li>
                                    <li><a href="#" class="box-icon link round social-tiktok border-line-black"><i class="icon fs-14 icon-tiktok"></i></a></li>
                                    <li><a href="#" class="box-icon link round social-pinterest border-line-black"><i class="icon fs-14 icon-pinterest-1"></i></a></li>
                                </ul>
                            </div>
                            <div class="tf-content-right">
                                <br>
                                <hr>
                                <br>
                        <h5 class="mb_20">Liên lạc với chúng tôi</h5>
                        <p class="mb_24">Nếu bạn có những sản phẩm tuyệt vời mà bạn đang sản xuất hoặc muốn hợp tác với chúng tôi thì hãy gửi cho chúng tôi một dòng.</p>
                        <div>
                            <form class="form-contact" id="contactform" action="?act=add_contact" method="post">
                                <div class="d-flex gap-15 mb_15">
                                    <fieldset class="w-100">
                                        <input type="text" name="name" id="name" required placeholder="Name *"/>
                                    </fieldset>
                                    <fieldset class="w-100">
                                        <input type="email" name="email" id="email" required placeholder="Email *"/>
                                    </fieldset>
                                    <fieldset class="w-100">
                                        <input type="text" name="sdt" id="email" required placeholder="Phone *"/>
                                    </fieldset>
                                </div>
                                <div class="mb_15">
                                    <textarea placeholder="Message" name="message" id="message" required cols="30" rows="10"></textarea>
                                </div>
                                <div class="send-wrap">
                                    <button type="submit" name="add_contact" class="tf-btn w-100 radius-3 btn-fill animate-hover-btn justify-content-center">Gửi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                        </div>
                    </div>
                    <div class="w-100">
                             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.863931182066!2d105.74468687503175!3d21.038129780613545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455e940879933%3A0xcf10b34e9f1a03df!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1732802252564!5m2!1svi!2s" width="100%" height="980" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>
        

    <?php require_once './views/layout/footer.php' ?>
</body>

</html>