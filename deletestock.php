<?php

include 'config.php';

$id = $_GET['prod_id'];

$mysqli->query("DELETE FROM `products` WHERE `products`.`product_code` = '$id'");
mysqli_close($mysqli);
header("location:allstock.php");

?>
