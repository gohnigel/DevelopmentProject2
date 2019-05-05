<?php

if(session_id() == '' || !isset($_SESSION)){session_start();}
    
include ('config.php');

$id = $_POST["prod_id"];
$inventory = $_POST["prod_inventory"];
$brand = $_POST["prod_brand"];
$qty = $_POST["prod_qty"];
$price = $_POST['prod_price'];
$desc = $_POST["prod_desc"];

echo $id;
echo $inventory;
echo $brand;
echo $qty;
echo $price;
echo $desc;


if($mysqli->query("INSERT INTO stock (`prod_id`, `prod_name`, `brand`, `qty`, `price`, `desc`) VALUES('$id', '$inventory', '$brand', '$qty', '$price', '$desc')")){
    echo"Added Success";
    header("Location: allstock.php");
}
else
{
    echo"Cannot add";
    header("Location: addstock.php");

}


?>