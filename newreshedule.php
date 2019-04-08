<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
    
include ('config.php');

$date = $_POST["date"];
$time = $_POST["time"];
$id = $_POST['bookref']; 

echo $date;
echo $time;
echo $id ;

    if($_SESSION["role"] == "client"){
		$mysqli->query("UPDATE booking SET status = 'Reshedule' WHERE bookingid='.$id.'");
        mysqli_close($mysqli);
		header("Location: viewbook.php");
    }
    else if($_SESSION["role"] == "admin"){
        $mysqli->query("UPDATE booking SET status = 'Reshedule' WHERE bookingid='.$id.'");
        mysqli_close($mysqli);
		header("Location: managebook.php");
    }	
?>
