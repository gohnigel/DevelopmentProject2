<?php
/*Check for valid Session*/
if(session_id() == '' || !isset($_SESSION)){session_start();}
require 'config.php';
    include("functions.php");

?>
<nav class='navbar navbar-inverse'>
    <div class='container-fluid'>
        <div class='navbar-header'>
            <a class='navbar-brand' href='index.php'>Style &amp; Smile</a>
        </div>
        <ul class='nav navbar-nav'>
            <li class='<?php if($currentPage == 'Home') echo 'active' ?>'><a href='#'>Home</a></li>
            <li class='<?php if($currentPage == 'About the application') echo 'active' ?>'><a href='aboutus.php'>About app</a></li>
            <?php
            if(isset($_SESSION['email'])){
              if($_SESSION['role'] == "client"){
            ?>
            <li class='<?php if($currentPage == 'Book now') echo 'active' ?>'><a href='book.php'>Book Now</a></li>
            <li class='<?php if($currentPage == 'View client') echo 'active' ?>'><a href='viewbook.php'>Manage Appointments</a></li>
            <li class='<?php if($currentPage == 'Shop') echo 'active' ?>'><a href='shop.php'>Shop</a></li>
            <li class='<?php if($currentPage == 'Orders') echo 'active' ?>'><a href='orders.php'>My Orders</a></li>
            <li class='<?php if($currentPage == 'Customer profile') echo 'active' ?>'><a href='profile.php'>Customer Profile</a></li>
            <?php    
            }
            else if($_SESSION['role'] == "admin"){
            ?>
            <li class='<?php if($currentPage == 'Manage book') echo 'active' ?>'><a href='managebook.php'>Manage Appointments</a></li>
            <li class='<?php if($currentPage == 'All stock') echo 'active' ?>'><a href='allstock.php'>Inventory</a></li>
            <li class='<?php if($currentPage == 'Add stock') echo 'active' ?>'><a href='addstock.php'>Add Inventory</a></li>
            <li class='<?php if($currentPage == 'Staff performance') echo 'active' ?>'><a href='staffperformance.php'>Staff Performance</a></li>
            <li class='<?php if($currentPage == 'Sales performance') echo 'active' ?>'><a href='salesperformance.php'>Sales Performance</a></li>
            <li class='<?php if($currentPage == 'Orders') echo 'active' ?>'><a href='manageorders.php'>Manage Orders</a></li>

            <?php    
                }	
            }
            ?>
        </ul>
        <ul class='nav navbar-nav navbar-right'>
            <?php
              if(isset($_SESSION['email'])){
            ?>
            <li><?php echo '<h6 style = "color:white;margin-top: 12px;">Welcome, ' .$_SESSION['full_name'] .'</h6>'; ?></li>
            <!--Notification-->
             <li class="nav-item dropdown">
            <a class="nav-link" href="notifications.php" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notifications 
                <?php
                $query = "SELECT * from notification where user='".$_SESSION["email"]."' OR `status` = 'unread' order by `date` DESC";
                if(count(fetchAll($query))>0){
                ?>
                <span class="badge badge-light"><?php echo count(fetchAll($query)); ?></span>
              <?php
                }
              ?>
              </a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
                <?php
                $query = "SELECT * from notification where user='".$_SESSION["email"]."' Order by `date` DESC";
                 if(count(fetchAll($query))>0){
                     foreach(fetchAll($query) as $i){
                ?>
              <a style ="
                         <?php
                            if($i['status']=='unread'){
                                echo "font-weight:bold;";
                            }
                         ?>
                         " class="dropdown-item" href="notifications.php?id=<?php echo $i['id'] ?>">
                <small><i><?php echo date('F j, Y, g:i a',strtotime($i['date'])) ?></i></small><br/>
                  <?php 
                  
                if($i['type']=='update'){
                    echo "Your appointment has been updated.";
                }else if($i['type']=='cart'){
                    echo "Your Recent Order has been updated.";
                }
                  ?>
                </a>
              <div class="dropdown-divider"></div>
                <?php
                     }
                 }else{
                     echo "No Records yet.";
                 }
                     ?>
            </div>
          </li>

            <!--Notification end-->
            <?php  
            }
            else{            
            }

            ?>

            <?php    
            if(isset($_SESSION['email'])){
              if($_SESSION['role'] == 'client')
              {
            ?>
            <li><a href='cart.php'><span class='glyphicon glyphicon-shopping-cart'></span>Shopping Cart</a></li>
            <?php
              }
              else 
              {

              }
            }  ?>


            <?php
            /*If condition to show relevant user functions*/
            if(isset($_SESSION['email'])){
            ?>
            =
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
