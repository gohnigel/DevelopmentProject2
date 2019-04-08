<?php

if(session_id() == '' || !isset($_SESSION)){session_start();}
    
include ('config.php');

$id = $_POST["prod_id"];
$inventory = $_POST["prod_inventory"];
$qty = $_POST["prod_qty"];
$price = $_POST['prod_price'];

echo $id;
echo $inventory;
echo $qty;
echo $price;


if($mysqli->query("INSERT INTO stock (`prod_id`, `prod_name`, `qty`, `price`) VALUES('$id', '$inventory', '$qty', '$price')")){
    echo"Added Success";
    header("Location: allstock.php");
}
else
{


}


?>