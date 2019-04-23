<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
    
include ('config.php');

$id = $_GET['prod_id'];
$name = $_GET['prod_name'];
$brand = $_GET['brand'];
$qty = $_GET['qty'];
$price = $_GET['price'];
$desc = $_GET['desc'];

$mysqli->query("UPDATE `stock` SET `prod_id` = '$id', `prod_name` = '$name', `brand` = '$brand', `qty` = '$qty', `price` = '$price', `desc` = '$desc' WHERE `stock`.`prod_id` = '$id'");
mysqli_close($mysqli);
header("location:allstock.php");

?>