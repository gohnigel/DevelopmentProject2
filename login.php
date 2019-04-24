<?php

if(session_id() == '' || !isset($_SESSION)){session_start();}

if(isset($_SESSION["email"])){

        header("location:book.php");
}

?>
<?php
	require 'config.php';
?>

<!DOCTYPE html>

<html lang="en">

  <head>
      <title>Salon</title>
      <link href="css/bootstrap.min.css" rel="stylesheet" />
      <link rel="stylesheet" type="text/css" href="css/gui.css" />
  </head>

  <body>
    <header>
        <div class=banner-div>
            <img class="banner" src="images/banner.JPG" alt="banner">
        </div>
    </header>

    <?php
        $currentPage = 'Login';
		include ('nav.php');
	?>
    <div class="loginmessage">
        <h2>Login</h2>
        <p>Enter Your Registered Email and Password</p>
    </div>

    <div class="container-fluid">
      <div class="row content">
          <div class="col-xs-12">
              <form method="POST" action="verify.php">
                  <div id="login">
                      <p><label for="email">Email :</label></p>
                      <p><input type="text" name="email" id="email" required/></p>
                      <p><label for="passwrd">Password :</label></p>
                      <p><input type="password" name="password" id="password" required/></p>
                  </div>
                  <p><input type="submit" class="btn btn-primary" value="Log in" />  <input type="reset" class="btn btn-primary" value="Reset" /></p>
              </form>
          </div>
      </div>
    </div>

  </body>

    <!-- jQuery – required for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- All Bootstrap plug-ins file -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Basic AngularJS -->
    <script src="js/angular.min.js"></script>
    
     <?php
		include ('footer.php');
	?>

</html>
