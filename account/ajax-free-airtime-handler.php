<?php

session_start();
include '../classes/database.class.php';
include '../classes/typing_contest.class.php';
include '../classes/memory_contest.class.php';
include '../classes/users.class.php';
include '../classes/activities.class.php';
include '../classes/admin.class.php';


$typing = new TypingContest();
$memory = new memoryContest();
$activity = new Activity();
$admin = new Admin();
$user = new User();

$session_id = $_SESSION['id'];
?>

<?php

if (isset($_POST['free_airtime_withdrawal'])) {


    $amount = $user->getUserDetail($session_id, "airtime_balance");
    $phone = $_POST['free_airtime_withdrawal_phone'];

    $result1 = $admin->createFreeAirtimeWithdrawal($session_id, $amount, $phone);
    $result2 = $user->updateUserDetail($session_id, "airtime_balance", $amount, "-");
    $admin->addTransaction($session_id, "withdrawal", "Free Airtime", $amount);

    if ($result1 and $result2) {
        $data = array("status" => "success");
        echo json_encode($data);
    } else {
        $data = array("status" => "failed");
        echo json_encode($data);
    }

    // $data = array("status" => "success");
    // echo json_encode($data);



}

?>


