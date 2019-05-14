<?php

include 'config.php';

$product_code = $_POST['product_code'];
$image = $_FILES['image']['name'];

$result = $mysqli->query("UPDATE products SET image='$image' WHERE product_code='$product_code'");


if ($result){
	echo 'Changes saved';
	echo '<br/>';
    move_uploaded_file($_FILES["image"]["tmp_name"], 'images/'.$image);
    header ("location:allstock.php");
}
else
{
	echo 'Changes not saved';
    header ("location:allstock.php");

}

?>