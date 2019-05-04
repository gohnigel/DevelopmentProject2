<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
    
include ('config.php');
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];

if(!isset($_SESSION["email"])) {
  header("location:login.php");
}

if($_SESSION["role"]!="client") {
  header("location:index.php");
}
?>
<?php
	require 'config.php';
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <title>Salon</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/gui.css" />
</head>

<body>
    <header>
        <div class="banner-div">
            <img class="banner" src="images/banner.JPG" alt="banner">
        </div>
    </header>

    <?php
        $currentPage = 'Customer profile';
		include ('nav.php');
	?>
    <div class="registermessage">
        <h2>Edit profile</h2>
        <p>Edit details in here</p>
    </div>
  <div class="container-fluid">
    <div class="row content">
        <div class="col-xs-12">
            <form method="POST" action="savechanges.php">
                <div id="login">
                   <?php
                        echo "<p><label for='fullname'>Full name :</label></p>";
                        echo "<p><input type='text' name='full_name' id='fullname' value='".$full_name."' required/></p>";
                        echo "<p><label for='Email'>Email :</label></p>";
                        echo "<p><input type='text' name='Email' id='Email' value='".$email."' required/></p>";
                        echo "<p><label for='phone'>Phone :</label></p>";
                        echo "<p><input type='text' name='phone' id='phone' value='".$phone."' required/></p>";
                        echo "<p><label for='password'>Password :</label></p>";
                        echo "<p><input type='password' name='password' id='password' value='".$password."' required/></p>";
                  ?>
                </div>
                <p><input type="submit" class="btn btn-success" value="Save changes" /></p>                
            </form>
        </div>
    </div>
  </div>  

</body>



<!-- jQuery – required for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- All Bootstrap plug-ins file -->
<script src="js/bootstrap.min.js"></script>
<!-- Basic AngularJS -->
<script src="js/angular.min.js"></script>
    
     <?php
		include ('footer.php');
	?>

</html>
