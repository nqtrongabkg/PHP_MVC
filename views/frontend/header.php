<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AROG Computer</title>
    <link rel="stylesheet" href="public/css/all.min.css">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/layoutsite.css">
</head>

<body>
    <section class="topbar border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    Chào mừng bạn đến với AROG COMPUTER
                </div>
                <div class="col-md-6 text-end">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-square-instagram"></i>
                    <i class="fa-solid fa-envelope"></i>
                    <i class="fa-solid fa-phone"></i>
                </div>
            </div>
        </div>
    </section>
    <!--end topbar-->

    <section class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="index.php"><img src="public/images/logo/logo.png" class="img-fluid" alt="logo"></a>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm"
                            aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <span class="input-group-text" id="basic-addon2">Tìm</span>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="row">                    
                        <div class="col-md-6 myHover">
                            <a href="index.php?option=cart" class="text-decoration-none">
                                <div class="bags text-center">
                                    <i class="fa-solid fa-bag-shopping fs-3 boder-icon"></i>
                                    <p class="text-icon-hd">Giỏ Hàng</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 myHover">
                            <a href="index.php?option=customer&f=login" class="text-decoration-none">
                                <div class="user text-center">
                                    <i class="fa-solid fa-user fs-3 boder-icon"></i>
                                    <p class="text-icon-hd">Tài Khoản</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- icon use bag-->
            </div>
        </div>
    </section>

    <section class="mainmenu bg-mainmenu sticky-top">
        <div class="container">
            <?php require_once("views/frontend/mod_mainmenu.php") ?>
        </div>
    </section>
    <!--end mainmenu-->
    <!--end header-->