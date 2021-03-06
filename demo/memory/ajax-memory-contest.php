<?php
session_start();
include '../../classes/database.class.php';
include '../../classes/memory_contest.class.php';
include '../../classes/users.class.php';

if (isset($_POST['update_user_finish_time_count'])) {

    $session_id = $_SESSION['id'];
    $contest_id = $_POST['contest_id'];
    $finish_time = $_POST['finish_time'];

    $memory = new MemoryContest();

    $memory->setParticipantDetail($contest_id, $session_id, "finish_time", $finish_time);
}


if (isset($_POST['mark_user_has_played_contest'])) {

    $session_id = $_SESSION['id'];
    $contest_id = $_POST['contest_id'];

    $memory = new MemoryContest();

    $memory->setParticipantDetail($contest_id, $session_id, "finish_status", "played");
}
