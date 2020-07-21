<?php
session_start();
include '../../classes/database.class.php';
include '../../classes/typing_contest.class.php';
include '../../classes/users.class.php';


if (isset($_POST['get_sentence'])) {

    $sentence_array = [];
    $challenge_id = $_POST['challenge_id'];

    $result = $db->setQuery("SELECT * FROM typing_challenge_sentences WHERE challenge_id='$challenge_id';");

    while ($row = mysqli_fetch_assoc($result)) {
        $sentence_array[count($sentence_array)] = $row['sentence'];
    }


    $a = json_encode($sentence_array);
    echo $a;
}


if (isset($_POST['update_user_finish_time_count'])) {

    $session_id = $_SESSION['id'];
    $challenge_id = $_POST['challenge_id'];
    $finish_time = $_POST['finish_time'];

    $typing = new TypingContest();

    $typing->setChallengeParticipantDetail($challenge_id, $session_id, "finish_time", $finish_time);
}


if (isset($_POST['mark_user_has_played_challenge'])) {

    $session_id = $_SESSION['id'];
    $challenge_id = $_POST['challenge_id'];

    $typing = new TypingContest();

    $typing->setChallengeParticipantDetail($challenge_id, $session_id, "finish_status", "played");
}
