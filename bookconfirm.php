<?php

include 'config.php';

$id = $_GET['bookingid']; 

		$mysqli->query("UPDATE booking SET status = 'Confirmed' WHERE bookingid='".$id."'");
			
		mysqli_close($mysqli);
		header("Location: managebook.php");
?>