<?php

  if(session_id() == '' || !isset($_SESSION)){session_start();}

  if(isset($_SESSION["email"])){
    header("location:book.php");
  }

  require 'config.php';
?>
<!DOCTYPE html>

<html lang="en">

  <head>
      <title>Salon</title>
      <link href="css/bootstrap.min.css" rel="stylesheet" />
      <link rel="stylesheet" type="text/css" href="css/gui.css" />
      <link rel="stylesheet" type="text/css" href="css/foundation.css" />
  </head>

  <body>
      <header>
        <div class="banner-div">
          <img class="banner" src="images/banner.JPG" alt="banner">
        </div>
      </header>

      <?php
        $currentPage = 'Sign up';
        include ('nav.php');
      ?>
      
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12 panel panel-default">
            <form method="POST" name="validateregister" action="newregister.php" enctype="multipart/form-data" autocomplete="off">
              <h3 class="text-center">Fill in the below details to register for our services</h3>
              <div class="form-group form-adjust">
                <label for="full_name">Full Name</label>  
                <input type="text" name="full_name" id="full_name" required />
                <label for="Email">Email</label>
                <input type="email" name="Email" id="Email" required />
                <label for="reEmail">Re-enter your Email</label>
                <input type="email" name="ReEmail" id="reEmail" required />
                <label for="phone">Phone Number</label>
                <input type="text" name="phone" id="phone" required> 
                <label for="password">Enter your Password</label>
                <input type="password" name="Password" id="password" required />
                <label for="RePassword">Re-enter your Password</label>
                <input type="password" name="RePassword" id="RePassword" required />
                <label for="image">Upload Profile Picture</label>
                <input type='file' name='image' id='image' required />
              </div>  
              <div class="text-center"><input type="submit" class="btn btn-success text-center" value="Register" /> <input type="reset" class="btn btn-success" value="Reset" /></div>
            </form>
          </div>
        </div>
      </div>
      
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <?php include ('footer.php'); ?>
          </div>
        </div>
      </div>

      <!-- jQuery – required for Bootstrap's JavaScript plugins) -->
      <script src="js/jquery.min.js"></script>
      <!-- All Bootstrap plug-ins file -->
      <script src="js/bootstrap.min.js"></script>
      <!-- Basic AngularJS -->
      <script src="js/angular.min.js"></script>

      <script type="text/javascript">
          window.onload = function() {
              document.getElementsByName("Password").onchange = validatePassword;
              document.getElementsByName("RePassword").onchange = validatePassword;
          }

          function validatePassword() {
              var pass2 = document.getElementsByName("RePassword").value;
              var pass1 = document.getElementsByName("Password").value;
              if (pass1 != pass2)
                  document.getElementById("RePassword").setCustomValidity("Passwords Don't Match");
              else
                  document.getElementById("RePassword").setCustomValidity('');
          }

      </script>
      
  </body>
</html>
