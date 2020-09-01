<?php
class Admin
{

    public $admin_id = 1;

    public function createAdmin()
    {
        global $db;
        $main_balance = 0;
        $users_balance = 0;
        $airtime_balance = 0;
        $free_airtime_status = "off";

        $result = $db->setQuery("INSERT INTO admin (main_balance, users_balance, airtime_balance, free_airtime_status) VALUES ('$main_balance', '$users_balance', '$airtime_balance', '$free_airtime_status');");
        return $result;
    }


    public function getAdminDetail($detail)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM admin WHERE id='$this->admin_id';");
        $row = mysqli_fetch_assoc($result);
        $detail = $row[$detail];

        return $detail;
    }


    public function setAdminDetail($field, $detail)
    {
        global $db;

        $result = $db->setQuery("UPDATE admin SET $field='$detail' WHERE id='$this->admin_id';");

        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public function updateAdminDetail($detail, $value, $op)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM admin WHERE id='$this->admin_id';");
        $row = mysqli_fetch_assoc($result);
        $old_value = $row[$detail];

        if ($op == "+") {
            $new_value = $old_value + $value;
        } else if ($op == "-") {
            $new_value = $old_value - $value;
        }

        $result1 = $db->setQuery("UPDATE admin SET $detail='$new_value' WHERE id='$this->admin_id';");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public function createCoupon($coin_price)
    {

        global $db;

        $alph = str_shuffle("ABCDEFGHIJKLMNPQRSTUVWXYZ");
        $nums = str_shuffle("123456789123456789");
        if (strlen($alph) > 5) {
            $cutalph = substr($alph, 0, 5);

            $alph = $cutalph;
        }

        if (strlen($nums) > 5) {
            $cutnums = substr($nums, 0, 5);

            $nums = $cutnums;
        }

        $result = $alph . $nums;
        $code = str_shuffle($result);

        $status = "unused";

        $result = $db->setQuery("INSERT INTO coupons (code, coin_price, status) VALUES ('$code', '$coin_price', '$status');");
    }



    public function couponIsValid($coupon)
    {

        global $db;

        $result = $db->setQuery("SELECT * FROM coupons WHERE code='$coupon';");
        $numrows = mysqli_num_rows($result);

        if ($numrows != 0) {

            $row = mysqli_fetch_assoc($result);
            if ($row['status'] == "unused") {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }



    public function getCouponCoinPrice($coupon)
    {

        global $db;

        $result = $db->setQuery("SELECT * FROM coupons WHERE code='$coupon';");
        $row = mysqli_fetch_assoc($result);

        return $row['coin_price'];
    }



    public function markCouponAsUsed($coupon)
    {

        global $db;

        $result = $db->setQuery("UPDATE coupons SET status='used' WHERE code='$coupon';");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public function createCashWithdrawal($user_id, $amount, $account_name, $account_number, $account_type, $bank_name)
    {
        global $db;

        $status = "unsettled";
        $time = time();
        $date = date("d-m-y");

        $result = $db->setQuery("INSERT INTO cash_withdrawals (userid, amount, account_name, account_number, account_type, bank_name, status, time, date) VALUES ('$user_id', '$amount', '$account_name', '$account_number', '$account_type', '$bank_name', '$status', '$time', '$date');");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public function createAirtimeWithdrawal($user_id, $amount, $network, $phone)
    {
        global $db;

        $status = "unsettled";
        $time = time();
        $date = date("d-m-y");

        $result = $db->setQuery("INSERT INTO airtime_withdrawals (userid, amount, network, phone, status, time, date) VALUES ('$user_id', '$amount', '$network', '$phone', '$status', '$time', '$date');");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function createFreeAirtimeWithdrawal($user_id, $amount, $phone)
    {
        global $db;

        $status = "unsettled";
        $time = time();
        $date = date("d-m-y");

        $result = $db->setQuery("INSERT INTO free_airtime_withdrawals (userid, amount, phone, status, time, date) VALUES ('$user_id', '$amount', '$phone', '$status', '$time', '$date');");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }



    public function addTransaction($user_id, $transaction_type, $sub_type, $amount)
    {
        global $db;


        $a = date("h");
        $b = $a - 1;
        $c = date("i A");
        $time = $b . ":" . $c;


        $date = date("d-m-y");

        $result = $db->setQuery("INSERT INTO transactions (userid, transaction_type, sub_type, amount, time, date) VALUES ('$user_id', '$transaction_type', '$sub_type', '$amount', '$time', '$date');");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
