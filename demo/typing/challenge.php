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
$challenge_id = $_GET['challenge_id'];

if ($typing->getChallengeDetail($challenge_id, "status") != "Ended") {
    if (!$typing->userIsInChallenge($challenge_id, $session_id)) {
        if ($typing->getNumChallengeParticipants($challenge_id) < $typing->getChallengeDetail($challenge_id, "max_participants")) {
            $coin_price = $typing->getChallengeDetail($challenge_id, "coin_price");
            if ($user->getUserDetail($session_id, "coins") >= $coin_price) {
                $typing->addChallengeParticipant($challenge_id, $session_id);
                $user->updateUserDetail($session_id, "coins", $coin_price, "-");
                $activity->createAtivity($session_id, "challenge", "typing_challenge", $challenge_id);
            } else {
                echo '<script>
    alert("Sorry you do not have sufficient balance");
    </script>';
            }
        } else {
            echo '<script>
            alert("Sorry challenge is full");
    </script>';
        }
    } else {

        if ($typing->getChallengeParticipantDetail($challenge_id, $session_id, "finish_status") == "played") {
            echo '<script>
   
            alert("You already played this challenge");
            </script>';
        } else {
            echo '<script>
   
            alert("You are already in this challenge");
            </script>';
        }
    }
} else {
    echo '<script>
    alert("Challenge has ended");
    </script>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>

    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challenge Page</title>


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


    ?>

    <!-- main challenge container start -->
    <div class="main-challenge-container">

        <input type="text" class="challenge-id" value="<?php echo $challenge_id ?>">




        <!-- challenge sentence count start -->
        <div class="challenge-sentence-count-container">
            <span class="challenge-sentence-count-text"></span>/<span>4</span>
        </div>
        <!-- challenge sentence count end -->

        <!-- question container start-->
        <div class="sentence-container"><span class="sentence-text">This is the sentence</span></div>
        <!-- question container end-->

        <input type="text" class="sentence-value">





        <!-- typing container start -->
        <div class="typing-container">
            <div class="next-btn-container">
                <button class="next-btn" style="display:;">Next <i class="fa fa-arrow-double-right"></i></button>
            </div>
            <textarea name="" id="" class="typing-area" placeholder="Type here.."></textarea>
        </div>
        <!-- typing container end -->


    </div>
    <!-- main challenge container end -->

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
        // timer 
        var count_up = new CountUpTimer();
        count_up.start(0);

        var challenge_sentences;
        var challenge_sentence_count = 0;

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
            mark_user_has_played_challenge();
            alert("Challenge has ended in " + finished_time)
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

            if (challenge_sentence_count >= 3) {
                end_game();
            } else {
                $(".sentence-text").html(challenge_sentences[challenge_sentence_count]);
                $(".sentence-value").val(challenge_sentences[challenge_sentence_count]);
                $(".challenge-sentence-count-text").html(challenge_sentence_count);
                challenge_sentence_count++;

                disable_next();
                $(".typing-area").val("");
            }

        });




        // get sentences
        var get_sentence = "yes";
        var challenge_id = $(".challenge-id").val();
        var sentence_array = [];
        $.ajax({

            url: "ajax-typing-challenge.php",
            method: "POST",
            async: false,
            data: {
                "get_sentence": get_sentence,
                "challenge_id": challenge_id
            },
            success: function(data) {
                challenge_sentences = JSON.parse(data);
                $(".sentence-text").html(challenge_sentences[challenge_sentence_count]);
                $(".sentence-value").val(challenge_sentences[challenge_sentence_count]);
                $(".challenge-sentence-count-text").html(challenge_sentence_count);
                challenge_sentence_count++;
                disable_next();

            }

        });
    </script>


    <script>
        function update_database_finish_time() {
            var finish_interval = setInterval(function() {
                var update_user_finish_time_count = "yes";
                var challenge_id = $(".challenge-id").val();
                var finish_time = count_up.get_seconds();
                $.ajax({

                    url: "ajax-typing-challenge.php",
                    method: "POST",
                    async: false,
                    data: {
                        "update_user_finish_time_count": update_user_finish_time_count,
                        "challenge_id": challenge_id,
                        "finish_time": finish_time
                    },
                    success: function(data) {
                        // alert("ya")
                    }

                });

                if (challenge_has_finished == true) {
                    clearInterval(finish_interval);
                }


            }, 500);

        }

        function mark_user_has_played_challenge() {
            var challenge_id = $(".challenge-id").val();
            var mark_user_has_played_challenge = "yes";
            $.ajax({

                url: "ajax-typing-challenge.php",
                method: "POST",
                async: false,
                data: {
                    "mark_user_has_played_challenge": mark_user_has_played_challenge,
                    "challenge_id": challenge_id,
                },
                success: function(data) {
                    // alert("You have played this challenge");
                }

            });

        }

        update_database_finish_time();
    </script>

</body>

</html>