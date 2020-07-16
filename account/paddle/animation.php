<?php

// include '../../classes/database.class.php';
// include '../../classes/typing_contest.class.php';
// include '../../classes/users.class.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .main-game-container {
            position: fixed;

            /* background: radial-gradient(green, mediumseagreen); */
            /* background: radial-gradient(white, green); */
            background: radial-gradient(orange, brown);
            /* background-image:url("img/background1.jpg");
            background-repeat:no-repeat;
            background-size:cover; */
            top: 0px;
            left: 0px;

        }


        #canvas {


            background: radial-gradient(orange, brown);


        }


        .direction-container {
            position: fixed;
            bottom: 10px;
            left: 10px;
            z-index: 500;
        }

        .direction-container button {
            width: 40px;
            height: 40px;
            border-radius: 40px;
            background-color: rgba(0, 0, 0, 0.7);
            color: orange;
            box-shadow: inset 2px 2px 5px rgba(0, 0, 0, 0.5);
            border: none;
        }


        .intro-container {
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0px;
            left: 0px;
            background-color: rgba(0, 0, 0, 0.9);
            z-index: 1000;
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


        .attack-btn {
            position: fixed;
            bottom: 10px;
            right: 10px;
            z-index: 1000;
        }
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paddle</title>


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



    <!--=== intro container start ===--
    <div class="intro-container">

        <div class="intro-title">
            Welcome to <br>
            Tennis ball Contest
        </div>
        <div class="intro-title-small">
            Click the "start" button to begin contest
        </div>

        <div class="centered-div">
            <button class="start-btn">START</button>
        </div>

        <div class="intro-howtoplay">
            <i><u>How to play</u></i><br>
            <i>Try to get the hightest amount of stars possible before your time runs out!
            </i>
        </div>
    </div>
    <!--=== intro container end ===-->

    <canvas id="canvas"></canvas>

    <!-- <div class="direction-container">
        <button class="left-btn"><i class="fa fa-arrow-left"></i></button>
        <button class="right-btn"><i class="fa fa-arrow-right"></i></button>
    </div> -->

    <button class="attack-btn">Attack</button>

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
        var canvas = document.getElementById("canvas");
        var ctx = canvas.getContext("2d");

        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        var g = new Image();
        g.src = "animationimg/Attacking/Golem_01_Attacking_0.png";
        var gwidth = 130;
        var gheight = 100;
        var gx = 100;
        var gy = 100;
        var gxspeed = 3;
        var gyspeed = 5;

        var move_right = false;
        var move_left = false;
        var move_up = false;




        /*** IDLE ANIMATION START *** */
        var idl = 0;
        var idle = true;

        function idle_animation() {
            if (idl > 11) {
                idl = 0;
                // idl = false;
            }
            g.src = "animationimg/Idle/Golem_01_Idle_" + idl + ".png";
            idl++;
        }
        // idle_animation();
        /*** IDLE ANIMATION END *** */


        /*** ATTACK ANIMATION START *** */
        var attack = false;
        var att = 0;

        function attack_animation() {
            idle = false;
            if (att > 11) {
                att = 0;
                attack = false;
                idle = true;
                walk = false;
            }
            g.src = "animationimg/Attacking/Golem_01_Attacking_" + att + ".png";
            att++;
        }

        $(".attack-btn").click(function() {
            attack = true;
        })


        /*** ATTACK ANIMATION END *** */








        /**** MOVE ANIMATION START **** */

        var wa = 0;

        function walk_animation() {

            if (wa > 17) {
                wa = 0;
                attack = false;
                idle = false;
            }
            g.src = "animationimg/Walking/Golem_01_Walking_" + wa + ".png";
            wa++;
        }


        /**** MOVE ANIMATION END ****/








        /*** MOVE NORMAL START *** */

        document.addEventListener("keydown", function(event) {
            // up : 38
            //left :37
            //down:40
            // right 39
            if (event.keyCode == 37) {
                move_left = true;
            } else if (event.keyCode == 39) {
                move_right = true;
            } else if (event.keyCode == 38) {
                // alert("up")
                move_up = true;
            }

        })

        document.addEventListener("keyup", function(event) {
            move_right = false;
            move_left = false;
            move_up = false;

            idle = true;
        });
        /*** MOVE NORMAL END *** */

        function draw() {

            // clear canvas
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            ctx.drawImage(g, gx, gy, gwidth, gheight);
            gy += gyspeed;

            if (move_right == true) {
                walk_animation();
                gx += gxspeed;
            }

            if (move_left == true) {
                walk_animation();
                gx -= gxspeed;
            }


            if (move_up == true) {
                gy -= gyspeed + 5;
            }


            if (attack == true) {
                attack_animation()
            }

            if (idle == true) {
                idle_animation();
            }



            // check for collisions 
            if (gy + gheight > canvas.height) {
                gy = canvas.height - gheight;
            }

            if (gx <= -35) {
                gx = -35;
            }

            if (gx + gwidth >= canvas.width) {
                gx = canvas.width - gwidth;
            }

            requestAnimationFrame(draw);
        }

        draw();
    </script>

</body>

</html>