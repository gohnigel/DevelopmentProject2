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
    <div class="banner-div">
        <img class="banner" src="images/banner.JPG" alt="banner">
    </div>
</header>

<?php
  $currentPage = 'Shop';
  include ('nav.php');
?>

<body>
   <div class="container-fluid">
    <div class="row content">
        <div class="col-xs-12">
            <h1>Shop</h1>
            <?php
          $i=0;
          $product_id = array();
          $product_quantity = array();

          $result = $mysqli->query('SELECT * FROM stock');
          if($result === FALSE){
            die(mysql_error());
          }

          if($result){

            while($obj = $result->fetch_object()) {

              echo '<div class="col-xs-4" id="shopGrid">';
              echo '<p><h3 style="margin-top:80px">'.$obj->prod_name.'</h3></p>';
              echo '<p><strong>Product Code</strong>: '.$obj->prod_id.'</p>';
                echo '<p><strong>Brand</strong>: '.$obj->brand.'</p>';
              echo '<p><strong>Qty Available</strong>: '.$obj->qty.'</p>';
              echo '<p><strong>Price</strong>: '.$obj->price.'</p>';
                echo '<p><strong>Description</strong>: '.$obj->desc.'</p>';
                echo '<input type="text" placeholder="enter your quantity">';
                


              if($obj->qty > 0){
                echo '<p><a href="update-cart.php?action=add&id='.$obj->prod_id.'"><input type="submit" value="Reserve" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; margin: 10px;padding: 10px;" /></a></p>';
              }
              else {
                echo 'Out Of Stock!';
              }
              echo '</div>';

              $i++;
            }

          }

          $_SESSION['product_id'] = $product_id;


          echo '</div>';
          echo '</div>';
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
