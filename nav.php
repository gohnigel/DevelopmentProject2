<?php
/*Check for valid Session*/
if(session_id() == '' || !isset($_SESSION)){session_start();}
require 'config.php';

echo"<nav class='navbar navbar-inverse'>";
echo"<div class='container-fluid'>";
echo"<div class='navbar-header'>";
echo"<a class='navbar-brand' href='index.php'>Style & Smile</a>";
echo"</div>";
echo"<ul class='nav navbar-nav'>";
echo" <li class='active'><a href='#'>Home</a></li>";
echo"<li><a href='#'>About Us</a></li>";
echo"<li><a href='#'>Page 2</a></li>";
echo"<li><a href='#'>Page 3</a></li>";
echo"</ul>";
echo"<ul class='nav navbar-nav navbar-right'>";
/*If condition to show relevant user functions*/
if(isset($_SESSION['email'])){
    echo"<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Log Out</a></li>";
}
else{
echo"<li><a href='signup.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>";
echo"<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
}

echo"</ul>";
echo"</div>";
echo"</nav>";
?>
