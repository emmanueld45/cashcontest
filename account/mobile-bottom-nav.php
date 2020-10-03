<div class="bottom-nav-container">
    <a href="../"><i class="fa fa-home"></i><br><span>Home</span></a>
    <a href="live-feed.php"><i class="fa fa-feed"></i><br><span>Live Feed</span>
  <?php
  if(isset($_SESSION['id'])){
      if($admin->getNumUnseenLiveFeedNotifications($_SESSION['id']) != 0){
      echo "<button>".$admin->getNumUnseenLiveFeedNotifications($_SESSION['id'])."</button>";
      }
    }
  ?>
   </a>
    <a href="all-contests.php"><i class="fa fa-gamepad"></i><br><span>Play</span></a>
    <a href="./"><i class="fa fa-user"></i><br><span>Profile</span></a>
</div>
<!-- stroke-transparent -->