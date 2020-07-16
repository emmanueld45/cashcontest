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
            /* background: radial-gradient(lightblue, lightblue) */
            background: radial-gradient(grey, black)
        }

        .shoot-btn {
            position: fixed;
            bottom: 10px;
            right: 10px;
            z-index: 1000;
        }

        .create-enemy {
            position: fixed;
            bottom: 10px;
            left: 10px;
            z-index: 1000;
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

    <button class="shoot-btn">Shoot</button>
    <button class="create-enemy">Add</button>
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
    <script src="js/sprite_animation.js"></script>


    <script>
        var canvas = document.getElementById("canvas");
        var ctx = canvas.getContext("2d");

        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;


        //gun
        var gun = new Image();
        gun.src = "img/gun.png";
        var gunwidth = gun.width;
        var gunheight = gun.height;
        // var gunwidth = 200;
        // var gunheight = 100;
        var gunx = canvas.width - gunwidth - 30;
        var guny = canvas.height / 2;

        var gunxspeed = 5;
        var gunyspeed = 10;

        var move_right = false;
        var move_left = false;
        var move_up = false;
        var move_down = false;


        //bullet
        var bullet = new Image();
        bullet.src = "img/bullet.png";
        // var bulletwidth = bullet.width;
        // var bulletheight = bullet.height;
        var bulletwidth = 20;
        var bulletheight = 20;
        var bulletx;
        var bullety;
        var bulletxspeed = 50;
        var bulletyspeed = 0;
        var shoot_bullet = false;

        var bullet_array = [{
            x: gunx,
            y: guny
        }]




        // shoot 
        $(".shoot-btn").click(function() {

            bullet_array.push({
                x: gunx,
                y: guny
            })

        });



        // explode
        var ex = new Image();
        ex.src = "img/ex1.png";
        var exwidth = 150;
        var exheight = 150;
        var exx = 200;
        var exy = 200;
        var exxspeed = 10;
















        var a = true;
        var enemies = [];

        function create_enemy() {
            var randx = 0;
            var randy = Math.floor(Math.random() * canvas.height - exheight);
            enemies.push({
                x: randx,
                y: randy,
                xspeed: 10,
                yspeed: 5
            });
        }
        create_enemy();
        var enemy_idle = new SpriteAnimation(ex, 24, 0, 24, canvas, ctx);


        $(".create-enemy").click(function() {
            create_enemy();
        })


        function draw() {

            // clear 
            ctx.clearRect(0, 0, canvas.width, canvas.height)


            ctx.drawImage(gun, gunx, guny, gunwidth, gunheight)

            // ctx.drawImage(ex, 0, 0, exwidth / 6, exheight, exx, exy, 500, 500)

            // ctx.drawImage(ex, exwidth / 6 * 0, 0, exwidth / 6, exheight, 50, 50, 300, 300)
            for (i = 0; i < enemies.length; i++) {
                enemy_idle.animate(enemies[i].x, enemies[i].y, exwidth, exheight);
                enemies[i].x += enemies[i].xspeed;
                enemies[i].y += enemies[i].yspeed;
                if (enemies[i].x >= canvas.width / 2) {
                    enemies[i].xspeed = -enemies[i].xspeed;
                }
                if (enemies[i].x <= 0) {
                    enemies[i].xspeed = -enemies[i].xspeed;
                }
                if (enemies[i].y <= 0) {
                    enemies[i].yspeed = -enemies[i].yspeed;
                }
                if (enemies[i].y + exheight >= canvas.height) {
                    enemies[i].yspeed = -enemies[i].yspeed;
                }
            }



            for (i = 0; i < bullet_array.length; i++) {
                ctx.drawImage(bullet, bullet_array[i].x, bullet_array[i].y, bulletwidth, bulletheight);
                bullet_array[i].x -= bulletxspeed;
                bullet_array[i].y -= bulletyspeed;
            }



            if (move_up == true) {
                guny -= gunyspeed;
            }
            if (move_down == true) {
                guny += gunyspeed;
            }



            //  requestAnimationFrame(draw);



        }

        setInterval(() => {
            draw();
        }, 70)











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
            } else if (event.keyCode == 40) {
                // alert("up")
                move_down = true;
            }

        })

        document.addEventListener("keyup", function(event) {
            move_right = false;
            move_left = false;
            move_up = false;
            move_down = false;

        });
        /*** MOVE NORMAL END *** */
    </script>

</body>

</html>