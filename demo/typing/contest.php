<?php
session_start();
include '../../classes/database.class.php';
include '../../classes/typing_contest.class.php';
include '../../classes/users.class.php';
include '../../classes/activities.class.php';


$typing = new TypingContest();
$activity = new Activity();
$user = new User();



$session_id = $_SESSION['id'];
$contest_id = $_GET['contest_id'];

// if ($typing->getDetail($contest_id, "status") != "Ended") {
//     if (!$typing->userIsInContest($contest_id, $session_id)) {
//         if ($typing->getNumParticipants($contest_id) < $typing->max_participants) {
//             $coin_price = $typing->getContestCoinPrice($contest_id);
//             if ($user->getUserDetail($session_id, "coins") >= $coin_price) {
//                 $typing->addParticipant($contest_id, $session_id);
//                 $user->updateUserDetail($session_id, "coins", $coin_price, "-");
//                 $activity->createAtivity($session_id, "contest", "typing_contest", $contest_id);
//             } else {
//                 echo '<script>
//     alert("Sorry you do not have sufficient balance");
//     </script>';
//             }
//         } else {
//             echo '<script>
//             alert("Sorry contest is full");
//     </script>';
//         }
//     } else {

//         if ($typing->getParticipantDetail($contest_id, $session_id, "finish_status") == "played") {
//             echo '<script>

//             alert("You already played this contest");
//             </script>';
//         }
//     }
// } else {
//     echo '<script>
//     alert("Contest has ended");

