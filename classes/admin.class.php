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
}
