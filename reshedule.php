<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
    
include ('config.php');
$id = $_GET['bookingid']; 
$date = $_GET['date'];
$time = $_GET['time'];

if(!isset($_SESSION["email"])) {
  header("location:login.php");
}

if($_SESSION["role"]!="client") {
  header("location:index.php");
}

?>
<!DOCTYPE html>

<html lang="en">

<head>
    <title>Salon</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/gui.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <link rel='stylesheet' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
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
            <p>Select a new date and time to reshedule</p>
            <form method="GET" action="newreshedule.php">
                <div id="reshedule">
                    <h4>Booking Reference</h4>
                    <?php echo"<p><input type='text' name = 'bookref' value=' $id' /></p>"; ?>

                    <p><label for="date">Date :</label></p>
                    <?php echo "<p><input type='text' name='date' id='date' value='$date' autocomplete='off' required></p>"; ?>
                    <p><label for="time">Time :</label></p>
                    <?php echo "<p><input type='time' name='time' id='time' value= '$time' required></p>"; ?>

                </div>
                <p><input type="submit" name="submit" class="btn btn-success" value="Reschedule Appointment" /></p>
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
        <script src="http:////ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js">
    </script>
    <script>
        $(function() {
            $("#date").datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: 0,
                maxDate: "+60D"
            });
        });

    </script>

</body>
<?php
		include ('footer.php');
	?>

</html>
