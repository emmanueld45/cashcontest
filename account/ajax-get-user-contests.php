<?php

session_start();
include '../classes/database.class.php';
include '../classes/typing_contest.class.php';
include '../classes/memory_contest.class.php';
include '../classes/users.class.php';
include '../classes/activities.class.php';


$typing = new TypingContest();
$memory = new memoryContest();
$activity = new Activity();
$user = new User();


$session_id = $_SESSION['id']
?>


<?php
if (isset($_POST['user_typing_contest'])) {
    $result = $db->setQuery("SELECT * FROM typing_contest ORDER BY id DESC;");
    $x = 0;
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

        if ($typing->userIsInContest($contest_id, $session_id)) {
            $x++;

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
                        echo " <button class='join-btn' id='2' onclick='show_join_modal(this)' contestid='$contest_id' coinprice='$coin_price'>join <i class='fa fa-diamond'></i></button>";
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
                        if ($typing->getNumParticipants($contest_id) > 1) {
                            echo "<a href='typing/view-results.php?contest_id=$contest_id'><button class='view-result'>view result <i class='fa fa-angle-double-right'></i></button></a>";
                        }
                    }
                    ?>

                </div>
            </div>

















<?php
        }
    }

    if ($x == 0) {
        echo "<div class='alert alert-info'>
You have not played any <span class='alert-link'>Typing Contest</span> yet!
<br>
<a href='typing-contest.php' class='alert-link'><u>click here to play?</u></a>
</div>";
    }
}
?>






















<?php
if (isset($_POST['user_memory_contest'])) {
    $result = $db->setQuery("SELECT * FROM memory_contest ORDER BY id DESC;");
    $x = 0;
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

        if ($memory->userIsInContest($contest_id, $session_id)) {
            $x++;
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
                    if ($memory->getDetail($contest_id, "status") == "Ended" or $time['time'] <= 0) {
                        echo " <button class='ended-btn' contestid='$contest_id coinprice='$coin_price;'>closed <i class='fa fa-lock'></i></button>";
                    } else if ($memory->userHavePlayedContest($contest_id, $session_id)) {
                        echo " <button class='played-btn' contestid='$contest_id coinprice='$coin_price;'>played <i class='fa fa-check-circle'></i></button>";
                    } else if ($memory->userIsInContest($contest_id, $session_id)) {
                        echo " <a href='memory/game.php?contest_id=$contest_id'><button class='continue-btn' contestid='$contest_id coinprice='$coin_price;'>continue <i class='fa fa-angle-double-right'></i></button></a>";
                    } else if ($memory->getNumParticipants($contest_id) >= $memory->max_participants) {
                        echo " <button class='full-btn' contestid='$contest_id coinprice='$coin_price;'>full <i class='fa fa-users'></i></button>";
                    } else  if ($memory->getDetail($contest_id, "status") == "Running") {
                        echo " <button class='join-btn' id='2' onclick='show_join_modal(this)' contestid='$contest_id' coinprice='$coin_price'>join <i class='fa fa-diamond'></i></button>";
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
                        if ($memory->getNumParticipants($contest_id) > 1) {
                            echo "<a href='memory/view-results.php?contest_id=$contest_id'><button class='view-result'>view result <i class='fa fa-angle-double-right'></i></button></a>";
                        }
                    }
                    ?>
                </div>
            </div>




















<?php

        }
    }
    if ($x == 0) {
        echo "<div class='alert alert-info'>
You have not played any <span class='alert-link'>Memory Contest</span> yet!
<br>
<a href='memory-contest.php' class='alert-link'><u>click here to play?</u></a>
</div>";
    }
}
?>