<?php

session_start();
include '../../classes/database.class.php';
include '../../classes/typing_contest.class.php';
include '../../classes/memory_contest.class.php';
include '../../classes/users.class.php';
include '../../classes/activities.class.php';
include '../../classes/admin.class.php';


$typing = new TypingContest();
$memory = new memoryContest();
$activity = new Activity();
$admin = new Admin();
$user = new User();

$session_id = $_SESSION['id'];
?>

<!-- Konva Wheel of Fortuneview raw -->
<!DOCTYPE html>
<html>

<head>

    <style>
        /** start of  smaller screen*/
        @media only screen and (max-width: 690px) {


            .overlay-container {
                position: fixed;
                top: 0px;
                left: 0px;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.8);
                z-index: 1000;
            }


            .overlay-container .box {
                position: absolute;
                top: 0px;
                left: 0px;
                width: 100%;
                height: 100%;
                background-color: white;
            }

            .overlay-container .box .centered-div .icon {
                width: 100px;
                height: 100px;
                margin-top: 20%;
                margin-bottom: 20px;
            }

            .overlay-container .box .message {
                width: 100%;
                position: relative;
                text-align: center;
            }

            body {
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #08192d;

            }

            .intro-container {
                background: radial-gradient(#08192d, #08192d);
                width: 100%;
                height: 100vh;
                position: fixed;
                top: 0px;
                left: 0px;


            }

            .info-container {
                width: 100%;
                text-align: center;
                padding: 0px;
                font-weight: bold;
                font-size: 30px;
                margin-top: 100px;
                color: white;
                text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4);
                margin-top: 150px;
                margin-bottom: 20px;

            }


            .start-btn {
                padding: 10px;
                border: none;
                background-color: orange;
                color: black;
                border-radius: 100px;
                box-shadow: inset -2px 2px 5px rgba(0, 0, 0, 0.4);
                font-weight: bold;
                width: 200px;
                font-size: 20px !important;
                cursor: pointer;
            }

            .centered-div {
                display: flex;
                width: 100%;
                justify-content: center;
            }

        }

        /******** End of smaller screen ***************** */
        /***************************************** start of bigger screen********************************************/
        @media only screen and (min-width: 690px) {

            .overlay-container {
                position: fixed;
                top: 0px;
                left: 0px;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.8);
                z-index: 1000;
            }


            .overlay-container .box {
                position: absolute;
                top: 0px;
                left: 0px;
                width: 100%;
                height: 100%;
                background-color: white;
            }

            .overlay-container .box .centered-div .icon {
                width: 100px;
                height: 100px;
                margin-top: 7%;
                margin-bottom: 20px;
            }

            .overlay-container .box .message {
                width: 100%;
                position: relative;
                text-align: center;
                font-size: 18px;
            }

            .overlay-container .box .message p {
                font-size: 20px;
            }

            body {
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #08192d;

            }

            .intro-container {
                background: radial-gradient(#08192d, #08192d);
                width: 100%;
                height: 100vh;
                position: fixed;
                top: 0px;
                left: 0px;


            }

            .info-container {
                width: 100%;
                text-align: center;
                padding: 0px;
                font-weight: bold;
                font-size: 30px;
                margin-top: 100px;
                color: white;
                text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4);
                margin-top: 150px;
                margin-bottom: 20px;

            }


            .start-btn {
                padding: 10px;
                border: none;
                background-color: orange;
                color: black;
                border-radius: 100px;
                box-shadow: inset -2px 2px 5px rgba(0, 0, 0, 0.4);
                font-weight: bold;
                width: 200px;
                font-size: 20px !important;
                cursor: pointer;
            }

            .centered-div {
                display: flex;
                width: 100%;
                justify-content: center;
            }
        }

        /**************************** end of bigger screen ***************** */
    </style>
    <script src="https://unpkg.com/konva@7.0.2/konva.min.js"></script>
    <meta charset="utf-8" />

    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="shortcut icon" />

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />

    <link rel="stylesheet" href="../css/owl.carousel.min.css" />
    <link rel="stylesheet" href="../css/slicknav.min.css" />

    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/mystyle.css" />
    <link rel="stylesheet" href="../css/font-awesome.min.css" />
    <title>Win Wheel</title>

