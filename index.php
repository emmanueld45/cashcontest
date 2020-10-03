<?php

session_start();
include 'classes/database.class.php';
include 'classes/typing_contest.class.php';
include 'classes/memory_contest.class.php';
include 'classes/users.class.php';
include 'classes/activities.class.php';
include 'classes/admin.class.php';


if(isset($_SESSION['id'])){
$session_id = $_SESSION['id'];
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Contestground | Home</title>
    <meta charset="UTF-8">
    <meta name="description" content="Win Big playing simple contest">
    <meta name="keywords" content="games, win, betting">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="shortcut icon" />

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/slicknav.min.css" />

    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/mystyle.css" />

    <link rel="stylesheet" href="account/css/mystyle.css" />




</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- header section start -->
    <?php include 'header.php'; ?>
    <!-- header section end -->


    <!-- Hero section --
    <section class="hero-section">
        <div class="hero-slider owl-carousel">
            <div class="hs-item">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hs-text">
                                <h2><span>Music</span> for everyone.</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
                                <a href="#" class="site-btn">Download Now</a>
                                <a href="#" class="site-btn sb-c2">Start free trial</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hr-img">
                                <img src="img/hero-bg.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hs-item">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hs-text">
                                <h2><span>Listen </span> to new music.</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
                                <a href="#" class="site-btn">Download Now</a>
                                <a href="#" class="site-btn sb-c2">Start free trial</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hr-img">
                                <img src="img/hero-bg.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero section end -->


    <!--== FRONT PAGE BANNER START ===---
    <div class="frontpage-banner-container">
        <img src="contestimages/gameimg5.jpg" class="frontpage-banner-img">
    </div>
    <!--== FRONT PAGE BANNER START ===--->


    <div class="banner-slider owl-carousel">
        <div class="banner"> <img src="contestimages/gameimg5.jpg" class="img"></div>
        <div class="banner"> <img src="contestimages/gameimg1.jpg" class="img"> </div>
        <div class="banner"> <img src="contestimages/gameimg3.jpg" class="img"> </div>

    </div>
    <!--=== icons btn start ==--->
    <div class="icons-container">
        <div class="icons-box"><a href="account/all-contests"><img src="img/icons/gems.png" class="icon"><span>Play</span></a></div>
        <div class="icons-box"><a href="faq"><img src="img/icons/brain.png" class="icon"><span>FAQ</span></a></div>
        <div class="icons-box"><a href="spin"><img src="img/icons/wheel1.png" class="icon"><span>Spin</span></a></div>
        <div class="icons-box"><a href="auth/login"><img src="img/icons/user1.png" class="icon"><span>Signup</span></a></div>
    </div>
    <!--=== icons btn start ==--->
    <div style="margin-top:-70px !important;"></div>



    <!-- Intro section -->
    <section class="intro-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title" style="margin-bottom:8px;">
                        <h3>Cash out weekly playing simple games! <i class="fa fa-gamepad" style="color:orange;"></i></h2>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                    <a href="#" class="site-btn">Start now!</a>

                </div>
                <div class="col-lg-6">

                    <!-- live feed start --->
                    <div class="live-feed-container">
                        <div class="live-feed-header">Latest Winners <i class="fa fa-trophy" style="color:#fc0254;"></i></div>
                        <div class="live-feed-body">
                        <?php
            
                        $result = $db->setQuery("SELECT * FROM winners_history ORDER BY id DESC;");
                        while($row = mysqli_fetch_assoc($result)){
                            $winner_id = $row['winner_id'];
                            $firstname = $user->getUserDetail($winner_id, "firstname");
                            $lastname = $user->getUserDetail($winner_id, "lastname");

                            if($row['history_type'] == "typing_contest"){
                                $message = "in a typing contest";
                            }else if($row['history_type'] == "memory_contest"){
                                $message = "in a memory contest";
                            }
                            ?>
                            <div class="live-feed-box">
                                <div class="left">
                                    <img src="account/<?php echo $user->getUserDetail($winner_id, "image"); ?>" class="img">
                                </div>

                                <div class="right">
                                    <span class="text"><?php echo $firstname." ".$lastname; ?> won <span style="color:mediumseagreen;"><span>&#8358</span><?php echo $row['amount']; ?></span> <?php echo $message; ?></span>
                                    <span class="time"><?php echo $db->format_time($row['time']); ?></span>
                                </div>
                            </div>
                            <?php
                             }
                            ?>

                        </div>
                    </div>
                    <!-- live feed end --->


                </div>
            </div>
        </div>
    </section>
    <!-- Intro section end -->

    <!-- How section -->
    <section class="how-section spad set-bg" data-setbg="img/how-to-bg.jpg">
        <div class="container text-white">
            <div class="section-title">
                <h2>How it works</h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="how-item">
                        <div class="hi-icon">
                            <img src="img/icons/brain.png" alt="">
                        </div>
                        <h4>Create an account</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipi-scing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="how-item">
                        <div class="hi-icon">
                            <img src="img/icons/pointer.png" alt="">
                        </div>
                        <h4>Join a contest</h4>
                        <p>Donec in sodales dui, a blandit nunc. Pellen-tesque id eros venenatis, sollicitudin neque sodales, vehicula nibh. Nam massa odio, portti-tor vitae efficitur non. </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="how-item">
                        <div class="hi-icon">
                            <img src="img/icons/smartphone.png" alt="">
                        </div>
                        <h4>Win & Cashout</h4>
                        <p>Ablandit nunc. Pellentesque id eros venenatis, sollicitudin neque sodales, vehicula nibh. Nam massa odio, porttitor vitae efficitur non, ultric-ies volutpat tellus. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- How section end -->

    <!-- Concept section --
    <section class="concept-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h2>Our Concept & artists</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="concept-item">
                        <img src="img/concept/1.jpg" alt="">
                        <h5>Soul Music</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="concept-item">
                        <img src="img/concept/2.jpg" alt="">
                        <h5>Live Concerts</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="concept-item">
                        <img src="img/concept/3.jpg" alt="">
                        <h5>Dj Sets</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="concept-item">
                        <img src="img/concept/4.jpg" alt="">
                        <h5>Live Streems</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Concept section end -->

    <!-- Subscription section -->
    <section class="subscription-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="sub-text">
                        <h2>Win with as low as <span>&#8358</span>50</h2>
                        <h3>Play demos now!</h3>
                        <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <a href="demo/typing/game.php" class="site-btn">Typing Demo</a><br><br>
                        <a href="demo/memory/game.php" class="site-btn">Memory Demo</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="sub-list">
                        <li><img src="img/icons/check-icon.png" alt="">Higher winning chances</li>
                        <li><img src="img/icons/check-icon.png" alt="">Less than 10 members in a contest</li>
                        <li><img src="img/icons/check-icon.png" alt="">Win every 1 hour</li>
                        <li><img src="img/icons/check-icon.png" alt="">Weekly withdrawal</li>
                        <!-- <li><img src="img/icons/check-icon.png" alt="">High quality audio</li>
                        <li><img src="img/icons/check-icon.png" alt="">Shuffle play</li> -->
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Subscription section end -->

    <!-- Premium section end -->
    <section class="premium-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h2>Why go Cashcontest?</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <p>
                    We provide an avenue for individuals to make money from home using their smartphones by playing simple 
                online contests.
                    </p>
                </div>
            </div>




            <!-- <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="premium-item">
                        <img src="img/premium/1.jpg" alt="">
                        <h4>No ad interruptions </h4>
                        <p>Consectetur adipiscing elit</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="premium-item">
                        <img src="img/premium/2.jpg" alt="">
                        <h4>High Quality</h4>
                        <p>Ectetur adipiscing elit</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="premium-item">
                        <img src="img/premium/3.jpg" alt="">
                        <h4>Listen Offline</h4>
                        <p>Sed do eiusmod tempor </p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="premium-item">
                        <img src="img/premium/4.jpg" alt="">
                        <h4>Download Music</h4>
                        <p>Adipiscing elit</p>
                    </div>
                </div>
            </div> -->





        </div>
    </section>
    <!-- Premium section end -->


    <!--=== intro modal start ==--->
    <div class="intro-modal">
       
    <div class="box">
         <button class="close-btn intro-modal-close-btn"><i class="fa fa-times"></i></button>

     <!-- slider container start -->
      <div class="slider-container">
        <div id="demo" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="indicator active"></li>
            <li data-target="#demo" data-slide-to="1" class="indicator"></li>
            <li data-target="#demo" data-slide-to="2" class="indicator"></li>
          </ul>

          <!-- The slideshow -->
          <div class="carousel-inner">
            <div class="carousel-item active">
               <!-- box start--->
                <div class="box">
                    <div class="title">How to play?</div>
                    <div class="centered-div">
                        <img src="contestimages/gameimg5.jpg" class="image" alt="image">
                    </div>
                    <div class="message">
                        Join any contest of your choice. this can be either a typing or memory contest
                    </div>
                </div>
               <!-- box end -->
            </div>
            <div class="carousel-item">
              <!-- box start--->
              <div class="box">
                    <div class="title">Memory contest?</div>
                    <div class="centered-div">
                        <img src="img/memorydemo1.png" class="image" alt="image">
                    </div>
                    <div class="message">
                        For a memory contest, you have to finish flipping all identical cards in the lowest 
                        amount of time possible to beat other participants and be the winner!
                    </div>
                </div>
               <!-- box end -->
            </div>
            <div class="carousel-item">
               <!-- box start--->
               <div class="box">
                    <div class="title">Typing contest?</div>
                    <div class="centered-div">
                        <img src="img/typingdemo1.png" class="image" alt="image">
                    </div>
                    <div class="message">
                        For a typing contest, to win you have to finish 5 typing 5 sentences
                        in the lowest amount of time possible than others
                    </div>
                </div>
               <!-- box end -->
            </div>
          </div>

          <!-- Left and right controls -->
          <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <!-- <span class="carousel-control-prev-icon" style="color:black;"></span> -->
            <i class="fa fa-angle-left" style="color:black;font-size:30px;"></i>
          </a>
          <a class="carousel-control-next" href="#demo" data-slide="next">
            <!-- <span class="carousel-control-next-icon"></span> -->
            <i class="fa fa-angle-right" style="color:black;font-size:30px;"></i>
          </a>
        </div>
      </div>
      <!-- slider container end -->


        </div>
    </div>
    <!--=== intro modal end ==--->

    <!-- footer section start -->
    <?php include 'footer.php'; ?>
    <!-- footer section end -->

    <?php
    include 'mobile-bottom-nav.php';
    ?>
    <!--====== Javascripts & Jquery ======-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/mymain.js"></script>


    <script>
        $('.banner-slider').owlCarousel({
            center: true,
            items: 2,
            loop: true,
            margin: 10,
            dots: true,
            dotsEach: true,
            autoplay:true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },

                600: {
                    items: 2
                }
            }
        });


        $(".intro-modal-close-btn").click(function() {
            $(".intro-modal").fadeOut();
        })
        // $(".intro-modal").click(function() {
        //     $(".intro-modal").fadeOut();
        // })
    </script>

</body>

</html>