<?php

session_start();
include '../../classes/database.class.php';
include '../../classes/typing_contest.class.php';
include '../../classes/memory_contest.class.php';
include '../../classes/users.class.php';
include '../../classes/activities.class.php';
include '../../classes/admin.class.php';


$typing = new TypingContest();
$memory = new memoryContest();
$activity = new Activity();
$admin = new Admin();
$user = new User();

$session_id = $_SESSION['id'];
?>

<?php

if (isset($_POST['free_airtime'])) {

    $amount = $_POST['amount'];
    $status = $_POST['status'];

    setcookie("winwheel_played", "yes", time() + 120);

    if ($status = "won") {
        $user->updateUserDetail($session_id, "airtime_balance", $amount, "+");
        $admin->updateAdminDetail("airtime_balance", $amount, "-");
    }
}



?>
