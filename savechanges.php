<?php

include 'config.php';

$fullname = $_GET['full_name'];
$email = $_GET['Email'];
$phone = $_GET['phone'];
$image = $_GET['image'];

$result = $mysqli->query("UPDATE users SET full_name='$fullname', Email='$email', phone='$phone', image='$image' WHERE Email='$email'");


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

?>
