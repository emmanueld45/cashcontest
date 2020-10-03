<?php
session_start();
include '../../classes/database.class.php';
include '../../classes/typing_contest.class.php';
include '../../classes/users.class.php';
include '../../classes/activities.class.php';


$typing = new TypingContest();
$activity = new Activity();
$user = new User();



//$session_id = $_SESSION['id'];
//$contest_id = $_GET['contest_id'];

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


    <script>
        var show_intro_container = false;
        var show_contest_played_overlay = false;
        var show_contest_full_overlay = false;
        var show_insufficient_fund_overlay = false;
        var show_contest_ended_overlay = false;
    </script>

    <?php

//     if ($typing->getDetail($contest_id, "status") != "Ended") {
//         if (!$typing->userIsInContest($contest_id, $session_id)) {

//             if ($typing->getNumParticipants($contest_id) < $typing->max_participants) {
//                 $coin_price = $typing->getContestCoinPrice($contest_id);
//                 if ($user->getUserDetail($session_id, "coins") >= $coin_price) {
//                     $typing->addParticipant($contest_id, $session_id);
//                     $user->updateUserDetail($session_id, "coins", $coin_price, "-");
//                     $activity->createAtivity($session_id, "contest", "typing_contest", $contest_id);
//                     if ($typing->getNumParticipants($contest_id) >= $typing->max_participants) {
//                         $typing->createContest($typing->getDetail($contest_id, "contest_category"));
//                     }
//                     echo '<script>
//                     var show_intro_container = true;
// </script>';
//                 } else {
//                     echo '<script>
//                     var show_insufficient_fund_overlay = true;
// </script>';
//                 }
//             } else {
//                 echo '<script>
//                 var show_contest_full_overlay = true;
// </script>';
//             }
//         } else {

//             if ($typing->getParticipantDetail($contest_id, $session_id, "finish_status") == "played") {
//                 echo '<script>
// console.log("user played");
//         var show_contest_played_overlay = true;
//         </script>';
//             } else {
//                 echo '<script>

//                 var show_intro_container = true;
//         </script>';
//             }
//         }
//     } else {
//         echo '<script>

//         var show_contest_ended_overlay = true;

