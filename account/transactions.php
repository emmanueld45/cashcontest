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



            .transactions-container {
                width: 100%;
                padding: 10px;
            }

            .transactions-container table {
                width: 100%;
            }



            .transactions-container table tbody tr {


                color: grey;
            }

            .transactions-container table tbody tr td {
                border-bottom: 1px solid lightgrey;
                border-right: 1px solid lightgrey;
                padding: 10px;
            }

            .colored-row {
                background-color: #eee;
                color: ;
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


            .transactions-container {
                width: 100%;
                padding: 10px;
            }

            .transactions-container table {
                width: 100%;
            }



            .transactions-container table tbody tr {


                color: grey;
            }

            .transactions-container table tbody tr td {
                border-bottom: 1px solid lightgrey;
                border-right: 1px solid lightgrey;
                padding: 10px;
            }

            .colored-row {
                background-color: #eee;
                color: ;
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
                Transactions
            </div>
            <!--=== header container start ==--->





            <!--=== transactions container start ===--->
            <div class="transactions-container">


                <table>


                    <thead>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Time</th>
                    </thead>

                    <tbody>
                        <?php
                        $result = $db->setQuery("SELECT * FROM transactions WHERE userid='$session_id';");
                        $numrows = mysqli_num_rows($result);
                        $sn = 1;
                        if ($numrows != 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr class="">
                                    <td><?php echo $sn; ?></td>
                                    <td><?php echo $row['transaction_type']; ?></td>
                                    <td><?php echo $row['sub_type']; ?></td>
                                    <td><span>&#8358</span><?php echo number_format($row['amount']); ?></td>
                                    <td><?php echo $row['time'] . "  " . $row['date']; ?></td>
                                </tr>



                        <?php
                                $sn++;
                            }
                        } else {
                            echo '<div class="alert alert-info">
                        No transaction yet!
                        </div>';
                        }
                        ?>
                    </tbody>

                </table>

            </div>
            <!--=== transactions container end ===--->





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
        }
    </script>










</body>

</html>