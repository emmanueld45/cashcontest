<?php
class Activity
{
    public function createAtivity($type, $data)
    {
        global $db;

        $time = time();
        $date = date("d-m-y");
        $status = 0;

        $result = $db->setQuery("INSERT INTO activities (type, time, date, status, data) VALUES ('$type', '$time', '$date', '$status', '$data');");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }



    public function getDetail($activity_id, $detail)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM activities WHERE id='$activity_id';");
        $row = mysqli_fetch_assoc($result);
        $detail = $row[$detail];
        return $detail;
    }

    public function setDetail($activity_id, $detail, $value)
    {
        global $db;

        $result = $db->setQuery("UPDATE activities SET $detail='$value' WHERE id='$activity_id';");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
