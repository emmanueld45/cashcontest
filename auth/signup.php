<?php
session_start();
include '../classes/database.class.php';
include '../classes/users.class.php';

$user = new User();

?>


<!DOCTYPE html>
<html lang="zxx">
  <head>
    <title>
      Contest
    </title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <meta
      name="keywords"
      content="Invest Register Form a Responsive Web Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible Web Template, Smartphone Compatible Web Template, Free Webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
    />
    <script>
      addEventListener(
        "load",
        function () {
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
    <link
      href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext"
      rel="stylesheet"
    />
    <!-- //fonts -->
    <!-- Font-Awesome-File -->
    <link
      rel="stylesheet"
      href="css/fontawesome-all.css"
      type="text/css"
      media="all"
    />
  </head>

  <body>
    <h1 class="title-agile text-center">Create Account</h1>
    <div class="content-w3ls">
      <div class="agileits-grid">
        <div class="content-top-agile">
          <h2>Register Your Account</h2>
        </div>
        <div class="content-bottom">
          <form action="" method="POST" onsubmit="return validateForm()">
            <?php
              if(isset($_GET['phone_exists'])){

                  echo "<div class='alert alert-danger' style='padding:10px;background-color:#ff4f81;color:white;border-radius:3px;font-size:14px;'>
                
                  <b>Sorry, Phone number already in use!</b>
                 
                  </div>";
              }

            ?>
            <i class="fab fa-centercode"></i>
            <div class="field_w3ls">
              <div class="field-group">
                <input
                  name="firstname"
                  id="text1"
                  type="text"
                  value=""
                  class="firstname"
                  placeholder="Firstname"
                  required
                />
              </div>
              <div class="field-group">
                <input
                  name="lastname"
                  id="text1"
                  type="text"
                  value=""
                  class="lastname"
                  placeholder="Lastname"
                  required
                />
              </div>
              <div class="field-group">
                <input
                  name="phone"
                  id="phone"
                  type="tel"
                  value=""
                  class="phone"
                  placeholder="Phone Number"
                  required
                />
              </div>
              <div class="field-group">
                <input
                  id="password-field"
                  type="password"
                  class="form-control"
                  name="password"
                  value=""
                  class="password"
                  placeholder="Password"
                />
                <span
                  toggle="#password-field"
                  class="fa fa-fw fa-eye field-icon toggle-password"
                ></span>
              </div>
            </div>
            <div class="wthree-field">
              <input
                id="saveForm"
                type="submit"
                value="Get Started"
                name="submit"
              />
            </div>
            <p class="signin">Don't have an account? <a href="login.php">Login here</a></p>
            <p class="terms">
              By signing up, you accept our <a href="#">Terms of use</a> and
              <a href="#">Privicy policy</a>
            </p>
          </form>
        </div>
        <!-- //content bottom -->
      </div>
    </div>
    <div class="copyright text-center">
      <p>
        © 2020 CashContest
        <!-- <a href="http://w3layouts.com">W3layouts</a> -->
      </p>
    </div>
    <!--//copyright-->







<?php


if(isset($_POST['submit'])){


  $firstname = mysqli_real_escape_string($db->conn, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($db->conn, $_POST['lastname']);
  $phone = mysqli_real_escape_string($db->conn, $_POST['phone']);
  $password = mysqli_real_escape_string($db->conn, $_POST['password']);

  $result = $db->setQuery("SELECT * FROM users WHERE phone='$phone';");
  $numrows = mysqli_num_rows($result);

  if($numrows == 0){
    $result = $user->createUser($firstname, $lastname, $phone, $password);

    $result1 = $db->setQuery("SELECT * FROM users WHERE phone='$phone';");
    $row1 = mysqli_fetch_assoc($result1);

    $_SESSION['id'] = $row1['uniqueid'];

    echo '<script>
    window.location.href="../account";
    </script>';
  }else{
    echo '<script>
    window.location.href="signup.php?phone_exists";
    </script>';
  }
 
}









?>










    <script src="js/jquery-2.2.3.min.js"></script>
    <!-- script for show password -->
    <script>
      $(".toggle-password").click(function () {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });






  function validateForm(){

    if($(".phone").val().length != 11){
      alert("Phone number is invalid");
      return false;
    }else{
      return true;
    }

  }










    </script>
    <!-- /script for show password -->
  </body>
  <!-- //Body -->
</html>
