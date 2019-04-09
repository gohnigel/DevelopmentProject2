<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
    
include ('config.php');

$date = $_GET["date"];
$time = $_GET["time"];
$id = $_GET['bookref']; 

echo $date;
echo $time;
echo $id;

    if($_SESSION["role"] == "client"){
		$mysqli->query("UPDATE booking SET date='$date', time='$time' WHERE bookingid='.$id.'");
        mysqli_close($mysqli);
		header("Location: viewbook.php");
    }
    else if($_SESSION["role"] == "admin"){
        $mysqli->query("UPDATE booking SET date='$date', time='$time' WHERE bookingid='.$id.'");
        mysqli_close($mysqli);
		header("Location: managebook.php");
    }	
?>
