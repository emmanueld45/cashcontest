<?php

session_start();
include '../classes/database.class.php';
include '../classes/typing_contest.class.php';
include '../classes/memory_contest.class.php';
include '../classes/users.class.php';
include '../classes/activities.class.php';
include '../classes/admin.class.php';


?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>CashContest | profile</title>
    <meta charset="UTF-8">
    <meta name="description" content="SolMusic HTML Template">
    <meta name="keywords" content="music, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="shortcut icon" />

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/slicknav.min.css" />

    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/mystyle.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />




</head>

<body class="">
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header section -->

    <!-- Header section end -->



    <!-- main container start -->
    <div class="main-container">

        <!-- main container left start -->
        <div class="main-container-left">

            <!-- desktop nav container start--->
            <?php include 'desktop-side-nav.php'; ?>
            <!-- desktop nav container end -->

        </div>
        <!-- main container left end -->





        <!-- main container middle start -->
        <div class="main-container-middle all-contests-body">


            <div class="all-contests-header"> <i class="fa fa-angle-left fl back-icon" onclick="go_back()"></i> Select Contest</div>

            <!--=== all contests container start ===--->
            <div class="all-contests-container">


                <!-- contest 1 start-->
                <div class="all-contests-box">
                    <div class="all-contests-box-left">
                        <img src="../contestimages/contestimg1.jpg" class="all-contests-box-img">
                    </div>

                    <div class="all-contests-box-right">
                        <div style="padding:10px;">
                            <span class="contest-name">Typing Contest<span> <br>
                                    <i class="fa fa-star" style="color:orange;font-size:14px;"></i>
                                    <i class="fa fa-star" style="color:orange;font-size:14px;"></i>
                                    <i class="fa fa-star" style="color:orange;font-size:14px;"></i>
                        </div>
                        <div class="contest-description">
                            Be the first to type 5 sentences in th shortest time possible and win the contest.
                        </div>
                        <div class="centered-div" style="margin-bottom:10px;">
                            <a href="typing-contest.php" class="contest-btn">Play now</a>
                        </div>

                    </div>

                </div>
                <!-- contest 1 end -->







                <!-- contest 2 start-->
                <div class="all-contests-box">
                    <div class="all-contests-box-left">
                        <img src="../contestimages/contestimg2.jpg" class="all-contests-box-img">
                    </div>

                    <div class="all-contests-box-right">
                        <div style="padding:10px;">
                            <span class="contest-name">Memory Contest<span> <br>
                                    <i class="fa fa-star" style="color:orange;font-size:14px;"></i>
                                    <i class="fa fa-star" style="color:orange;font-size:14px;"></i>
                                    <i class="fa fa-star" style="color:orange;font-size:14px;"></i>
                        </div>
                        <div class="contest-description">
                            Flip cards with the same values in pairs.. lets see how long it takes you to fip all!
                        </div>
                        <div class="centered-div" style="margin-bottom:10px;">
                            <a href="memory-contest.php" class="contest-btn">Play now</a>
                        </div>

                    </div>

                </div>
                <!-- contest 2 end -->








            </div>
            <!--=== all contests container start ===--->

        </div>
        <!-- main container middle end -->






        <!-- main container right start -->
        <div class="main-container-right">





        </div>
        <!--main container right end -->

    </div>
    <!-- main container end -->


















    <!-- Footer section -->
    <br><br>
    

    <!-- Footer section end -->

    <?php
    include 'mobile-bottom-nav.php';
    ?>
    <!--====== Javascripts & Jquery ======-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>