<?php
  if(session_id() == '' || !isset($_SESSION)){session_start();}
    
  include ('config.php');
  $id = $_GET['bookingid']; 

  if(!isset($_SESSION["email"])) {
    header("location:login.php");
  }

  if($_SESSION["role"]!="admin") {
    header("location:index.php");
    
  $_SESSION['message'] = '';  
}

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
  <?php
    $currentPage = 'Manage book';  
    include ('nav.php');
  ?>
  <body>
     <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 panel panel-default">
            <!--Dont Remove This line(Displays the users name)-->
            <?php echo '<h3 class="text-center">Hi ' .$_SESSION['full_name'] .'</h3>'; ?>
            <p class="text-center">Add a note on the following appointment and confirm appointment</p>
            <form method="GET" action="complete.php">
                <div class="form-group form-adjust">
                    <h4>Booking Reference</h4>
                    <?php echo"<p><input type='text' name = 'bookref' value='$id' /></p>"; ?>
                    <p><label for="note">Make Note a note on this Appointment (Optional)</label></p>
                    <p><input type='text' name='note' id='note'>
                </div>
                <p class="text-center"><input type="submit" name="submit" class="btn btn-success" value="Complete Appointment"/></p>
            </form>
        </div>
      </div>
    </div>
      
    <?php include ('footer.php'); ?>
  
    <!-- jQuery – required for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- All Bootstrap plug-ins file -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Basic AngularJS -->
    <script src="js/angular.min.js"></script>
    <script src="js/slideshow.js"></script>

  </body>

</html>

