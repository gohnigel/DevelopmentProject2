<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
    
include ('config.php');

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
    <link rel="stylesheet" type="text/css" href="css/foundation.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <link rel='stylesheet' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
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
    <div class="container-fluid">
        <div class="row content">
            <div class="col-xs-12">
                <!--Dont Remove This line(Displays the users name)-->
                <p><?php echo '<h3>Hi ' .$_SESSION['full_name'] .'</h3>'; ?></p>
                <p>Fill in the below form to make an appointment</p>
                <form method="POST" action="confirmbooking.php">
                    <div id="booking">
                        <p><label for="services">Choose your Services :</label></p>
                        <p>
                            <select id="services" name="services">
                                <option value="haircutting">Hair Cutting</option>
                                <option value="styling">Styling</option>
                                <option value="body_waxing">Body Waxing</option>
                                <option value="hair_colouring">Hair Colouring</option>
                                <option value="hair_care_services">HairCare Services</option>
                            </select>
                        </p>
                        <?php
                    $user = $_SESSION["role"];
                    $result = $mysqli->query("SELECT * from users where role='admin'");
                    echo "<p><label for='stylist'>Choose Your Stylist :</label></p>";
                        echo "<p><select name='stylist' id='stylist'>";
                      if($result) {
                      while($obj = $result->fetch_object()) {
                        echo "<option value='$obj->full_name' >$obj->full_name</option>";
                          }
                        echo "</select></p>";
                    }
                  ?>
                        <p><label for="Date">Date :</label></p>
                        <p><input type="text" name="date" id="date" placeholder="YYYY/MM/DD" autocomplete="off" required></p>
                        <p><label for="time">Time :</label></p>
                        <p><input type="time" name="time" id="time" required></p>

                    </div>
                    <p><input type="submit" name="submit" class="btn btn-success" value="Make Appointment" />
                        <input type="reset" class="btn btn-success" value="Clear Form" /></p>
                </form>



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
