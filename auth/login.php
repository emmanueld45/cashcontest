<?php
session_start();
include '../classes/database.class.php';
include '../classes/users.class.php';

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
  <title>
    Invest Register Form Flat Responsive Widget Template :: w3layouts
  </title>
  <!-- Meta-Tags -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta charset="utf-8" />
  <meta name="keywords" content="Invest Register Form a Responsive Web Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible Web Template, Smartphone Compatible Web Template, Free Webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
  <script>
    addEventListener(
      "load",
      function() {
        setTimeout(hideURLbar, 0);
      },
      false
    );

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <!-- //Meta-Tags -->
  <!-- Index-Page-CSS -->
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
  <!-- //Custom-Stylesheet-Links -->
  <!--fonts -->
  <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet" />
  <!-- //fonts -->
  <!-- Font-Awesome-File -->
  <link rel="stylesheet" href="css/fontawesome-all.css" type="text/css" media="all" />
</head>

<body>
  <h1 class="title-agile text-center">Welcome Back!</h1>
  <div class="content-w3ls">
    <div class="agileits-grid">

      <div class="content-top-agile">
        <h2 style="position:relative;top:20px;">Login Account</h2>
        <?php
if(isset($_GET['email_phone_incorrect'])){
echo "<div class='alert alert-danger'> Phone/Email you entered is</div>";
}

?>
      </div>
      <div class="content-bottom">
        <form action="" method="POST">
          <i class="fab fa-centercode"></i>
          <div class="field_w3ls">
            <!-- <div class="field-group">
              <input name="text1" id="text1" type="text" value="" placeholder="Username" required />
            </div> -->
         
            <div class="field-group">
              <input name="email_phone" id="email" type="text" value="" placeholder="Phone or Email" required />
            </div>
            <div class="field-group">
              <input id="password-field" type="password" class="form-control" name="password" value="" placeholder="Password" />
              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>
          </div>
          <div class="wthree-field">
            <input id="saveForm" name="submit" type="submit" value="Login" />
          </div>
          <!-- <p class="signin">or sign up with <a href="#">facebook</a></p>
          <p class="terms">
            By signing up, you accept our <a href="#">Terms of use</a> and
            <a href="#">Privicy policy</a>
          </p> -->
        </form>
      </div>
      <!-- //content bottom -->
    </div>
  </div>
  <div class="copyright text-center">
    <p>
      © 2018 CashContest
      <!-- <a href="http://w3layouts.com">W3layouts</a> -->
    </p>
  </div>


  <!--//copyright-->



  <?php

  if (isset($_POST['submit'])) {


    $email_phone = $_POST['email_phone'];
    $password = $_POST['password'];

    $result = $db->setQuery("SELECT * FROM users WHERE email='$email_phone' OR phone='$email_phone';");
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    
    if ($numrows != 0) {
      $hashed = $row['password'];

      if (PASSWORD_VERIFY($password, $hashed)) {

        $_SESSION['id'] = $row['uniqueid'];
        echo '<script>
      window.location.href="../account?login_success=true";
      </script>';
      }
      echo '<script>
    window.location.href="login.php?password_incorrect=true";
    </script>';
    } else {
      echo '<script>
    window.location.href="login.php?email_phone_incorrect=true";
    </script>';
    }
  }

  ?>




  <script src="js/jquery-2.2.3.min.js"></script>
  <!-- script for show password -->
  <script>
    $(".toggle-password").click(function() {
      $(this).toggleClass("fa-eye fa-eye-slash");
      var input = $($(this).attr("toggle"));
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });
  </script>
  <!-- /script for show password -->
</body>
<!-- //Body -->

</html>