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
  $currentPage = 'Staff performance';
  include ('nav.php');
?>

<body>
  <div class="container-fluid" id="HTMLtoPDF"> 
    <div class="row content">
        <div class="col-xs-12">
            <!--Dont Remove This line(Displays the users name)-->
            <?php echo '<h3>Hi ' .$_SESSION['full_name'] .'</h3>'; ?>
            <h5> Staff Mode</h5>
            <p><b>Your Currently viewing all Staff Performance</b></p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2" style="text-align:center;">
           <br>
            <table id="myTable" class="table table-active">
                <tr class="header">
                    <th>Staff Name</th>
                    <th>Number of times chosen by Customer </th>
                </tr>
                <?php
          $user = $_SESSION["email"];
          $result = $mysqli->query("SELECT users.full_name, (SELECT COUNT(full_name) FROM booking) as StaffCount
FROM booking
INNER JOIN users ON booking.full_name = users.full_name
GROUP BY 1");
          if($result) {
            while($obj = $result->fetch_object()) {
			  echo '<tr>';
              echo '<td>'.$obj->full_name.'</td>';
              echo '<td>'.$obj->StaffCount.'</td>';
			  echo'</tr>';
            }
          }
        ?>
            </table>
            <button type="button" class="btn btn-primary" onclick="HTMLtoPDF()">Export PDF</button>
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
    <script src="js/jquery-2.1.3.js"></script>
    <script src="js/pdfFromHTML.js"></script>
    <script src="js/jspdf.js"></script>

</body>
<?php
		include ('footer.php');
	?>

</html>
