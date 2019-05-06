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
</head>
<header>
    <div class=banner-div>
        <img class="banner" src="images/banner.JPG" alt="banner">
    </div>
</header>

<?php
  $currentPage = 'Orders';
  include ('nav.php');
?>

<body>
    <div class="container-fluid">
        <div class="row content">
            <div class="col-xs-12">
                <h3>Your Orders</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <table id="myTable" class="table table-active">
                    <tr class="header">
                        <th style="width:40%;">Order ID</th>
                        <th style="width:60%;">Ordered Item</th>
                        <th style="width:60%;">Item Code</th>
                        <th style="width:60%;">Qty</th>
                        <th style="width:40%;">Total Price</th>
                        <th style="width:60%;">Date</th>
                        <th style="width:60%;">Status</th>
                    </tr>
                    <?php
          $user = $_SESSION["email"];
          $result = $mysqli->query("SELECT * from orders where customer='".$_SESSION["email"]."'");
          if($result) {
            while($obj = $result->fetch_object()) {
			  echo '<tr>';
              echo '<td>'.$obj->order_id.'</td>';
              echo '<td>'.$obj->order_desc.'</td>';
              echo '<td>'.$obj->item_code.'</td>';
			  echo '<td>'.$obj->qty.'</td>';
			  echo '<td>'.$obj->total.'</td>';
                echo '<td>'.$obj->date.'</td>';
			  echo '<td>'.$obj->status.'</td>';
			  

			  echo'</tr>';

            }
          }
        ?>
                </table>
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

</body>
<?php
		include ('footer.php');
	?>

</html>
