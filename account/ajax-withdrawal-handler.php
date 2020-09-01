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

if (isset($_POST['airtime_withdrawal'])) {


    $amount = $_POST['airtime_withdrawal_amount'];
    $network = $_POST['airtime_withdrawal_network'];
    $phone = $_POST['airtime_withdrawal_phone'];

    $result1 = $admin->createAirtimeWithdrawal($session_id, $amount, $network, $phone);
    $result2 = $user->updateUserDetail($session_id, "withdrawable_balance", $amount, "-");

    $admin->addTransaction($session_id, "withdrawal", "Airtime", $amount);

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





<?php

if (isset($_POST['cash_withdrawal'])) {

    $amount = $_POST['cash_withdrawal_amount'];
    $account_name = $_POST['cash_withdrawal_account_name'];
    $account_number = $_POST['cash_withdrawal_account_number'];
    $account_type = $_POST['cash_withdrawal_account_type'];
    $bank_name = $_POST['cash_withdrawal_bank_name'];

    $result1 = $admin->createCashWithdrawal($session_id, $amount, $account_name, $account_number, $account_type, $bank_name);
    $result2 = $user->updateUserDetail($session_id, "withdrawable_balance", $amount, "-");

    $admin->addTransaction($session_id, "withdrawal", "Cash", $amount);

    if ($result1 and $result2) {
        $data = array("status" => "success");
        echo json_encode($data);
    } else {
        $data = array("status" => "failed");
        echo json_encode($data);
    }
}

?>






