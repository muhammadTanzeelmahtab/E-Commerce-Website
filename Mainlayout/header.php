<?php
session_start();

include '../include/connection.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
       <!-- Font Icon -->
       <link rel="stylesheet" href="assets/fonts/material-icon/css/material-design-iconic-font.min.css">

        <!-- Main css -->
</head>

<body>


   
    <?php if (!isset($_SESSION['db_Role'])) { ?>
        
<!--         
    <div id="preloader-active">
            <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div> -->
    <header>

        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper">

                        <div class="logo">
                            <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                        </div>

                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="#">Shop</a>
                                        <ul class="submenu">
                                        <?php

                                    $querys = 'select * from category';

                                    $res = mysqli_query($con, $querys) or die ("Incorrect Query!!");

                                    ?>
                                      <?php while($data = mysqli_fetch_assoc($res)){ echo '<li>';?>                                  
                                        <a href="shop.php?id=<?=@$data['Categoryid'] ?>"><?=@$data['Cname'] ?></a>
                                            <?php echo '</li>';}?>
                                        </ul>
                                    </li>
                                    <li><a href="about.php">about</a></li>
                                    <li class="hot"><a href="confirmation.php">Confirmation</a>
                                    
                                    </li>
                                    <li><a href="contact.php">Contact</a></li>
                                </ul>
                            </nav>
                        </div>

                        <div class="header-right">
                            <ul>
                                <li>
                                    <div class="nav-search search-switch">
                                        <span class="flaticon-search"></span>
                                    </div>
                                </li>
                                

                                <li> <a href="login.php"><span class="flaticon-user"></span></a></li>
                                <?php
                                    $Count = 0;
                                    if(isset($_SESSION['Cart'])){
                                        $Count = count($_SESSION['Cart']);
                                    }
                                    else{
                                        $Count = 0;
                                    }
                                ?>
                                <li><a href="cart.php"><span class="flaticon-shopping-cart"><?= @$Count ?></span></a> </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>

    </header>
        <?php } else { ?>

            <!-- <div id="preloader-active">
            <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div> -->
    <header>

        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper">

                        <div class="logo">
                            <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                        </div>

                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="#">Shop</a>
                                        <ul class="submenu">
                                        <?php

                                    $querys = 'select * from category';

                                    $res = mysqli_query($con, $querys) or die ("Incorrect Query!!");

                                    ?>
                                      <?php while($data = mysqli_fetch_assoc($res)){ echo '<li>';?>                                  
                                        <a href="shop.php?id=<?=@$data['Categoryid'] ?>"><?=@$data['Cname'] ?></a>
                                            <?php echo '</li>';}?>
                                        </ul>
                                    </li>
                                    <li><a href="about.php">about</a></li>
                                    <li class="hot"><a href="confirmation.php">Confirmation</a>
                                    
                                    </li>
                                   
    
                                    <li><a href="contact.php">Contact</a></li>
                                </ul>
                            </nav>
                        </div>

                        <div class="header-right">
                            <ul>
                                <li>
                                    <div class="nav-search search-switch">
                                        <span class="flaticon-search"></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="nav-search search-switch">
                                        <?= $_SESSION['db_Name'] ?>
                                    </div>
                                </li>

                                <li><a href="logout.php"><span> logout </span></a> </li>
                                <?php
                                $Count = 0;
                                if(isset($_SESSION['Cart'])){
                                    $Count = count($_SESSION['Cart']);
                                }
                                else{
                                    $Count = 0;
                                }
                            ?>
                                <li><a href="cart.php"><span class="flaticon-shopping-cart"><?= @$Count ?></span></a> </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>

    </header>


        <?php } ?>

