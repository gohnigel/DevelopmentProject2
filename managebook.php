<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
    
include ('config.php');

if(!isset($_SESSION["email"])) {
  header("location:login.php");
}

if($_SESSION["role"]!="admin") {
  header("location:index.php");
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
  $currentPage = "Manage book";
  include ('nav.php');
?>

<body>
   <div class="container-fluid">
    <div class="row content">
      <div class="col-xs-12">
          <!--Dont Remove This line(Displays the users name)-->
          <p><?php echo '<h3>Hi ' .$_SESSION['full_name'] .'</h3>'; ?></p>
          <h5> Staff Mode</h5>
          <p><b>Select One of the following buttons to manage appointments</b></p>
      </div>
     </div>
     <div class="row content">
      <div class="col-xs-12">
      <a href="pendingbook.php"><button type="button" class="btn btn-primary">View Pending Appointments</button></a>
        <a href="confirmedbook.php"><button type="button" class="btn btn-primary">View Confirmed Appointments</button></a>
        <a href="completeapoint.php"><button type="button" class="btn btn-primary">View Completed Appointments</button></a>
        <a href="canceledbook.php"><button type="button" class="btn btn-primary">View Cancelled Appointments</button></a>
      </div>
      </div>
    </div>    

    <!-- jQuery – required for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- All Bootstrap plug-ins file -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Basic AngularJS -->
    <script src="js/angular.min.js"></script>
    <script src="js/slideshow.js"></script>

</body>
<?php
		include ('footer.php');
	?>

</html>
