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


$check = $mysqli->query("select * from products where product_code='$id'");
$checkrows = mysqli_num_rows($check);

if($checkrows>0){
  echo "Customer exists";
  $message = 'Items added must be unique';
  $_SESSION['message'] = $message;
  header("Location: addstock.php");
}
else if($mysqli->query("INSERT INTO products (`product_code`, `product_name`,`product_brand`, `product_desc`, `qty`, `price`) VALUES('$id', '$inventory', '$brand', '$desc', '$qty', '$price')")){
    echo"Added Success";
    header("Location: allstock.php");
}
else
{
    echo"Cannot add";
      header("Location: addstock.php");


}


?>