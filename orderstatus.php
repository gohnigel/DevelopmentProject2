<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
    
include ('config.php');

$id = $_GET['order_id'];
$action = $_GET['action'];

echo $id;
echo $action;

if ($action=="shipped")
{
    $mysqli->query("UPDATE `orders` SET `status` = 'Shipped' WHERE `orders`.`order_id` = '$id'");
    header("location:manageorders.php");
    mysqli_close($mysqli);


}
else if ($action=="cancel")
{
    $mysqli->query("UPDATE `orders` SET `status` = 'Cancelled' WHERE `orders`.`order_id` = '$id'");
    header("location:manageorders.php");
    mysqli_close($mysqli);


}
else{
    mysqli_close($mysqli);

}



?>