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
            <h5> Staff Mode</h5>
            <p>Your Currently viewing all stock available</p>
        </div>
        <div class="col-xs-2">
        </div>
        <div class="col-xs-8">
                <table id="myTable" class="table table-active">
                    <tr class="header">
                        <th style="width:40%;">Product ID</th>
                        <th style="width:40%;">Item Name</th>
                        <th style="width:60%;">Qty Avaiable</th>
                        <th style="width:60%;">Price</th>
                    </tr>
                    <?php
          $user = $_SESSION["email"];
          $result = $mysqli->query("SELECT * from stock");
          if($result) {
            while($obj = $result->fetch_object()) {
			  echo '<tr>';
              echo '<td>'.$obj->prod_id.'</td>';
              echo '<td>'.$obj->prod_name.'</td>';
			  echo '<td>'.$obj->qty.'</td>';
			  echo '<td>'.$obj->price.'</td>';
			 
			  echo'</tr>';

            }
          }
        ?>
                </table>




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
