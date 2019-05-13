<?php
  if(session_id() == '' || !isset($_SESSION)){session_start();}

  include ('config.php');

  if(!isset($_SESSION["email"])) {
    header("location:login.php");
  }
  header( "refresh:2;url=orders.php" );

  $_SESSION['profmessage'] = '';
  $_SESSION['bookmessage'] = '';
?>
<!DOCTYPE html>

<html lang="en">

  <head>
    <title>Salon</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/gui.css" />
    <link rel="stylesheet" type="text/css" href="css/foundation.css" />
  </head>

  <header>
      <div class="banner-div">
          <img class="banner" src="images/banner.JPG" alt="banner">
      </div>
  </header>

  <body>
      <div class="container">
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <h2> Your Order Has Been Successfully Placed !</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
              <h2>Redirecting You To Orders..</h2>
            </div>
          </div>
      </div>
  </body>

</html>
