<?php

session_start();
include '../classes/database.class.php';
include '../classes/typing_contest.class.php';
include '../classes/memory_contest.class.php';
include '../classes/users.class.php';
include '../classes/activities.class.php';
include '../classes/admin.class.php';




if(!isset($_SESSION['id'])){
 $admin->goTo("../auth/login", "live_feed");
}
$session_id = $_SESSION['id'];


$admin->markLiveFeedNotificationsAsSeen($session_id);
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


          .feed-container{
              position:fixed;
              top:50px;
              width:100%;
              height:100%;
              background-color:#08192d;
              overflow-y:auto;
              /* background-color:#1c294a; */
          }

          .feed-container .box{
              width:100%;
              display:flex;
              flex-flow:row nowrap;
              background-color:#1c294a;
              /* margin-bottom:10px; */
              border-bottom:1px solid #08192d;
              position:relative;
          }

          .feed-container .box .left{
              /* width:20%; */
              
              background-color:;
              padding:10px;
          }


          .feed-container .box .right{
              /* width:80%; */
             
              background-color:;
              padding:10px;
              color:white;
              position:relative;
          }


          .feed-container .box .left .image{
              width:50px;
              height:50px;
              border-radius:50px;
              border:1.2px solid crimson;
          }

          .feed-container .box .right .message{
              font-size:14px;
              display:block;
              opacity:0.9;
          }

          .feed-container .box .right .time{
              font-size:12px;
              display:block;
              opacity:0.5;
          }

          .feed-container .box .join-btn{
              padding:3px 10px;
              background-color:mediumseagreen;
              text-align:center;
              position:absolute;
              right:10px;
              bottom:10px;
              font-size:14px;
              color:white;
              border-radius:3px;
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


            .feed-container{
              position:absolute;
              top:50px;
              width:100%;
              height:100%;
              background-color:#08192d;
              overflow-y:auto;
              /* background-color:#1c294a; */
          }

          .feed-container .box{
              width:100%;
              display:flex;
              flex-flow:row nowrap;
              background-color:#1c294a;
              margin-bottom:10px;
          }

          .feed-container .box .left{
              /* width:10%; */
              
              background-color:;
              padding:10px;
          }


          .feed-container .box .right{
              /* width:90%; */
             
              background-color:;
              padding:10px;
              color:white;
          }


          .feed-container .box .left .image{
              width:70px;
              height:70px;
              border-radius:70px;
          }

          .feed-container .box .right .message{
              font-size:16px;
              display:block;
              opacity:0.9;
          }

          .feed-container .box .right .time{
              font-size:14px;
              display:block;
              opacity:0.5;
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
                Live Feed
            </div>
            <!--=== header container start ==--->


           <!-- feed conta9ner start --->
            <div class="feed-container">
            
            
            <?php
            
            $result = $db->setQuery("SELECT * FROM activities ORDER BY id DESC;");
            while($row = mysqli_fetch_assoc($result)){
                $userid = $row['userid'];
                $firstname = $user->getUserDetail($userid, "firstname");
                $lastname = $user->getUserDetail($userid, "lastname");
                ?>
               <div class="box">
                 <div class="left">
                   <img src="<?php echo $user->getUserDetail($userid, "image"); ?>" class="image">
                 </div>
                 <div class="right">
                  <span class="message"><?php echo $firstname." ".$lastname; ?>  <span style="color:orange;"><?php echo $row['message']; ?></span></span>
                  <span class="time"><?php echo $db->format_time($row['time']); ?></span>
                 </div>
                 <?php
                 if($row['type'] == "memory_contest" AND !$memory->userIsInContest($row['data'], $session_id)){
                     if($memory->getDetail($row['data'], "status") == "Running"){
                       echo "<a href='memory/game?contest_id=".$row['data']."' class='join-btn'>join?</a>";
                    }
                 }else if($row['type'] == "typing_contest" AND !$typing->userIsInContest($row['data'], $session_id)){
                    if($typing->getDetail($row['data'], "status") == "Running"){
                        echo "<a href='typing/game?contest_id=".$row['data']."' class='join-btn'>join?</a>";
                     }
                 }else if($row['type'] == "memory_contest_win"){
                    echo "<a href='memory/view-results?contest_id=".$row['data']."' class='join-btn'>view results <i class='fa fa-angle-double-right'></i></a>";
                 }else if($row['type'] == "typing_contest_win"){
                    echo "<a href='typing/view-results?contest_id=".$row['data']."' class='join-btn'>view results <i class='fa fa-angle-double-right'></i></a>";
                 }
                 ?>
               </div>
            <?php
            
            }
            ?>
<br><br><br><br>
<br>



            
            
            </div>
            <!-- feed container end --->




        </div>
        <!-- main container middle end -->






        <!-- main container right start -->
        <div class="main-container-right">





        </div>
        <!--main container right end -->

    </div>
    <!-- main container end -->





 








   

    <!-- Footer section -->
    <?php include 'mobile-bottom-nav.php'; ?>
    <!-- Footer section end -->

    <!--====== Javascripts & Jquery ======-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/main.js"></script>


    <script>

    </script>









  
</body>

</html>