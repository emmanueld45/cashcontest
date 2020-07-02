<?php
session_start();
include '../../classes/database.class.php';
include '../../classes/typing_contest.class.php';
include '../../classes/users.class.php';

$contest_id = $_GET['i'];
$typing_contest = new Typing_contest();


/*
if (!isset($_SESSION['contest_count'])) {
    $contest_count_array = array(
        'contest_id' => $contest_id,
        'sentence_count' => 0
    );

    $_SESSION['contest_count'][0] = $contest_count_array;
} */

if (!isset($_SESSION['contest_sentence_count_' . $contest_id])) {
    $_SESSION['contest_sentence_count_' . $contest_id] = 1;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>

    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contest Page</title>


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

    <?php

    $sentence = $typing_contest->getSentence();
    ?>

    <!-- main contest container start -->
    <div class="main-contest-container">

        <input type="text" value="<?php echo $sentence; ?>" class="sentence-value" style="display:none;">
        <input type="text" value="<?php echo $_SESSION['contest_sentence_count_' . $contest_id]; ?>" class="contest-sentence-count" style="display:none;">
        <input type="text" value="<?php echo $contest_id; ?>" class="contest-id" style="display:none;">




        <!-- contest sentence count start -->
        <div class="contest-sentence-count-container">
            <span class="contest-sentence-count-text"><?php echo $_SESSION['contest_sentence_count_' . $contest_id]; ?></span>/<span>5</span>
        </div>
        <!-- contest sentence count end -->

        <!-- question container start-->
        <div class="sentence-container"><span class="sentence-text"><?php echo $sentence; ?></span></div>
        <!-- question container end-->







        <!-- typing container start -->
        <div class="typing-container">
            <div class="next-btn-container">
                <button class="next-btn" style="display:none;">Next <i class="fa fa-arrow-double-right"></i></button>
                <button class="disabled-next-btn" style="display:;">Next <i class="fa fa-arrow-double-right"></i></button>
                <button class="finish-btn" style="display:none;">Finish <i class="fa fa-arrow-double-right"></i></button>
            </div>
            <textarea name="" id="" class="typing-area" placeholder="Type here.."></textarea>
        </div>
        <!-- typing container end -->


    </div>
    <!-- main contest container end -->

    <!--====== Javascripts & Jquery ======-->
    <script src="../../js/jquery-3.2.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.slicknav.min.js"></script>
    <script src="../../js/owl.carousel.min.js"></script>
    <script src="../../js/mixitup.min.js"></script>
    <script src="../../js/main.js"></script>
    <script src="../../js/mymain.js"></script>






    <script>
        var contest_sentence_count = $(".contest-sentence-count").val();

        var sentence;
        var typing_field;

        // typing area
        $(".typing-area").keyup(function() {
            field = $(this).val();
            sentence = $(".sentence-value").val();
            if (field == sentence) {
                if (contest_sentence_count == 5) {
                    $(".finish-btn").show();
                    $(".next-btn").hide();
                    $(".disabled-next-btn").hide();

                } else {
                    $(".next-btn").show();
                    $(".disabled-next-btn").hide();
                    $(".finish-btn").hide();
                }
            } else {
                $(".next-btn").hide();
                $(".disabled-next-btn").show();
                $(".finish-btn").hide();
            }
        });









        // next btn
        $(".next-btn").click(function() {
            contest_sentence_count++;
            var get_sentence = "yes";
            var contest_id = $(".contest-id").val();

            $.ajax({

                url: "ajax-get-sentence.php",
                method: "POST",
                async: false,
                data: {
                    "get_sentence": get_sentence,
                    "contest_id": contest_id
                },
                success: function(data) {
                    $(".contest-sentence-count-text").html(contest_sentence_count);

                    $(".next-btn").hide();
                    $(".disabled-next-btn").show();

                    $(".typing-area").val("");
                    $(".sentence-value").val(data);
                    $(".sentence-text").html(data);


                }

            });

        });











        // finish contest btn
        $(".finish-btn").click(function() {
            var contest_id = $(".contest-id").val();
            var finish_contest = "yes";
            $.ajax({

                url: "ajax-finish-contest.php",
                method: "POST",
                async: false,
                data: {
                    "finish_contest": finish_contest,
                    "contest_id": contest_id
                },
                success: function(data) {
                    alert(data)
                    // redirect to a success page
                }
            });

        });
    </script>


    <script>

    </script>

</body>

</html>