<?php

    
include ('config.php');

$date = $_POST["date"];
$time = $_POST["time"];
$id = $_POST['bookref']; 

echo $date;
echo $time;
echo $id ;

		$mysqli->query("UPDATE booking SET status = 'Reshedule' WHERE bookingid='.$id.'");
        mysqli_close($mysqli);
		header("Location: viewbook.php");
?>
