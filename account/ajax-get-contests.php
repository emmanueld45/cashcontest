<?php

session_start();
include '../classes/database.class.php';
include '../classes/admin.class.php';
include '../classes/typing_contest.class.php';
include '../classes/memory_contest.class.php';
include '../classes/users.class.php';
include '../classes/activities.class.php';


$typing = new TypingContest();
$memory = new memoryContest();
$activity = new Activity();
$user = new User();

$session_id = $_SESSION['id'];

?>


<?php
if (isset($_POST['typing_contest'])) {
    
    /*** CRON JOB START ** */
    // creat new contest
    if ($typing->noActivelyRunningContest("Gold")) {
        $typing->createContest("Gold");
    }
    if ($typing->noActivelyRunningContest("Silver")) {
        $typing->createContest("Silver");
    }
    // if ($typing->noActivelyRunningContest("Diamond")) {
    //     $typing->createContest("Diamond");
    // }
  
    /*** CRON JOB END *** */


    $result = $db->setQuery("SELECT * FROM typing_contest ORDER BY id DESC;");
    while ($row = mysqli_fetch_assoc($result)) {
        $contest_category = $row['contest_category'];
        $contest_id = $row['contest_id'];


        $coin_price = $typing->getContestCoinPrice($row['contest_id']);
        $pot_win = $coin_price * $typing->max_participants;
        $cur_win = $coin_price * $typing->getNumParticipants($row['contest_id']);

        $admin_win = $pot_win * 0.2;
        $pot_win -= $admin_win;

        $admin_win = $cur_win * 0.2;
        $cur_win -= $admin_win;

        $raw_time = $typing->getDetail($contest_id, "end_time") - time();
        $time = $db->format_contest_time($raw_time);
?>
        <div class="contests-box">
            <div class="left">
                <img src="../<?php echo $row['contest_image']; ?>" class="img">

            </div>
            <div class="right">
                <span class="contest-code"><?php echo $row['contest_code']; ?></span>
                <span class="coin-text"><?php echo $coin_price; ?></span><img src="img/coins.png" class="coin-img">
                <span class="pot-win">Pot.win: <span>&#8358</span><?php echo $pot_win; ?></span>
                <span class="cur-win">Cur.win: <span>&#8358</span><?php echo $cur_win ?></span>
                <span class="members">Members: <?php echo $typing->getNumParticipants($contest_id); ?></span>



                <?php

                if ($typing->getDetail($contest_id, "status") == "Ended" or $time['time'] <= 0) {
                    echo " <button class='ended-btn' contestid='$contest_id' coinprice='$coin_price;'>closed <i class='fa fa-lock'></i></button>";
                } else if ($typing->userHavePlayedContest($contest_id, $session_id)) {
                    echo " <button class='played-btn' contestid='$contest_id coinprice='$coin_price;'>played <i class='fa fa-check-circle'></i></button>";
                } else if ($typing->userIsInContest($contest_id, $session_id)) {
                    echo " <a href='typing/game.php?contest_id=$contest_id'><button class='continue-btn' contestid='$contest_id coinprice='$coin_price;'>continue <i class='fa fa-angle-double-right'></i></button></a>";
                } else if ($typing->getNumParticipants($contest_id) >= $typing->max_participants) {
                    echo " <button class='full-btn' contestid='$contest_id' coinprice='$coin_price;'>full <i class='fa fa-users'></i></button>";
                } else  if ($typing->getDetail($contest_id, "status") == "Running") {
                    echo " <button class='join-btn' id='2' onclick='show_join_modal(this)' contestid='$contest_id' coinprice='$coin_price'>join <i class='fa fa-trophy'></i></button>";
                }
                ?>
            </div>
            <div class="bottom">
                <?php
                if ($typing->getDetail($contest_id, "status") != "Ended" and $time['time'] > 0) {
                    // if ($typing->getNumParticipants($contest_id) < $typing->max_participants) {
                    echo "<button class='time'>time left: " . $time['time'] . " " . $time['suffix'] . " <i class='fa fa-clock-o'></i></button>";
                    // }
                } else if ($typing->getDetail($contest_id, "status") == "Ended" and $typing->getDetail($contest_id, "have_results") == "yes") {
                    //if ($typing->getNumParticipants($contest_id) > 1) {
                        echo "<a href='typing/view-results.php?contest_id=$contest_id'><button class='view-result'>view result <i class='fa fa-angle-double-right'></i></button></a>";
                    //}
                }
                ?>

            </div>
        </div>

















<?php
    }
}
?>






























































