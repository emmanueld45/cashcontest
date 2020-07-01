<?php

include '../../classes/database.class.php';
include '../../classes/typing_contest.class.php';
include '../../classes/users.class.php';


if (isset($_POST['reduce_contest_time'])) {

    $typing_contest = new Typing_contest();

    $result = $typing_contest->getAllContests();

    while ($row = mysqli_fetch_assoc($result)) {
        $contest_id = $row['uniqueid'];
        $typing_contest->reduceContestTime($contest_id);
    }
}
