<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
    
include ('config.php');

$id = $_GET['bookingid']; 

 
$mysqli->query("UPDATE booking SET status = 'Please Reshedule' WHERE bookingid='$id'");
        mysqli_close($mysqli);
		header("Location: managebook.php");
?>