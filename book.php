<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
    
include ('config.php');
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
            <p>Add Content booking system here guys</p>
            <form method="POST" action="confirmbook.php">
                <div id="booking">
                    <p><label for="service">Choose your Services :</label></p>

                    <input type="checkbox" name="services[]" value="haircutting"> Hair Cutting<br>
                    <input type="checkbox" name="services[]" value="styling"> Styling<br>
                    <input type="checkbox" name="services[]" value="body_waxing"> Body Waxing<br>
                    <input type="checkbox" name="services[]" value="massages"> Massages<br>
                    <input type="checkbox" name="services[]" value="hair_colouring"> Hair Colouring<br>
                    <input type="checkbox" name="services[]" value="hair_care_services"> Hair Care Services<br>

                    <p><label for="Date">Date :</label></p>
                    <p><input type="date" name="date"></p>

                </div>
                <p><input type="submit" name="submit" class="btn btn-success" value="Make Appointment" />
                    <input type="reset" class="btn btn-success" value="Clear Form" /></p>
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
