<?php

session_start();
include '../classes/database.class.php';
include '../classes/typing_contest.class.php';
include '../classes/memory_contest.class.php';
include '../classes/users.class.php';
include '../classes/activities.class.php';
include '../classes/admin.class.php';


$typing = new TypingContest();
$memory = new memoryContest();
$activity = new Activity();
$admin = new Admin();
$user = new User();

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

    <style>
        /********** start of  smaller screen*********************/
        @media only screen and (max-width: 690px) {
            .header-container {
                width: 100%;
                height: 50px;
                background-color: #08192d;
                color: white;
                text-align: center;
                font-size: 18px;
                line-height: 40px;
            }

            .back-icon {
                width: 30px;
                height: 30px;
                border-radius: 30px;
                background-color: rgba(0, 0, 0, 0.7);
                line-height: 30px;
                opacity: 0.7;
                position: relative;
                left: 5px;
                top: 5px;
            }

            .switching-container {
                width: 80%;
                margin: auto;
                display: flex;
                flex-flow: row nowrap;
                justify-content: center;
                margin-top: 10px;
            }

            .switching-container .online-btn {
                width: 50%;
                border: none;
                background-color: white;
                border-bottom: 1px solid mediumseagreen;
                color: mediumseagreen;
            }

            .switching-container .coupon-btn {
                width: 50%;
                border: none;
                background-color: white;
                color: grey;
            }

            .online-container {
                width: 90%;
                margin: auto;
                height: 300px;
                background-color: ;
                margin-top: 20px;
            }

            .online-container .online-box {
                width: 100%;
                height: 70px;
                border: 1px solid lightgrey;
                padding: 10px;
                margin-bottom: 20px;
                background-color: ;
                border-radius: 5px;
                position: relative;
            }

            .online-container .online-box.active {
                border: 1px solid mediumseagreen;
            }

            .online-container .online-box .coin_price {
                font-weight: bold;
                font-size: 18px;
                display: block;
                color: orange;
            }

            .online-container .online-box .coin_price .img {
                width: 23px;
                height: 23px;
                position: relative;
                top: -3px;
            }

            .online-container .online-box .naira_price {
                font-weight: normal;
                display: block;
                color: mediumseagreen;
            }

            .online-container .online-box .buy-btn {
                padding: 7px;
                background-color: mediumseagreen;
                color: white;
                border: none;
                border-radius: 3px;
                position: absolute;
                top: 30%;
                right: 10px;
                font-size: 14px;
            }



            .coupon-container {
                width: 80%;
                margin: auto;
                margin-top: 40px;
                display: none;
            }

            .coupon-container .coupon-code {
                width: 100%;
                padding: 10px;
                border: none;
                border-bottom: 1px solid lightgrey;
                margin-bottom: 20px;
            }


            .coupon-container .coupon-buy-btn {
                width: 80%;
                padding: 10px;
                background-color: mediumseagreen;
                color: white;
                border: none;
                border-radius: 3px;

            }

            .overlay-container {
                position: fixed;
                top: 0px;
                left: 0px;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.9);
                z-index: 1000;
                display: none;
            }


            .overlay-container .box {
                width: 100%;
                margin: auto;
                height: 100%;
                background-color: white;
                /* margin-top: 30px; */
                padding: 10px;
            }


            .overlay-container .box .centered-div .icon {
                width: 100px;
                height: 100px;
                margin-top: 30px;
            }

            .overlay-container .box .message {
                width: 100%;
                padding: 10px;
                text-align: center
            }



        }

        /******************* end of smaller screen ****************** */
        /***************************************** start of bigger screen********************************************/
        @media only screen and (min-width: 690px) {

            .header-container {
                width: 100%;
                height: 50px;
                background-color: #08192d;
                color: white;
                text-align: center;
                font-size: 18px;
                line-height: 40px;
            }


            .back-icon {
                width: 30px;
                height: 30px;
                border-radius: 30px;
                background-color: rgba(0, 0, 0, 0.7);
                line-height: 30px;
                opacity: 0.7;
                position: relative;
                left: 5px;
                top: 5px;
            }

            .switching-container {
                width: 60%;
                margin: auto;
                display: flex;
                flex-flow: row nowrap;
                justify-content: center;
                margin-top: 10px;
            }

            .switching-container .online-btn {
                width: 50%;
                border: none;
                background-color: white;
                border-bottom: 1px solid mediumseagreen;
                color: mediumseagreen;
            }

            .switching-container .coupon-btn {
                width: 50%;
                border: none;
                background-color: white;
                color: grey;
            }

            .online-container {
                width: 70%;
                margin: auto;
                height: 300px;
                background-color: ;
                margin-top: 20px;
            }

            .online-container .online-box {
                width: 100%;
                height: 80px;
                border: 1px solid lightgrey;
                padding: 10px;
                margin-bottom: 20px;
                background-color: ;
                border-radius: 5px;
                position: relative;
            }

            .online-container .online-box.active {
                border: 1px solid mediumseagreen;
            }

            .online-container .online-box .coin_price {
                font-weight: bold;
                font-size: 18px;
                display: block;
                color: orange;
            }

            .online-container .online-box .coin_price .img {
                width: 23px;
                height: 23px;
                position: relative;
                top: -3px;
            }

            .online-container .online-box .naira_price {
                font-weight: normal;
                display: block;
                color: mediumseagreen;
            }

            .online-container .online-box .buy-btn {
                padding: 7px;
                background-color: mediumseagreen;
                color: white;
                border: none;
                border-radius: 3px;
                position: absolute;
                top: 30%;
                right: 10px;
                font-size: 14px;
            }



            .coupon-container {
                width: 70%;
                margin: auto;
                margin-top: 40px;
                display: none;
            }

            .coupon-container .coupon-code {
                width: 100%;
                padding: 10px;
                border: none;
                border-bottom: 1px solid lightgrey;
                margin-bottom: 20px;
            }


            .coupon-container .coupon-buy-btn {
                width: 80%;
                padding: 10px;
                background-color: mediumseagreen;
                color: white;
                border: none;
                border-radius: 3px;

            }



            .overlay-container {
                position: fixed;
                top: 0px;
                left: 0px;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.9);
                z-index: 1000;
                display: none;
            }


            .overlay-container .box {
                width: 100%;
                margin: auto;
                height: 100%;
                background-color: white;
                /* margin-top: 30px; */
                padding: 10px;
            }


            .overlay-container .box .centered-div .icon {
                width: 100px;
                height: 100px;
                margin-top: 30px;
            }

            .overlay-container .box .message {
                width: 100%;
                padding: 10px;
                text-align: center
            }

        }

        /******************* end of biiger screen *************** */
    </style>


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

            <!--=== header container start ==--->
            <div class="header-container">
                <i class="fa fa-arrow-left fl back-icon" onclick="go_back()"></i>
                Top-Up
            </div>
            <!--=== header container start ==--->


            <!--== switching container start ===-->
            <div class="switching-container">
                <button class="online-btn">Pay Online</button>
                <button class="coupon-btn">Via Coupon</button>
            </div>
            <!--== switching container start ===-->





            <!--== online container start ==--->
            <div class="online-container" style="display:;">

                <div class="online-box">
                    <span class="coin_price">300 <img src="img/coins.png" class="img"></span>
                    <span class="naira_price"><span>&#8358</span>300</span>
                    <button class="buy-btn" price="300">Buy now</button>
                </div>





                <div class="online-box active">
                    <span class="coin_price">500 <img src="img/coins.png" class="img"></span>
                    <span class="naira_price"><span>&#8358</span>500</span>
                    <button class="buy-btn" price="500">Buy now</button>
                </div>






                <div class="online-box">
                    <span class="coin_price">1000 <img src="img/coins.png" class="img"></span>
                    <span class="naira_price"><span>&#8358</span>1000</span>
                    <button class="buy-btn" price="1000">Buy now</button>
                </div>

            </div>
            <!--== online container start ==--->







            <!--=== coupon container start ==--->
            <div class="coupon-container">

                <div class="alert alert-info" style="font-size:13px;">Pay using a purchased Coupon.. Don't have a Coupon yet? <a href="" class="alert-link"><u>click here</u></a></div>
                <p class="invalid-coupon-display" style="font-size:13px;color:red;display:none;">Coupon is invalid...</p>
                <input type="text" class="coupon-code" placeholder="Enter Coupon...">

                <div class="centered-div">
                    <button class="coupon-buy-btn">Buy Now</button>
                </div>



            </div>
            <!--=== coupon container start ==--->








        </div>
        <!-- main container middle end -->






        <!-- main container right start -->
        <div class="main-container-right">





        </div>
        <!--main container right end -->

    </div>
    <!-- main container end -->





    <div class="overlay-container payment-success-modal" style="display:;">
        <div class="box">
            <div class="centered-div">
                <img src="img/coins2.png" class="icon" alt="icon">
            </div>
            <div class="message">
                You successfully purchased <span class="coin-amount" style="color:orange">300</span> coins
            </div>
            <div class="centered-div">
                <button class="btn btn-danger" onclick="close_overlay()"><i class="fa fa-arrow-left"></i> Close</button>
            </div>
        </div>
    </div>





    <div class="overlay-container payment-failed-modal" style="display:;">
        <div class="box">
            <div class="centered-div">
                <img src="img/sad.png" class="icon" alt="icon">
            </div>
            <div class="message">
                Sorry, We could not process you payment!
            </div>
            <div class="centered-div">
                <button class="btn btn-danger" onclick="close_overlay()"><i class="fa fa-arrow-left"></i> Close</button>
            </div>
        </div>
    </div>









    <input type="text" class="firstname" value="<?php echo $user->getUserDetail($session_id, "firstname"); ?>" style="display:none;">
    <input type="text" class="lastname" value="<?php echo $user->getUserDetail($session_id, "lastname"); ?>" style="display:none;">
    <input type="text" class="email" value="<?php echo $user->getUserDetail($session_id, "email"); ?>" style="display:none;">

    <!-- Footer section -->

    <!-- Footer section end -->

    <!--====== Javascripts & Jquery ======-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/main.js"></script>


    <script>
        // online button click start
        $(".online-btn").click(function() {

            $(".online-btn").css({
                "border-bottom": "1px solid mediumseagreen",
                "color": "mediumseagreen"
            })
            $(".coupon-btn").css({
                "border": "none",
                "color": "grey"
            })

            $(".coupon-container").slideUp();
            $(".online-container").slideDown();
        })

        // online button click end





        // coupon button click start
        $(".coupon-btn").click(function() {

            $(".coupon-btn").css({
                "border-bottom": "1px solid mediumseagreen",
                "color": "mediumseagreen"
            })
            $(".online-btn").css({
                "border": "none",
                "color": "grey"
            })

            $(".online-container").slideUp();
            $(".coupon-container").slideDown();
        })

        // coupon button click end



        $(".coupon-code").keyup(function() {
            $(".invalid-coupon-display").hide();
        })

        function close_overlay() {
            $(".overlay-container").fadeOut();
        }
    </script>









    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script>
        var amount;
        $(".buy-btn").click(function() {
            amount = $(this).attr("price")
            payWithPaystack()
        })


        function payWithPaystack() {
            var handler = PaystackPop.setup({
                key: 'pk_test_b9cae282af918592cf48693cdd9a457049255ce8', // Replace with your public key
                email: $(".email").val(),
                amount: amount + "00", // the amount value is multiplied by 100 to convert to the lowest currency unit
                currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars
                firstname: $(".firstname").val(),
                lastname: $(".lastname").val(),
                reference: 'YOUR_REFERENCE', // Replace with a reference you generated
                callback: function(response) {
                    //this happens after the payment is completed successfully
                    var reference = response.reference;

                    // Make an AJAX call to your server with the reference to verify the transaction
                    var process_online_payment = "yes";
                    $.ajax({

                        url: "ajax-payment-handler.php",
                        method: "POST",
                        async: false,
                        data: {
                            "process_online_payment": process_online_payment,
                            "amount": amount,
                        },
                        success: function(data) {
                            console.log("payment ajax request was made! and data: " + data)
                            if (JSON.parse(data).status == "success") {
                                // alert("payment was successful")
                                $(".payment-success-modal").fadeIn()
                                $(".coin-amount").html(JSON.parse(data).amount)
                            } else if (JSON.parse(data).status == "failed") {
                                alert("an error ocurred")
                            }
                        }

                    });

                },
                onClose: function() {
                    // alert('Transaction was not completed, window closed.');
                    $(".payment-failed-modal").fadeIn();
                },
            });
            handler.openIframe();
        }





















        var coupon_code;
        $(".coupon-buy-btn").click(function() {
            coupon_code = $(".coupon-code").val();

            var process_coupon_payment = "yes";
            $.ajax({

                url: "ajax-payment-handler.php",
                method: "POST",
                async: false,
                data: {
                    "process_coupon_payment": process_coupon_payment,
                    "coupon_code": coupon_code,
                },
                success: function(data) {
                    console.log("payment ajax request was made! and data: " + data)
                    if (JSON.parse(data).status == "success") {
                        $(".coupon-code").val("")
                        $(".payment-success-modal").fadeIn();
                        $(".coin-amount").html(JSON.parse(data).amount)
                        // alert("payment was successful and you account has been funded")
                    } else if (JSON.parse(data).status == "invalid coupon") {
                        $(".invalid-coupon-display").show();
                        // alert("coupon is invalid")
                    } else if (JSON.parse(data).status == "failed") {
                        $(".payment-failed-modal").fadeIn();
                        // alert("an error ocurred");
                    }
                }

            });

        })
    </script>
</body>

</html>