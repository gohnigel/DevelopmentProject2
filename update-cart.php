<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

$prod_id = $_GET['id'];
$action = $_GET['action'];
$shippingMethod = $_GET["shipping"];


if($action === 'empty')
  unset($_SESSION['cart']);

$result = $mysqli->query("SELECT qty FROM products WHERE id = ".$prod_id);


if($result){

  if($obj = $result->fetch_object()) {

    switch($action) {

      case "add":
      if($_SESSION['cart'][$prod_id]+1 <= $obj->qty)
        $_SESSION['cart'][$prod_id]++;
      break;

      case "remove":
      $_SESSION['cart'][$prod_id]--;
      if($_SESSION['cart'][$prod_id] == 0)
        unset($_SESSION['cart'][$prod_id]);
        break;
	case "shipping": {
		$_SESSION['shipping'] = strtolower($shippingMethod);
		break;
	}



    }
  }
}


header("location:cart.php");

?>
