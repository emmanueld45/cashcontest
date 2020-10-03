<?php

class User
{
    public $user_id;

    public function createUser($firstname, $lastname, $phone, $password)
    {
        global $db;
        $uniqueid = uniqid();
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $image = "userimages/default-image.jpeg";
        $coins = 50;
        $withdrawable_balance = 0;
        $status = "active";
        $time = time();
        $date = date("d-m-y");
        $new = "yes";
        $total_received = 0;
        $airtime_balance = 0;
        $email = "empty";

        $result = $db->setQuery("INSERT INTO users (uniqueid, firstname, lastname, phone, email, password, image, coins, withdrawable_balance, status, time, date, new, total_received, airtime_balance) VALUES ('$uniqueid', '$firstname', '$lastname', '$phone', '$email', '$hashed', '$image', '$coins', '$withdrawable_balance', '$status', '$time', '$date', '$new', '$total_received', '$airtime_balance');");
        return $result;
    }

    public function getUserDetail($user_id, $detail)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM users WHERE uniqueid='$user_id';");
        $row = mysqli_fetch_assoc($result);
        $detail = $row[$detail];

        return $detail;
    }


    public function setUserDetail($user_id, $field, $detail)
    {
        global $db;

        $result = $db->setQuery("UPDATE users SET $field='$detail' WHERE uniqueid='$user_id';");

        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public function updateUserDetail($userid, $detail, $value, $op)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM users WHERE uniqueid='$userid';");
        $row = mysqli_fetch_assoc($result);
        $old_value = $row[$detail];

        if ($op == "+") {
            $new_value = $old_value + $value;
        } else if ($op == "-") {
            $new_value = $old_value - $value;
        }

        $result1 = $db->setQuery("UPDATE users SET $detail='$new_value' WHERE uniqueid='$userid';");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}


$user = new User();