<?php

if(session_id() == '' || !isset($_SESSION)){session_start();}
    
include ('config.php');

if(!isset($_SESSION["email"])) {
  header("location:login.php");
}

if($_SESSION["role"]!="client") {
  header("location:index.php");
}

$bookid = uniqid();
$services = $_POST["services"];
$date = $_POST["date"];
$time = $_POST["time"];
$staff = $_POST["stylist"];
$email = $_SESSION['email'];
$price = 0.00;

$check = $mysqli->query("select * from booking where date='$date' and time='$time'");
$checkrows = mysqli_num_rows($check);

foreach ($services as $s)
{
        if ($s == "haircutting")
        {
            $price += 15.00;
        }
        else if ($s == "styling")
        {
            $price += 30.00;
        }
        else if ($s == "body_waxing")
        {
            $price += 40.00;
        }
        else if ($s == "hair_colouring")
        {
            $price += 100.00;
        }
        else if ($s == "hair_care_services")
        {
            $price += 50.00;
        }
}

if($checkrows == 0){
  $mysqli->query("INSERT INTO booking (`bookingid`, `date`, `time`, `full_name`, `email`, `status`) VALUES('$bookid', '$date', '$time', '$staff', '$email', 'pending')");
  $_SESSION['bookmessage'] = '';
}
else if($checkrows > 0)
{
  echo "Appointment has clashed";
  $_SESSION['bookmessage'] = 'Appointment has clashed';
  header("location:book.php");
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
  $currentPage = 'Book now';
  include ('nav.php');
  ?>

  <body>
    <div class="container-fluid">
      <div class="row content">
          <div class="col-xs-12">
              <!--Dont Remove This line(Displays the users name)-->
              <h3>Booking Placed</h3>
              <h4>One of our staff members will confirm your booking shortly.</h4>
                  <div id="booking">
                      <?php echo '<p>Booking Ref: ' .$bookid .'</p>'; ?>
                      <?php echo '<p>Customer Name: ' .$_SESSION['full_name'] .'</p>'; ?>
                      <?php echo '<p>Date: ' .$date .'</p>'; ?>
                      <?php echo '<p>Time: ' .$time .'</p>'; ?>
                      <?php echo '<p>Stylist: ' .$staff  .'</p>'; ?>
                      <?php echo '<p>Service: '; foreach ($services as $s) { echo $s. ', ';}'</p>'; ?>
                      <?php echo '<p>Price: RM' .$price .'</p>'; ?>
                      <p> Status: Pending Confirmation</p>
                  </div>
                  <p><a class="btn btn-success" href=viewbook.php>Manage Appointments</a></p>
          </div>
      </div>
    </div>
    
    <?php
        include ('footer.php');
    ?>

    <!-- jQuery – required for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- All Bootstrap plug-ins file -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Basic AngularJS -->
    <script src="js/angular.min.js"></script>
    <script src="js/slideshow.js"></script>

  </body>

</html>
