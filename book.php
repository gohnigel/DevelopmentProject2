
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
