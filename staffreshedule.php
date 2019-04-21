<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
    
include 'config.php';
include 'mail.php';


$id = $_GET['bookingid']; 
$email = $_GET['email'];
$full_name = $_GET['full_name'];


   $mail ->Subject = 'Appointment Update';
   $mail ->Body = 'Dear '.$full_name.',<br>
   We would like to apologize since our staff members are unable to statisfy your needs with the time and date you have provided </b>for the following Booking Reference<b>: '.$id.'</b> Please login to to be able to select another date and time <br> Thank You,<br> Smile and Style Kuching';
   $mail ->AddAddress($email);

   if(!$mail->Send())
   {
       echo "Mail Not Sent";
   }
   else
   {
       echo "Mail Sent";
   }

 
$mysqli->query("UPDATE booking SET status = 'Please Reshedule' WHERE bookingid='$id'");
        mysqli_close($mysqli);
		header("Location: pendingbook.php");
?>