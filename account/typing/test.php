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
    <h1>Hello test</h1>
    <button onclick="start_countdown_timer(100)">count down</button>
    <button onclick="start_countup_timer(0)">count up</button>
    <button onclick="finish()">Finsh</button>
    <div><span class="minutes">0</span>:<span class="seconds">20</span>:<span class="milli-seconds"></span></div>

    <div class="result"></div>
    <!--====== Javascripts & Jquery ======-->
    <script src="../../js/jquery-3.2.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.slicknav.min.js"></script>
    <script src="../../js/owl.carousel.min.js"></script>
    <script src="../../js/mixitup.min.js"></script>
    <script src="../../js/main.js"></script>
    <script src="../../js/mymain.js"></script>

    <script>
        var milli_seconds = 0;
        var minutes = 0;
        var seconds = 0;
        var time = {};
        var reduce_time;
        var increase_time;
        var milli_seconds_interval;

        function start_milli_seconds() {
            milli_seconds_interval = setInterval(function() {
                milli_seconds++;
                $(".milli-seconds").html(milli_seconds)
                if (milli_seconds >= 10) {
                    milli_seconds = 0;
                }
            }, 100);
        }

        function get_milli_seconds() {
            return milli_seconds;
        }

        get_milli_seconds();

        function format_time(sec) {
            minutes = Math.floor(sec / 60);
            seconds = Math.floor(sec % 60);
            milli_seconds = get_milli_seconds();
            time = {
                minutes: minutes,
                seconds: seconds,
                milli_seconds: milli_seconds
            }

            return time;

        }

        function start_countdown_timer(sec) {
            reduce_time = setInterval(function() {
                sec--;
                time = format_time(sec);
                $(".minutes").html(time.minutes);
                $(".seconds").html(time.seconds);
                if (sec <= 0) {
                    clearInterval(reduce_time)


                }
            }, 1000)

            start_milli_seconds();

        }


        function start_countup_timer(sec) {
            increase_time = setInterval(function() {
                sec++;
                var time = format_time(sec);
                $(".minutes").html(time.minutes);
                $(".seconds").html(time.seconds);
                if (sec >= 20) {
                    clearInterval(reduce_time)


                }
            }, 1000)

        }


        function finish() {
            clearInterval(reduce_time);
            clearInterval(increase_time)
            clearInterval(milli_seconds_interval)
            $(".result").html("Minutes: " + minutes + ", Seconds: " + seconds + " MillSeconds: " + milli_seconds)
        }









        // setInterval(function() {
        //     var reduce_contest_time = "yes";
        //     $.ajax({

        //         url: "ajax-reduct-contest-time.php",
        //         method: "POST",
        //         async: false,
        //         data: {
        //             "reduce_contest_time": reduce_contest_time
        //         },
        //         success: function(data) {
        //             // alert("ya")
        //         }

        //     });

        // }, 1000);
    </script>

</body>

</html>