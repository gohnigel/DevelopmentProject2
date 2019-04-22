<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
    
include ('config.php');

$id = $_GET['prod_id'];
$name = $_GET['prod_name'];
$qty = $_GET['qty'];
$price = $_GET['price'];
$desc = $_GET['desc'];
$colour = $_GET['colour'];

$mysqli->query("UPDATE `stock` SET `prod_id` = '$id', `prod_name` = '$name', `qty` = '$qty', `price` = '$price', `desc` = '$desc', `colour` = '$colour' WHERE `stock`.`prod_id` = '$id'");
mysqli_close($mysqli);
header("location:allstock.php");

?>