<?php
// session_start();
// include '../../classes/database.class.php';
// include '../../classes/memory_contest.class.php';
// include '../../classes/users.class.php';

// if (isset($_POST['create_contest'])) {

//     $memory = new MemoryContest();

//     if ($memory->noActivelyRunningContest("Gold")) {
//         $memory->createContest("Gold");
//     }
//     if ($memory->noActivelyRunningContest("Silver")) {
//         $memory->createContest("Silver");
//     }
//     if ($memory->noActivelyRunningContest("Diamond")) {
//         $memory->createContest("Diamon");
//     }
// }


// if (isset($_POST['end_contest'])) {

//     $memory = new MemoryContest();

//     $result = $db->setQuery("SELECT * FROM memory_contest;");

//     while ($row = mysqli_fetch_assoc($result)) {
//         $contest_id = $row['contest_id'];

//         $start_time = $memory->getDetail($contest_id, "start_time");
//         $end_time = $memory->getDetail($contest_id, "end_time");
//         $current_time = time();
//         $diff = $current_time - $start_time;
//         if ($memory->getDetail($contest_id, "status") != "Ended") {
//             if ($diff >= $end_time) {
//                 echo "Contest has ended";
//                 $memory->setDetail($contest_id, "status", "Ended");
//                 //  $contest_category = $memory->getDetail($contest_id, "contest_category");
//                 //  $memory->createContest($contest_category);
//             } else {
//                 echo 'Contest is Running <br>';
//                 echo $diff;
//             }
//         }
//     }
// }
