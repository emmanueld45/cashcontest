<?php
class Typing_contest
{
    public $contest_id;
    public $tp = "typing_contest";

    public function getContestImage()
    {
        $image1 = "contestimages/contestimg1.jpg";
        $image2 = "contestimages/contestimg2.jpg";
        $image3 = "contestimages/contestimg3.jpg";

        $image_arr = array($image1, $image2, $image3);
        $image_arr_length = count($image_arr) - 1;
        $rand = RAND(0, $image_arr_length);
        $image = $image_arr[$rand];

        return $image;
    }

    public function createContestId()
    {
        $alph = str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ");
        $nums = str_shuffle("12345678901234567890");
        if (strlen($alph) > 3) {
            $cutalph = substr($alph, 0, 3);

            $alph = $cutalph;
        }

        if (strlen($nums) > 3) {
            $cutnums = substr($nums, 0, 3);

            $nums = $cutnums;
        }

        $result = $alph . $nums;
        $final_result = str_shuffle($result);
        return $final_result;
    }

    public function createContest($contest_category)
    {
        global $db;
        $uniqueid = uniqid();
        $contest_id = $this->createContestId();
        $contest_image = $this->getContestImage();
        $contest_time = 120;
        $contest_category = $contest_category;
        $status = "Waiting";
        $time = time();
        $date = date("d-m-y");

        $result = $db->setQuery("INSERT INTO typing_contest (uniqueid, contest_id, contest_image, contest_category, contest_time, status, time, date) VALUES('$uniqueid', '$contest_id', '$contest_image', '$contest_category', '$contest_time', '$status', '$time', '$date');");
        return $result;
    }

    public function getContestDetail($contest_id, $detail)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM typing_contest WHERE uniqueid='$contest_id';");
        $row = mysqli_fetch_assoc($result);
        $detail = $row[$detail];

        return $detail;
    }


    public function setContestDetail($contest_id, $field, $detail)
    {
        global $db;

        $result = $db->setQuery("UPDATE typing_contest SET $field='$detail' WHERE uniqueid='$contest_id';");
        return;
    }

    public function getAllContests()
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM typing_contest ORDER BY id DESC;");
        return $result;
    }

    public function getSingleContest($contest_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM typing_contest WHERE uniqueid='$contest_id';");
        return $result;
    }

    public function contestHasEnded($contest_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM typing_contest WHERE uniqueid='$contest_id';");
        $row = mysqli_fetch_assoc($result);
        $status = $row['status'];
        if ($status == "Ended") {
            return true;
        } else {
            return false;
        }
    }



    public function getContestNumParticipants($contest_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM typing_contest_participants WHERE contest_id='$contest_id';");
        $numrows = mysqli_num_rows($result);

        return $numrows;
    }


    public function reduceContestTime($contest_id)
    {
        global $db;

        if ($this->getContestDetail($contest_id, "contest_time") != 0) {
            $result = $db->setQuery("SELECT * FROM typing_contest WHERE uniqueid='$contest_id';");
            $row = mysqli_fetch_assoc($result);
            $contest_time = $row['contest_time'];
            $contest_time--;

            $this->setContestDetail($contest_id, "contest_time", $contest_time);
        } else if ($this->getContestNumParticipants($contest_id) >= 2 and $this->getContestNumParticipants($contest_id) <= 10) {
            $this->setContestDetail($contest_id, "status", "Running");
        } else {
            $this->setContestDetail($contest_id, "status", "Ended");
        }
    }

    /******* GAMING SECTION START ****** */
    public function addSentence($sentence)
    {
        global $db;

        $result = $db->setQuery("INSERT INTO typing_contest_sentences (sentence) VALUES ('$sentence');");
        return $result;
    }



    public function getSentence()
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM typing_contest_sentences ORDER BY RAND() LIMIT 1;");
        $row = mysqli_fetch_assoc($result);

        return $row['sentence'];
    }


    public function deleteContest($contest_id)
    {
        global $db;

        $result = $db->setQuery("DELETE FROM typing_contest WHERE uniqueid='$contest_id';");
        return $result;
    }







    public function addParticipant($contest_id, $user_id)
    {
        global $db;

        if ($this->getContestNumParticipants($contest_id) < 10) {
            $result = $db->setQuery("INSERT INTO typing_contest_participants (userid, contest_id) VALUES ('$user_id', '$contest_id');");
            return $result;
        }
    }

    public function removeParticipant($contest_id, $user_id)
    {
        global $db;

        $result = $db->setQuery("DELETE FROM typing_contest_participants WHERE contest_id='$contest_id' AND userid='$user_id';");
        return $result;
    }

    public function getParticipants($contest_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM typing_contest_participants WHERE contest_id='$contest_id';");
        return $result;
    }
    /****** GAMING SECTION END *****8 */
}
