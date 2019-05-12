<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
include ('config.php');

$db = mysqli_connect("localhost", "root", "", "salon");

if(!isset($_SESSION["email"])) {
  header("location:login.php");
}

if($_SESSION["role"]!="admin") {
  header("location:index.php");
}
  $msg = "";

if (isset($_POST['submit'])) {
$id = $_POST["prod_id"];
$inventory = $_POST["prod_inventory"];
$brand = $_POST["prod_brand"];
$qty = $_POST["prod_qty"];
$price = $_POST['prod_price'];
$desc = $_POST["prod_desc"];
$check = $mysqli->query("select * from products where product_code='$id'");
$checkrows = mysqli_num_rows($check);

  	$image = $_FILES['image']['name'];

  	$target = "images/products/".basename($image);
if($checkrows>0){
echo "Customer exists";
  $message = 'Items added must be unique';
  $_SESSION['message'] = $message;
  header("Location: addstock.php");
}else{
  	$sql = "INSERT INTO products (`product_code`, `product_name`,`product_brand`, `product_desc`, `qty`, `price`, `image`) VALUES('$id', '$inventory', '$brand', '$desc', '$qty', '$price', '$image')";
  	mysqli_query($db, $sql);
    header("Location: allstock.php");

}

if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
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
            <div class="col-xs-12 panel panel-default">
                <!--Dont Remove This line(Displays the users name)-->
                <?php echo '<h3>Hi ' .$_SESSION['full_name'] .'</h3>'; ?>
                <p>Add Inventory Item</p>
                <p><?php if(isset($_SESSION['message'])) echo $_SESSION['message']; ?></p>
                <form method="POST" action="addstock.php" enctype="multipart/form-data">
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
                        <input type="file" name="image">

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
