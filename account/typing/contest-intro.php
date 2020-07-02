<?php

include '../../classes/database.class.php';
include '../../classes/typing_contest.class.php';
include '../../classes/users.class.php';

$contest_id = $_GET['i'];
$typing_contest = new Typing_contest();

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
    <title>Contest Intro</title>


    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/font-awesome.min.css" />
    <link rel="stylesheet" href="../../css/owl.carousel.min.css" />
    <link rel="stylesheet" href="../../css/slicknav.min.css" />

    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="../../css/style.css" />
    <link rel="stylesheet" href="css/style.css" />


</head>

<body>



    <!-- main container start -->
    <div class="main-container">
        <i class="fa fa-angle-left back-btn"></i>
        <button class="participants-btn"><i class="fa fa-users stroke-transparent"></i><br><span style="font-size:14px;position:relative;top:-5px;">Participants</span></button>


        <?php
        if ($typing_contest->getContestDetail($contest_id, "status") == "Waiting") {
        ?>
            <div class="count-down-container">
                <span class="count-down-title">Contest starts in</span><br><br>
                <button class="count-down-btn"><?php echo $typing_contest->getContestDetail($contest_id, "contest_time"); ?></button><br>seconds.
            </div>
        <?php
        } else if ($typing_contest->getContestDetail($contest_id, "status") == "Ended") {
        ?>

            <div class="contest-ended-container">
                <span class="contest-ended-title">This contest has already ended <i class="fa fa-lock"></i>.</span><br><br>
                <button class="contest-ended-btn">Ended</button>
            </div>
        <?php
        }
        ?>


        <input type="text" class="contest-time" style="display:none;" value="<?php echo $typing_contest->getContestDetail($contest_id, "contest_time"); ?>">




    </div>
    <!-- main container end -->


    <!--====== Javascripts & Jquery ======-->
    <script src="../../js/jquery-3.2.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.slicknav.min.js"></script>
    <script src="../../js/owl.carousel.min.js"></script>
    <script src="../../js/mixitup.min.js"></script>
    <script src="../../js/main.js"></script>
    <script src="../../js/mymain.js"></script>


    <script>
        var contest_time = $(".contest-time").val();
        var count_down = setInterval(function() {

            contest_time--;
            $(".count-down-btn").html(contest_time);

            if (contest_time <= 0) {
                clearInterval(count_down);
                $(".count-down-container").html("Entering contest now..");
                window.location.href = "contest-page.php?i=<?php echo "5efcf620dd870"; ?>";
            }
        }, 1000);




        $(".back-btn").click(function() {
            window.history.back();
        })
    </script>

</body>

</html>