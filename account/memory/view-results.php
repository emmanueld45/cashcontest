<?php

include '../../classes/database.class.php';
include '../../classes/memory_contest.class.php';
include '../../classes/users.class.php';
include '../../classes/admin.class.php';
include '../../classes/activities.class.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .centered-div {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }


        .mybtn {
            width: 300px;
            height: 300px;
            font-weight: bold;
            font-size: 50px;
            background-color: lightblue;
            transition: 0.5s ease-in-out;
            transform: rotateY(180deg);
            transform-style: preserve-3d;
            box-shadow: 10px 10px 10px black;
        }

        /* .mybtn:hover {
            transform: rotateY(0deg);
            background-color: red;
        } */
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memory</title>


    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/font-awesome.min.css" />
    <link rel="stylesheet" href="../../css/owl.carousel.min.css" />
    <link rel="stylesheet" href="../../css/slicknav.min.css" />

    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="../../css/style.css" />
    <link rel="stylesheet" href="../../css/mystyle.css" />


</head>

<body>




    <?php
    $contest_id = $_GET['contest_id'];
    $user = new User();

    $result = $db->setQuery("SELECT * FROM memory_contest_participants WHERE contest_id='$contest_id';");

    while ($row = mysqli_fetch_assoc($result)) {
        $userid = $row['userid'];
        $won = $row['won'];
        if ($won == "yes") {
            echo "Name: " . $user->getUserDetail($userid, "name") . " <span>&#8358</span>" . $row['amount_won'] . " WINNER <br>";
        } else {
            echo "Name: " . $user->getUserDetail($userid, "name") . " <span>&#8358</span>" . $row['amount_won'] . "<br>";
        }
    }

    ?>
    <!--====== Javascripts & Jquery ======-->
    <script src="../../js/jquery-3.2.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.slicknav.min.js"></script>
    <script src="../../js/owl.carousel.min.js"></script>
    <script src="../../js/mixitup.min.js"></script>
    <script src="../../js/main.js"></script>
    <script src="../../js/mymain.js"></script>
    <script src="js/format.time.js"></script>


    <script>

    </script>

</body>

</html>