// </script>';
//     }


    ?>

    <!--=== contest ended overlay start ===-->
    <div class="overlay-container contest-ended-container" style="display:;">

        <button class="go-back" onclick="exit()"><i class="fa fa-angle-left"></i></button>
        <div class="centered-div">
            <img src="../img/closed.png" class="icon" alt="">
        </div>
        <div class="message-container">
            This contest has been closed.. kindly click the button below to check results
        </div>

        <div class="centered-div">
            <a href="view-results.php?contest_id=<?php echo $contest_id; ?>" class="btn" style="background-color:orange;color:black;">view results <i class="fa fa-book"></i></a>
        </div>
    </div>
    <!--=== contest ended overlay start ===-->

    <!--=== contest played overlay start ===-->
    <div class="overlay-container contest-played-container" style="display:;">
        <button class="go-back" onclick="exit()"><i class="fa fa-angle-left"></i></button>
        <div class="centered-div">
            <img src="../img/happy.png" class="icon" alt="played">
        </div>
        <div class="message-container">
            You have finished playing this contest. Kindly wait for this contest to close to Check results
        </div>

        <div class="centered-div">
            <button class="btn" style="background-color:rgba(0, 0, 0, 0.6);color:white;opacity:0.5;"><i class="fa fa-angle-double-left"></i> Go back</button>
        </div>
    </div>
    <!--=== contest played overlay start ===-->

    <!--=== contest insufficient fund overlay start ===-->
    <div class="overlay-container insufficient-fund-container" style="display:none;">
        <button class="go-back" onclick="exit()"><i class="fa fa-angle-left"></i></button>
        <div class="centered-div">
            <img src="../img/coins2.png" class="icon" alt="gift">
        </div>
        <div class="message-container">
            Sorry, you dont have sufficient coins to partake in this contest!

        </div>
        <div class="centered-div">
            <a href="../top-up.php" class="btn btn-success">Buy Coins <i class="fa fa-angle-double-right"></i></a>
        </div>
    </div>
    <!--=== contest insufficient fund overlay start ===-->




    <!--=== contest full overlay start ===-->
    <div class="overlay-container contest-full-container" style="display:none;">
        <button class="go-back"><i class="fa fa-angle-left"></i></button>
        <div class="centered-div">
            <img src="../img/sad.png" class="icon" alt="gift">
        </div>
        <div class="message-container">
            This contest has been filled up! kindly join the next open contest
        </div>
        <div class="centered-div">
            <a href="../top-up.php" class="btn" style="background-color:rgba(0, 0, 0, 0.6);color:white;opacity:0.7;"><i class="fa fa-angle-double-left"></i> Go back </a>
        </div>
    </div>
    <!--=== contest full overlay start ===-->




    <!--=== intro container start ===-->
    <div class="intro-container">

        <div class="intro-title">
            (DEMO)<br>
            Typing Contest
        </div>
        <div class="intro-title-small">
            Click the "start" button to begin contest
        </div>

        <div class="centered-div">
            <button class="start-btn">START</button>
        </div>

        <div class="intro-howtoplay">
            <i><u>How to play</u></i><br>
            <i>Type the given amount of sentences as fast as you can in the lowest amount of time possible
                and you could be the next winner!
            </i>
        </div>
    </div>
    <!--=== intro container end ===-->



    <!--=== winning container start ===-->
    <div class="winning-container" style="display:;">
        <div class="winning-box">
            <div class="winning-box-title">WELL DONE!</div>
            <div class="winning-box-time">Time: <span class="time">27</span>secs</div>
            <br>
            <div class="winning-box-info">You could also be a winner of a memory contest and make real money!</div>
           
            <a href="../../auth/signup.php">
              <div class="centered-div">
                 <button class="exit-btn" >Sign up!</button>
              </div>
           </a>
        </div>
    </div>
    <!--=== winning container start ===-->

    <?php


    ?>

    <!-- main contest container start -->
    <div class="main-contest-container" style="">

        <span class="volume-on-btn" onclick="turn_volume_off()" style="display:;"><i class="fa fa-volume-up"></i></span>
        <span class="volume-off-btn" onclick="turn_volume_on()" style="display:none;"><i class="fa fa-volume-off"></i></span>

        <!-- <input type="text" class="contest-id" value="<?php echo $contest_id ?>" style="display:none;"> -->
        <input type="text" class="sentence-value" style="display:none;">
        <!-- <input type="text" class="user-finish-time" value="<?php echo $typing->getParticipantDetail($contest_id, $session_id, "finish_time"); ?>" style="display:none;"> -->

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
        <div class="sentence-container">"<span class="sentence-text">This is the sentence</span>"</div>
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
        var play_sounds = true;

        $(".start-btn").click(function() {
            start_game();
            $(".intro-container").hide();
        })

        /** AUDIO START ***/
        var background_sound = new Audio();
        background_sound.src = "sounds/background1.mp3";

        var victory_sound = new Audio();
        victory_sound.src = "sounds/victory-sound.wav";

        var correct_sound = new Audio();
        correct_sound.src = "sounds/correct-sound.wav";

        /*** AUDIO END **** */


        // start game start
        function start_game() {


            if (play_sounds) {
                background_sound.play()
            }



            var contest_has_finished = false;


            // timer 
           // var user_finish_time = $(".user-finish-time").val();
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
               // mark_user_has_played_contest();
                $(".winning-container").show();
                $(".time").html(finished_time)
                if (play_sounds) {
                    background_sound.pause();
                    victory_sound.play();
                }
                // alert("Contest has ended in " + finished_time)
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
                if ($(".typing-area").val() == contest_sentences[contest_sentence_count - 1]) {
                    if (play_sounds) {
                        correct_sound.play();
                    }
                }
                if (contest_sentence_count >= 5) {
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

            // function update_database_finish_time() {
            //     var finish_interval = setInterval(function() {
            //         var update_user_finish_time_count = "yes";
            //         var contest_id = $(".contest-id").val();
            //         var finish_time = count_up.get_seconds();
            //         $.ajax({

            //             url: "ajax-typing-contest.php",
            //             method: "POST",
            //             async: false,
            //             data: {
            //                 "update_user_finish_time_count": update_user_finish_time_count,
            //                 "contest_id": contest_id,
            //                 "finish_time": finish_time
            //             },
            //             success: function(data) {
            //                 // alert("ya")
            //             }

            //         });

            //         if (contest_has_finished == true) {
            //             clearInterval(finish_interval);
            //         }


            //     }, 500);

            // }

            // function mark_user_has_played_contest() {
            //     var contest_id = $(".contest-id").val();
            //     var mark_user_has_played_contest = "yes";
            //     $.ajax({

            //         url: "ajax-typing-contest.php",
            //         method: "POST",
            //         async: false,
            //         data: {
            //             "mark_user_has_played_contest": mark_user_has_played_contest,
            //             "contest_id": contest_id,
            //         },
            //         success: function(data) {
            //             // alert("You have played this contest");
            //         }

            //     });

            // }

            //update_database_finish_time();



        }
    </script>











    <script>
       // if (show_intro_container == true) {
            $(".intro-container").show();
       // }
        if (show_contest_played_overlay == true) {
            $(".contest-played-container").show();
        }

        if (show_insufficient_fund_overlay == true) {
            $(".insufficient-fund-container").show();
        }

        if (show_contest_full_overlay == true) {
            $(".contest-full-container").show();
        }

        if (show_contest_ended_overlay == true) {
            $(".contest-ended-container").show();
        }
    </script>

    <script>
        function exit() {
            window.history.back();
        }


        function turn_volume_off() {
            background_sound.pause();
            play_sounds = false;
            $(".volume-on-btn").hide();
            $(".volume-off-btn").show();
        }

        function turn_volume_on() {
            background_sound.play();
            play_sounds = true;
            $(".volume-on-btn").show();
            $(".volume-off-btn").hide();
        }
    </script>
</body>

</html>