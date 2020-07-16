<?php

include '../../classes/database.class.php';
include '../../classes/typing_contest.class.php';
include '../../classes/users.class.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .box {
            width: 300px;
            border: 1px solid lightgrey;
            margin: 10px;
            padding: 10px;
        }
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>


    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/font-awesome.min.css" />
    <link rel="stylesheet" href="../../css/owl.carousel.min.css" />
    <link rel="stylesheet" href="../../css/slicknav.min.css" />

    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/mystyle.css" />


</head>

<body>
    <h1>Time test</h1>
    <span class="minutes-display"></span>:<span class="seconds-display"></span>
    <div class="display1"></div>
    <br><br>
    <span class="minutes-display1"></span>:<span class="seconds-display1"></span>
    <div class="display2"></div>


    <br><br>
    <button onclick="end_contest()">Stop CountUp</button>
    <br>
    <span class="minutes-display3"></span>:<span class="seconds-display3"></span>
    <div class="display3"></div>
    <!--====== Javascripts & Jquery ======-->
    <script src="../../js/jquery-3.2.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.slicknav.min.js"></script>
    <script src="../../js/owl.carousel.min.js"></script>
    <script src="../../js/mixitup.min.js"></script>
    <script src="../../js/main.js"></script>
    <script src="../../js/mymain.js"></script>
    <script src="js/timer.js"></script>

    <script>
        var count_up = new CountUpTimer();
        count_up.start();
        var count = 1;


        var change_question = function() {
            if (count >= 4) {
                end_contest();
            } else {
                count++;
                document.querySelector(".display2").innerHTML = "Question " + count + " has been gotten!";
                count_down.set_time(10);
                count_down.start(change_question);
            }
        }


        var count_down = new CountDownTimer('.minutes-display1', '.seconds-display1');
        count_down.set_time(10);
        count_down.start(change_question);



        function end_contest() {
            count_up.stop();
            count_down.stop();
            document.querySelector(".display3").innerHTML = "Contest ended in " + count_up.get_seconds() + " seconds";
            format_time(count_up.get_seconds(), '.minutes-display3', '.seconds-display3');
        }

        var general_count_down = new CountDownTimer();
        general_count_down.set_time(15);
        general_count_down.start(end_contest);
    </script>

</body>

</html>