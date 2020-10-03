<?php
session_start();
include 'classes/database.class.php';
include 'classes/users.class.php';
include 'classes/typing_contest.class.php';

/*
$user = new User();
$result = $user->createUser('Emmanuel', 'emmy@gmail.com', '08162383712', '1234');
if ($result) {
    echo "User created";
} else {
    echo "Error";
}
*/

//echo $_SESSION['contest_sentence_count_5efcf620dd870'];

//$typing_contest = new Typing_contest();
/*$result = $typing_contest->createContest("Silver");
if ($result) {
    echo "Contest created";
} else {
    echo "Error";
} */
/*
$typing_contest->contest_id = "5ef9ec4d92cec";
$detail = $typing_contest->getContestDetail("contest_id");
echo $detail;
*/

//$typing_contest->setContestDetail("5ef9ee103146f", "status", "Ended");

/*
$result = $typing_contest->getSingleContest("5ef9ee103146f");
$row = mysqli_fetch_assoc($result);
$image = $row['contest_image'];
echo "<img src='$image'>";
*/

/*
if ($typing_contest->contestHasEnded("5ef9ee103146f")) {
    echo "Contest has ended";
} else {
    echo "Contest is still running";
}
*/

//$result = $typing_contest->setContestDetail("5ef9ee103146f", "status", "Waiting");
//$typing_contest->reduceContestTime("5ef9ee103146f");
//$typing_contest->deleteContest("5ef9edf34213e");
/*
$result = $typing_contest->getAllContests();
while ($row = mysqli_fetch_assoc($result)) {
    $contest_id = $row['uniqueid'];
    $typing_contest->reduceContestTime($contest_id);
}
*/
//$typing_contest->AddSentence("what would you do with 10million naira today");
//echo $typing_contest->getSentence();

//$user = new User();
//echo $user->getUserDetail("5ef9e0bba9cbe", "name");
//$user->setUserDetail("5ef9e0bba9cbe", "name", "Emmanuel Danjumbo");
//echo $user->getUserDetail("5ef9e0bba9cbe", "name");
//$user->removeUserWithdrawableBalance("5ef9e0bba9cbe", "1000");
//$typing_contest->addParticipant("5efb042366d4e", "5ef9e0bba9cb");
//$user->createUser("Mary Jones", "mary@gmail.com", "09012781267", "1234");

//$typing_contest->setContestDetail("5efb042366d4e", "status", "Ended");

/*
$contest_array = [];
$result = $typing_contest->getAllContests();
while ($row = mysqli_fetch_assoc($result)) {

    $contest_id = $row['uniqueid'];
    $status = $typing_contest->getContestDetail($contest_id, "status");
    $contest_time = $typing_contest->getContestDetail($contest_id, "contest_time");
    $participants = $typing_contest->getParticipants($contest_id);
    $num_participants = mysqli_num_rows($participants);


    $contest_array[count($contest_array)] = array('contest_id' => $contest_id, 'status' => $status, 'participants' => $num_participants, 'contest_time' => $contest_time);
}

//$arr = array($contest_array);
echo json_encode($contest_array);
*/


/*
$result = $typing_contest->getAllContests();

while ($row = mysqli_fetch_assoc($result)) {
    $contest_id = $row['uniqueid'];
    $typing_contest->reduceContestTime($contest_id);
}
*/
echo time() + 30;