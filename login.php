<?php

if(session_id() == '' || !isset($_SESSION)){session_start();}

if(isset($_SESSION["email"])){

        header("location:index.php");
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
     <div class="container-fluid">
     
      <header class="row">
          <div class="col-xs-12">
            <h1 id="MainHeading">Hair Salon Online Booking</h1>
         </div>
      </header>

      <?php
		include ('nav.php');
	?>
       
      <div class="row content">
        <div class="col-xs-12">
          <form method="POST" action="verify.php">
            <div id="login">
                <p><label for="email">Enter your Email :</label></p>
                <p><input type="text" name="email" id="email"/></p>
                <p><label for="passwrd">Enter your Password :</label></p> 
                <p><input type="password" name="password" id="password"/></p>
            </div>
          <p><input type="submit" class="button" value="Log in"/></p>
          </form>
        </div>
      </div>
      
      <footer class="row">
          <div class="col-xs-12">
            <p>&copy; All rights reserved.</p>
            <p>This website is not for commercial use. It is for a university project in Swinburne University Technology of Sarawak</p>
          </div>
      </footer>
    
    </div>
    
    <!-- jQuery – required for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- All Bootstrap plug-ins file -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Basic AngularJS -->
    <script src="js/angular.min.js"></script>

  </body>
</html>