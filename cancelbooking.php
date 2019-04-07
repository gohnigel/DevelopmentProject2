<?php

include 'config.php';

$id = $_GET['bookingid']; 

		$mysqli->query("UPDATE booking SET status = 'Canceled' WHERE bookingid='".$id."'");
			
		mysqli_close($mysqli);
		header("Location: viewbook.php");
?>


