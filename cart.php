<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
    
include ('config.php');

if(!isset($_SESSION["email"])) {
  header("location:login.php");
}

if($_SESSION["role"]!="client") {
  header("location:index.php");
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
      $currentPage = 'Cart';

		include ('nav.php');
	?>

<body>
    <div class="container-fluid">
        <div class="row content">
            <div class="col-xs-12">


                <?php
          $delivery = 5;
                           

          echo '<h3>Your Shopping Cart</h3>';

          if(isset($_SESSION['cart'])) {

            $total = 0;
            echo '<table id="myTable">';
            echo '<tr>';
            echo '<th>Name</th>';
            echo '<th>Code</th>';
            echo '<th>Quantity</th>';
            echo '<th>Cost</th>';
            echo '</tr>';
            foreach($_SESSION['cart'] as $product_id => $quantity) {

            $result = $mysqli->query("SELECT product_code, product_name, product_desc, qty, price FROM products WHERE id = ".$product_id);


            if($result){

              while($obj = $result->fetch_object()) {
                $cost = $obj->price * $quantity; 
                $total = $total + $cost; 
                    
                echo '<tr>';
                echo '<td>'.$obj->product_name.'</td>';
				echo '<td>'.$obj->product_code.'</td>';
                echo '<td>'.$quantity.'&nbsp;<a class="button [secondary success alert]" style="padding:5px;" href="update-cart.php?action=add&id='.$product_id.'">+</a>&nbsp;<a class="button alert" style="padding:5px;" href="update-cart.php?action=remove&id='.$product_id.'">-</a></td>';
                echo '<td>'.$cost.'</td>';
                echo '</tr>';
              }
            }

          }
            
           

        $subtotal = 0;
          echo '<tr>';
          echo '<td colspan="3" align="right">Subtotal</td>';
          echo '<td>'.$total.'</td>';
          echo '</tr>';
            echo '<tr>';
          echo '<td colspan="3" align="right">Delivery Charge</td>';
          echo '<td>'.$delivery.'</td>';
          echo '</tr>';

              $subtotal = $total + $delivery;
              
          echo '<tr>';
          echo '<td colspan="3" align="right"><b>Total</b></td>';
          echo '<td><b>'.$subtotal.'</b></td>';
          echo '</tr>';
          
          echo '<tr>';
		  if ($total==0)
          {
              header("location:update-cart.php?action=empty");
          }
              else
              {

              }
              
          echo '<tr>';
          echo '<td colspan="4" align="right"><a href="update-cart.php?action=empty" class="button alert">Empty Cart</a>&nbsp;<a href="shop.php" class="button [secondary success alert]">Continue Shopping</a>';
              
          if(isset($_SESSION['email'])) {
            echo '<a href="orders-update.php"><button style="float:right;">Check Out</button></a>';
            echo'<P><B>Note :</B> Payement Method Currently Supported is only Cash On Delivery</p>';
          }

          else {
            echo '<a href="login.php"><button style="float:right;">Login</button></a>';
          }

          echo '</td>';

          echo '</tr>';
          echo '</table>';
        }

        else {
          echo "You have no items in your shopping cart.";
        }





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
<?php
		include ('footer.php');
	?>

</body>

</html>