<?php
if (isset($_POST['memory_contest'])) {

    /** Cron job start  **/
    // create new contests
    if ($memory->noActivelyRunningContest("Gold")) {
        $memory->createContest("Gold");
    }
    if ($memory->noActivelyRunningContest("Silver")) {
        $memory->createContest("Silver");
    }
    // if ($memory->noActivelyRunningContest("Diamond")) {
    //     $memory->createContest("Diamond");
    // }

    
    /** Cron job end ** */

    $result = $db->setQuery("SELECT * FROM memory_contest ORDER BY id DESC;");
    while ($row = mysqli_fetch_assoc($result)) {
        $contest_category = $row['contest_category'];
        $contest_id = $row['contest_id'];


        $coin_price = $memory->getContestCoinPrice($row['contest_id']);
        $pot_win = $coin_price * $memory->max_participants;
        $cur_win = $coin_price * $memory->getNumParticipants($row['contest_id']);

        $admin_win = $pot_win * 0.2;
        $pot_win -= $admin_win;

        $admin_win = $cur_win * 0.2;
        $cur_win -= $admin_win;

        $raw_time = $memory->getDetail($contest_id, "end_time") - time();
        $time = $db->format_contest_time($raw_time);
?>
        <div class="contests-box">
            <div class="left">
                <img src="../<?php echo $row['contest_image']; ?>" class="img">

            </div>
            <div class="right">
                <span class="contest-code"><?php echo $row['contest_code']; ?></span>
                <span class="coin-text"><?php echo $coin_price; ?></span><img src="img/coins.png" class="coin-img">
                <span class="pot-win">Pot.win: <span>&#8358</span><?php echo $pot_win; ?></span>
                <span class="cur-win">Cur.win: <span>&#8358</span><?php echo $cur_win ?></span>
                <span class="members">Members: <?php echo $memory->getNumParticipants($contest_id); ?></span>
                <?php
                if ($memory->getDetail($contest_id, "status") == "Ended" or $time['time'] <= 0) {
                    echo " <button class='ended-btn' contestid='$contest_id coinprice='$coin_price;'>closed <i class='fa fa-lock'></i></button>";
                } else if ($memory->userHavePlayedContest($contest_id, $session_id)) {
                    echo " <button class='played-btn' contestid='$contest_id coinprice='$coin_price;'>played <i class='fa fa-check-circle'></i></button>";
                } else if ($memory->userIsInContest($contest_id, $session_id)) {
                    echo " <a href='memory/game.php?contest_id=$contest_id'><button class='continue-btn' contestid='$contest_id coinprice='$coin_price;'>continue <i class='fa fa-angle-double-right'></i></button></a>";
                } else if ($memory->getNumParticipants($contest_id) >= $memory->max_participants) {
                    echo " <button class='full-btn' contestid='$contest_id coinprice='$coin_price;'>full <i class='fa fa-users'></i></button>";
                } else  if ($memory->getDetail($contest_id, "status") == "Running") {
                    echo " <button class='join-btn' id='2' onclick='show_join_modal(this)' contestid='$contest_id' coinprice='$coin_price'>join <i class='fa fa-trophy'></i></button>";
                }
                ?>
            </div>
            <div class="bottom">
                <?php
                if ($memory->getDetail($contest_id, "status") != "Ended" and $time['time'] > 0) {
                    // if ($typing->getNumParticipants($contest_id) < $typing->max_participants) {
                    echo "<button class='time'>time left: " . $time['time'] . " " . $time['suffix'] . " <i class='fa fa-clock-o'></i></button>";
                    // }
                } else if ($memory->getDetail($contest_id, "status") == "Ended" and $memory->getDetail($contest_id, "have_results") == "yes") {
                  //  if ($memory->getNumParticipants($contest_id) > 1) {
                        echo "<a href='memory/view-results.php?contest_id=$contest_id'><button class='view-result'>view result <i class='fa fa-angle-double-right'></i></button></a>";
                   // }
                }
                ?>
            </div>
        </div>

















<?php
    }
}
?>


<?php


if(isset($_POST['end_contest'])){

            // end memory contests
            $result10 = $db->setQuery("SELECT * FROM memory_contest;");

            while ($row10 = mysqli_fetch_assoc($result10)) {
                   $contest_id = $row10['contest_id'];
           
           
                   $end_time = $memory->getDetail($contest_id, "end_time");
           
                   if ($memory->getDetail($contest_id, "status") != "Ended") {
                       if ($end_time - time() <= 0) {
                          // echo $end_time - time();
                           $memory->setDetail($contest_id, "status", "Ended");
                           $memory->checkResults();
                       }
                   }
               }




     // end typing contests
    $result10 = $db->setQuery("SELECT * FROM typing_contest;");

    while ($row10 = mysqli_fetch_assoc($result10)) {
        $contest_id = $row10['contest_id'];


        $end_time = $typing->getDetail($contest_id, "end_time");
        if ($typing->getDetail($contest_id, "status") != "Ended") {
            if ($end_time - time() <= 0) {
              //  echo "Contest has ended";
                $typing->setDetail($contest_id, "status", "Ended");
                $typing->checkResults();
            }
        }
    }






     // delete memory contests that was not played
     $result = $db->setQuery("SELECT * FROM memory_contest WHERE status='Ended';");
     while ($row = mysqli_fetch_assoc($result)) {
            $contest_id = $row['contest_id'];
            if($memory->getNumParticipants($contest_id) == 0){
                $db->setQuery("DELETE FROM memory_contest WHERE contest_id='$contest_id';");
            }
        }


    // delete typing contests that was not played
     $result = $db->setQuery("SELECT * FROM typing_contest WHERE status='Ended';");
     while ($row = mysqli_fetch_assoc($result)) {
            $contest_id = $row['contest_id'];
            if($typing->getNumParticipants($contest_id) == 0){
                $db->setQuery("DELETE FROM typing_contest WHERE contest_id='$contest_id';");
            }
        }



}

?>