<?php

include 'config.php';
include 'mail.php';


$id = $_GET['bookingid']; 
$email = $_GET['email'];
$full_name = $_GET['full_name'];
$status = $_GET['status'];




   $mail ->Subject = 'Appointment Update';
   $mail ->Body = 'Dear '.$full_name.',<br>
   This Email is sent to you to confirm that your booking status has changed to <b>Confirmed </b>for the following Booking Reference<b>: '.$id.'</b> <br> Thank You,<br> Smile and Style Kuching';
   $mail ->AddAddress($email);

   if(!$mail->Send())
   {
       echo "Mail Not Sent";
   }
   else
   {
       echo "Mail Sent";
   }

$mysqli->query("UPDATE booking SET status = 'Confirmed' WHERE bookingid='$id'");


		
			
		mysqli_close($mysqli);
		header("Location: pendingbook.php");
?>