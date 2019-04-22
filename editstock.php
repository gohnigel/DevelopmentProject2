<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
    
include ('config.php');
$id = $_GET['prod_id'];
$name = $_GET['prod_name'];
$qty = $_GET['qty'];
$price = $_GET['price'];
$desc = $_GET['desc'];
$colour = $_GET['colour'];

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
</head>
<header>
    <div class="banner-div">
        <img class="banner" src="images/banner.JPG" alt="banner">
    </div>
</header>

<?php
		include ('nav.php');
	?>

<body>
   <div class="registermessage">
        <h2>Edit stock</h2>
        <p>Edit details in here</p>
    </div>
    <div class="row content">
        <div class="col-xs-12">
            <form method="GET" action="savestock.php">
                <div id="edit">
                    <?php
                        echo "<p><label for='prod_id'>Product ID :</label></p>";
                        echo "<p><input type='text' name='prod_id' id='prod_id' value='".$id."'/></p>";
                        echo "<p><label for='prod_name'>Name :</label></p>";
                        echo "<p><input type='text' name='prod_name' id='prod_name' value='".$name."'/></p>";
                        echo "<p><label for='qty'>Quantity :</label></p>";
                        echo "<p><input type='text' name='qty' id='qty' value='".$qty."'/></p>";
                        echo "<p><label for='price'>Price :</label></p>";
                        echo "<p><input type='text' name='price' id='price' value='".$price."'/></p>";
                        echo "<p><label for='desc'>Description :</label></p>";
                        echo "<p><input type='text' name='desc' id='desc' value='".$desc."'/></p>";
                        echo "<p><label for='colour'>Colour :</label></p>";
                        echo "<p><input type='text' name='colour' id='colour' value='".$colour."'/></p>";
                  ?>
                </div>
                <p><input type="submit" name="submit" class="btn btn-success" value="Save changes" /></p>
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