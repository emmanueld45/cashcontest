<?php

class User
{
    public $user_id;

    public function createUser($name, $email, $phone, $password)
    {
        global $db;
        $uniqueid = uniqid();
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $image = "userimages/default-image.jpeg";
        $playing_balance = 0;
        $withdrawable_balance = 0;
        $status = "active";
        $time = time();
        $date = date("d-m-y");
        $new = "yes";
        $total_withdrawan = 0;

        $result = $db->setQuery("INSERT INTO users (uniqueid, name, phone, email, password, image, playing_balance, withdrawable_balance, status, time, date, new, total_withdrawn) VALUES ('$uniqueid', '$name', '$phone', '$email', '$hashed', '$image', '$playing_balance', '$withdrawable_balance', '$status', '$time', '$date', '$new', '$total_withdrawan');");
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

    public function addUserPlayingBalance($user_id, $amount)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM users WHERE uniqueid='$user_id';");
        $row = mysqli_fetch_assoc($result);
        $playing_balance = $row['playing_balance'];
        $playing_balance = $playing_balance + $amount;

        $result = $db->setQuery("UPDATE users SET playing_balance=$playing_balance WHERE uniqueid='$user_id';");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public function removeUserPlayingBalance($user_id, $amount)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM users WHERE uniqueid='$user_id';");
        $row = mysqli_fetch_assoc($result);
        $playing_balance = $row['playing_balance'];
        $playing_balance = $playing_balance - $amount;

        $result = $db->setQuery("UPDATE users SET playing_balance=$playing_balance WHERE uniqueid='$user_id';");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }







    public function addUserWithdrawableBalance($user_id, $amount)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM users WHERE uniqueid='$user_id';");
        $row = mysqli_fetch_assoc($result);
        $withdrawable_balance = $row['withdrawable_balance'];
        $withdrawable_balance = $withdrawable_balance + $amount;

        $result = $db->setQuery("UPDATE users SET withdrawable_balance=$withdrawable_balance WHERE uniqueid='$user_id';");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public function removeUserWithdrawableBalance($user_id, $amount)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM users WHERE uniqueid='$user_id';");
        $row = mysqli_fetch_assoc($result);
        $withdrawable_balance = $row['withdrawable_balance'];
        $withdrawable_balance = $withdrawable_balance - $amount;

        $result = $db->setQuery("UPDATE users SET withdrawable_balance=$withdrawable_balance WHERE uniqueid='$user_id';");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
