<?php
include '../classes/database.class.php';
include '../classes/memory_contest.class.php';
include '../classes/users.class.php';
include '../classes/activities.class.php';

/* if ($db->conn) {
    echo "database is connected";
} else {
    echo "not connected";
} */


/*
$uniqueid = uniqid();
$name = "Emmanuel Danjumbo";
$image = "userimages/default-image.jpeg";
$email = "emmy@gmail.com";
$phone = "08162383712";
$password = "1234";
$status = "active";
$time = time();
$date = date("d-m-y");
$new = "yes";
$hashed = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO users (uniqueid, name, image, email, phone, password, status, time, date, new) VALUES ('$uniqueid', '$name', '$image', '$email', '$phone', '$hashed', '$status', '$time', '$date', '$new');";
$result = mysqli_query($db->conn, $sql);
*/


$memory = new MemoryContest();
$user = new User();
$activity = new Activity();


//$memory->createContest('Gold');
//echo $memory->getDetail("5f107419a1327", "contest_category");
//$memory->setDetail("5f107419a1327", "status", "Running");
//echo $memory->addParticipant("5f10a6313c9e1", "5ef9e0bba9cbe");
//echo $memory->getContestCoinPrice("5f107419a1327");


/*** AUTOMATICALLY END A CONTEST IS THE TIME HAS RUN OUT *** */
// $start_time = $memory->getDetail("5f10900b8334b", "start_time");
// $end_time = $memory->getDetail("5f10900b8334b", "end_time");
// $current_time = time();
// $diff = $current_time - $start_time;
// if ($memory->getDetail("5f10900b8334b", "status") != "Ended") {
//     if ($diff >= $end_time) {
//         echo "Contest has ended";
//         $memory->setDetail("5f10900b8334b", "status", "Ended");
//         $contest_category = $memory->getDetail("5f10900b8334b", "contest_category");
//         $memory->createContest($contest_category);
//     } else {
//         echo 'Contest is Running <br>';
//         echo $diff;
//     }
// }


/*** AUTOMATICALLY CREATE A CONTEST OF LIKE CATEGORY IF THE OTHERS ARE ENDED OR FULL *** */
// if ($memory->noActivelyRunningContest("Gold")) {
//     echo "All contests are either Ended or Full, you are free to create a new contest";
//     $memory->createContest("Gold");
// } else {
//     echo "There are some active contests";
// }


/*** ADD A PARTICIPANT TO A CONTEST *** */
// if ($memory->getDetail("5f107419a1327", "status") != "Ended") {

//     if ($memory->getNumParticipants("5f107419a1327") < 1) {
//         $contest_coin_price = $memory->getContestCoinPrice("5f107419a1327");

//         if ($user->getUserDetail("5ef9e0bba9cbe", "coins") >= $contest_coin_price) {

//             if (!$memory->userIsInContest("5f107419a1327", "5ef9e0bba9cbe")) {
//                 $memory->addParticipant("5f107419a1327", "5ef9e0bba9cbe");
//                 $user->updateUserDetail("5ef9e0bba9cbe", "coins", $contest_coin_price, "-");
//                 echo "Participant added";
//             } else {
//                 echo "Sorry you are already in this contest";
//             }
//         } else {
//             echo "Unsufficient fund";
//         }
//     } else {
//         echo "Contest is full";
//     }
// } else {
//     echo "Contest has Ended";
// }




//echo $activity->createAtivity("memory_contest", "5f107419a1327");
//$activity->setDetail("1", "status", "0");
//echo $activity->getDetail("1", "time");
