<?php

if(session_id() == '' || !isset($_SESSION)){session_start();}
    
include ('config.php');

$id = $_POST["prod_id"];
$inventory = $_POST["prod_inventory"];
$qty = $_POST["prod_qty"];
$price = $_POST['prod_price'];
$desc = $_POST["prod_desc"];
$colour = $_POST["prod_colour"];

echo $id;
echo $inventory;
echo $qty;
echo $price;
echo $desc;
echo $colour;


if($mysqli->query("INSERT INTO stock (`prod_id`, `prod_name`, `qty`, `price`, `desc`, `colour`) VALUES('$id', '$inventory', '$qty', '$price', '$desc', '$colour')")){
    echo"Added Success";
    header("Location: allstock.php");
}
else
{
    echo"Cannot add";
    header("Location: addstock.php");

}


?>