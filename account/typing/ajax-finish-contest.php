<?php
session_start();

include '../../classes/database.class.php';
include '../../classes/typing_contest.class.php';
include '../../classes/users.class.php';



if (isset($_POST['finish_contest'])) {
    $contest_id = $_POST['contest_id'];


    $typing_contest = new Typing_contest();

    // check if contest has already been ended by someone else
    if ($typing_contest->getContestDetail($contest_id, "status") != "Ended") {
        // return a success response
        echo "successfully Ended";
        // end contest
        $typing_contest->setContestDetail($contest_id, "status", "Ended");

        // give  user value below here

    } else {
        // return a failure response
        echo "Already ended";
    }
}
