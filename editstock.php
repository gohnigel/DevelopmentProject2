<?php
  if(session_id() == '' || !isset($_SESSION)){session_start();}

  include ('config.php');
  $id = $_GET['prod_id'];
  $name = $_GET['prod_name'];
  $brand = $_GET['brand'];
  $qty = $_GET['qty'];
  $price = $_GET['price'];
  $desc = $_GET['desc'];

  if(!isset($_SESSION["email"])) {
    header("location:login.php");
  }

  $_SESSION['message'] = '';
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
      <div class="banner-div">
          <img class="banner" src="images/banner.JPG" alt="banner">
      </div>
  </header>

  <?php
    $currentPage = 'All stock';
    include ('nav.php');
  ?>

  <body>
    <div class="container-fluid">   
      <div class="row">
        <div class="col-xs-12 panel panel-default">
         <h3 class="text-center">Edit stock</h3>
         <p class="text-center">Edit details in here</p>
          <form method="GET" action="savestock.php">
            <div class="form-group form-adjust">
                <?php
                    echo "<p><label for='prod_id'>Product ID :</label></p>";
                    echo "<p><input type='text' name='prod_id' id='prod_id' value='".$id."'/></p>";
                    echo "<p><label for='prod_name'>Name :</label></p>";
                    echo "<p><input type='text' name='prod_name' id='prod_name' value='".$name."'/></p>";
                    echo "<p><label for='brand'>Brand :</label></p>";
                    echo "<p><input type='text' name='brand' id='brand' value='".$brand."'/></p>";
                    echo "<p><label for='qty'>Quantity :</label></p>";
                    echo "<p><input type='number' name='qty' id='qty' value='".$qty."'/></p>";
                    echo "<p><label for='price'>Price :</label></p>";
                    echo "<p><input type='number' name='price' id='price' value='".$price."'/></p>";
                    echo "<p><label for='desc'>Description :</label></p>";
                    echo "<p><input type='text' name='desc' id='desc' value='".$desc."'/></p>";
              ?>
            </div>
            <p class="text-center"><input type="submit" name="submit" class="btn btn-success" value="Save changes" /></p>
          </form>            
        </div>
      </div>
    </div>
      
    <?php include ('footer.php'); ?>    

    <!-- jQuery – required for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- All Bootstrap plug-ins file -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Basic AngularJS -->
    <script src="js/angular.min.js"></script>
    <script src="js/slideshow.js"></script>

  </body>

</html>