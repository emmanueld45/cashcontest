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



    <!--=== intro container start ===-->
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

    <div class="direction-container">
        <button class="left-btn"><i class="fa fa-arrow-left"></i></button>
        <button class="right-btn"><i class="fa fa-arrow-right"></i></button>
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
        $(".start-btn").click(function() {
            start_game();
            $(".intro-container").slideUp();
        })


        function start_game() {

            //audio
            var ball_hit_sound = new Audio();
            ball_hit_sound.src = "sounds/ball-hit.wav";


            // draw canvas
            var canvas = document.getElementById("canvas");
            ctx = canvas.getContext("2d");
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;


            // draw ball
            var ball = new Image();
            ball.src = "img/ball.png";

            var ballx = 0;
            var bally = 0;
            var ballwidth = 20;
            var ballheight = 20;

            var ballyspeed = 5;
            var ballxspeed = 3;



            // draw paddle
            var paddle = new Image();
            paddle.src = "img/background1.jpg";

            var paddlewidth = 50;
            var paddleheight = 20;
            var paddlex = canvas.width / 2 - paddlewidth / 2;
            var paddley = canvas.height - paddleheight;

            var paddleyspeed = 50;
            var paddlexspeed = 5;

            var move_paddle_right = false;
            var move_paddle_left = false;



            // draw star
            var star = new Image();
            star.src = "img/star.png";
            var starwidth = 20;
            var starheight = 20;
            var starx = canvas.width / 2 - starwidth / 2;
            var stary = 20;
            var draw_star = true;

            /** HELPING FUNCTIONS START *** */

            function play_ball_hit_sound() {
                ball_hit_sound.play();
            }
            /** HELPING FUNCTIONS END ** */


            //draw on canvas
            function draw() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);

                fall_ball();
                display_star();
                requestAnimationFrame(draw);
            }

            draw();

            function fall_ball() {

                // draw ball
                ctx.drawImage(ball, ballx, bally, ballwidth, ballheight);
                bally += ballyspeed;
                ballx += ballxspeed;

                if (bally + ballheight >= canvas.height) {
                    play_ball_hit_sound();
                    ballyspeed = -ballyspeed;
                    // alert("you failed!")
                }
                if (bally <= 0) {
                    play_ball_hit_sound();
                    ballyspeed = -ballyspeed;
                }

                if (ballx + ballwidth >= canvas.width) {
                    play_ball_hit_sound();
                    ballxspeed = -ballxspeed;
                }

                if (ballx <= 0) {
                    play_ball_hit_sound();
                    ballxspeed = -ballxspeed;
                }


                // draw paddle
                ctx.drawImage(paddle, paddlex, paddley, paddlewidth, paddleheight);
                if (paddlex + paddlewidth >= canvas.width) {
                    paddlex = canvas.width - paddlewidth;
                }

                if (paddlex <= 0) {
                    paddlex = 0;
                }

                if (move_paddle_right === true) {
                    paddlex += paddlexspeed;
                }
                if (move_paddle_left === true) {
                    paddlex -= paddlexspeed;
                }


                // collide ball and paddle
                if (bally + ballheight >= paddley && ballx >= paddlex - 15 && ballx <= paddlex + paddlewidth) {
                    play_ball_hit_sound();
                    ballyspeed = -ballyspeed;
                }

                // collide star and ball
                // if (ballx == starx && bally == stary) {
                //     alert("they meet")
                //     draw_star = false;
                //     ctx.clearRect(starx, stary, starwidth, starheight)
                // }

                if (bally == stary && ballx + ballwidth >= starx && ballx + ballwidth <= starx + starwidth) {
                    alert("they meet")
                    draw_star = false;
                    ctx.clearRect(starx, stary, starwidth, starheight)
                }


            }



            // display star
            function display_star() {
                // draw ball
                if (draw_star === true) {
                    ctx.drawImage(star, starx, stary, starwidth, starheight);
                } else {
                    create_star();
                    draw_star = true;
                }
            }

            function create_star() {
                var randx = Math.floor(Math.random() * canvas.width - 10);
                var randy = Math.floor(Math.random() * (canvas.height / 5));

                starx = randx;
                stary = randy;
            }


            // MOVEMENT HANDLER
            var mousedown_interval;
            // $(".right-btn").touch(function() {
            //     move_paddle_right = true;
            // })
            var right_btn = document.querySelector(".right-btn");
            var left_btn = document.querySelector(".left-btn");

            right_btn.addEventListener("touchstart", function() {
                move_paddle_right = true;
            });

            right_btn.addEventListener("touchend", function() {
                move_paddle_right = false;
            });


            left_btn.addEventListener("touchstart", function() {
                move_paddle_left = true;
            });
            left_btn.addEventListener("touchend", function() {
                move_paddle_left = false;
            });

            document.addEventListener("keydown", function(event) {
                // up : 38
                //left :37
                //down:40
                // right 39
                if (event.keyCode == 37) {
                    move_paddle_left = true;
                } else if (event.keyCode == 39) {
                    move_paddle_right = true;
                }

            })

            document.addEventListener("keyup", function(event) {
                move_paddle_right = false;
                move_paddle_left = false;
            });



        }
    </script>

</body>

</html>