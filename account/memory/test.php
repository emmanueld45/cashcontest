<?php

// include '../../classes/database.class.php';
// include '../../classes/typing_contest.class.php';
// include '../../classes/users.class.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .centered-div {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }


        .mybtn {
            width: 300px;
            height: 300px;
            font-weight: bold;
            font-size: 50px;
            background-color: lightblue;
            transition: 0.5s ease-in-out;
            transform: rotateY(180deg);
            transform-style: preserve-3d;
            box-shadow: 10px 10px 10px black;
        }

        /* .mybtn:hover {
            transform: rotateY(0deg);
            background-color: red;
        } */
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memory</title>


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




    <?php

    $users = array("Emmy" => 2, "John" => 4, "Oge" => 5, "James" => 11, "Paul" => 2);

    $scores = array(4, 6, 2, 22, 11);
    sort($scores);

    $tile = "no";
    $tile_count = 0;

    //echo "Score: " . $scores[0];
    echo "<br>";
    foreach ($users as $user => $score) {
        if ($score  == $scores[0]) {
            $tile_count++;
            echo "<div style='padding;10px;background-color:mediumseagreen;color:white;width:400px;'> Score: " . $score . "; User: " . $user . "; Status: Winner</div> <br>";
        } else {
            echo "Score: " . $score . "; User: " . $user . "; Status: Fail <br>";
        }
    }

    if ($tile_count > 1) {
        echo "<br><br> There is a tile";
    }

    ?>
    <!--====== Javascripts & Jquery ======-->
    <script src="../../js/jquery-3.2.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.slicknav.min.js"></script>
    <script src="../../js/owl.carousel.min.js"></script>
    <script src="../../js/mixitup.min.js"></script>
    <script src="../../js/main.js"></script>
    <script src="../../js/mymain.js"></script>
    <script src="js/format.time.js"></script>


    <script>

    </script>

</body>

</html>