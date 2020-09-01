<?php
class TypingContest
{

    public $start_time;
    public $end_time;

    public $contest_id;
    public $tp = "typing_contest";


    public $silver_coin_price = 50;
    public $gold_coin_price = 100;
    public $diamond_coin_price = 200;

    public $max_participants = 4;
    public $min_participants = 1;




    public function getSentence()
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM typing_sentences ORDER BY RAND() LIMIT 1;");
        $row = mysqli_fetch_assoc($result);

        return $row['sentence'];
    }



    public function addSentences($contest_id)
    {
        global $db;


        for ($i = 0; $i < 5; $i++) {
            $sentence = $this->getSentence();
            $result = $db->setQuery("INSERT INTO typing_contest_sentences (contest_id, sentence) VALUES ('$contest_id', '$sentence');");
        }
    }

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

    public function createContestCode()
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
        return "#" . $final_result;
    }

    public function createContest($contest_category)
    {
        global $db;
        $contest_id = uniqid();
        $contest_code = $this->createContestCode();
        $contest_image = $this->getContestImage();
        $contest_category = $contest_category;
        $status = "Running";
        $time = time();
        $date = date("d-m-y");

        $this->start_time = time();
        $this->end_time = $this->start_time + 360;
        $have_results = "no";

        $result = $db->setQuery("INSERT INTO typing_contest (contest_id, contest_code, contest_image, contest_category, status, time, date, start_time, end_time, have_results) VALUES('$contest_id', '$contest_code', '$contest_image', '$contest_category', '$status', '$time', '$date', '$this->start_time', '$this->end_time', '$have_results');");
        $this->addSentences($contest_id);
        return $result;
    }

    public function getDetail($contest_id, $detail)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM typing_contest WHERE contest_id='$contest_id';");
        $row = mysqli_fetch_assoc($result);
        $detail = $row[$detail];

        return $detail;
    }


    public function setDetail($contest_id, $field, $detail)
    {
        global $db;

        $result = $db->setQuery("UPDATE typing_contest SET $field='$detail' WHERE contest_id='$contest_id';");
        return;
    }




    public function updateDetail($contest_id, $detail, $value, $op)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM typing_contest WHERE contest_id='$contest_id';");
        $row = mysqli_fetch_assoc($result);
        $old_value = $row[$detail];

        if ($op == "+") {
            $new_value = $old_value + $value;
        } else if ($op == "-") {
            $new_value = $old_value - $value;
        }

        $result1 = $db->setQuery("UPDATE typing_contest SET $detail='$new_value' WHERE contest_id='$contest_id';");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }





    public function getNumParticipants($contest_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM typing_contest_participants WHERE contest_id='$contest_id';");
        $numrows = mysqli_num_rows($result);

        return $numrows;
    }




    public function addTypingSentence($sentence)
    {
        global $db;

        $result = $db->setQuery("INSERT INTO typing_sentences (sentence) VALUES ($sentence);");

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
















    public function addParticipant($contest_id, $user_id)
    {
        global $db;
        $finish_time = 0;
        $finish_status = "pending";
        $amount_won = 0;
        $won = "no";

        if ($this->getNumParticipants($contest_id) < 10) {
            $result = $db->setQuery("INSERT INTO typing_contest_participants (userid, contest_id, finish_time, finish_status, amount_won, won) VALUES ('$user_id', '$contest_id', '$finish_time', '$finish_status', '$amount_won', '$won');");
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



    public function getParticipantDetail($contest_id, $userid, $detail)
    {
        global $db;
        $result = $db->setQuery("SELECT * FROM typing_contest_participants WHERE contest_id='$contest_id' AND userid='$userid';");
        $row = mysqli_fetch_assoc($result);
        $received_detail = $row[$detail];

        return $received_detail;
    }


    public function setParticipantDetail($contest_id, $userid, $detail, $value)
    {
        global $db;

        $result = $db->setQuery("UPDATE typing_contest_participants SET $detail='$value' WHERE contest_id='$contest_id' AND userid='$userid';");
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




    public function getLatestRunningContest($contest_category)
    {
        global $db;
        $latest_contest_array = [];
        $result = $db->setQuery("SELECT * FROM typing_contest WHERE contest_category='$contest_category' AND status='Running' ORDER BY id DESC LIMIT 1;");
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

        $result = $db->setQuery("SELECT * FROM typing_contest WHERE status='Running' AND contest_category='$contest_category' ORDER BY id DESC LIMIT 1;");
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

        $result = $db->setQuery("SELECT * FROM typing_contest_participants WHERE contest_id='$contest_id' AND userid='$userid';");
        $numrows = mysqli_num_rows($result);
        if ($numrows > 0) {
            return true;
        } else {
            return false;
        }
    }



    public function userHavePlayedContest($contest_id, $userid)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM typing_contest_participants WHERE contest_id='$contest_id' AND userid='$userid';");
        $row = mysqli_fetch_assoc($result);
        $numrows = mysqli_num_rows($result);
        if ($numrows > 0) {
            $finish_status = $row['finish_status'];
            if ($finish_status == "played") {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }



    public function reduceEndTime()
    {

        global $db;

        $result = $db->setQuery("SELECT * FROM typing_contest WHERE have_results='no';");

        while ($row = mysqli_fetch_assoc($result)) {
            $contest_id = $row['contest_id'];

            $this->updateDetail($contest_id, "end_time", "1", "-");
        }
    }


    public function checkResults()
    {
        global $db;
        $user = new User();
        $admin = new Admin();

        $result = $db->setQuery("SELECT * FROM typing_contest WHERE have_results='no' AND status='Ended';");
        while ($row = mysqli_fetch_assoc($result)) {
            $contest_id = $row['contest_id'];
            $finish_time_array = [];

            $result1 = $db->setQuery("SELECT * FROM typing_contest_participants WHERE contest_id='$contest_id' AND finish_status='played';");

            while ($row1 = mysqli_fetch_assoc($result1)) {
                $finish_time_array[count($finish_time_array)] = $row1['finish_time'];
            }

            sort($finish_time_array);

            $winner_finish_time = $finish_time_array[0];

            // checking for tiles/draws
            $finish_time_array[0] = "123456789";
            $x = 0;
            foreach ($finish_time_array as $finish_time_single) {
                if ($finish_time_single == $winner_finish_time) {
                    $x++;
                }
            }

            // evaluate the prices of the winner/winners and also the admin price
            $coin_price = $this->getContestCoinPrice($contest_id);
            $num_participants = $this->getNumParticipants($contest_id);
            $winner_price = $coin_price * $num_participants;

            $admin_price = $winner_price * 0.2;
            $winner_price = $winner_price - $admin_price;

            $admin->updateAdminDetail("main_balance", $admin_price, "+");
            $this->setDetail($contest_id, "have_results", "yes");



            // check if num participants is equal or greater than the min allowable participants
            if ($num_participants >= $this->min_participants) {

                // check if no tile/draw
                if ($x == 0) {
                    $result2 = $db->setQuery("SELECT * FROM typing_contest_participants WHERE contest_id='$contest_id' AND finish_time = '$winner_finish_time' AND finish_status='played';");
                    $row2 = mysqli_fetch_assoc($result2);
                    $winner_id = $row2['userid'];


                    $user->updateUserDetail($winner_id, "withdrawable_balance", $winner_price, "+");
                    $this->setParticipantDetail($contest_id, $winner_id, "amount_won", $winner_price);
                    $this->setParticipantDetail($contest_id, $winner_id, "won", "yes");
                } else {

                    if ($x + 1 == $num_participants) {
                        $correct_winner_price = ($winner_price + $admin_price) / ($x + 1);
                        $admin->updateAdminDetail("main_balance", $admin_price, "-");
                    } else {
                        $correct_winner_price = round($winner_price / ($x + 1));
                    }

                    $result2 = $db->setQuery("SELECT * FROM typing_contest_participants WHERE contest_id='$contest_id' AND finish_time = '$winner_finish_time' AND finish_status='played';");
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        $winner_id = $row2['userid'];
                        $user->updateUserDetail($winner_id, "withdrawable_balance", $correct_winner_price, "+");
                        $this->setParticipantDetail($contest_id, $winner_id, "amount_won", $correct_winner_price);
                        $this->setParticipantDetail($contest_id, $winner_id, "won", "yes");
                    }
                }
            } else {
                // refund players money
                $correct_winner_price = ($winner_price + $admin_price) / $num_participants;
                $admin->updateAdminDetail("main_balance", $admin_price, "-");
                $result2 = $db->setQuery("SELECT * FROM typing_contest_participants WHERE contest_id='$contest_id';");
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    $winner_id = $row2['userid'];
                    $user->updateUserDetail($winner_id, "withdrawable_balance", $correct_winner_price, "+");
                    $this->setParticipantDetail($contest_id, $winner_id, "amount_won", $correct_winner_price);
                    $this->setParticipantDetail($contest_id, $winner_id, "won", "yes");
                }
            }
        }
    }







































































































    /**** CHALLENGE METHODS START *** */

    public function addChallengeSentences($challenge_id)
    {
        global $db;


        for ($i = 0; $i < 5; $i++) {
            $sentence = $this->getSentence();
            $result = $db->setQuery("INSERT INTO typing_challenge_sentences (challenge_id, sentence) VALUES ('$challenge_id', '$sentence');");
        }
    }

    public function createChallenge($creator_id, $coin_price, $challenge_min_participants, $challenge_max_participants, $accessibility)
    {
        global $db;

        $challenge_id = uniqid();
        $time = time();
        $date = date("d-m-y");
        $start_time = time();
        $end_time = 300;
        $status = "Running";
        $have_results = "no";

        $result =  $db->setQuery("INSERT INTO typing_challenge (challenge_id, creator_id, coin_price, time, date, status, start_time, end_time, min_participants, max_participants, accessibility, have_results) VALUES ('$challenge_id', '$creator_id', '$coin_price', '$time', '$date', '$status', '$start_time', '$end_time', '$challenge_min_participants', '$challenge_max_participants', '$accessibility', '$have_results');");
        $this->addChallengeSentences($challenge_id);
        return $result;
    }


    public function addChallengeParticipant($challenge_id, $userid)
    {
        global $db;

        $finish_time = 0;
        $finish_status = "pending";
        $amount_won = 0;
        $won = "no";

        $result = $db->setQuery("INSERT INTO typing_challenge_participants (challenge_id, userid, finish_time, finish_status, amount_won, won) VALUES ('$challenge_id', '$userid', '$finish_time', '$finish_status', '$amount_won', '$won');");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }



    public function getChallengeDetail($challenge_id, $detail)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM typing_challenge WHERE challenge_id='$challenge_id';");
        $row = mysqli_fetch_assoc($result);
        $detail = $row[$detail];
        return $detail;
    }

    public function setChallengeDetail($challenge_id, $detail, $value)
    {
        global $db;

        $result = $db->setQuery("UPDATE typing_challenge SET $detail='$value' WHERE challenge_id='$challenge_id';");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function updateChallengeDetail($challenge_id, $detail, $value, $op)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM typing_challenge WHERE challenge_id='$challenge_id';");
        $row = mysqli_fetch_assoc($result);
        $old_value = $row[$detail];

        if ($op == "+") {
            $new_value = $old_value + $value;
        } else if ($op == "-") {
            $new_value = $old_value - $value;
        }

        $result1 = $db->setQuery("UPDATE typing_challenge SET $detail='$new_value' WHERE challenge_id='$challenge_id';");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }




    public function getChallengeParticipantDetail($challenge_id, $userid, $detail)
    {
        global $db;
        $result = $db->setQuery("SELECT * FROM typing_challenge_participants WHERE challenge_id='$challenge_id' AND userid='$userid';");
        $row = mysqli_fetch_assoc($result);
        $received_detail = $row[$detail];

        return $received_detail;
    }


    public function setChallengeParticipantDetail($challenge_id, $userid, $detail, $value)
    {
        global $db;

        $result = $db->setQuery("UPDATE typing_challenge_participants SET $detail='$value' WHERE challenge_id='$challenge_id' AND userid='$userid';");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public function getNumChallengeParticipants($challenge_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM typing_challenge_participants WHERE challenge_id='$challenge_id';");
        $numrows = mysqli_num_rows($result);
        return $numrows;
    }


    public function userIsInChallenge($challenge_id, $userid)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM typing_challenge_participants WHERE challenge_id='$challenge_id' AND userid='$userid';");
        $numrows = mysqli_num_rows($result);
        if ($numrows > 0) {
            return true;
        } else {
            return false;
        }
    }





    public function reduceChallengeEndTime()
    {

        global $db;

        $result = $db->setQuery("SELECT * FROM typing_challenge WHERE have_results='no';");

        while ($row = mysqli_fetch_assoc($result)) {
            $challenge_id = $row['challenge_id'];

            $this->updateChallengeDetail($challenge_id, "end_time", "1", "-");
        }
    }



    public function checkChallengeResults()
    {
        global $db;
        $user = new User();
        $admin = new Admin();

        $result = $db->setQuery("SELECT * FROM typing_challenge WHERE have_results='no';");
        while ($row = mysqli_fetch_assoc($result)) {
            $challenge_id = $row['challenge_id'];
            $finish_time_array = [];

            $result1 = $db->setQuery("SELECT * FROM typing_challenge_participants WHERE challenge_id='$challenge_id' AND finish_status='played';");

            while ($row1 = mysqli_fetch_assoc($result1)) {
                $finish_time_array[count($finish_time_array)] = $row1['finish_time'];
            }

            sort($finish_time_array);

            $winner_finish_time = $finish_time_array[0];

            // checking for tiles/draws
            $finish_time_array[0] = "123456789";
            $x = 0;
            foreach ($finish_time_array as $finish_time_single) {
                if ($finish_time_single == $winner_finish_time) {
                    $x++;
                }
            }

            // evaluate the prices of the winner/winners and also the admin price
            $coin_price = $this->getChallengeDetail($challenge_id, "coin_price");
            $num_participants = $this->getNumChallengeParticipants($challenge_id);
            $winner_price = $coin_price * $num_participants;

            $admin_price = $winner_price * 0.2;
            $winner_price = $winner_price - $admin_price;

            $admin->updateAdminDetail("main_balance", $admin_price, "+");
            $this->setChallengeDetail($challenge_id, "have_results", "yes");


            $challenge_min_participants = $this->getChallengeDetail($challenge_id, "min_participants");


            // check is participants is equal or greater than th min participants set for the challenge
            if ($num_participants >= $challenge_min_participants) {


                // check if no tile/draw
                if ($x == 0) {
                    $result2 = $db->setQuery("SELECT * FROM typing_challenge_participants WHERE challenge_id='$challenge_id' AND finish_time = '$winner_finish_time' AND finish_status='played';");
                    $row2 = mysqli_fetch_assoc($result2);
                    $winner_id = $row2['userid'];


                    $user->updateUserDetail($winner_id, "withdrawable_balance", $winner_price, "+");
                    $this->setChallengeParticipantDetail($challenge_id, $winner_id, "amount_won", $winner_price);
                    $this->setChallengeParticipantDetail($challenge_id, $winner_id, "won", "yes");
                } else {

                    if ($x + 1 == $num_participants) {
                        $correct_winner_price = ($winner_price + $admin_price) / ($x + 1);
                        $admin->updateAdminDetail("main_balance", $admin_price, "-");
                    } else {
                        $correct_winner_price = round($winner_price / ($x + 1));
                    }

                    $result2 = $db->setQuery("SELECT * FROM typing_challenge_participants WHERE challenge_id='$challenge_id' AND finish_time = '$winner_finish_time' AND finish_status='played';");
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        $winner_id = $row2['userid'];
                        $user->updateUserDetail($winner_id, "withdrawable_balance", $correct_winner_price, "+");
                        $this->setChallengeParticipantDetail($challenge_id, $winner_id, "amount_won", $correct_winner_price);
                        $this->setChallengeParticipantDetail($challenge_id, $winner_id, "won", "yes");
                    }
                }
            } else {
                // return back players money
                $correct_winner_price = ($winner_price + $admin_price) / $num_participants;
                $admin->updateAdminDetail("main_balance", $admin_price, "-");
                $result2 = $db->setQuery("SELECT * FROM typing_challenge_participants WHERE challenge_id='$challenge_id';");
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    $winner_id = $row2['userid'];
                    $user->updateUserDetail($winner_id, "withdrawable_balance", $correct_winner_price, "+");
                    $this->setChallengeParticipantDetail($challenge_id, $winner_id, "amount_won", $correct_winner_price);
                    $this->setChallengeParticipantDetail($challenge_id, $winner_id, "won", "yes");
                }
            }
        }
    }

    /*** CHALLENGE METHODS END **** */
}
