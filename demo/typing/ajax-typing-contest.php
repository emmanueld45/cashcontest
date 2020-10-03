<?php
session_start();
include '../../classes/database.class.php';
include '../../classes/typing_contest.class.php';
include '../../classes/users.class.php';


if (isset($_POST['get_sentence'])) {

    // $sentence_array = [];
   // $contest_id = $_POST['contest_id'];

    // $result = $db->setQuery("SELECT * FROM typing_contest_sentences WHERE contest_id='$contest_id';");

    // while ($row = mysqli_fetch_assoc($result)) {
    //     $sentence_array[count($sentence_array)] = $row['sentence'];
    // }

    $sentence_array = [];
     $x = 0;
    $sentences = array(
        "How to make money on cash contest",
        "Nigeria is a very lawless country",
        "ordinary spelling is a problem in this country",
        "Typing contest is a wonder full game"
        );

        while($x < 5){

            $rand = RAND(0, count($sentences)-1);
            $sentence_array[count($sentence_array)] = $sentences[$rand];

            $x++;
        }
    $a = json_encode($sentence_array);
    echo $a;
}


// if (isset($_POST['update_user_finish_time_count'])) {

//     $session_id = $_SESSION['id'];
//     $contest_id = $_POST['contest_id'];
//     $finish_time = $_POST['finish_time'];

//     $typing = new TypingContest();

//     $typing->setParticipantDetail($contest_id, $session_id, "finish_time", $finish_time);
// }


// if (isset($_POST['mark_user_has_played_contest'])) {

//     $session_id = $_SESSION['id'];
//     $contest_id = $_POST['contest_id'];

//     $typing = new TypingContest();

//     $typing->setParticipantDetail($contest_id, $session_id, "finish_status", "played");
// }
