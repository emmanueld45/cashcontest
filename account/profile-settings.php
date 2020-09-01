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



            .settings-container {
                width: 90%;
                padding: 10px;
                background-color: #eee;
                margin: auto;
                margin-top: 10px;
                margin-bottom: 10px;
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


            .settings-container {
                width: 70%;
                padding: 10px;
                background-color: #eee;
                margin: auto;
                margin-top: 40px;
                margin-bottom: 10px;
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
                Profile settings
            </div>
            <!--=== header container start ==--->





            <!--=== settings container start ===--->
            <div class="settings-container">

                <div>
                    <h4>Personal Details</h4>
                </div>
                <?php
                if (isset($_GET['update_success'])) {
                    echo '
                       <div class="alert alert-success alert-link">Updated successfully <i class="fa fa-check-circle"></i></div>
                     ';
                }

                if (isset($_GET['password_changed'])) {
                    echo '
                       <div class="alert alert-success alert-link">password successfully changed <i class="fa fa-check-circle"></i></div>
                     ';
                }

                if (isset($_GET['old_password_incorrect'])) {
                    echo '
                       <div class="alert alert-danger alert-link">Old password incorrect!</div>
                     ';
                }

                if (isset($_GET['passwords_do_not_match'])) {
                    echo '
                       <div class="alert alert-danger alert-link">Passwords do not match!</div>
                     ';
                }


                if (isset($_GET['error'])) {
                    echo '
                       <div class="alert alert-danger alert-link">An error ocurred, try again!</div>
                     ';
                }

                ?>
                <br>
                <form action="" method="POST">

                    <label for="firstname">Firstname</label>
                    <input type="text" class="form-control" name="firstname" value="<?php echo $user->getUserDetail($session_id, "firstname") ?>">
                    <br>
                    <label for="lastname">Lastname</label>
                    <input type="text" class="form-control" name="lastname" value="<?php echo $user->getUserDetail($session_id, "lastname") ?>">

                    <br>
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $user->getUserDetail($session_id, "email") ?>">

                    <br>
                    <label for="Phone">Phone</label>
                    <input type="tel" class="form-control" name="phone" value="<?php echo $user->getUserDetail($session_id, "phone") ?>">
                    <br>

                    <div class="centered-div">
                        <button type="submit" class="site-btn" name="update_personal_details" style="font-size:18px;">UPDATE</button>
                    </div>

                </form>
            </div>
            <!--=== settings container end ===--->
















            <br><br><br>
            <!--=== settings container start ===--->
            <div class="settings-container">

                <div>
                    <h4>Password Details</h4>
                </div>
                <br>
                <form action="" method="POST">

                    <label for="firstname">Old password</label>
                    <input type="password" class="form-control" name="old_password">
                    <br>
                    <label for="lastname">New Password</label>
                    <input type="password" class="form-control" name="new_password">

                    <br>
                    <label for="lastname">Confirm New Password</label>
                    <input type="password" class="form-control" name="confirm_new_password">

                    <br>

                    <div class="centered-div">
                        <button type="submit" class="site-btn" name="update_password_details" style="font-size:18px;">CHANGE PASSWORD</button>
                    </div>

                </form>
            </div>
            <!--=== settings container end ===--->







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











    <!-- Footer section -->

    <!-- Footer section end -->















    <?php


    if (isset($_POST['update_personal_details'])) {
        $firstname = mysqli_escape_string($db->conn, $_POST['firstname']);
        $lastname = mysqli_escape_string($db->conn, $_POST['lastname']);
        $phone = mysqli_escape_string($db->conn, $_POST['phone']);
        $email = mysqli_escape_string($db->conn, $_POST['email']);

        $result = $db->setQuery("UPDATE users SET firstname='$firstname', lastname='$lastname', phone='$phone', email='$email' WHERE uniqueid='$session_id';");
        if ($result) {
            echo '
<script>
window.location.href="profile-settings.php?update_success=true";
</script>
';
        } else {
            echo '
    <script>
    window.location.href="profile-settings.php?update_failed=true";
    </script>
    ';
        }
    }

















    if (isset($_POST['update_password_details'])) {

        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $confirm_new_password = $_POST['confirm_new_password'];

        $result1 = $db->setQuery("SELECT * FROM users WHERE uniqueid='$session_id';");
        $row1 = mysqli_fetch_assoc($result1);


        if (PASSWORD_VERIFY($old_password, $row1['password'])) {

            if ($new_password == $confirm_new_password) {

                $hashed = password_hash($new_password, PASSWORD_DEFAULT);

                $result2 = $db->setQuery("UPDATE users SET password='$hashed' WHERE uniqueid='$session_id';");

                if ($result2) {
                    echo '
                    <script>
                    window.location.href="profile-settings.php?password_changed=true";
                    </script>
                    ';
                } else {
                    echo '
                    <script>
                    window.location.href="profile-settings.php?error=true";
                    </script>
                    ';
                }
            } else {

                echo '
    <script>
    window.location.href="profile-settings.php?passwords_do_not_match=true";
    </script>
    ';
            }
        } else {
            echo '
            <script>
            window.location.href="profile-settings.php?old_password_incorrect=true";
            </script>
            ';
        }
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
        }
    </script>










</body>

</html>