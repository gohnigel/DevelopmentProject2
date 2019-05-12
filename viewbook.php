<?php
  if(session_id() == '' || !isset($_SESSION)){session_start();}

  include ('config.php');

  if(!isset($_SESSION["email"])) {
    header("location:login.php");
  }

  if($_SESSION["role"]!="client") {
    header("location:index.php");
  }

  $_SESSION['message'] = '';
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
    <?php
      $currentPage = 'View client';
      include ('nav.php');
    ?>
     <div class="container-fluid">
      <div class="row content">
        <div class="col-xs-12">
          <!--Dont Remove This line(Displays the users name)-->
          <?php echo '<h3>Hi ' .$_SESSION['full_name'] .'</h3>'; ?>
          <p>Showing All Your Appointments</p>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <table id="myTable" class="table table-active">
              <tr class="header">
                  <th>Booking ID</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Status</th>
                  <th>Reshedule Appointment</th>
                  <th>Cancel Appointment</th>
              </tr>
              <?php
                $user = $_SESSION["email"];
                $result = $mysqli->query("SELECT * from booking where email='".$user."'");
                if($result) {
                  while($obj = $result->fetch_object()) {
                    echo '<tr>';
                    echo '<td>'.$obj->bookingid.'</td>';
                    echo '<td>'.$obj->date.'</td>';
                    echo '<td>'.$obj->time.'</td>';
                    echo '<td>'.$obj->status.'</td>';
                    echo '<td><a href="reshedule.php?bookingid=' .$obj->bookingid. '&date=' .$obj->date. '&time=' .$obj->time. '"><button class="btn btn-warning">Reschedule</button></a>';
                    echo '<td><a  href="cancelbooking.php?bookingid=' .$obj->bookingid. '"><button class="btn btn-danger">Cancel </button></a>';
                    echo'</tr>';
                }
              }
            ?>
          </table>
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
