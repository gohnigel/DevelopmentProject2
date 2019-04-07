<?php

if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

$email = $_POST["email"];
$password = $_POST["password"];
$flag = 'true';


$result = $mysqli->query('SELECT email,full_name,password,phone,role from users');

if($result === FALSE){
  die(mysqli_error($mysqli));
  echo"SQL ERROR";
}

if($result){
  while($obj = $result->fetch_object()){
    if($obj->email === $email && $obj->password === $password) {

      $_SESSION['email'] = $email;
      $_SESSION['full_name'] = $obj->full_name;
      $_SESSION['role'] = $obj->role;
      $_SESSION['phone'] = $obj->phone;
    echo '<h1>Success Login!</h1>';
    header ("location:index.php");
    } else {

        if($flag === 'true'){
          redirect();
          $flag = 'false';
        }
    }
  }
}

function redirect() {
  echo '<h1>Invalid Login! </h1>';
  header ("location:login.php");
}

?>
