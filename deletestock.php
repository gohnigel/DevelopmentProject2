<?php

include 'config.php';

$id = $_GET['prod_id'];

$mysqli->query("DELETE FROM `stock` WHERE `stock`.`prod_id` = '$id'");
mysqli_close($mysqli);
header("location:allstock.php");

?>
