<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
    
include ('config.php');


$id = $_GET['bookref']; 
$note = $_GET["note"];


$newid=trim($id);



    if($_SESSION["role"] == "admin"){
		$mysqli->query("UPDATE booking SET notes='$note',status = 'Completed' WHERE bookingid='$newid'");
        mysqli_close($mysqli);
    header ("location:completeapoint.php");
    }
    else{
        echo"UNAUTHORIZED ACCESS";
    }	
?>
