<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
    
include ('config.php');

if(isset($_SESSION["email"])){
  $res = $mysqli->query("SELECT * FROM users");
  $row = mysqli_fetch_array($res);
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
        <div class="col-xs-4">
            <img src="images/profile.png" alt="Profile picture"/>
        </div>
        <div class="col-xs-8">
          <form action="editprofile.php">
            <p>Name: <?php echo $row["full_name"] ?></p>
            <p>Email: <?php echo $row["email"] ?></p>
            <p>Phone number: <?php echo $row['phone']?></p>
            <p><button type="submit" class="btn btn-primary">Edit</button></p>
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
