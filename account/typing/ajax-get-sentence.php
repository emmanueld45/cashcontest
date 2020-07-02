<?php
session_start();

include '../../classes/database.class.php';
include '../../classes/typing_contest.class.php';
include '../../classes/users.class.php';



if (isset($_POST['get_sentence'])) {
    $contest_id = $_POST['contest_id'];
    $_SESSION['contest_sentence_count_' . $contest_id] =  $_SESSION['contest_sentence_count_' . $contest_id] + 1;

    $typing_contest = new Typing_contest();

    $sentence = $typing_contest->getSentence();

    echo $sentence;
}
