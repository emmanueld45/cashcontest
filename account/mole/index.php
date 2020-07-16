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
            width: 100%;
            height: 100%;
            /* background: radial-gradient(green, mediumseagreen); */
            background: radial-gradient(orange, brown);
            top: 0px;
            left: 0px;

        }
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mole</title>


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









    <canvas id="canvas"></canvas>



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



        // background
        var bg = new Image();
        bg.src = "img/bg.png";

        // hole 
        var hole = new Image();
        hole.src = "img/button.png";
        var holewidth = 50;
        var holeheight = 50;




        // analysize hole positions
        var x_pos = canvas.width / 3;
        var hole1x = 0 + 20;
        var hole2x = x_pos + 20;
        var hole3x = x_pos + x_pos + 20;

        var hole4x = 0 + 20;
        var hole5x = x_pos + 20;
        var hole6x = x_pos + x_pos + 20;

        var hole7x = 0 + 20;
        var hole8x = x_pos + 20;
        var hole9x = x_pos + x_pos + 20;

        var y_pos = canvas.height / 5;

        // hole array
        var hole_array = [{
            x: hole1x,
            y: y_pos
        }, {
            x: hole2x,
            y: y_pos
        }, {
            x: hole3x,
            y: y_pos
        }, {
            x: hole4x,
            y: y_pos + y_pos
        }, {
            x: hole5x,
            y: y_pos + y_pos
        }, {
            x: hole6x,
            y: y_pos + y_pos
        }, {
            x: hole7x,
            y: y_pos + y_pos + y_pos
        }, {
            x: hole8x,
            y: y_pos + y_pos + y_pos
        }, {
            x: hole9x,
            y: y_pos + y_pos + y_pos
        }]


        // rat
        var rat = new Image();
        rat.src = "img/rat2.png";
        var ratwidth = holewidth;
        var ratheight = holeheight;
        var ratx;
        var raty;

        var rat_killed = false;

        function position_rat() {
            var rand = Math.floor(Math.random() * 9);
            // alert(rand)
            ratx = hole_array[rand].x;
            raty = hole_array[rand].y;
        }
        position_rat();

        setInterval(() => {
            position_rat();
        }, 800);


        // detect touching and mouse coordinates
        var mousex;
        var mousey;
        document.body.addEventListener("mousemove", (e) => {
            mousex = e.clientX;
            mousey = e.clientY;

        })
        var touchx;
        var touchy;
        document.body.addEventListener("touchstart", (e) => {
            touchx = e.touches[0].clientX;
            touchy = e.touches[0].clientY;

        })



        // score alert
        var score_alert = 5;
        var score_alert_text = false;
        var score_alert_text_x;
        var score_alert_text_y;

        function show_score_alert() {

            score_alert_text = true;
            setTimeout(() => {
                score_alert_text = false;
            }, 1000)
        }




        function draw() {

            // clear 
            ctx.clearRect(0, 0, canvas.width, canvas.height)
            // draw background
            ctx.drawImage(bg, 0, 0, canvas.width, canvas.height);

            for (i = 0; i < hole_array.length; i++) {
                ctx.drawImage(hole, hole_array[i].x, hole_array[i].y, holewidth, holeheight);
            }

            ctx.drawImage(rat, ratx, raty, ratwidth, ratheight);

            // check if player touches the rat with moush or by touches
            if (mousex >= ratx && mousex <= ratx + ratwidth && mousey >= raty && mousey <= raty + ratheight) {
                rat_killed = true;
                score_alert_text_x = ratx;
                score_alert_text_y = raty;
                if (rat_killed == true) {
                    // position_rat();
                    // alert("You killed the rat")
                    show_score_alert();
                    rat_killed = false;
                }
            }
            if (touchx >= ratx && touchx <= ratx + ratwidth && touchy >= raty && touchy <= raty + ratheight) {
                rat_killed = true;
                score_alert_text_x = ratx;
                score_alert_text_y = raty;
                if (rat_killed == true) {
                    // position_rat();
                    // alert("You killed the rat")
                    show_score_alert();
                    rat_killed = false;
                }
            }


            // score alert
            if (score_alert_text == true) {
                ctx.font = "20px Georgia";
                ctx.fillStyle = "orange";
                ctx.fillText("+" + score_alert, score_alert_text_x, score_alert_text_y);
            }

            requestAnimationFrame(draw);



        }

        draw()
    </script>

</body>

</html>