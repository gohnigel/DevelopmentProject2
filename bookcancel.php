<?php

include 'config.php';
include 'mail.php';


$id = $_GET['bookingid']; 
$email = $_GET['email'];


    $mysqli->query("UPDATE booking SET status = 'Canceled' WHERE bookingid='".$id."'");
   
$mysqli->query("INSERT INTO `notification`(`message`, `status`, `user`, `type`) VALUES ('Your Recent Appointment has been Cancelled, Please Contact us for more information','unread','".$_GET['email']."','update')");

			
		mysqli_close($mysqli);
		header("Location: pendingbook.php");
?>


