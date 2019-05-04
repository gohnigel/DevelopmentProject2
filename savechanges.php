<?php

include 'config.php';

$fullname = $_POST['full_name'];
$email = $_POST['Email'];
$phone = $_POST['phone'];
$image = $_FILES['image']['name'];

$result = $mysqli->query("UPDATE users SET full_name='$fullname', Email='$email', phone='$phone', image='$image' WHERE Email='$email'");


if ($result){
	echo 'Changes saved';
	echo '<br/>';
    move_uploaded_file($_FILES["image"]["tmp_name"], 'images/'.$image);
    header ("location:profile.php");
}
else
{
	echo 'Changes not saved';
    header ("location:editprofile.php");

}

?>
