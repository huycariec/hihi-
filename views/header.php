<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="fonts/fontawesome-free-6.4.0-web/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <header>
            <div class="top-bar">
                <div class="top-bar-left">
                    <div class="address">
                        <h1><b>JIN Store: Uy tín trong từng sản phẩm |</b></h1>
                    </div>
                    <div class="hotline">
                        <span>Hotline:</span>
                        <i class="fa-solid fa-phone fa-xs" style="color: #ffffff;"></i>
                        <span>0936 096 900</span>
                    </div>
                </div>
                <div class="top-bar-right">
                    <div class="info">
                        <ul>
                            <li><a href="">Giới thiệu</a></li>
                            <li><a href="">Liên Hệ</a></li>
                        </ul>
                    </div>
                    <div id="menu" class="user-info">
                        <ul>
                            <li><a id="showButton" href="#"> <i class="fa-solid fa-user fa-lg"
                                        style="color: #ffffff;"></i></a>
                                <ul id="categoryList" style="display: none;">
                                    <?php if (!isset($_SESSION['account'])) {?>
                                    <li><a id="loginBtn" href="index.php?act=login">Đăng Nhập</a></li>
                                    <li><a id="registerBtn" href="index.php?act=register">Đăng Kí</a></li>
                                    <?php } else { ?>
                                    <li><a href="index.php?act=updateInformation">Thông Tin Tài Khoản</a></li>
                                    <?php if($_SESSION['account']['role'] == 1){
                                        echo '
                                    <li><a href="admin/index.php?act=listProduct">Quản Lí Trang Web</a></li>
                                    ';
                                    }?>
                                        <li><a href="index.php?act=myOrders&status=All">Đơn Mua</a></li>
                                    <li><a href="index.php?act=changePassword">Đổi Mật Khẩu</a></li>
                                    <li>
                                        <form action="index.php?act=home" method="post">
                                            <a name="btn-logout" href="index.php?act=logout">Đăng Xuất</a>
                                        </form>
                                    </li>
                                    <?php  } ?>

                                </ul>
                            </li>
                        </ul>


                    </div>
                </div>
            </div>
            <nav class="header-home-page">
                <div class="container-header">
                    <div class="logo">
                        <a href="index.php?act=home">
                            <img src="image/JIn Store 1.png" alt="">
                        </a>
                    </div>
                    <div class="menu-nav">
                        <ul>
                            <li><a class="hover-nav" href="index.php?act=home">TRANG CHỦ</a>
                            </li>

                            <li><a class="hover-nav" href="index.php?act=products">IPHONE</a>
                                <ul class="iphone-nav">
                                    <li><a href="index.php?act=category&id=2">iPhone 15 Series</a></li>
                                    <li><a href="index.php?act=category&id=3">iPhone 14 Series</a></li>
                                    <li><a href="index.php?act=category&id=4">iPhone 13 Series</a></li>
                                    <li><a href="index.php?act=category&id=5">iPhone 12 Series</a></li>
                                </ul>
                            </li>
                            <li><a class="hover-nav" href="index.php?act=category&id=7">PHỤ KIỆN</a>
                            </li>
                            <li><a class="hover-nav" href="#">GIỚI THIỆU</a>
                            </li>
                            <li><a class="hover-nav" href="#">LIÊN HỆ</a>
                            </li>
                        </ul>
                    </div>
                    <div class="search-form">
                        <form action="index.php?act=resultSearch" method="post">
                            <input name="search_sp" class="input-search" placeholder=" Tìm kiếm sản phẩm ..."
                                type="text">

                            <button name="btn-search" class="btn-search" type="submit">
                                <a href="index.php?act=resultSearch"><i class="fa-solid fa-magnifying-glass"
                                        style="color: #ffffff;"></i></a>
                            </button>
                        </form>
                    </div>
                    <div class="cart">
                        <a href="index.php?act=cart"><i class="fa-solid fa-cart-shopping fa-xl"
                                style="color: #ffffff;"></i></a>
<!--                        <span id="totalProduct">--><?//= !empty($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?><!--</span>-->

                    </div>
                </div>
            </nav>
        </header>