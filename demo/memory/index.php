<?php
session_start();
include '../../classes/database.class.php';
include '../../classes/memory_contest.class.php';
include '../../classes/users.class.php';
include '../../classes/activities.class.php';

$memory = new MemoryContest();
$user = new User();
$activity = new Activity();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>

    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memory</title>


    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/slicknav.min.css" />

    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/mystyle.css" />


</head>

<body>



    <!--====== Javascripts & Jquery ======-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/mymain.js"></script>
    <script src="js/timer.js"></script>

    <script src="js/format.time.js"></script>



<script>
window.location.href="game.php";
</script>

</body>

</html>