<?php
/*Check for valid Session*/
if(session_id() == '' || !isset($_SESSION)){session_start();}
require 'config.php';
?>
<nav class='navbar navbar-inverse'>
<div class='container-fluid'>
<div class='navbar-header'>
  <a class='navbar-brand' href='index.php'>Style &amp; Smile</a>
</div>
<ul class='nav navbar-nav'>
<li class='<?php if($currentPage == 'Home') echo 'active' ?>'><a href='#'>Home</a></li>
<li><a href='#'>About Us</a></li>
<?php
if(isset($_SESSION['email'])){
  if($_SESSION['role'] == "client"){
?>
    <li class='<?php if($currentPage == 'Book now') echo 'active' ?>'><a href='book.php'>Book Now</a></li>
    <li class='<?php if($currentPage == 'View client') echo 'active' ?>'><a href='viewbook.php'>Manage Appointments</a></li>
    <li class='<?php if($currentPage == 'Shop') echo 'active' ?>'><a href='shop.php'>Shop</a></li>
    <li class='<?php if($currentPage == 'Customer profile') echo 'active' ?>'><a href='profile.php'>Customer Profile</a></li>
<?php    
    }
    else if($_SESSION['role'] == "admin"){
?>      
    <li class='<?php if($currentPage == 'Manage book') echo 'active' ?>'><a href='managebook.php'>Manage Appointments</a></li>
    <li class='<?php if($currentPage == 'All stock') echo 'active' ?>'><a href='allstock.php'>Inventory</a></li>
    <li class='<?php if($currentPage == 'Add stock') echo 'active' ?>'><a href='addstock.php'>Add Inventory</a></li>
    <li class='<?php if($currentPage == 'Staff performance') echo 'active' ?>'><a href='staffperformance.php'>Staff Performance</a></li>
<?php    
    }	
}
?>
</ul>
<ul class='nav navbar-nav navbar-right'>
<?php
/*If condition to show relevant user functions*/
if(isset($_SESSION['email'])){
?>
  <li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Log Out</a></li>
<?php  
}
else{
?>  
  <li class='<?php if($currentPage == 'Sign up') echo 'active' ?>'><a href='signup.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>
  <li class='<?php if($currentPage == 'Login') echo 'active' ?>'><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
<?php
}
?>
</ul>
</div>
</nav>
