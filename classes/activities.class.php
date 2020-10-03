<?php
class Activity
{
    public function createAtivity($userid, $type, $message, $data)
    {
        global $db;

        $time = time();
        $date = date("d-m-y");
        $status = 0;


        $result = $db->setQuery("INSERT INTO activities (userid, type, message, time, date, status, data) VALUES ('$userid', '$type', '$message', '$time', '$date', '$status', '$data');");
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


    public function addToWinnerHistory($winner_id, $amount, $history_type)
    {
        global $db;

        $time = time();
        $date = date("d-m-y");

        $result = $db->setQuery("INSERT INTO winners_history (winner_id, amount, history_type, time, date) VALUES ('$winner_id', '$amount', '$history_type', '$time', '$date');");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }




    public function sendChallengeRequest($challenge_type, $challenge_id, $sender_id, $receiver_id)
    {

        global $db;

        $time = time();
        $date = date("d-m-y");

        $result = $db->setQuery("INSERT INTO challenge_requests (challenge_type, challenge_id, sender_id, receiver_id, time, date) VALUES ('$challenge_type', '$challenge_id', '$sender_id', '$receiver_id', '$time', '$date');");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}

$activity = new Activity();