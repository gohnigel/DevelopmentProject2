<?php

include 'config.php';

$fullname = $_POST["full_name"];
$email = $_POST["Email"];
$phone = $_POST["phone"];

$result = $mysqli->query("UPDATE users SET full_name='$fullname', Email='$email', phone='$phone' WHERE Email='$email'");


if ($result){
	echo 'Changes saved';
	echo '<br/>';
    header ("location:profile.php");
}
else
{
	echo 'Changes not saved';
    header ("location:editprofile.php");

}

$_SESSION["full_name"] = $fullname;
$_SESSION["Email"] = $email;
$_SESSION["phone"] = $phone;

?>
