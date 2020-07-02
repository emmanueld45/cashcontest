<?php

include '../../classes/database.class.php';
include '../../classes/typing_contest.class.php';
include '../../classes/users.class.php';



if (isset($_POST['get_contests'])) {

    $contest_category = $_POST['contest_category'];

    $typing_contest = new Typing_contest();
    $result = $typing_contest->getAllContests($contest_category);

    while ($row = mysqli_fetch_assoc($result)) {

?>

        <div class="box">
            <h3><?php echo $row['contest_id']; ?></h3>

            <?php
            $contest_id = $row['uniqueid'];

            if ($typing_contest->getContestNumParticipants($contest_id) >= 4) {
                echo " <a href='contest-intro.php?i=$contest_id' class='btn btn-success join-btn$contest_id' style='display:none;'>Join</a>  
                <button class='btn btn-danger ended-btn$contest_id' style='display:none;'>Ended</button>
                <button class='btn btn-info full-btn$contest_id' style='display:;'>Full</button> ";
            } else  if ($typing_contest->getContestDetail($contest_id, "status") == "Waiting" or $typing_contest->getContestDetail($contest_id, "status") == "Running" and $typing_contest->getContestNumParticipants($contest_id) != 10) {
                echo " <a href='contest-intro.php?i=$contest_id' class='btn btn-success join-btn$contest_id' style='display:;'>Join</a>  
            <button class='btn btn-danger ended-btn$contest_id' style='display:none;'>Ended</button>
            <button class='btn btn-info full-btn$contest_id' style='display:none;'>Full</button> ";
            } else if ($typing_contest->getContestDetail($contest_id, "status") == "Ended") {
                echo " <a href='contest-intro.php?i=$contest_id' class='btn btn-success join-btn$contest_id' style='display:none;'>Join</a>  
                <button class='btn btn-danger ended-btn$contest_id' style='display:;'>Ended</button>
                <button class='btn btn-info full-btn$contest_id' style='display:none;'>Full</button> ";
            }

            ?>

            <button class="btn btn-primary participants<?php echo $row['uniqueid']; ?>">Particiants <span class="participants-text<?php echo $row['uniqueid']; ?>"><?php echo $typing_contest->getContestNumParticipants($row['uniqueid']); ?></span></button>

            <?php
            if ($typing_contest->getContestDetail($contest_id, "status") == "Waiting") {
                $contest_time = $typing_contest->getContestDetail($contest_id, "contest_time");
                echo "<button class='btn contest-time-btn$contest_id'>starts in $contest_time</button>";
            } else if ($typing_contest->getContestDetail($contest_id, "status") == "Running") {
                echo "<button class='btn contest-time-btn$contest_id'><span style='color:mediumseagreen;'>Running..</span></button>";
            }
            ?>


        </div>

<?php
    }
}
?>