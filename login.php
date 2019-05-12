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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Salon</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/gui.css" />
    <link rel="stylesheet" type="text/css" href="css/foundation.css" />
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

  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 panel panel-default">
        <form method="POST" action="verify.php">
          <h3 class="text-center">Enter Your Registered Email and Password</h3>
          <div class="form-group form-adjust">
            <label for="email" placeholder="Staff@Salon.com">Email</label>
            <input type="email" name="email" id="email" required />
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required />
          </div>
          <div class="text-center"><input type="submit" class="btn btn-success" value="Log in" /> <input type="reset" class="btn btn-success" value="Reset"/></div>
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
</body>

</html>
