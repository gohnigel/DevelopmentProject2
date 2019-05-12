<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
    
include 'config.php';
include 'mail.php';


$id = $_GET['bookingid']; 
$email = $_GET['email'];
$full_name = $_GET['full_name'];

$mysqli->query("INSERT INTO `notification`(`message`, `status`, `user`, `type`) VALUES ('We are sorry but we are unable to serve you on the requested date. please reshedule.','unread','".$_GET['email']."','update')");


 
$mysqli->query("UPDATE booking SET status = 'Please Reshedule' WHERE bookingid='$id'");
        mysqli_close($mysqli);
		header("Location: pendingbook.php");
?>