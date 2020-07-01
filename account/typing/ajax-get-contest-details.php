<?php

include '../../classes/database.class.php';
include '../../classes/typing_contest.class.php';
include '../../classes/users.class.php';



if (isset($_POST['get_details'])) {
    $typing_contest = new Typing_contest();
    $contest_array = [];
    $result = $typing_contest->getAllContests();
    while ($row = mysqli_fetch_assoc($result)) {

        $contest_id = $row['uniqueid'];
        $status = $typing_contest->getContestDetail($contest_id, "status");
        $contest_time = $typing_contest->getContestDetail($contest_id, "contest_time");
        $participants = $typing_contest->getParticipants($contest_id);
        $num_participants = mysqli_num_rows($participants);
        $full = "no";
        if ($num_participants == "10") {
            $full = "yes";
        }

        $contest_array[count($contest_array)] = array('contest_id' => $contest_id, 'status' => $status, 'participants' => $num_participants, 'contest_time' => $contest_time, 'full' => $full);
    }

    //$arr = array($contest_array);
    echo json_encode($contest_array);
}
