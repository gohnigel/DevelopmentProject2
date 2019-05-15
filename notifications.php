<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
    
include ('config.php');
$id = $_GET['id'];

$mysqli->query("SELECT * FROM `notification` WHERE `id` = '$id'");



if(!isset($_SESSION["email"])) {
  header("location:login.php");
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
    $currentPage = 'Customer profile';
    include ('nav.php');
?>

<body>
   <div class="container-fluid">
    <div class="row content">
        <div class="col-xs-12 panel panel-default">
             <?php
          $result = $mysqli->query("SELECT * from notification where id='".$id."'");
          if($result) {
            while($obj = $result->fetch_object()) {
			  echo '<h3> Recent Notification</h3>';
              echo '<h4>'.$obj->message.'</h4>';
              echo '<p>'.$obj->date.'</p>';
              

            }
          }
        ?>
        
            

        </div>
        </div>
       
        <!-- jQuery – required for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- All Bootstrap plug-ins file -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Basic AngularJS -->
    <script src="js/angular.min.js"></script>
    <script src="js/slideshow.js"></script>
    <?php
		include ('footer.php');
	?>
    </div>
</body>
    
</html>