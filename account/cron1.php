<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>CashContest | Cron1</title>
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




</head>

<body>



    <div class="display">Not Running</div>


    <!--====== Javascripts & Jquery ======-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/main.js"></script>


    <script>
        setInterval(() => {
            var reduce_typing_contest_end_time = "yes";
            var create_typing_contest = "yes";
            var end_typing_contest = "yes";






            var reduce_memory_contest_end_time = "yes";
            var create_memory_contest = "yes";
            var end_memory_contest = "yes";


            var check_results = "yes";

            $.ajax({

                url: "cron2.php",
                method: "POST",
                async: false,
                data: {
                    "reduce_typing_contest_end_time": reduce_typing_contest_end_time,
                    "create_typing_contest": create_typing_contest,
                    "end_typing_contest": end_typing_contest,

                    "reduce_memory_contest_end_time": reduce_memory_contest_end_time,
                    "create_memory_contest": create_memory_contest,
                    "end_memory_contest": end_memory_contest,

                    "check_results": check_results
                },
                success: function(data) {
                    $(".display").html("Cron Running...");
                }

            });

        }, 1000);
    </script>

</body>

</html>