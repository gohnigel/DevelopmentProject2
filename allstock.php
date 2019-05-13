<?php
  if(session_id() == '' || !isset($_SESSION)){session_start();}

  include ('config.php');

  if(!isset($_SESSION["email"])) {
    header("location:login.php");
  }

  if($_SESSION["role"]!="admin") {
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
    <div class=banner-div>
      <img class="banner" src="images/banner.JPG" alt="banner">
    </div>
  </header>

  <?php
    $currentPage = "All stock";
    include ('nav.php');
  ?>

  <body>
   <div class="container-fluid">
    <div class="row content">
      <div class="col-xs-12">
        <!--Dont Remove This line(Displays the users name)-->
        <?php echo '<h3>Hi ' .$_SESSION['full_name'] .'</h3>'; ?>
        <h5> Staff Mode</h5>
        <p>Your Currently viewing all stock available</p>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <table id="myTable" class="table table-active">
            <tr class="header">
                <th style="width:11%;">Product ID</th>
                <th style="width:11%;">Item Name</th>
                <th style="width:11%;">Brand</th>
                <th style="width:11%;">Qty Avaiable</th>
                <th style="width:11%;">Price</th>
                <th style="width:11%;">Description</th> 
                <th style="width:11%;">Total price</th>
                <th style="width:11%;">Edit product</th> 
                <th style="width:13%;">Delete product</th>                      
            </tr>
            <?php
              $user = $_SESSION["email"];
              $result = $mysqli->query("SELECT * from products");
              if($result) {
                while($obj = $result->fetch_object()) {
                  echo '<tr>';
                  echo '<td>'.$obj->product_code.'</td>';
                  echo '<td>'.$obj->product_name.'</td>';
                  echo '<td>'.$obj->product_brand.'</td>';  
                  echo '<td>'.$obj->qty.'</td>';
                  echo '<td>$'.$obj->price.'</td>';
                  echo '<td>'.$obj->product_desc.'</td>';
                  echo '<td>$'.$obj->qty * $obj->price.'</td>';
                  echo '<td><a href="editstock.php?prod_id='.$obj->product_code.'&prod_name='.$obj->product_name.'&brand='.$obj->product_brand.'&qty='.$obj->qty.'&price='.$obj->price.'&desc='.$obj->product_desc.'"<button class="btn btn-primary">Edit stock</button></a></td>';
                  echo '<td><a href="deletestock.php?prod_id='.$obj->product_code.'"><button class="btn btn-danger" onclick="if(!confirm(\'Are you sure you want to delete this stock?\')) return false;">Delete stock</button></a></td>';
                  echo'</tr>';
                }
              }
            ?>
          </table>
        </div>
      </div>
    </div>
      
    <?php include ('footer.php') ?>      

    <!-- jQuery – required for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- All Bootstrap plug-ins file -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Basic AngularJS -->
    <script src="js/angular.min.js"></script>

  </body>

</html>
