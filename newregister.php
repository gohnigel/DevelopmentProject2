<?php

include 'config.php';

$fullname = $_POST["full_name"];
$email = $_POST["Email"];
$password = $_POST["Password"];
$phone = $_POST["phone"];
$image = $_FILES["image"]["name"];

if($mysqli->query("INSERT INTO users (email, full_name, password, phone, role, image) VALUES('$email', '$fullname', '$password', '$phone', 'client', '$image')")){
	echo 'User Added';
	echo '<br/>';
    move_uploaded_file($_FILES["image"]["tmp_name"], 'images/'.$image);
    header ("location:login.php");
}
else
{
	echo 'User Rejected';
    header ("location:signup.php");

}

?>
