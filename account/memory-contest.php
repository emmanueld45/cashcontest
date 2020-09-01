<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>CashContest | profile</title>
    <meta charset="UTF-8">
    <meta name="description" content="SolMusic HTML Template">
    <meta name="keywords" content="music, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="shortcut icon" />

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/slicknav.min.css" />

    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/mystyle.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />



    <style>
        /***** START OF SMALLER SCREEN ******/
        @media only screen and (max-width: 690px) {}

        /*********** END OF BIGGER SCREEN ****** ***** */



        /************ START OF BIGGRER SCREEN*********/
        @media only screen and (min-width: 690px) {}

        /**** END OF BIGGER SCREEN **** */
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header section -->

    <!-- Header section end -->



    <!-- main container start -->
    <div class="main-container">

        <!-- main container left start -->
        <div class="main-container-left">

            <!-- desktop nav container start--->
            <?php include 'desktop-side-nav.php'; ?>
            <!-- desktop nav container end -->

        </div>
        <!-- main container left end -->





        <!-- main container middle start -->
        <div class="main-container-middle">

            <!--=== memory top container start -->
            <div class="sticky-top" style="z-index:100;">
                <div class="cover-container-top">
                    <img src="../contestimages/gameimg2.jpg" class="img">
                </div>

                <div class="cover-container-bottom">
                    <div class="left">
                        <img src="../contestimages/contestimg3.jpg" class="img">
                    </div>
                    <div class="right">
                        <div style="padding:10px;">
                            <span class="contest-name">Memory Contest<span> <br>
                                    <i class="fa fa-star" style="color:#fc0254;font-size:14px;"></i>
                                    <i class="fa fa-star" style="color:#fc0254;font-size:14px;"></i>
                                    <i class="fa fa-star" style="color:#fc0254;font-size:14px;"></i>
                                    <button class="how-to-play how-to-play-btn">How to play</button>
                        </div>

                    </div>
                </div>
            </div>
            <!--=== typing top container end-->

            <!--=== typing contests container start ===-->
            <div class="contests-container">

            </div>
            <!--=== typing contests container start ===-->

        </div>
        <!-- main container middle end -->






        <!-- main container right start -->
        <div class="main-container-right">





        </div>
        <!--main container right end -->

    </div>
    <!-- main container end -->











    <!--=== join modal start ==--->
    <div class="join-modal-background">
        <div class="join-modal">

            <div class="title">Join Contest!</div>
            <div class="centered-div">
                <img src="../img/icons/gems.png" class="contest-icon">
            </div>
            <div class="coin-price">Costs <span style="color:orange;"><span class="global-coin-price">50</span>coins</span></div>
            <div style="width:100%;height:50px;">
                <button class="join-modal-close-btn">Cancel</button>
                <a class="contest-url" href="">Accept</a>
            </div>
        </div>
    </div>
    <!--=== join modal start ==--->



    <!--=== how to play modal start ===--->
    <div class="how-to-play-modal">
        <button class="close-btn how-to-play-close-btn"><i class="fa fa-times"></i></button>
        <div class="box">
            <div class="title"><u>How to play?</u></div>
            <br>
            <div class="body">
                Typing contest is a game of speed and accuracy. To play the game follow the steps below:
                <br><br>
                <h4>step 1</h4>
                <p>CLick the "join" button you see on a contest</p>
            </div>
        </div>
    </div>
    <!--=== how to play modal start ===--->

    <!-- Footer section -->

    <!-- Footer section end -->

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


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


    <script>
        setInterval(() => {
            var memory_contest = "yes";
            $.ajax({

                url: "ajax-get-contests.php",
                method: "POST",
                async: false,
                data: {
                    "memory_contest": memory_contest,
                },
                success: function(data) {
                    $(".contests-container").html(data);
                }

            });

        }, 1000);





        $(".join-btn").click(function() {
            $(".global-coin-price").html($(this).attr("coinprice"));
            $(".join-modal-background").fadeIn();
            $(".join-modal-background").css("display", "flex");
        });
        $(".join-modal-background").click(function() {
            $(".join-modal-background").fadeOut();
        })
        $(".join-modal-close-btn").click(function() {
            $(".join-modal-background").fadeOut();
        })



        function show_join_modal(btn) {

            var coin_price = btn.getAttribute("coinprice");
            var contest_id = btn.getAttribute("contestid");

            $(".global-coin-price").html(coin_price);
            $(".contest-url").attr("href", "memory/game.php?contest_id=" + contest_id)

            $(".join-modal-background").fadeIn();
            $(".join-modal-background").css("display", "flex");
        }

        $(".how-to-play-btn").click(function() {
            $(".how-to-play-modal").fadeIn();
        })

        $(".how-to-play-close-btn").click(function() {
            $(".how-to-play-modal").fadeOut();
        })


        $(".how-to-play-modal").click(function() {
            $(".how-to-play-modal").fadeOut();
        })
    </script>

</body>

</html>