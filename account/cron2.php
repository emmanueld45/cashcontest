<?php

session_start();
include '../classes/database.class.php';
include '../classes/typing_contest.class.php';
include '../classes/memory_contest.class.php';
include '../classes/users.class.php';
include '../classes/activities.class.php';


$typing = new TypingContest();
$memory = new MemoryContest();
$activity = new Activity();
$user = new User();







// if (isset($_POST['reduce_memory_contest_end_time'])) {
//     $memory->reduceEndTime();
//     echo "reduced";
// }

if (isset($_POST['create_memory_contest'])) {


    if ($memory->noActivelyRunningContest("Gold")) {
        $memory->createContest("Gold");
    }
    if ($memory->noActivelyRunningContest("Silver")) {
        $memory->createContest("Silver");
    }
    if ($memory->noActivelyRunningContest("Diamond")) {
        $memory->createContest("Diamond");
    }
}


if (isset($_POST['end_memory_contest'])) {

    $result = $db->setQuery("SELECT * FROM memory_contest;");

    while ($row = mysqli_fetch_assoc($result)) {
        $contest_id = $row['contest_id'];


        $end_time = $memory->getDetail($contest_id, "end_time");

        if ($memory->getDetail($contest_id, "status") != "Ended") {
            if ($end_time - time() <= 0) {
                echo $end_time - time();
                $memory->setDetail($contest_id, "status", "Ended");
                $memory->checkResults();
            }
        }
    }
}






















































// if (isset($_POST['reduce_typing_contest_end_time'])) {
//     $typing->reduceEndTime();
//     echo "reduced";
// }


if (isset($_POST['create_typing_contest'])) {

    if ($typing->noActivelyRunningContest("Gold")) {
        $typing->createContest("Gold");
    }
    if ($typing->noActivelyRunningContest("Silver")) {
        $typing->createContest("Silver");
    }
    if ($typing->noActivelyRunningContest("Diamond")) {
        $typing->createContest("Diamond");
    }
}


if (isset($_POST['end_typing_contest'])) {


    $result = $db->setQuery("SELECT * FROM typing_contest;");

    while ($row = mysqli_fetch_assoc($result)) {
        $contest_id = $row['contest_id'];


        $end_time = $typing->getDetail($contest_id, "end_time");
        if ($typing->getDetail($contest_id, "status") != "Ended") {
            if ($end_time - time() <= 0) {
                echo "Contest has ended";
                $typing->setDetail($contest_id, "status", "Ended");
            }
        }
    }
}



if (isset($_POST['check_results'])) {
    $typing->checkResults();
}
