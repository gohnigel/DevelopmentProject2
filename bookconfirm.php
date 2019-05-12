<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';


$id = $_GET['bookingid']; 
$email = $_GET['email'];
$full_name = $_GET['full_name'];
$status = $_GET['status'];

$mysqli->query("INSERT INTO `notification`(`message`, `status`, `user`, `type`) VALUES ('Your Recent Appointment has been Confirmed','unread','".$_GET['email']."','update')");


$mysqli->query("UPDATE booking SET status = 'Confirmed' WHERE bookingid='$id'");


		
			
		mysqli_close($mysqli);
		header("Location: pendingbook.php");
?>