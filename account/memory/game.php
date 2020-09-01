<?php
session_start();
include '../../classes/database.class.php';
include '../../classes/memory_contest.class.php';
include '../../classes/users.class.php';
include '../../classes/activities.class.php';

$memory = new MemoryContest();
$user = new User();
$activity = new Activity();


$session_id = $_SESSION['id'];
$contest_id = $_GET['contest_id'];


?>






<!DOCTYPE html>
<html lang="en">

<head>
    <!--   <style>
        .main-game-container {
            position: fixed;
            width: 100%;
            height: 100%;
            /* background: radial-gradient(green, mediumseagreen); */
            background: radial-gradient(orange, brown);
            top: 0px;
            left: 0px;

        }

        .mycard-container {
            position: relative;
            display: flex;
            flex-flow: row wrap;
            justify-content: center;
            background-color: ;
            margin-top: 50px;
        }

        .mycard {
            width: 50px;
            height: 70px;
            background-color: #111;
            box-shadow: inset 3px -3px 5px rgba(0, 0, 0, 0.4);
            border-radius: 8px;
            margin: 10px;
            border: none;
            color: grey;
            font-size: 25px;
            transition: 0.3s ease-in-out;
            font-weight: bold;
            transform: rotateY(180deg);
            transform-style: preserve-3d;
        }

        .correct {
            width: 50px;
            height: 70px;
            background-color: white;
            margin: 10px;
            border: 1px solid lightgrey;
            color: grey;
            font-size: 19px;
            transition: 0.4s ease-in-out
        }

        .time-container {
            width: 100%;
            padding: 5px;
            font-weight: bold;
            font-size: 20px;
        }

        .intro-container {
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0px;
            left: 0px;
            background-color: rgba(0, 0, 0, 0.9);
            z-index: 500;
            /* display: none; */
            /* filter: blur(50px) */
        }

        .intro-title {
            width: 100%;
            padding: 10px;
            text-align: center;
            font-size: 22px;
            margin-top: 50px;
            color: white;
            font-weight: bold;
        }

        .intro-title-small {
            width: 100%;
            padding: 10px;
            text-align: center;
            font-size: 17px;
            margin-top: 20px;
            margin-bottom: 10px;
            color: white;
            /* font-weight: bold; */
        }

        .intro-howtoplay {
            width: 100%;
            position: absolute;
            bottom: 0px;
            left: 0px;
            padding: 10px;
            color: white;
            font-size: 12px;
            font-weight: normal;
        }

        .centered-div {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .start-btn {
            width: 150px;
            background-color: orange;
            color: black;
            padding: 9px;
            box-shadow: inset 3px -3px 5px rgba(0, 0, 0, 0.4);
            border-radius: 50px;
            border: none;
            font-weight: bold;
            font-size: 20px;
            color: black;
            font-weight: bold;

        }


        .winning-container {
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0px;
            left: 0px;
            background-color: rgba(0, 0, 0, 0.9);
            display: none;
            z-index: 1000;
            /* filter: blur(50px) */
        }

        .winning-box {
            width: 80%;
            margin: auto;
            margin-top: 50px;

            border: 3px solid brown;
            background-color: moccasin;
            transition: 1s ease;
            padding: 10px;

        }

        .winning-box-animate {
            animation: winningboxanimation 1s ease-in-out;
        }

        @keyframes winningboxanimation {
            0% {
                transform: rotate(0deg);
            }

            30% {
                transform: rotate(25deg);
            }

            70% {
                transform: rotate(-25deg);
            }

            100% {
                transform: rotate(0deg);
            }
        }

        .winning-box-title {
            width: 100%;
            padding: 10px;
            color: black;
            font-weight: bold;
            font-size: 25px;
            text-align: center;
            color: brown;
            text-shadow: 1px 1px 2px black;
        }

        .winning-box-time {
            width: 100%;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }

        .exit-btn {
            width: 100px;
            background-color: orange;
            color: black;
            padding: 5px;
            box-shadow: inset 3px -3px 5px rgba(0, 0, 0, 0.4);
            border-radius: 50px;
            border: none;
            font-weight: bold;
            font-size: 20px;
            color: black;
            font-weight: bold;

        }
    </style> -->

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

    <link rel="stylesheet" href="css/style.css" />


</head>

<body>


    <script>
        var show_contest_played_overlay = false;
        var show_contest_full_overlay = false;
        var show_insufficient_fund_overlay = false;
        var show_contest_ended_overlay = false;
    </script>

    <?php

    if ($memory->getDetail($contest_id, "status") != "Ended") {
        if (!$memory->userIsInContest($contest_id, $session_id)) {
            if ($memory->getNumParticipants($contest_id) < $memory->max_participants) {
                $coin_price = $memory->getContestCoinPrice($contest_id);
                if ($user->getUserDetail($session_id, "coins") >= $coin_price) {
                    $memory->addParticipant($contest_id, $session_id);
                    $user->updateUserDetail($session_id, "coins", $coin_price, "-");
                    $activity->createAtivity($session_id, "contest", "memory_contest", $contest_id);
                    if ($memory->getNumParticipants($contest_id) >= $memory->max_participants) {
                        $memory->createContest($memory->getDetail($contest_id, "contest_category"));
                    }
                } else {
                    echo '<script>

            show_insufficient_fund_overlay = true;
     </script>';
                }
            } else {
                echo '<script>
        
        show_contest_full_overlay = true;
</script>';
            }
        } else {

            if ($memory->getParticipantDetail($contest_id, $session_id, "finish_status") == "played") {
                echo '<script>

    
        show_contest_played_overlay = true;
      
       
        </script>';
            }
        }
    } else {
        echo '<script>

show_contest_ended_overlay = true;
</script>';
    }

    ?>



    <!--=== contest ended overlay start ===-->
    <div class="overlay-container contest-ended-container" style="display:;">

        <button class="go-back"><i class="fa fa-angle-left"></i></button>
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
        <button class="go-back"><i class="fa fa-angle-left"></i></button>
        <div class="centered-div">
            <img src="../img/played.png" class="icon" alt="">
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
        <button class="go-back"><i class="fa fa-angle-left"></i></button>
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
            You joined! <br>
            Memory Game Contest
        </div>
        <div class="intro-title-small">
            Click the "start" button to begin contest
        </div>

        <div class="centered-div">
            <button class="start-btn">START</button>
        </div>

        <div class="intro-howtoplay">
            <i><u>How to play</u></i><br>
            <i>Match a pair of two cards with the same value to disable(green color) them from the card grid.
                Do this until there are no more cards to match and let's see how long it takes you!
            </i>
        </div>
    </div>
    <!--=== intro container end ===-->





    <!--=== winning container start ===-->
    <div class="winning-container" style="display:;">
        <div class="winning-box">
            <div class="winning-box-title">FINISHED!</div>
            <div class="winning-box-time">Time: <span class="time">27</span>secs</div>
            <br>
            <div class="winning-box-info">Kindly wait for this contest to close and results would be available</div>
            <div class="centered-div">
                <button class="exit-btn" onclick="go_back()">EXIT</button>
            </div>
        </div>
    </div>
    <!--=== winning container start ===-->


    <div class="main-game-container">
        <span class="volume-on-btn" onclick="turn_volume_off()" style="display:;"><i class="fa fa-volume-up"></i></span>
        <span class="volume-off-btn" onclick="turn_volume_on()" style="display:none;"><i class="fa fa-volume-off"></i></span>

        <input type="text" class="contest-id" value="<?php echo $_GET['contest_id']; ?>" style="display:none;">
        <input type="text" class="user-finish-time" value="<?php echo $memory->getParticipantDetail($contest_id, $session_id, "finish_time"); ?>" style="display:none;">

        <!--=== time container start ===--->
        <div class="time-container">
            <span class="minutes">0</span>:<span class="seconds">00</span>

        </div>
        <!--===time container end===--->

        <div class="mycard-container">
            <?php

            $arrs = array("A", "B", "C", "D", "E", "F", "A", "B", "C", "D", "E", "F");
            $total = count($arrs) / 2;
            echo '<script>
        var total = "' . $total . '";
        </script>';
            $x = 1;
            shuffle($arrs);
            foreach ($arrs as $arr) {

                echo "<button id='$arr' uniqueid='$x' class='mycard'></button>";
                $x++;
            }

            ?>

        </div>

    </div>





    <!--====== Javascripts & Jquery ======-->
    <script src="../../js/jquery-3.2.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.slicknav.min.js"></script>
    <script src="../../js/owl.carousel.min.js"></script>
    <script src="../../js/mixitup.min.js"></script>
    <script src="../../js/main.js"></script>
    <script src="../../js/mymain.js"></script>
    <script src="js/timer.js"></script>

    <script src="js/format.time.js"></script>


    <script>
        var contest_has_finished = false;
        var play_sounds = true;
        var background_sound;

        //check when start button is clicked
        $(".start-btn").click(function() {
            start_game();
        })


        // START GAME START
        function start_game() {

            // $(".intro-container").slideUp();
            //         play_background_sound();

            update_database_finish_time();

            //audio
            background_sound = new Audio();
            background_sound.src = "sounds/background-sound.flac";
            background_sound.loop = true;

            var flip_sound = new Audio();
            flip_sound.src = "sounds/cardflip-sound.wav";

            var victory_sound = new Audio();
            victory_sound.src = "sounds/victory-sound.wav";

            function play_background_sound() {
                background_sound.play();
            }

            function pause_background_sound() {
                background_sound.pause();
            }



            function play_flip_sound() {
                flip_sound.play();
            }


            function play_victory_sound() {
                victory_sound.play();
            }


            $(".intro-container").slideUp();
            if (play_sounds) {
                play_background_sound();
            }

            var user_finish_time = $(".user-finish-time").val();
            var count_up = new CountUpTimer(".minutes", ".seconds");
            count_up.start(user_finish_time);

            function end_game() {
                // alert("you finished in " + count_up.get_seconds() + " seconds")
                var time = count_up.get_seconds();
                if (play_sounds) {
                    pause_background_sound();
                    play_victory_sound();
                }
                $(".winning-container").fadeIn();
                $(".winning-box").addClass("winning-box-animate")
                $(".time").html(time);

                contest_has_finished = true;
                mark_user_has_played_contest();
            }

            function retry() {
                window.location.href = "index.php";
            }

            /*** NOTES START **** */
            // alert(total)


            // shuffle array javascript
            // function shuffle(array) {
            //     array.sort(() => Math.random() - 0.5);
            // }

            // let arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11];
            // shuffle(arr);
            // alert(arr);


            // var bt = document.querySelector(".bt");
            // bt.disabled = true;


            // get element by attribute
            // var element = document.querySelector(".el");
            // let value = element.getAttribute("id");
            // alert(value);

            //select element by attribute
            // $("[tar=choose]").css("background-color", "yellow");

            /**** NOTES END */





            // declare initial variables
            var default_class = "mycards";
            var correct_class = "correct";



            var first_card;
            var second_card;
            var card_id;
            var card_count = 1;

            var uniqueid;
            var first_uniqueid;
            var second_uniqueid;



            /*** HELPING FUNCTIONS START ****/
            $(".mycard").html("<i class='fa fa-diamond' style='color:orange;'></i>")

            // reset card
            function reset_card() {

                $(".mycard").css({
                    "transform": "rotateY(180deg)",
                    "background-color": "#111",
                    "color": "lightgrey"
                });
                $(".mycard").html("<i class='fa fa-diamond' style='color:orange;'></i>")

            }

            // render correct cards
            function render_correct_cards() {
                // set the color of all correct cards
                $(".correct").css({
                    "background-color": "mediumseagreen",
                });

                // get all correct cards and disable their click events
                var correct_cards = document.getElementsByClassName("correct");
                for (i = 0; i < correct_cards.length; i++) {
                    var element_id = correct_cards[i].getAttribute("id");
                    correct_cards[i].disabled = true;
                }
            }


            // disable cards
            function disable_cards() {
                var cards = document.getElementsByClassName("mycard");
                for (i = 0; i < cards.length; i++) {
                    cards[i].disabled = true;
                }
            }

            // enable cards
            function enable_cards() {
                var cards = document.getElementsByClassName("mycard");
                for (i = 0; i < cards.length; i++) {
                    cards[i].disabled = false;
                }
            }

            /**** HELPING FUNCTIONS END *** */

            $(".mycard").click(function() {
                //play flip sound
                if (play_sounds) {
                    play_flip_sound();
                }

                // flip the clicked cards
                $(this).css({
                    "transform": "rotateY(0deg)",
                    "background-color": "white",
                    "color": "black"
                });

                // grab the id of the clicked button
                card_id = $(this).attr("id");
                $(this).html(card_id)

                uniqueid = $(this).attr("uniqueid");

                if (card_count == 1) {
                    first_uniqueid = uniqueid
                    first_card = card_id;

                    card_count++;
                } else if (card_count == 2) {
                    second_uniqueid = uniqueid
                    second_card = card_id;

                    card_count = 1;

                    // check if the same card was clicked twice and prevent it
                    if (first_uniqueid == second_uniqueid) {
                        alert("You cannot click the same card twice");
                        reset_card();

                        // play flip sound
                        if (play_sounds) {
                            play_flip_sound();
                        }

                    } else {
                        check_card();
                    }
                } else if (card_count > 2) {
                    card_count = 1;
                    reset_card();
                }


            });



            function check_card() {
                if (first_card == second_card) {

                    // disable all cards
                    disable_cards();

                    // delay for 1s before telling user the correct answer
                    setTimeout(function() {
                        // alert("it is a match")
                        $("[id=" + card_id + "]").removeClass("mycard");
                        $("[id=" + card_id + "]").addClass("correct");

                        // render all correct cards
                        render_correct_cards();

                        // check if the player has exhausted the number of available cards left
                        total--;
                        //  alert(total)
                        if (total == 0) {
                            //  alert("YOU HAVE WON")
                            end_game();

                        }

                        // render all correct cards
                        render_correct_cards();


                        // enable all cards
                        enable_cards();


                    }, 500);


                } else {

                    // disable all cards
                    disable_cards();

                    // delay for 1s before telling user he/she is wrong
                    setTimeout(function() {

                        // reset all incorrect cards
                        reset_card();

                        // play flip sound
                        if (play_sounds) {
                            play_flip_sound();
                        }

                        // render all correct cards
                        render_correct_cards();

                        // enable all cards
                        enable_cards();

                    }, 1000);



                }

            }

            function update_database_finish_time() {
                var finish_interval = setInterval(function() {
                    var update_user_finish_time_count = "yes";
                    var contest_id = $(".contest-id").val();
                    var finish_time = count_up.get_seconds();
                    $.ajax({

                        url: "ajax-memory-contest.php",
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

                    url: "ajax-memory-contest.php",
                    method: "POST",
                    async: false,
                    data: {
                        "mark_user_has_played_contest": mark_user_has_played_contest,
                        "contest_id": contest_id,
                    },
                    success: function(data) {
                        //  alert("You have played this contest");
                    }

                });

            }






        }
        //START GAME END
    </script>


    <script>
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



        function go_back() {
            window.history.back();
        }
    </script>

</body>

</html>