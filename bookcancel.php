<?php

include 'config.php';
include 'mail.php';


$id = $_GET['bookingid']; 
$email = $_GET['email'];


    $mysqli->query("UPDATE booking SET status = 'Canceled' WHERE bookingid='".$id."'");
    $mail ->Subject = 'Appointment Update';
   $mail ->Body = 'Dear '.$full_name.',<br>
   We Would like to inform that the booking  the following Booking Reference<b>: '.$id.'</b> has been canceled.<br> Thank You,<br> Smile and Style Kuching';
   $mail ->AddAddress($email);

   if(!$mail->Send())
   {
       echo "Mail Not Sent";
   }
   else
   {
       echo "Mail Sent";
   }


			
		mysqli_close($mysqli);
		header("Location: pendingbook.php");
?>


