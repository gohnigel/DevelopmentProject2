<?php
  if(session_id() == '' || !isset($_SESSION)){session_start();}
    
  include ('config.php');

  if(!isset($_SESSION["email"])) {
    header("location:login.php");
  }

  if($_SESSION["role"]!="client") {
    header("location:index.php");
  }

  $_SESSION['profmessage'] = '';
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
      <div class="row">
        <div class="col-xs-12 panel panel-default">
          <!--Dont Remove This line(Displays the users name)-->
          <?php echo '<h3 class="text-center">Hi ' .$_SESSION['full_name'] .'</h3>'; ?>
          <p class="text-center">Fill in the below form to make an appointment</p>
          <form method="POST" action="confirmbooking.php">
            <div class="form-group form-adjust">
              <p><label for="services">Choose your Services :</label></p>
              <p>
                <select id="services[]" name="services[]" select size="5" multiple required>
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
            <p class="text-center clash"> <?php if(isset($_SESSION['bookmessage'])) echo $_SESSION['bookmessage']; ?></p>
            <p class="text-center"><input type="submit" name="submit" class="btn btn-success" value="Make Appointment" />
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

    <?php include ('footer.php'); ?>

  </body>

</html>
