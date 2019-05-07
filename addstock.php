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
    <div class=banner-div>
        <img class="banner" src="images/banner.JPG" alt="banner">
    </div>
</header>

<?php
  $currentPage = 'Add stock';
  include ('nav.php');
?>

<body>
  <div class="container-fluid"> 
    <div class="row content">
        <div class="col-xs-12">
            <!--Dont Remove This line(Displays the users name)-->
            <?php echo '<h3>Hi ' .$_SESSION['full_name'] .'</h3>'; ?>
            <p>Add Inventory Item</p>
            <p><?php if(isset($_SESSION['message'])) echo $_SESSION['message']; ?></p>
            <form method="POST" action="addedstock.php">
                <div id="booking">
                    <p><label for="prod_id">Product Id</label></p>
                    <input type="text" name="prod_id" id="prod_id" required>
                    <p><label for="prod_inventory">Inventory Name</label></p>
                    <input type="text" name="prod_inventory" id="prod_inventory" required>
                    <p><label for="prod_brand">Brand</label></p>
                    <p><input type="text" name="prod_brand" id="prod_brand" required></p>
                    <p><label for="prod_qty">Quantity Avaiable</label></p>
                    <input type="text" name="prod_qty" id="prod_qty" required>
                    <p><label for="prod_price">Price</label></p>
                    <p><input type="text" name="prod_price" id="prod_price" required></p>
                    <p><label for="prod_desc">Description</label></p>
                    <p><input type="text" name="prod_desc" id="prod_desc"></p>
                </div>
                <p><input type="submit" name="submit" class="btn btn-success" value="Add to Inventory" />
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

</body>
<?php
		include ('footer.php');
	?>

</html>
