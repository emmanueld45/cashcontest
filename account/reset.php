<?php
session_start();
include '../classes/database.class.php';
include '../classes/users.class.php';
include '../classes/memory_contest.class.php';
include '../classes/typing_contest.class.php';
include '../classes/activities.class.php';
include '../classes/admin.class.php';

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
$admin = new Admin();
$typing = new TypingContest();

//$memory->createContest('Gold');
//echo $memory->getDetail("5f107419a1327", "contest_category");
//$memory->setDetail("5f107419a1327", "status", "Running");
//echo $memory->addParticipant("5f107419a1327", "5f13130e4619e");
//echo $memory->getContestCoinPrice("5f107419a1327");
//echo $memory->getParticipantDetail("5f107419a1327", "5ef9e0bba9cbe", "amount_won");
//echo $memory->setParticipantDetail("5f107419a1327", "5ef9e0bba9cbe", "finish_status", "pending");
//echo $memory->addChallengeParticipant("5f11b20b7a1e7", "5ef9e0bba9cbe");
//echo $memory->getChallengeParticipantDetail("5f11b20b7a1e7", "5ef9e0bba9cbe", "finish_status");
//echo $memory->setChallengeParticipantDetail("5f11b20b7a1e7", "5ef9e0bba9cbe", "finish_status", "pending");








/*** AUTOMATICALLY END A CONTEST IF THE TIME HAS RUN OUT *** */
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




//echo $activity->createAtivity("contest", "memory_contest", "5f107419a1327");
//$activity->setDetail("1", "status", "0");
//echo $activity->getDetail("1", "time");




//echo $admin->getAdminDetail("free_airtime_status");
//$admin->setAdminDetail("free_airtime_status", "off");
//$admin->updateAdminDetail("main_balance", "100", "-");

//$memory->createChallenge("5ef9e0bba9cbe", "500", "5", "public");
//echo $memory->getChallengeDetail("5f11b20b7a1e7", "coin_price");
//$memory->setChallengeDetail("5f11b20b7a1e7", "coin_price", "300");
//$memory->updateChallengeDetail("5f11b20b7a1e7", "coin_price", "10", "-");

//$memory->updateDetail("5f10900b8334b", "end_time", "30", "-");


// $_SESSION['id'] = "5f13133e990df";
// echo $_SESSION['id'];

// $user->setUserDetail("5ef9e0bba9cbe", "withdrawable_balance", "0");
// $admin->setAdminDetail("main_balance", "0");
// $memory->setDetail("5f107419a1327", "have_results", "no");
// $memory->setParticipantDetail("5f107419a1327", "5ef9e0bba9cbe", "amount_won", "0");
// $memory->setParticipantDetail("5f107419a1327", "5ef9e0bba9cbe", "won", "no");

//$memory->checkResults();


//$user->createUser("Precious", "Paul", "precious@gmail.com", "070267272627", "1234");

//$activity->addToWinnerHistory('5ef9e0bba9cbe', '400', 'memory_contest');
//$user->setUserDetail("5efa668ebd5c6", "coins", "400");

//$memory->checkChallengeResults();

//$activity->sendChallengeRequest("memory_challenge", "5f11b20b7a1e7", "5efa668ebd5c6", "5ef9e0bba9cbe");




//$typing->addSentences("5f158ed502acb");
//$typing->addParticipant("5ef9ec4d92cec", "5ef9e0bba9cbe");
//echo $typing->getParticipantDetail("5ef9ec4d92cec", "5ef9e0bba9cbe", "finish_status");
//$typing->setParticipantDetail("5ef9ec4d92cec", "5ef9e0bba9cbe", "finish_status", "pending");
//$typing->createContest("Gold");

//$typing->checkResults();

// if ($typing->noActivelyRunningContest("Silver")) {
//     $typing->createContest("Silver");
// }

//$typing->createChallenge("5ef9e0bba9cbe", "150", "2", "5", "public");
//$typing->addChallengeParticipant("5f16c1863940e", "5ef9e0bba9cbe");
//$typing->checkChallengeResults();

//$memory->createContest("Gold");
//$typing->createChallenge("5ef9e0bba9cbe", "200", "2", "5", "public");
//$memory->checkChallengeResults();

//$typing->createContest("Gold");
//$typing->checkResults();
//$typing->checkChallengeResults();


//echo $memory->getParticipantDetail("5f1a05a20cbe5", "5ef9e0bba9cbe", "finish_time");
//$memory->checkResults();

//echo $memory->getDetail("5f3cf8f5829b8", "status");

//$admin->createCoupon(300);

// if ($admin->couponIsValid("2Z4EPK721W")) {
//     echo "yes";
// } else {
//     echo "no";
// }

//$typing->checkResults();

//$admin->createCashWithdrawal("sdgjhDBJhd", "500", "Emmanuel", "22116617839", "savings", "UBA");
//$admin->createAirtimeWithdrawal("duhfakjsdhkaj", "200", "MTN", "08801268919");
// $time = $db->format_contest_time(120);
// echo $time['time'] . " " . $time['time_frame'] . " " . $time['suffix'];


//$typing->checkResults();
//$admin->createFreeAirtimeWithdrawal("dskjdnkjsd", "150", "08012781278");
//$admin->addTransaction("shdgsdkj", "deposit", "Online", "500");

//echo $db->format_time(1601705182);
//$admin->sendLiveFeedNotification();
//$admin-> markLiveFeedNotificationsAsSeen("5efa668ebd5c6");
//echo $admin->getNumUnseenLiveFeedNotifications("5ef9e0bba9cbe");
