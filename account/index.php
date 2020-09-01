<?php
session_start();

include '../classes/database.class.php';
include '../classes/users.class.php';
include '../classes/activities.class.php';


$user = new User();
$activity = new Activity();


$session_id = $_SESSION['id'];

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

<body>
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
        <div class="main-container-middle">


            <!-- top container start -->
            <div class="top-container">
                <img src="<?php echo $user->getUserDetail($session_id, "image"); ?>" class="top-container-cover-img">
                <div class="top-container-main-section">
                    <div class="top-container-nav">
                        <i class="fa fa-arrow-left fl" onclick="go_back()" style="width:30px;height:30px;border-radius:30px;background-color:rgba(0, 0, 0, 0.8);line-height:30px;opacity:0.7;"></i> <span>Profile</span>
                    </div>
                    <div class="centered-div" style="margin-top:30px;">
                        <span style="position:relative;">
                            <img src="<?php echo $user->getUserDetail($session_id, "image"); ?>" class="profile-img">
                            <button class="upload-photo-modal-open-btn" style="width:30px;height:30px;border-radius:30px;position:absolute;right:0px;bottom:0px;background-color:rgba(0, 0, 0, 0.7);color:white;opacity:0.7;border:none;">
                                <i class="fa fa-camera"></i>
                            </button>
                        </span>
                    </div>
                    <div class="centered-div" style="margin-top:10px;color:white;">
                        <?php echo $user->getUserDetail($session_id, "firstname") . " " . $user->getUserDetail($session_id, "lastname"); ?>
                    </div>
                    <div class="details-container">
                        <button class="details-btns"><?php echo $user->getUserDetail($session_id, "coins"); ?> <img src="img/coins2.png" class="coin" style="top:-3px;"><br><span class="small">Coins</span></button>
                        <button class="details-btns"><span>&#8358</span><?php echo $user->getUserDetail($session_id, "withdrawable_balance"); ?><br><span class="small">Earned</span></button>
                        <button class="details-btns"><span>&#8358</span><?php echo $user->getUserDetail($session_id, "total_received"); ?><br><span class="small">Received</span></button>
                    </div>
                </div>
            </div>
            <!-- top container end -->

            <!-- reward container start --
            <div class="reward-container">
                <div class="reward-left">
                    <img src="img/trophy.png" class="reward-trophy">
                </div>
                <div class="reward-middle">
                    <span>Earn a reward each time you refer your friends & family</span>
                </div>
                <div class="reward-right">
                    <i class="fa fa-angle-right"></i>
                </div>
            </div>
            <!-- reward container end -->



            <!-- items container start -->
            <div class="body-nav-item-container">

                <a href="top-up.php">
                    <div class="body-nav-item" style="border-top:none;color:crimson;"><i class="fa fa-upload" style="color:crimson;"></i> Top-Up <i class="fa fa-angle-right fr"></i></div>
                </a>
                <a href="my-contests.php">
                    <div class="body-nav-item" style="color:orange;"><i class="fa fa-diamond"></i> My contests <i class="fa fa-angle-right fr"></i></div>
                </a>


                <div class="body-nav-item" style="color:crimson;"><i class="fa fa-flag"></i> Free airtime: <span>&#8358</span><?php echo $user->getUserDetail($session_id, "airtime_balance"); ?> <a href="winwheel"><button class="btn btn-danger fr" style="padding:5px;font-size:14px;background-color:crimson;">Spin</button></a> <button class="btn btn-primary fr cashout-btn" style="font-size:14px;margin-right:7px;">cashout</button></div>


            </div>
            <!-- items container end -->



            <!-- items container start -->
            <div class="body-nav-item-container">

                <!-- <a href="topup.php">
                    <div class="body-nav-item" style="border-top:none;"><i class="fa fa-bell stroke-transparent"></i> Activities <i class="fa fa-angle-right fr"></i></div>
                </a> -->
                <a href="withdraw.php">
                    <div class="body-nav-item"><i class="fa fa-download"></i> Withdraw <i class="fa fa-angle-right fr"></i></div>
                </a>
                <a href="transactions.php">
                    <div class="body-nav-item"><i class="fa fa-refresh"></i> Transactions <i class="fa fa-angle-right fr"></i></div>
                </a>
                <a href="profile-settings.php">
                    <div class="body-nav-item"><i class="fa fa-cog"></i> Profile settings <i class="fa fa-angle-right fr"></i></div>
                </a>

            </div>
            <!-- items container end -->



        </div>
        <!-- main container middle end -->






        <!-- main container right start -->
        <div class="main-container-right">





        </div>
        <!--main container right end -->

    </div>
    <!-- main container end -->








    <!-- withdraw free airtime modal start --->
    <div class="free-airtime-modal">

        <div class="box">

            <?php

            if ($user->getUserDetail($session_id, "airtime_balance") > 100) {
                echo "
                <div class='free-airtime-available-container'>
                    <div class='message'>
                    You're about to withdraw your <span style='color:mediumseagreen;'><span>&#8358</span>" . $user->getUserDetail($session_id, "airtime_balance") . "</span> free airtime
                    </div>
                    <br>
                    <label>Phone Number:</label><br>
                    <input type='tel' class='form-control free-airtime-withdrawal-phone' placeholder=''>
                    <br>
                    <div class='centered-div'>
                    <button class='site-btn free-airtime-withdrawal-btn'>Withdraw</button>
                    </div>

                    </div>


                    <br>
                    <div class='centered-div'>
                    <span class='free-airtime-modal-close-btn' style='color:grey;border-bottom:1px dotted grey;font-size:13px;cursor:pointer;'>close</span>
                    </div>
                  
                    ";
            } else {
                echo "
                
                <div class='message'>
                Your free airtime earnings <span style='color:mediumseagreen;'><span>&#8358</span>" . $user->getUserDetail($session_id, "airtime_balance") . "</span>
                is currently below withdrawal threshold

            
                </div>
                <br>

                *Note: minimum withdrawal threshold is <span style='color:mediumseagreen;'><span>&#8358</span>100</span>

                <div class='centered-div'>
                <span class='free-airtime-modal-close-btn' style='color:grey;border-bottom:1px dotted grey;font-size:13px;cursor:pointer;'>close</span>
                </div>
                ";
            }
            ?>

        </div>
    </div>
    <!-- withdraw free airtime modal  end--->



    <!--=== upload photo modal start ===--->
    <div class="upload-photo-modal">
        <div class="box">
            <!-- <div class="centered-div">
                <img src="img/my-img.jpg" class="img" alt="">
            </div> -->
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="file" name="image" class="form-control photo" id="" accept="image/*">
                <br>
                <div class="centered-div">
                    <button type="submit" name="submit_photo" class="site-btn upload-photo-btn" style="font-size:18px;display:none;">UPLOAD</button>
                </div>
            </form>
            <br>
            <div class='centered-div'>
                <span class='upload-photo-modal-close-btn' style='color:grey;border-bottom:1px dotted grey;font-size:13px;cursor:pointer;'>close</span>
            </div>
        </div>
    </div>
    <!--=== upload photo modal end ===--->




    <br>
    <br>
    <br>
    <?php
    include 'mobile-bottom-nav.php';
    ?>


    <?php



    if (isset($_POST['submit_photo'])) {
        $filename = $_FILES['image']['name'];
        $filetmpname = $_FILES['image']['tmp_name'];
        $filedestination = "profileimages/" . $filename;
        $move = move_uploaded_file($filetmpname, $filedestination);
        $user->setUserDetail($session_id, "image", $filedestination);
        echo '
        <script>
        window.location.href="index.php?upload_success=true";
        </script>
        ';
    }









    ?>

    <!--====== Javascripts & Jquery ======-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/main.js"></script>



    <script>
        $(".cashout-btn").click(function() {
            $(".free-airtime-modal").fadeIn();
        })

        $(".free-airtime-modal-close-btn").click(function() {
            $(".free-airtime-modal").fadeOut();
        })

        $(".free-airtime-withdrawal-btn").click(function() {
            var free_airtime_withdrawal = "yes";
            var phone = $(".free-airtime-withdrawal-phone").val();
            $.ajax({

                url: "ajax-free-airtime-handler.php",
                method: "POST",
                async: false,
                data: {
                    "free_airtime_withdrawal": free_airtime_withdrawal,
                    "free_airtime_withdrawal_phone": phone
                },
                success: function(data) {
                    if (JSON.parse(data).status == "success") {
                        $(".free-airtime-available-container").html("<div style='color:mediumseagreen;font-weight:bold;text-align:center;'>Request successfully sent! <i class='fa fa-check'></i></div>")
                        setTimeout(() => {
                            window.location.href = "./";
                        }, 3000)
                    }
                }

            });

        });


        $(".upload-photo-modal-open-btn").click(function() {
            $(".upload-photo-modal").fadeIn();
        })
        $(".upload-photo-modal-close-btn").click(function() {
            $(".upload-photo-modal").fadeOut();
        })

        $(".photo").change(function() {
            if ($(this).val() != "") {

                $(".upload-photo-btn").show();
            } else {
                $(".upload-photo-btn").hide();
            }
        })
    </script>

</body>

</html>