<?php

include 'config.php';
session_start();

$fullname = $_POST['full_name'];
$email = $_POST['Email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$add = $_POST['add'];

$result = $mysqli->query("UPDATE users SET full_name='$fullname',cust_add='$add', Email='$email', phone='$phone', password='$password' WHERE Email='$email'");


if ($result){
	echo 'Changes saved';
	echo '<br/>';
    $message = 'Profile details are changed';
    $_SESSION['message'] = $message;
    header ("location:profile.php");
}
else
{
	echo 'Changes not saved';
    header ("location:editprofile.php");

}

?>
