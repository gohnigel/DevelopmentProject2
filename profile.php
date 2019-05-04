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
    $currentPage = 'Customer profile';
    include ('nav.php');
?>

<body>
   <div class="container-fluid">
    <div class="row content">
        <div class="col-xs-4">
           <?php
              $user = $_SESSION["email"];
              $result = $mysqli->query("SELECT * from users where email='".$user."'");
              if($result) {
                while($obj = $result->fetch_object()) {
                  echo "<img class='proim' src='images/$obj->image' alt='Profile picture'/>";
                ?>
        </div>
        <div class="col-xs-8">
           <?php
                  echo "<p>Name: ".$obj->full_name."</p>";
                  echo "<p>Email: ".$obj->email."</p>";
                  echo "<p>Phone: ".$obj->phone."</p>";
                  echo "<p><a href='editprofile.php?full_name=".$obj->full_name."&email=".$obj->email."&phone=".$obj->phone."'><button class='btn btn-primary'>Edit</button></a></p>";
                }
              }
        ?>
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
