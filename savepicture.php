<?php

include 'config.php';

$email = $_POST['email'];
$image = $_FILES['image']['name'];

$result = $mysqli->query("UPDATE users SET image='$image' WHERE Email='$email'");


if ($result){
	echo 'Changes saved';
	echo '<br/>';
    move_uploaded_file($_FILES["image"]["tmp_name"], 'images/'.$image);
    header ("location:profile.php");
}
else
{
	echo 'Changes not saved';
    header ("location:profile.php");

}

?>