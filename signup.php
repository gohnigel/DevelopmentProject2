<?php

if(session_id() == '' || !isset($_SESSION)){session_start();}

if(isset($_SESSION["email"])){

        header("location:book.php");
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
          <h2>Register</h2>
          <p>Fill in the below details to start using our services</p>
    </div>
    <div class="container-fluid">
      <div class="row content">
          <div class="col-xs-12">
              <form method="POST" name="validateregister" action="newregister.php" enctype="multipart/form-data" autocomplete="off">
                  <div id="login">
                      <p><label for="fullname">Full name :</label></p>
                      <p><input type="text" name="full_name" id="fullname" required /></p>
                      <p><label for="Email">Enter your Email :</label></p>
                      <p><input type="email" name="Email" id="Email" required /></p>
                      <p><label for="ReEmail">Re-enter your Email :</label></p>
                      <p><input type="email" name="ReEmail" id="ReEmail" required /></p>
                      <p><label for="Phone">Phone Number :</label></p>
                      <p><input type="text" name="phone" id="phone" required /></p>
                      <p><label for="Password">Enter your Password :</label></p>
                      <p><input type="password" name="Password" id="Password" required /></p>
                      <p><label for="RePassword">Re-enter your Password :</label></p>
                      <p><input type="password" name="RePassword" id="RePassword" required /></p>
                      <p><label for="image">Select image :</label></p>
                      <p id='image'><input type='file' name='image' id='image' required/></p>
                  </div>
                  <p><input type="submit" class="btn btn-success" value="Register" /> <input type="reset" class="btn btn-success" value="Reset" /></p>
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

<script type="text/javascript">
    window.onload = function() {
        document.getElementById("Password").onchange = validatePassword;
        document.getElementById("RePassword").onchange = validatePassword;
    }

    function validatePassword() {
        var pass2 = document.getElementById("RePassword").value;
        var pass1 = document.getElementById("Password").value;
        if (pass1 != pass2)
            document.getElementById("RePassword").setCustomValidity("Passwords Don't Match");
        else
            document.getElementById("RePassword").setCustomValidity('');
    }

</script>

<?php
		include ('footer.php');
	?>

</html>
