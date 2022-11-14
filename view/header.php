<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="assets/img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Shop bán giày dép</title>
    <!--
        CSS
        ============================================= -->
    <link rel="stylesheet" href="assets/css/linearicons.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/nouislider.min.css">
    <link rel="stylesheet" href="assets/css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="assets/css/ion.rangeSlider.skinFlat.css" />
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/jquerysctipttop.css">
    <link rel="stylesheet" href="assets/css/availability-calendar.css">

</head>

<body>
    <!-- Start Header Area -->
    <header class="header_area sticky-header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light main_box">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.php"><img src="assets/img/logo12.png" alt=""
                            width="270px"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="index.php">Trang chủ</a></li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link "  role="button"
                                    aria-haspopup="true" aria-expanded="false">Nam</a>
                                <!-- <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="category.html">Boots</a></li>
                                    <li class="nav-item"><a class="nav-link" href="category.html">Sandal</a></li>
                                    <li class="nav-item"><a class="nav-link" href="category.html">Giày thể thao</a></li>
                                    <li class="nav-item"><a class="nav-link" href="category.html">Giày chạy bộ</a></li>
                                    <li class="nav-item"><a class="nav-link" href="category.html">Giày đá banh</a></li>
                                </ul> -->
                            </li>
                            <li class="nav-item submenu dropdown active">
                                <a href="index.php?act=#" class="nav-link " 
                                    role="button" aria-haspopup="true" aria-expanded="false"">Nữ</a>
                                <!-- <ul class=" dropdown-menu">
                            <li class="nav-item "><a class="nav-link" href="category.html">Boots</a></li>
                            <li class="nav-item"><a class="nav-link" href="category.html">Sandal</a></li>
                            <li class="nav-item"><a class="nav-link" href="category.html">Giày thể thao nữ</a></li>
                            <li class="nav-item"><a class="nav-link" href="category.html">Giày chạy bộ - đi bộ</a></li>
                            <li class="nav-item"><a class="nav-link" href="category.html">Giày búp bê</a></li>
                        </ul> -->
                        </li>

                        <li class="nav-item"><a class="nav-link" href="index.php?act=contact">Liên hệ</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a class="nav-link" href="index.php?act=cart" id="cart"><i class="ti-bag"></i><span
                                        class="badge">
                                        <p>3</p>
                                    </span></a></li>
                            <li class="nav-item submenu dropdown ">
                                <a href="" style="color:#ffba01" class="cart" class="nav-item"  class="nav-link dropdown-toggle " data-toggle="dropdown"
                                    role="button" aria-haspopup="false"
                                    aria-expanded="true"><span class="ti-user"></span> <?php if(isset($_SESSION['username'])){
                                        ?>
                                       <span> Hello </span>[<?php echo $_SESSION['username']['username'] ?>] 
                                        <?php
                                    }else{
                                        
                                    }
                                    ?></a>
                                <ul class="dropdown-menu">
                                    <?php
                                    if (isset($_SESSION['username'])) {
                                        extract($_SESSION['username']);
                                    ?>
                                    <?php
                                        if ($role == '1') {
                                    ?>
                                    <li>
                                    <li class="nav-item"><a class="nav-link" href="../admin/index.php"> Đăng nhập
                                            admin</a></li>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="index.php?act=mycart"> Đơn hàng của tôi</a></li>
                            </li>
                            <?php } ?>
                            <li><li class="nav-item"><a class="nav-link" href="index.php?act=edit_user"> Cập Nhật Tài Khoản</a></li></li>
                            
                            <li class="nav-item"><a class="nav-link" href="index.php?act=forgot_password"> Quên Mật
                                    Khẩu</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php?act=logout"> Đăng Xuất </a> </li>
                            <?php
                                    } else {
                                        ?>
                                        <li>
                                        <li class="nav-item"><a class="nav-link" href="index.php?act=login">Đăng Nhập</a> </li>
                                        </li>
                           
                            <li class="nav-item"><a class="nav-link" href="index.php?act=registration">Đăng Kí</a> </li>

                                        <?php
                                    }
                                    ?>
                                    
                        </ul>

                        </li>

                        <li class="nav-item">
                            <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                        </li>

                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container">
                <form class="d-flex justify-content-between">
                    <input type="text" class="form-control" id="search_input" placeholder="Tìm kiếm">
                    <button type="submit" class="btn"></button>
                    <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>

    </header>