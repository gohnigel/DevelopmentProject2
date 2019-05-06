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

$check = $mysqli->query("select * from booking where date='$date' and time='$time'");
$checkrows = mysqli_num_rows($check);

if($checkrows == 0){
  $mysqli->query("INSERT INTO booking (`bookingid`, `date`, `time`, `full_name`, `email`, `status`) VALUES('$bookid', '$date', '$time', '$staff', '$email', 'pending')");
}
else if($checkrows > 0)
{
  echo "Appointment has clashed";
  $message = 'Appointment has clashed';
  $_SESSION['message'] = $message;
  header("location:book.php");
}


?>
<!DOCTYPE html>

<html lang="en">

<head>
    <title>Salon</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/gui.css" />
</head>
<header>
    <div class=banner-div>
        <img class="banner" src="images/banner.JPG" alt="banner">
    </div>
</header>

<?php
  $currentPage = 'Book now';
  include ('nav.php');
?>

<body>
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
                    <?php echo '<p>Service: ' .$services .'</p>'; ?>
                    <p> Status: Pending Confirmation</p>
                </div>
                <p><a class="btn btn-success" href=viewbook.php>Manage Appointments</a></p>


            
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

?>
