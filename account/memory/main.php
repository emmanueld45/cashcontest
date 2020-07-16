<?php

include '../../classes/database.class.php';
include '../../classes/typing_contest.class.php';
include '../../classes/users.class.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .main-game-container {
            position: fixed;
            width: 100%;
            height: 100%;
            background: radial-gradient(green, mediumseagreen);
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
            border-radius: 2px;
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



    <div class="main-game-container">


        <div class="time-container">
            Time: <span class="mins">1</span>: <span class="secs">30</span>
        </div>


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
        function end_game() {
            alert("Time is Over!!")
        }
        var count_down = new CountDownTimer(".mins", ".secs");
        count_down.set_time(20);
        count_down.start(end_game);
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

        // reset card
        function reset_card() {

            $(".mycard").css({
                "transform": "rotateY(180deg)",
                "background-color": "#111",
                "color": "lightgrey"
            });
            $(".mycard").html("")

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

        /**** HELPING FUNCTIONS END *** */

        $(".mycard").click(function() {

            // flip the clicked cards
            $(this).css({
                "transform": "rotateY(0deg)",
                "background-color": "orange",
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

                } else {
                    check_card();
                }
            }


        });



        function check_card() {
            if (first_card == second_card) {

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
                        alert("YOU HAVE WON")
                    }

                    // render all correct cards
                    render_correct_cards();

                }, 1000);


            } else {

                // delay for 1s before telling user he/she is wrong
                setTimeout(function() {

                    // reset all incorrect cards
                    reset_card();

                    // render all correct cards
                    render_correct_cards();


                }, 1000);



            }

        }
    </script>

</body>

</html>