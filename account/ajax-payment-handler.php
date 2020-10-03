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

if (isset($_POST['process_online_payment'])) {

    $amount = $_POST['amount'];

    $fund_user =  $user->updateUserDetail($session_id, "coins", $amount, "+");
    $fund_admin =  $admin->updateAdminDetail("users_balance", $amount, "+");
    $admin->addTransaction($session_id, "deposit", "Online", $amount);
    $activity->createAtivity($session_id, "online_payment", "deposited N$amount for topup", "empty");
    $admin->sendLiveFeedNotification();

    if ($fund_user and $fund_admin) {
        $data = array("status" => "success", "amount" => $amount);
        echo json_encode($data);
    } else {
        $data = array("status" => "failed");
        echo json_encode($data);
    }
}

?>





<?php

if (isset($_POST['process_coupon_payment'])) {

    $coupon_code = $_POST['coupon_code'];

    if ($admin->couponIsValid($coupon_code)) {

        $amount = $admin->getCouponCoinPrice($coupon_code);
        $fund_user =  $user->updateUserDetail($session_id, "coins", $amount, "+");
        $fund_admin =  $admin->updateAdminDetail("users_balance", $amount, "+");
        $admin->addTransaction($session_id, "deposit", "Coupon", $amount);
        $activity->createAtivity($session_id, "coupon_payment", "deposited N$amount for topup", "empty");
        $admin->sendLiveFeedNotification();

        if ($fund_user and $fund_admin) {
            $admin->markCouponAsUsed($coupon_code);
            $data = array("status" => "success", "amount" => $amount);
            echo json_encode($data);
        } else {
            $data = array("status" => "failed");
            echo json_encode($data);
        }
    } else {
        $data = array("status" => "invalid coupon");
        echo json_encode($data);
    }
}

?>






