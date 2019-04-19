<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
    
include ('config.php');
$id = $_GET['bookingid']; 


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
</head>
<header>
    <div class=banner-div>
        <img class="banner" src="images/banner.JPG" alt="banner">
    </div>
</header>
<?php
		include ('nav.php');
	?>

<body>
    <div class="row content">
        <div class="col-xs-12">
            <!--Dont Remove This line(Displays the users name)-->
            <p><?php echo '<h3>Hi ' .$_SESSION['full_name'] .'</h3>'; ?></p>
            <p>Add a note on the following appointment and confirm appointment</p>
            <form method="GET" action="complete.php">
                <div id="reshedule">
                    <h4>Booking Reference</h4>
                    <?php echo"<p><input type='text' name = 'bookref' value='$id' /></p>"; ?>
                    <p><label for="note">Make Note a note on this Appointment (Optional)</label></p>
                    <p><input type='textbox' name='note' id='note'>
                </div>
                <p><input type="submit" name="submit" class="btn btn-success" value="Complete Appointment" /></p>
            </form>


            
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

