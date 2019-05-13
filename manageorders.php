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
    $currentPage = "Orders";
    include ('nav.php');
  ?>

  <body>
    <div class="container-fluid">
      <div class="row content">
        <div class="col-xs-12">
          <!--Dont Remove This line(Displays the users name)-->
          <h5> Staff Mode</h5>
          <p>Your Currently viewing all Orders Placed</p>
      </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <table id="myTable" class="table table-active table-hover">
            <tr class="header">
              <th style="width:9%;">Order ID</th>
              <th style="width:11%;">Product Name</th>
              <th style="width:11%;">Product Code</th>
              <th style="width:11%;">Qty Sold</th>
              <th style="width:11%;">Total Amount</th>
              <th style="width:11%;">Order Date</th>
              <th style="width:11%;">Status</th>
              <th style="width:14%;">Customer</th>
              <th style="width:11%;">Delivered</th>
              <th style="width:11%;">Shipped</th>
              <th style="width:13%;">Cancelled</th>
            </tr>
            <?php
              $user = $_SESSION["email"];
              $result = $mysqli->query("SELECT * from Orders");
              if($result) {
                while($obj = $result->fetch_object()) {
                  echo '<tr>';
                  echo '<td>'.$obj->order_id.'</td>';
                  echo '<td>'.$obj->order_desc.'</td>';
                  echo '<td>'.$obj->item_code.'</td>';  
                  echo '<td>'.$obj->total.'</td>';
                  echo '<td>RM '.$obj->qty.'</td>';
                  echo '<td>'.$obj->date.'</td>';
                  echo '<td>'.$obj->status.'</td>';
                  echo '<td>'.$obj->customer.'</td>';
                  echo '<td><a href="orderstatus.php?order_id=' .$obj->order_id. '&action=delivered"><button class="btn btn-primary">Delivered</button></a>';
                  echo '<td><a href="orderstatus.php?order_id=' .$obj->order_id. '&action=shipped"><button class="btn btn-primary">Shipped</button></a>';
                  echo '<td><a  href="orderstatus.php?order_id=' .$obj->order_id. '&action=cancel"><button class="btn btn-danger">Cancelled </button></a>';
                  echo'</tr>';
                }
              }
            ?>
          </table>
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

  </body>

</html>
