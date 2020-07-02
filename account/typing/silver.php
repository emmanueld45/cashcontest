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
            width: 400px;
            border: 1px solid lightgrey;
            margin: 10px;
            padding: 10px;
        }
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Silver</title>


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

    <div class="contests-container"></div>


    <div class="display"></div>

    <!--====== Javascripts & Jquery ======-->
    <script src="../../js/jquery-3.2.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.slicknav.min.js"></script>
    <script src="../../js/owl.carousel.min.js"></script>
    <script src="../../js/mixitup.min.js"></script>
    <script src="../../js/main.js"></script>
    <script src="../../js/mymain.js"></script>


    <script>
        /*  var contest_id;
        var status;
        var num_participants;
        var contest_time;
        var full;
        setInterval(function() {
            var get_details = "yes";
            $.ajax({

                url: "ajax-get-contest-details.php",
                method: "POST",
                async: false,
                data: {
                    "get_details": get_details
                },
                success: function(data) {
                    $(".display").html(data);
                    var contests = JSON.parse(data);
                    //alert(contest[0].contest_id)
                    // alert(contest.length)

                    for (i = 0; i < contests.length; i++) {
                        contest_id = contests[i].contest_id;
                        status = contests[i].status;
                        num_participants = contests[i].participants;
                        contest_time = contests[i].contest_time;
                        full = contests[i].full;

                        // set total number of participants
                        $(".participants-text" + contest_id).html(num_participants);

                        // set the buttons to click
                        if (full == "yes") {
                            $(".full-btn" + contest_id).show();
                            $(".join-btn" + contest_id).hide();
                            $(".ended-btn" + contest_id).hide();
                        } else if (status == "Waiting") {
                            $(".join-btn" + contest_id).show();
                            $(".ended-btn" + contest_id).hide();
                            $(".full-btn" + contest_id).hide();
                        } else if (status == "Ended") {
                            $(".contest-time-btn" + contest_id).html("");
                            $(".ended-btn" + contest_id).show();
                            $(".join-btn" + contest_id).hide();
                            $(".full-btn" + contest_id).hide();
                        }


                        // show "Running" when contest starts
                        if (status == "Running") {
                            $(".contest-time-btn" + contest_id).html("<span style='color:mediumseagreen;'>Running..</span>");
                        }

                        // show the contest time remaining
                        if (status == "Waiting") {
                            $(".contest-time-text" + contest_id).html(contest_time);
                        }
                    }

                }

            });

        }, 1000);  */
        var get_contests = "yes";
        var contest_category = "Silver";
        setInterval(() => {


            $.ajax({

                url: "ajax-get-contests.php",
                method: "POST",
                async: false,
                data: {
                    "get_contests": get_contests,
                    "contest_category": contest_category
                },
                success: function(data) {
                    $(".contests-container").html(data);


                }

            });

        }, 1000);
    </script>

</body>

</html>