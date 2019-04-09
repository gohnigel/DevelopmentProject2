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
            <p>Add Inventory Item</p>
            <form method="POST" action="addedstock.php">
                <div id="booking">
                    <p><label for="service">Product Id</label></p>
                    <input type="text" name="prod_id" required>
                    <p><label for="service">Inventory Name</label></p>
                    <input type="text" name="prod_inventory" required>
                    <p><label for="service">Quantity Avaiable</label></p>
                    <input type="text" name="prod_qty" required>
                    <p><label for="service">Price</label></p>
                    <p><input type="text" name="prod_price" required></p>

                </div>
                <p><input type="submit" name="submit" class="btn btn-success" value="Add to Inventory" />
                    <input type="reset" class="btn btn-success" value="Clear Form" /></p>
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
