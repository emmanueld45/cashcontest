<?php

class MemoryContest
{

    public $start_time;
    public $end_time;

    public $silver_coin_price = 50;
    public $gold_coin_price = 100;
    public $diamond_coin_price = 200;

    public $max_participants = 1;

    public function createContest($contest_category)
    {
        global $db;

        $contest_id = uniqid();
        $contest_category = $contest_category;
        $image = "contestimages/contestimg1.jpg";
        $time = time();
        $date = date("d-m-y");
        $this->start_time = time();
        $this->end_time = 300;
        $is_full = "no";
        $have_results = "no";
        $status = "Running";

        $result = $db->setQuery("INSERT INTO memory_contest (contest_id, image, contest_category, time, date, status, start_time, end_time, is_full, have_results) VALUES ('$contest_id', '$image', '$contest_category', '$time', '$date', '$status', '$this->start_time', '$this->end_time', '$is_full', '$have_results');");
    }


    public function getDetail($contest_id, $detail)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM memory_contest WHERE contest_id='$contest_id';");
        $row = mysqli_fetch_assoc($result);
        $detail = $row[$detail];
        return $detail;
    }

    public function setDetail($contest_id, $detail, $value)
    {
        global $db;

        $result = $db->setQuery("UPDATE memory_contest SET $detail='$value' WHERE contest_id='$contest_id';");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public function addParticipant($contest_id, $userid)
    {
        global $db;

        $finish_time = 0;
        $finish_status = "pending";
        $amount_won = 0;

        $result = $db->setQuery("INSERT INTO memory_contest_participants (contest_id, userid, finish_time, finish_status, amount_won) VALUES ('$contest_id', '$userid', '$finish_time', '$finish_status', '$amount_won');");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getContestCoinPrice($contest_id)
    {
        global $db;
        $contest_category = $this->getDetail($contest_id, "contest_category");
        if ($contest_category == "Silver") {
            return $this->silver_coin_price;
        } else if ($contest_category == "Gold") {
            return $this->gold_coin_price;
        } else if ($contest_category == "Diamond") {
            return $this->diamond_coin_price;
        }
    }


    public function getNumParticipants($contest_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM memory_contest_participants WHERE contest_id='$contest_id';");
        $numrows = mysqli_num_rows($result);
        return $numrows;
    }


    public function getLatestRunningContest($contest_category)
    {
        global $db;
        $latest_contest_array = [];
        $result = $db->setQuery("SELECT * FROM memory_contest WHERE contest_category='$contest_category' AND status='Running' ORDER BY id DESC LIMIT 1;");
        while ($row = mysqli_fetch_assoc($result)) {
            $contest_id = $row['contest_id'];
            $latest_contest_array[0] = $contest_id;
        }

        return $latest_contest_array[0];
    }


    public function noActivelyRunningContest($contest_category)
    {
        global $db;
        $x = 0;

        $result = $db->setQuery("SELECT * FROM memory_contest WHERE status='Running' AND contest_category='$contest_category' ORDER BY id DESC LIMIT 1;");
        $numrows = mysqli_num_rows($result);

        if ($numrows != 0) {
            $contest_id = $this->getLatestRunningContest($contest_category);
            if ($this->getNumParticipants($contest_id) >= $this->max_participants) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

    public function userIsInContest($contest_id, $userid)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM memory_contest_participants WHERE contest_id='$contest_id' AND userid='$userid';");
        $numrows = mysqli_num_rows($result);
        if ($numrows > 0) {
            return true;
        } else {
            return false;
        }
    }
}
