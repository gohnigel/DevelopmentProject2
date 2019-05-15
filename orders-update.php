<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';
$ref = uniqid(Order);

if(isset($_SESSION['cart'])) {

  $total = 0;
  foreach($_SESSION['cart'] as $product_id => $quantity) {

    $result = $mysqli->query("SELECT * FROM products WHERE id = ".$product_id);

      $mysqli->query("INSERT INTO `notification`(`message`, `status`, `user`, `type`) VALUES ('Your Receive A New Order','unread','staff@salon.com','cart')");
      
    if($result){

      if($obj = $result->fetch_object()) {


        $cost = $obj->price * $quantity;

        $user = $_SESSION["email"];
        $query = $mysqli->query("INSERT INTO orders (order_ref, order_desc, item_code, qty, total,status, customer, shipping_add) VALUES('$ref','$obj->product_name', '$obj->product_code', '$obj->qty', '$cost','Preparing Your Order', '".$_SESSION['email']."','".$_SESSION['add']."')");

        if($query){
          $newqty = $obj->qty - $quantity;
          if($mysqli->query("UPDATE products SET qty = ".$newqty." WHERE id = ".$product_id)){
          }
        }
      }
    }
  }
}

unset($_SESSION['cart']);
header("location:confirmcart.php");

?>
