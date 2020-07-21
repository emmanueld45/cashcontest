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

        #canvas {
            background-color: lightblue;
        }

        .box {
            width: 100px;
            height: 100px;
            background-color: green;
            position: fixed;
            bottom: 10px;
            left: 300px;
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

    <!-- <div class="box" draggable=true></div> -->

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





        // 
        var stone = new Image();
        stone.src = "img/button.png";
        var stonewidth = 50;
        var stoneheight = 50;
        var stonex = 200;
        var stoney = 50;
        var stoneyspeed = 0;
        var stonexspeed = 3;






        // detect touching and mouse coordinates
        // var mousex = 100
        // var mousey = canvas.height / 2;
        // document.body.addEventListener("mousemove", (e) => {
        //     mousex = e.clientX;
        //     mousey = e.clientY;

        //     console.log("Mouse is moving")

        // })

        // var touchx;
        // var touchy;
        // document.body.addEventListener("touchstart", (e) => {
        //     touchx = e.touches[0].clientX;
        //     touchy = e.touches[0].clientY;

        // })


        setInterval(() => {

            // clear 
            ctx.clearRect(0, 0, canvas.width, canvas.height)

            // draw stone
            ctx.drawImage(stone, stonex, stoney, stonewidth, stoneheight);
            stoneyspeed++;
            stoney += stoneyspeed;

            if (stoney + stoneheight >= canvas.height - 20) {
                stoneyspeed = -stoneyspeed + 1;
            }



            // if (stoney <= 50) {
            //     stoneyspeed = -stoneyspeed;
            // }


            console.log(stoneyspeed)


        }, 30)



        // function draw() {

        //     // clear 
        //     ctx.clearRect(0, 0, canvas.width, canvas.height)

        //     // draw stone
        //     ctx.drawImage(stone, stonex, stoney, stonewidth, stoneheight);
        //     stoneyspeed++;
        //     stoney += stoneyspeed;

        //     if (stoney + stoneheight >= canvas.height - 20) {
        //         stoneyspeed = -stoneyspeed + 1;
        //     }

        //     // if (stoney <= 50) {
        //     //     stoneyspeed = -stoneyspeed;
        //     // }


        //     console.log(stoneyspeed)

        //     requestAnimationFrame(draw);



        // }

        // draw()
    </script>

</body>

</html>