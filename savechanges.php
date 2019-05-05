<?php

include 'config.php';
session_start();

$fullname = $_POST['full_name'];
$email = $_POST['Email'];
$phone = $_POST['phone'];
$password = $_POST['password'];

$result = $mysqli->query("UPDATE users SET full_name='$fullname', Email='$email', phone='$phone', password='$password' WHERE Email='$email'");


if ($result){
	echo 'Changes saved';
	echo '<br/>';
    $message = 'Password changed';
    $_SESSION['message'] = $message;
    header ("location:profile.php");
}
else
{
	echo 'Changes not saved';
    header ("location:editprofile.php");

}

?>