</head>

<body>

    <div class="intro-container" style="display:;">
        <div class="info-container"> CLICK THE "SPIN" BUTTON TO SPIN THE WHEEL</div>
        <br>
        <div class="centered-div">
            <button class="start-btn site-btn" onclick="start()">SPIN WHEEL</button>
        </div>
    </div>



    <div class="overlay-container win-modal" style="display:none;">
        <div class="box">
            <div class="centered-div">
                <img src="../img/goodsign1.png" class="icon" alt="icon">
            </div>
            <div class="message">
                <p style="color:mediumseagreen;font-weight:bold;">Congratulations!</p>
                You won <span style="color:mediumseagreen;font-weight:bold;">&#8358</span><span class="amount-won" style="color:mediumseagreen;font-weight:bold;">80</span>
            </div>
            <br>
            <div class="centered-div">
                <span onclick="go_back()" style="color:grey;border-bottom:1px dotted grey;cursor:pointer;">close <i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>




    <div class="overlay-container lose-modal" style="display:none;">
        <div class="box">
            <div class="centered-div">
                <img src="../img/sad.png" class="icon" alt="icon">
            </div>
            <div class="message">
                <p style="color:red;font-weight:bold;">Bad Luck, you lose!</p>
                <span>Try back tomorrow</span>
            </div>
            <br>
            <div class="centered-div">
                <span onclick="go_back()" style="color:grey;border-bottom:1px dotted grey;cursor:pointer;">close <i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>

    <div class="overlay-container played-modal" style="display:none;">
        <div class="box">
            <div class="centered-div">
                <img src="../img/played.png" class="icon" alt="icon">
            </div>
            <div class="message">
                <p style="color:royalblue;font-weight:bold;">You have already played for today!</p>
                <span>Try back tomorrow</span>
            </div>
            <br>
            <div class="centered-div">
                <span onclick="go_back()" style="color:grey;border-bottom:1px dotted grey;cursor:pointer;">close <i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>






    <div class="overlay-container inactive-modal" style="display:none;">
        <div class="box">
            <div class="centered-div">
                <img src="../img/close.png" class="icon" alt="icon">
            </div>
            <div class="message">
                <p style="color:red;font-weight:bold;">Free Airtime giveaway is not active right now!</p>
                <span>Check back later</span>
            </div>
            <br>
            <div class="centered-div">
                <span onclick="go_back()" style="color:grey;border-bottom:1px dotted grey;cursor:pointer;">close <i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>





    <div style="width:100%;display:flex;justify-content:center;background:;">
        <div id="container"></div>
    </div>

    <div class="close-display" style="position:fixed;top:0px;left:0px;width:100%;background-color:brown;height:100%;z-index:2000;display:none;"></div>






    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.slicknav.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/mixitup.min.js"></script>
    <script src="../js/main.js"></script>

    <script>
        var close_display = document.querySelector(".close-display");
        var intro_container = document.querySelector(".intro-container");

        var data = ["Null", 20, 30, 90, 100, 50, 60, 150, "Null", 200, 7, "Null", 80];

        //  start();

        function start() {
            // hide into container as game starts
            $(".intro-container").slideUp();
            var width = window.innerWidth;
            var height = window.innerHeight;
            // var width = 300;
            // var height = 300;

            Konva.angleDeg = false;
            var angularVelocity = 6;
            var angularVelocities = [];
            var lastRotation = 0;
            var controlled = false;
            var numWedges = 25;
            var angularFriction = 0.2;
            var target, activeWedge, stage, layer, wheel, pointer;
            var finished = false;

            function getAverageAngularVelocity() {
                var total = 0;
                var len = angularVelocities.length;

                if (len === 0) {
                    return 0;
                }

                for (var n = 0; n < len; n++) {
                    total += angularVelocities[n];
                }

                return total / len;
            }

            function purifyColor(color) {
                var randIndex = Math.round(Math.random() * 3);
                color[randIndex] = 0;
                return color;
            }

            function getRandomColor() {
                var r = 100 + Math.round(Math.random() * 55);
                var g = 100 + Math.round(Math.random() * 55);
                var b = 100 + Math.round(Math.random() * 55);
                return purifyColor([r, g, b]);
            }

            function getRandomReward() {
                // var mainDigit = Math.round(Math.random() * 9);
                // return mainDigit + '\n0\n0';

                // var rand = Math.floor(Math.random() * 9);
                // return rand + "0";

                var rand = Math.floor(Math.random() * data.length);
                return data[rand];
            }

            function addWedge(n) {
                var s = getRandomColor();
                var reward = getRandomReward();
                var r = s[0];
                var g = s[1];
                var b = s[2];
                var angle = (2 * Math.PI) / numWedges;

                var endColor = 'rgb(' + r + ',' + g + ',' + b + ')';
                r += 100;
                g += 100;
                b += 100;

                var startColor = 'rgb(' + r + ',' + g + ',' + b + ')';

                var wedge = new Konva.Group({
                    rotation: (2 * n * Math.PI) / numWedges,
                });

                var wedgeBackground = new Konva.Wedge({
                    radius: 400,
                    angle: angle,
                    fillRadialGradientStartPoint: 0,
                    fillRadialGradientStartRadius: 0,
                    fillRadialGradientEndPoint: 0,
                    fillRadialGradientEndRadius: 400,
                    fillRadialGradientColorStops: [0, startColor, 1, endColor],
                    fill: '#64e9f8',
                    fillPriority: 'radial-gradient',
                    stroke: '#ccc',
                    strokeWidth: 2,
                });

                wedge.add(wedgeBackground);

                var text = new Konva.Text({
                    text: reward,
                    fontFamily: 'Calibri',
                    fontSize: 50,
                    fill: 'white',
                    align: 'center',
                    stroke: 'yellow',
                    strokeWidth: 1,
                    rotation: (Math.PI + angle) / 2,
                    x: 380,
                    y: 30,
                    listening: false,
                });

                wedge.add(text);
                text.cache();

                wedge.startRotation = wedge.rotation();

                wheel.add(wedge);
            }

            function animate(frame) {
                // handle wheel spin
                var angularVelocityChange =
                    (angularVelocity * frame.timeDiff * (1 - angularFriction)) / 1000;
                angularVelocity -= angularVelocityChange;

                // activate / deactivate wedges based on point intersection
                var shape = stage.getIntersection({
                    x: stage.width() / 2,
                    y: 100,
                });

                if (controlled) {
                    if (angularVelocities.length > 10) {
                        angularVelocities.shift();
                    }

                    angularVelocities.push(
                        ((wheel.rotation() - lastRotation) * 1000) / frame.timeDiff
                    );
                } else {
                    var diff = (frame.timeDiff * angularVelocity) / 1000;
                    if (diff > 0.0001) {
                        wheel.rotate(diff);
                    } else if (!finished && !controlled) {
                        if (shape) {
                            var text = shape.getParent().findOne('Text').text();
                            var price = text.split('\n').join('');
                            //  alert('You won N' + price);
                            if (price != "Null") {
                                $(".win-modal").fadeIn();
                                $(".amount-won").html(price);
                                fund_airtime(price, "won");
                            } else if (price == "Null") {
                                $(".lose-modal").fadeIn();
                                fund_airtime(0, "lose");
                            }
                        }
                        finished = true;
                    }
                }
                lastRotation = wheel.rotation();

                if (shape) {
                    if (shape && (!activeWedge || shape._id !== activeWedge._id)) {
                        pointer.y(20);

                        new Konva.Tween({
                            node: pointer,
                            duration: 0.3,
                            y: 30,
                            easing: Konva.Easings.ElasticEaseOut,
                        }).play();

                        if (activeWedge) {
                            activeWedge.fillPriority('radial-gradient');
                        }
                        shape.fillPriority('fill');
                        activeWedge = shape;
                    }
                }
            }

            function init() {
                stage = new Konva.Stage({
                    container: 'container',
                    width: width,
                    height: height,
                });
                layer = new Konva.Layer();
                wheel = new Konva.Group({
                    x: stage.width() / 2,
                    y: 410,
                });

                for (var n = 0; n < numWedges; n++) {
                    addWedge(n);
                }
                pointer = new Konva.Wedge({
                    fillRadialGradientStartPoint: 0,
                    fillRadialGradientStartRadius: 0,
                    fillRadialGradientEndPoint: 0,
                    fillRadialGradientEndRadius: 30,
                    fillRadialGradientColorStops: [0, 'white', 1, 'red'],
                    stroke: 'white',
                    strokeWidth: 2,
                    lineJoin: 'round',
                    angle: 1,
                    radius: 30,
                    x: stage.width() / 2,
                    y: 33,
                    rotation: -90,
                    shadowColor: 'black',
                    shadowOffsetX: 3,
                    shadowOffsetY: 3,
                    shadowBlur: 2,
                    shadowOpacity: 0.5,
                });

                // add components to the stage
                layer.add(wheel);
                layer.add(pointer);
                stage.add(layer);

                // bind events
                // wheel.on('mousedown touchstart', function(evt) {
                //     angularVelocity = 0;
                //     controlled = true;
                //     target = evt.target;
                //     finished = false;
                // });

                // // add listeners to container
                // stage.addEventListener(
                //     'mouseup touchend',
                //     function() {
                //         controlled = false;
                //         angularVelocity = getAverageAngularVelocity() * 5;

                //         if (angularVelocity > 20) {
                //             angularVelocity = 20;
                //         } else if (angularVelocity < -20) {
                //             angularVelocity = -20;
                //         }

                //         angularVelocities = [];
                //     },
                //     false
                // );

                // stage.addEventListener(
                //     'mousemove touchmove',
                //     function(evt) {
                //         var mousePos = stage.getPointerPosition();
                //         if (controlled && mousePos && target) {
                //             var x = mousePos.x - wheel.getX();
                //             var y = mousePos.y - wheel.getY();
                //             var atan = Math.atan(y / x);
                //             var rotation = x >= 0 ? atan : atan + Math.PI;
                //             var targetGroup = target.getParent();

                //             wheel.rotation(
                //                 rotation - targetGroup.startRotation - target.angle() / 2
                //             );
                //         }
                //     },
                //     false
                // );

                var anim = new Konva.Animation(animate, layer);

                // wait one second and then spin the wheel
                setTimeout(function() {
                    anim.start();
                }, 1000);
            }
            init();

        }
    </script>

    <?php

    if ($admin->getAdminDetail("free_airtime_status") == "on") {

        if ($admin->getAdminDetail("airtime_balance") > 200) {
            if (!isset($_COOKIE['winwheel_played'])) {
                echo '<script>
    $(".intro-container").show();
    </script>';
            } else {
                echo '<script>
                    $(".played-modal").show();
                    </script>';
            }
        } else {
            echo '<script>
            $(".inactive-modal").show();
            </script>';
        }
    } else {
        echo '<script>
            $(".inactive-modal").show();
            </script>';
    }

    ?>


    <script>
        function fund_airtime(amount, status) {
            var free_airtime = "yes";
            $.ajax({

                url: "ajax-winwheel-script.php",
                method: "POST",
                async: false,
                data: {
                    "free_airtime": free_airtime,
                    "amount": amount,
                    "status": status
                },
                success: function(data) {
                    $(".contests-container").html(data);
                }

            });

        }
    </script>




</body>

</html>