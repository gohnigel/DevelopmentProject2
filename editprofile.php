<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
    
include ('config.php');
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
            <form method="POST" action="savechanges.php">
                <div id="login">
                    <p><label for="fullname">Full name :</label></p>
                    <p><input type="text" name="full_name" id="fullname" value="<?php $fullname = $_SESSION['full_name']; echo $fullname; ?>"/></p>
                    <p><label for="Email">Enter your Email :</label></p>
                    <p><input type="email" name="Email" id="Email" value="<?php $email = $_SESSION['email']; echo $email; ?>"/></p>
                    <p><label for="Phone">Phone Number :</label></p>
                    <p><input type="text" name="phone" id="phone" value="<?php $phone = $_SESSION['phone']; echo $phone; ?>"//></p>
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