//     </script>';
// }



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

    <!--=== contest ended overlay start ===-->
    <div class="contest-ended-overlay-container"></div>
    <!--=== contest ended overlay start ===-->

    <!--=== contest played overlay start ===-->
    <div class="contest-played-overlay-container">
        <div class="message-container">
            You've finished playing this contest. Kindly wait for this contest to close to Check results
        </div>
    </div>
    <!--=== contest played overlay start ===-->

    <!--=== contest insufficient fund overlay start ===-->
    <div class="contest-insufficient-fund-overlay-container">
        <div class="message-container">
            Sorry, you dont have sufficient coins to partake in this contest!
            <div class="centered-div">
                <button class="btn btn-danger">Buy Coins</button>
            </div>
        </div>
    </div>
    <!--=== contest insufficient fund overlay start ===-->



    <!--=== contest start overlay start ===-->
    <div class="contest-start-overlay-container">
        <div class="message-container">
            Click the "START" button to begin contest
            <div class="centered-div">
                <button class="btn btn-primary start-btn">START</button>
            </div>
        </div>
    </div>
    <!--=== conteststart overlay start ===-->


    <?php


    ?>

    <!-- main contest container start -->
    <div class="main-contest-container">

        <input type="text" class="contest-id" value="<?php echo $contest_id ?>" style="display:none;">
        <input type="text" class="sentence-value" style="display:none;">

        <!--=== time container start ===--->
        <div class="time-container">
            <span class="minutes">0</span>:<span class="seconds">00</span>
        </div>
                 <!--===time container end===--->

                    <!-- contest sentence count start -->
                    <div class="contest-sentence-count-container">
                        <span class="contest-sentence-count-text"></span>/<span>4</span>
                    </div>
                    <!-- contest sentence count end -->

                    <!-- question container start-->
                    <div class="sentence-container"><span class="sentence-text">This is the sentence</span></div>
                    <!-- question container end-->







                    <!-- typing container start -->
                    <div class="typing-container">
                        <div class="next-btn-container">
                            <button class="next-btn" style="display:;">Next <i class="fa fa-arrow-double-right"></i></button>
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
        <script src="js/timer.js"></script>






        <script>

          
            $(".start-btn").click(function() {
                start_game();
                $(".contest-start-overlay-container").hide();
            })


            // start game start
            function start_game() {







                var contest_has_finished = false;


                // timer 
                var count_up = new CountUpTimer(".minutes", ".seconds");
                count_up.start(0);

                var contest_sentences;
                var contest_sentence_count = 0;

                var sentence;
                var typing_field;

                var next_btn = document.querySelector(".next-btn");



                function disable_next() {
                    next_btn.disabled = true;
                    next_btn.style.backgroundColor = "#eee";
                    next_btn.style.border = "1px solid grey";
                    next_btn.style.color = "grey";

                }

                function enable_next() {
                    next_btn.disabled = false;
                    next_btn.style.backgroundColor = "mediumseagreen";
                    next_btn.style.border = "1px solid lightgreen";
                    next_btn.style.color = "white";
                }



                function end_game() {
                    count_up.stop();
                    var finished_time = count_up.get_seconds();
                    mark_user_has_played_contest();
                    alert("Contest has ended in " + finished_time)
                }

                // typing area
                $(".typing-area").keyup(function() {
                    field = $(this).val();
                    sentence = $(".sentence-value").val();

                    if (field == sentence) {
                        enable_next();
                    } else {
                        disable_next();
                    }

                });









                // next btn
                $(".next-btn").click(function() {

                    if (contest_sentence_count >= 3) {
                        end_game();
                    } else {
                        $(".sentence-text").html(contest_sentences[contest_sentence_count]);
                        $(".sentence-value").val(contest_sentences[contest_sentence_count]);
                        $(".contest-sentence-count-text").html(contest_sentence_count);
                        contest_sentence_count++;

                        disable_next();
                        $(".typing-area").val("");
                    }

                });














                // get sentences
                var get_sentence = "yes";
                var contest_id = $(".contest-id").val();
                var sentence_array = [];
                $.ajax({

                    url: "ajax-typing-contest.php",
                    method: "POST",
                    async: false,
                    data: {
                        "get_sentence": get_sentence,
                        "contest_id": contest_id
                    },
                    success: function(data) {
                        contest_sentences = JSON.parse(data);
                        $(".sentence-text").html(contest_sentences[contest_sentence_count]);
                        $(".sentence-value").val(contest_sentences[contest_sentence_count]);
                        $(".contest-sentence-count-text").html(contest_sentence_count);
                        contest_sentence_count++;
                        disable_next();

                    }

                });

                function update_database_finish_time() {
                    var finish_interval = setInterval(function() {
                        var update_user_finish_time_count = "yes";
                        var contest_id = $(".contest-id").val();
                        var finish_time = count_up.get_seconds();
                        $.ajax({

                            url: "ajax-typing-contest.php",
                            method: "POST",
                            async: false,
                            data: {
                                "update_user_finish_time_count": update_user_finish_time_count,
                                "contest_id": contest_id,
                                "finish_time": finish_time
                            },
                            success: function(data) {
                                // alert("ya")
                            }

                        });

                        if (contest_has_finished == true) {
                            clearInterval(finish_interval);
                        }


                    }, 500);

                }

                function mark_user_has_played_contest() {
                    var contest_id = $(".contest-id").val();
                    var mark_user_has_played_contest = "yes";
                    $.ajax({

                        url: "ajax-typing-contest.php",
                        method: "POST",
                        async: false,
                        data: {
                            "mark_user_has_played_contest": mark_user_has_played_contest,
                            "contest_id": contest_id,
                        },
                        success: function(data) {
                            // alert("You have played this contest");
                        }

                    });

                }

                update_database_finish_time();



            }
        </script>









        <?php

        if ($typing->getDetail($contest_id, "status") != "Ended") {
            if (!$typing->userIsInContest($contest_id, $session_id)) {
                if ($typing->getNumParticipants($contest_id) < $typing->max_participants) {
                    $coin_price = $typing->getContestCoinPrice($contest_id);
                    if ($user->getUserDetail($session_id, "coins") >= $coin_price) {
                        $typing->addParticipant($contest_id, $session_id);
                        $user->updateUserDetail($session_id, "coins", $coin_price, "-");
                        $activity->createAtivity($session_id, "contest", "typing_contest", $contest_id);
                        echo '<script>
                    $(".contest-start-overlay-container").show();
    </script>';
                    } else {
                        echo '<script>
                    $(".contest-insufficient-fund-overlay-container").show();
    </script>';
                    }
                } else {
                    echo '<script>
                $(".contest-full-overlay-container").show();
    </script>';
                }
            } else {

                if ($typing->getParticipantDetail($contest_id, $session_id, "finish_status") == "played") {
                    echo '<script>
   
                $(".contest-played-overlay-container").show();
            </script>';
                } else {
                    echo '<script>
   
                $(".contest-start-overlay-container").show();
            </script>';
                }
            }
        } else {
            echo '<script>
   
    $(".contest-ended-overlay-container").show();
    
    </script>';
        }


        ?>
</body>

</html>