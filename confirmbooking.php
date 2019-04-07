<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';
$bookid = uniqid();
echo $bookid;
$services = $_POST["services"];
$date = $_POST["date"];
$time = $_POST["time"];
echo $services;
echo $date;
echo $time;
$email = $_SESSION['email'];
echo $email;				

if($mysqli->query("INSERT INTO booking (`bookingid`, `date`, `time`, `email`, `status`) VALUES($bookid, '12/02/19', '12:09', 'admin@salon.com', 'pending')")){
	echo 'Booking Added';
	echo '<br/>';
}
else
{
	echo 'Booking Rejected';


}

?>
