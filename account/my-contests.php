<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>CashContest | My contest</title>
    <meta charset="UTF-8">
    <meta name="description" content="Contest">
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
        /********** start of  smaller screen*********************/
        @media only screen and (max-width: 690px) {

            .header-container {
                width: 100%;
                height: 50px;
                background-color: #08192d;
                color: white;
                text-align: center;
                font-size: 18px;
                line-height: 40px;
            }

            .back-icon {
                width: 30px;
                height: 30px;
                border-radius: 30px;
                background-color: rgba(0, 0, 0, 0.7);
                line-height: 30px;
                opacity: 0.7;
                position: relative;
                left: 5px;
                top: 5px;
            }


            .switching-container {
                width: 80%;
                margin: auto;
                display: flex;
                flex-flow: row nowrap;
                justify-content: center;
                margin-top: 10px;
            }

            .switching-container .typing-btn {
                width: 50%;
                border: none;
                background-color: white;
                border-bottom: 1px solid crimson;
                color: crimson;
            }

            .switching-container .memory-btn {
                width: 50%;
                border: none;
                background-color: white;
                color: grey;
            }



            .contest-container {
                width: 100%;
                padding: 10px;
                background-color: ;
            }

            .contest-container .contest-box {
                width: 100%;
                display: flex;
                flex-flow: row wrap;
                border-bottom: 1px solid lightgrey;
                margin-bottom: 20px;
                position: relative;

            }

            .contest-container .contest-box .left {
                width: 30%;
                background-color: ;
                height: 100px;
                padding: 10px;
            }

            .contest-container .contest-box .left .img {
                width: 80px;
                height: 80px;
            }

            .contest-container .contest-box .right {
                width: 70%;
                background-color: ;
                height: 100px;
                padding: 10px;
            }

            .contest-container .contest-box .right .contest-code {
                font-weight: bold;
                font-size: 19px;
            }

            .contest-container .contest-box .right .cur-win {
                color: grey;
                display: block;
                font-size: 13px;
            }

            .contest-container .contest-box .right .pot-win {
                color: grey;
                display: block;
                font-size: 13px;
            }

            .contest-container .contest-box .right .enter-btn {
                position: absolute;
                right: 10px;
                top: 30%;
                background-color: mediumseagreen;
                color: white;
                border: none;
                border-radius: 50px;
                padding: 5px;
            }

            .contest-container .contest-box .right .closed-btn {
                position: absolute;
                right: 10px;
                top: 30%;
                background-color: #eee;
                color: grey;
                border: 1px solid grey;
                border-radius: 50px;
                padding: 5px;
            }

            .contest-container .contest-box .bottom {
                width: 100%;
                height: 40px;
            }

            .contest-container .contest-box .bottom .time {
                float: right;
                color: grey;
                border: none;
                background-color: white;
                font-size: 13px;

            }

            .contest-container .contest-box .bottom .view-results {
                color: mediumseagreen;
                float: right;
                font-size: 13px;
            }

            .contest-container .contest-box .bottom .participants {
                float: right;
                color: grey;
                border: none;
                background-color: white;
                font-size: 13px;
            }

        }

        /******************* end of smaller screen ****************** */
        /***************************************** start of bigger screen********************************************/
        @media only screen and (min-width: 690px) {

            .header-container {
                width: 100%;
                height: 50px;
                background-color: #08192d;
                color: white;
                text-align: center;
                font-size: 18px;
                line-height: 40px;
            }

            .back-icon {
                width: 30px;
                height: 30px;
                border-radius: 30px;
                background-color: rgba(0, 0, 0, 0.7);
                line-height: 30px;
                opacity: 0.7;
                position: relative;
                left: 5px;
                top: 5px;
            }


            .switching-container {
                width: 80%;
                margin: auto;
                display: flex;
                flex-flow: row nowrap;
                justify-content: center;
                margin-top: 10px;
            }

            .switching-container .typing-btn {
                width: 50%;
                border: none;
                background-color: white;
                border-bottom: 1px solid crimson;
                color: crimson;
            }

            .switching-container .memory-btn {
                width: 50%;
                border: none;
                background-color: white;
                color: grey;
            }



            .contest-container {
                width: 100%;
                padding: 10px;
                background-color: ;
            }

            .contest-container .contest-box {
                width: 100%;
                display: flex;
                flex-flow: row wrap;
                border-bottom: 1px solid lightgrey;
                margin-bottom: 20px;
                position: relative;

            }

            .contest-container .contest-box .left {
                width: 30%;
                background-color: ;
                height: 100px;
                padding: 10px;
            }

            .contest-container .contest-box .left .img {
                width: 80px;
                height: 80px;
            }

            .contest-container .contest-box .right {
                width: 70%;
                background-color: ;
                height: 100px;
                padding: 10px;
            }

            .contest-container .contest-box .right .contest-code {
                font-weight: bold;
                font-size: 19px;
            }

            .contest-container .contest-box .right .cur-win {
                color: grey;
                display: block;
                font-size: 13px;
            }

            .contest-container .contest-box .right .pot-win {
                color: grey;
                display: block;
                font-size: 13px;
            }

            .contest-container .contest-box .right .enter-btn {
                position: absolute;
                right: 10px;
                top: 30%;
                background-color: mediumseagreen;
                color: white;
                border: none;
                border-radius: 50px;
                padding: 5px;
            }

            .contest-container .contest-box .right .closed-btn {
                position: absolute;
                right: 10px;
                top: 30%;
                background-color: #eee;
                color: grey;
                border: 1px solid grey;
                border-radius: 50px;
                padding: 5px;
            }

            .contest-container .contest-box .bottom {
                width: 100%;
                height: 40px;
            }

            .contest-container .contest-box .bottom .time {
                float: right;
                color: grey;
                border: none;
                background-color: white;
                font-size: 13px;

            }

            .contest-container .contest-box .bottom .view-results {
                color: mediumseagreen;
                float: right;
                font-size: 13px;
            }

            .contest-container .contest-box .bottom .participants {
                float: right;
                color: grey;
                border: none;
                background-color: white;
                font-size: 13px;
            }
        }

        /******************* end of biiger screen *************** */
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


            <!--=== header container start ==--->
            <div class="header-container sticky-top">
                <i class="fa fa-arrow-left fl back-icon" onclick="go_back()"></i>
                My Contests
            </div>
            <!--=== header container start ==--->


            <!--== switching container start ===-->
            <div class="switching-container">
                <button class="typing-btn">Typing</button>
                <button class="memory-btn">Memory</button>
            </div>
            <!--== switching container start ===-->


            <!--=== typing contest container start ===--->
            <div class="contests-container typing-container">




            </div>
            <!--=== typing contest container end ===--->

            <!--=== memory contest container start ===--->
            <div class="contests-container memory-container" style="display:none">




            </div>
            <!--=== memory contest container end ===--->

        </div>
        <!-- main container middle end -->






        <!-- main container right start -->
        <div class="main-container-right">





        </div>
        <!--main container right end -->

    </div>
    <!-- main container end -->


















    <!-- Footer section -->

    <!-- Footer section end -->

    <!--====== Javascripts & Jquery ======-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/main.js"></script>



    <script>
        setInterval(() => {
            var user_memory_contest = "yes";
            var user_typing_contest = "yes";
            $.ajax({

                url: "ajax-get-user-contests.php",
                method: "POST",
                async: false,
                data: {
                    "user_typing_contest": user_typing_contest,
                },
                success: function(data) {
                    $(".typing-container").html(data);
                }

            });




            $.ajax({

                url: "ajax-get-user-contests.php",
                method: "POST",
                async: false,
                data: {
                    "user_memory_contest": user_memory_contest,
                },
                success: function(data) {
                    $(".memory-container").html(data);
                }

            });

        }, 1000);


        $(".memory-btn").click(function() {
            $(".memory-btn").css({
                "color": "crimson",
                "border-bottom": "1px solid crimson"
            })

            $(".typing-btn").css({
                "color": "grey",
                "border-bottom": "none"
            })

            $(".typing-container").slideUp();
            $(".memory-container").slideDown();
        })




        $(".typing-btn").click(function() {
            $(".typing-btn").css({
                "color": "crimson",
                "border-bottom": "1px solid crimson"
            })

            $(".memory-btn").css({
                "color": "grey",
                "border-bottom": "none"
            })

            $(".memory-container").slideUp();
            $(".typing-container").slideDown();
        })
    </script>

</body>

</html>