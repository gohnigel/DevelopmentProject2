<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
    
include ('config.php');

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
        <div class=banner-div>
            <img class="banner" src="images/banner.JPG" alt="banner">
        </div>
    </header>

    <?php
		include ('nav.php');
	?>
    <div class="registermessage">
        <h2>Edit profile</h2>
        <p>Edit details in here</p>
    </div>
    <div class="row content">
        <div class="col-xs-12">
            <form method="GET" action="savechanges.php">
                <div id="login">
                   <?php
                    $user = $_SESSION["email"];
                    $result = $mysqli->query("SELECT * from users where email='".$user."'");
                    if($result) {
                      while($obj = $result->fetch_object()) {
                        echo "<p><label for='fullname'>Full name :</label></p>";
                        echo "<p><input type='text' name='full_name' id='fullname' value='".$obj->full_name."'/></p>";
                        echo "<p><label for='Email'>Email :</label></p>";
                        echo "<p><input type='text' name='Email' id='Email' value='".$obj->email."'/></p>";
                        echo "<p><label for='phone'>Phone :</label></p>";
                        echo "<p><input type='text' name='phone' id='phone' value='".$obj->phone."'/></p>";
                        echo "<p><label for='image'>Image :</label></p>";
                        echo "<p><input type='file' name='image' id='image' value='".$obj->image."'/></p>";
                      }
                    }
                  ?>
                </div>
                <p><input type="submit" class="btn btn-success" value="Save changes" /></p>                
            </form>
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
