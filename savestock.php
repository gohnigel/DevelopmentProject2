<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
    
include ('config.php');

$id = $_GET['prod_id'];
$name = $_GET['prod_name'];
$brand = $_GET['brand'];
$qty = $_GET['qty'];
$price = $_GET['price'];
$desc = $_GET['desc'];

$mysqli->query("UPDATE `products` SET `product_code` = '$id', `product_name` = '$name', `product_brand` = '$brand', `qty` = '$qty', `price` = '$price', `product_desc` = '$desc' WHERE `products`.`product_code` = '$id'");
mysqli_close($mysqli);
header("location:allstock.php");

?>