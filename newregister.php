<?php

include 'config.php';

$fullname = $_POST["full_name"];
$email = $_POST["Email"];
$password = $_POST["Password"];
$phone = $_POST["phone"];

if($mysqli->query("INSERT INTO users (email, full_name, password, phone, role) VALUES('$email', '$fullname', '$password', '$phone', 'client')")){
	echo 'User Added';
	echo '<br/>';
    header ("location:login.php");
}
else
{
	echo 'User Rejected';
    header ("location:signup.php");

}

?>
