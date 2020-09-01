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


            .withdraw-container {
                width: 90%;
                margin: auto;
                margin-top: 20px;
                margin-bottom: 100px;
            }

            .withdraw-container .centered-div .withdraw-icon {
                width: 80px;
                height: 80px;
            }


            .withdraw-container .message {
                width: 100%;
                text-align: center;
                padding: 10px;
            }

            .withdraw-container .form-container {
                width: 100%;
                margin-top: 10px;
                background-color: #eee;
                padding: 10px;
            }



            label {
                font-weight: 600;
            }


            .overlay-container {
                position: fixed;
                top: 0px;
                left: 0px;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.9);
                z-index: 1000;
                /* display: none; */
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
                width: 50px;
                height: 50px;
                margin-top: 30px;
            }

            .overlay-container .box .message {
                width: 100%;
                padding: 10px;
                text-align: center;
                margin-top: 50px;
            }

            .overlay-container .box .centered-div .airtime-withdrawal-btn {
                width: 200px;
                padding: 10px;
                border: none;
                border: none;
                border-radius: 4px;
                background-color: crimson;
                color: white;
            }


            .overlay-container .box .centered-div .cash-withdrawal-btn {
                width: 200px;
                padding: 10px;
                border: none;
                border: none;
                border-radius: 4px;
                background-color: royalblue;
                color: white;
            }


            .loader-container {
                position: fixed;
                top: 0px;
                left: 0px;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.9);
                z-index: 1000;
                display: none;
            }

            .loader-container .centered-div .icon {
                width: 80px;
                height: 80px;
                margin-top: 30%;

            }
        }

        /*********** end of smaller screen *********** */




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


            .withdraw-container {
                width: 90%;
                margin: auto;
                margin-top: 20px;
                margin-bottom: 100px;
            }

            .withdraw-container .centered-div .withdraw-icon {
                width: 80px;
                height: 80px;
            }


            .withdraw-container .message {
                width: 100%;
                text-align: center;
                padding: 10px;
            }

            .withdraw-container .form-container {
                width: 100%;
                margin-top: 10px;
                background-color: #eee;
                padding: 10px;
            }



            label {
                font-weight: 600;
            }


            .overlay-container {
                position: fixed;
                top: 0px;
                left: 0px;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.9);
                z-index: 1000;
                /* display: none; */
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
                width: 50px;
                height: 50px;
                margin-top: 30px;
            }

            .overlay-container .box .message {
                width: 100%;
                padding: 10px;
                text-align: center;
                margin-top: 50px;
            }

            .overlay-container .box .centered-div .airtime-withdrawal-btn {
                width: 200px;
                padding: 10px;
                border: none;
                border: none;
                border-radius: 4px;
                background-color: crimson;
                color: white;
            }


            .overlay-container .box .centered-div .cash-withdrawal-btn {
                width: 200px;
                padding: 10px;
                border: none;
                border: none;
                border-radius: 4px;
                background-color: royalblue;
                color: white;
            }


            .loader-container {
                position: fixed;
                top: 0px;
                left: 0px;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.9);
                z-index: 1000;
                display: none;
            }

            .loader-container .centered-div .icon {
                width: 80px;
                height: 80px;
                margin-top: 10%;

            }

        }

        /***************************************** end of bigger screen ****************************** */
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
                Withdraw
            </div>
            <!--=== header container start ==--->

            <!--== withdraw container start ===--->
            <div class="withdraw-container">

                <div class="centered-div">
                    <img src="../img/icons/gems.png" class="withdraw-icon" alt="">
                </div>


                <!-- <div class="message">
                    Kindly enter the amount you want to withdraw
                </div> -->

                <!-- form container start -->
                <div class="form-container">

                    <div class="alert alert-info" style="font-size:13px;">You have <span class="alert-link"><span>&#8358</span><?php echo number_format($user->getUserDetail($session_id, "withdrawable_balance")); ?></span> available for withdrawals</div>

                    <input type="text" name="withdrawable_balance" class="withdrawable-balance" value="<?php echo $user->getUserDetail($session_id, "withdrawable_balance"); ?>" style="display:none;">


                    <!-- airtime withdrawal start --->
                    <div class="airtime-withdrawal-container">

                        <label for="">Amount</label>
                        <select name="amount" class="form-control airtime-withdrawal-amount" id="">
                            <option value="100">N100 airtime</option>
                            <option value="400">N400 airtime</option>
                            <option value="1000">N1000 airtime</option>
                        </select>


                        <br>
                        <label for="">Network</label>
                        <select name="network" class="form-control airtime-withdrawal-network" id="">
                            <option value="mtn">MTN</option>
                            <option value="airtel">AIRTEL</option>
                            <option value="9mobile">9MOBILE</option>
                            <option value="glo">GLO</option>
                        </select>

                        <br>
                        <label for="">Phone Number</label>
                        <input type="text" name="phone" class="form-control airtime-withdrawal-phone" placeholder="080xxx....">

                        <br>
                        <div class="centered-div">
                            <button type="submit" onclick="submit_airtime_withdrawal()" name="airtime_form" class="site-btn airtime-withdrawal-btn">Send request</button>
                        </div>

                    </div>
                    <!-- airtime withdrawal end -->





                    <!-- cash withdrawal start --->
                    <div class="cash-withdrawal-container">

                        <label for="">Amount</label>
                        <select name="amount" id="" class="form-control cash-withdrawal-amount">
                            <option value="1100"><span>&#8358</span>900</option>
                            <option value="1000"><span>&#8358</span>1000</option>
                            <option value="1500"><span>&#8358</span>1500</option>
                            <option value="2000"><span>&#8358</span>2000</option>
                            <option value="2500"><span>&#8358</span>2500</option>
                            <option value="3000"><span>&#8358</span>3000</option>
                        </select>

                        <br>
                        <label for="">Account Name</label>
                        <input type="text" name="account_name" class="form-control cash-withdrawal-account-name" placeholder="John Doe..">


                        <br>
                        <label for="">Account Number</label>
                        <input type="tel" name="account_number" class="form-control cash-withdrawal-account-number" placeholder="0234xxxxxxxxx">


                        <br>
                        <label for="">Bank Name</label>
                        <input type="text" name="bank_name" class="form-control cash-withdrawal-bank-name" placeholder="E.g First Bank">

                        <br>
                        <label for="">Account Type</label>
                        <select name="account_type" class="form-control cash-withdrawal-account-type" id="">
                            <option>Savings</option>
                            <option>Current</option>
                        </select>
                        <br>
                        <div class="centered-div">
                            <button type="submit" onclick="submit_cash_withdrawal()" name="cash_form" class="site-btn cash-withdrawal-btn">Send request</button>
                        </div>

                    </div>
                    <!-- cash withdrawal end --->

                </div>
                <!-- form container end -->


            </div>
            <!--== withdraw container end ===--->

        </div>
        <!-- main container middle end -->






        <!-- main container right start -->
        <div class="main-container-right">





        </div>
        <!--main container right end -->

    </div>
    <!-- main container end -->













    <div class="overlay-container selection-container" style="display:;">
        <div class="box">

            <div class="message">
                Choose a withdrawal method
            </div>

            <div class="centered-div">
                <button class="airtime-withdrawal-btn">Airtime Withdrawal</button>
            </div>
            <br>
            <div class="centered-div">
                <button class="cash-withdrawal-btn">Cash Withdrawal</button>
            </div>


            <br><br>
            <div class="centered-div">
                <span onclick="go_back()" style="border-bottom:1px dotted grey;font-size:13px;"><i class="fa fa-arrow-left"></i> Close</span>
            </div>
        </div>
    </div>






















    <div class="overlay-container withdrawal-success-modal" style="display:none;">
        <div class="box">
            <div class="centered-div">
                <img src="img/goodsign1.png" class="icon" alt="icon" style="width:100px;height:100px;">
            </div>


            <div class="message">
                <span style="color:mediumseagreen;">withdrawal request sent <i class="fa fa-check"></i></span>
            </div>



            <br><br>
            <div class="centered-div">
                <span onclick="go_back()" style="border-bottom:1px dotted grey;font-size:13px;cursor:pointer;"><i class="fa fa-arrow-left"></i> Close</span>
            </div>
        </div>
    </div>







    <div class="overlay-container withdrawal-failed-modal" style="display:none;">
        <div class="box">
            <div class="centered-div">
                <img src="img/sorry.jpg" class="icon" alt="icon" style="width:100px;height:100px;">
            </div>


            <div class="message">
                <span style="color:red;">withdrawal request failed <i class="fa fa-times"></i></span>
            </div>



            <br><br>
            <div class="centered-div">
                <span onclick="retry()" style="border-bottom:1px dotted grey;font-size:13px;cursor:pointer;"><i class="fa fa-times"></i> retry</span>
            </div>
        </div>
    </div>






    <div class="loader-container">
        <div class="centered-div">
            <img src="img/loader1.gif" alt="loader" class="icon">
        </div>
    </div>


    <!--====== Javascripts & Jquery ======-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/main.js"></script>


    <script>
        function submit_cash_withdrawal() {
            var withdrawable_balance = $(".withdrawable-balance").val();
            var cash_amount = $(".cash-withdrawal-amount").val();
            console.log("withdrawal balance: " + withdrawable_balance)
            console.log("amount: " + cash_amount)

            if (cash_amount <= withdrawable_balance) {
                $(".cash-withdrawal-btn").html("Processing...");
                $(".loader-container").fadeIn();
                setTimeout(() => {
                    send_cash_withdrawal_request()
                }, 2000)
            } else {
                alert("unsufficient balance");

            }
        }


        function submit_airtime_withdrawal() {

            var withdrawable_balance = $(".withdrawable-balance").val();
            var airtime_amount = $(".airtime-withdrawal-amount").val();

            if (airtime_amount <= withdrawable_balance) {
                $(".airtime-withdrawal-btn").html("Processing...");
                $(".loader-container").fadeIn();
                setTimeout(() => {
                    send_airtime_withdrawal_request()
                }, 2000)


            } else {
                alert("unsufficient balance");

            }
        }









        function send_cash_withdrawal_request() {
            var cash_withdrawal_amount = $(".cash-withdrawal-amount").val();
            var cash_withdrawal_account_name = $(".cash-withdrawal-account-name").val();
            var cash_withdrawal_account_number = $(".cash-withdrawal-account-number").val();
            var cash_withdrawal_account_type = $(".cash-withdrawal-account-type").val();
            var cash_withdrawal_bank_name = $(".cash-withdrawal-bank-name").val();

            var cash_withdrawal = "yes";
            $.ajax({

                url: "ajax-withdrawal-handler.php",
                method: "POST",
                async: false,
                data: {
                    "cash_withdrawal": cash_withdrawal,
                    "cash_withdrawal_amount": cash_withdrawal_amount,
                    "cash_withdrawal_account_name": cash_withdrawal_account_name,
                    "cash_withdrawal_account_number": cash_withdrawal_account_number,
                    "cash_withdrawal_account_type": cash_withdrawal_account_type,
                    "cash_withdrawal_bank_name": cash_withdrawal_bank_name
                },
                success: function(data) {
                    if (JSON.parse(data).status == "success") {
                        $(".loader-container").fadeOut();
                        $(".withdrawal-success-modal").fadeIn();
                        console.log("withdrawal request was sent successfully")
                    } else if (JSON.parse(data).status == "failed") {
                        $(".loader-container").fadeOut();
                        $(".withdrawal-failed-modal").fadeIn();
                        console.log("withdrawal request faild!")
                    }
                }
            })


        }






        function send_airtime_withdrawal_request() {
            var airtime_withdrawal_amount = $(".airtime-withdrawal-amount").val();
            var airtime_withdrawal_network = $(".airtime-withdrawal-network").val();
            var airtime_withdrawal_phone = $(".airtime-withdrawal-phone").val();

            var airtime_withdrawal = "yes";
            $.ajax({

                url: "ajax-withdrawal-handler.php",
                method: "POST",
                async: false,
                data: {
                    "airtime_withdrawal": airtime_withdrawal,
                    "airtime_withdrawal_amount": airtime_withdrawal_amount,
                    "airtime_withdrawal_network": airtime_withdrawal_network,
                    "airtime_withdrawal_phone": airtime_withdrawal_phone
                },
                success: function(data) {
                    if (JSON.parse(data).status == "success") {
                        $(".loader-container").fadeOut();
                        $(".withdrawal-success-modal").fadeIn();
                        console.log("withdrawal request was sent successfully")
                    } else if (JSON.parse(data).status == "failed") {
                        $(".loader-container").fadeOut();
                        $(".withdrawal-failed-modal").fadeIn();
                        console.log("withdrawal request faild!")
                    }
                }
            })


        }










        $(".airtime-withdrawal-btn").click(function() {

            $(".airtime-withdrawal-container").show();
            $(".cash-withdrawal-container").hide();
            $(".selection-container").slideUp();
        })


        $(".cash-withdrawal-btn").click(function() {

            $(".cash-withdrawal-container").show();
            $(".airtime-withdrawal-container").hide();
            $(".selection-container").slideUp();
        })

        function retry() {
            $(".withdrawal-failed-modal").fadeOut();
        }
    </script>
</body>

</html>