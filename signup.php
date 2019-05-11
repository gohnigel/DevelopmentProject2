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
    <link rel="stylesheet" type="text/css" href="css/foundation.css" />
</head>

<body>
    <header>
        <div class=banner-div>
            <img class="banner" src="images/banner.JPG" alt="banner">
        </div>
    </header>

    <?php
        $currentPage = 'Sign up';
		include ('nav.php');
	?>

    <form method="POST" name="validateregister" action="newregister.php" enctype="multipart/form-data" autocomplete="off">
        <div class="row panel panel-default">
            <h3 class="text-center"> Fill in the below details to register for our services</h3>
            <div class="small-10">

                <div class="row">
                    
            
                    <div class="small-4 columns">
                    
                        <label for="right-label" class="right inline">Full Name</label>
                    </div>
                    <div class="small-8 columns">
                        <input type="text" name="full_name" id="right-label" required />
                    </div>
                </div>
                <div class="row">
                    <div class="small-4 columns">
                        <label for="right-label" class="right inline">Email</label>
                    </div>
                    <div class="small-8 columns">
                        <input type="email" name="Email" id="right-label" required />
                    </div>
                </div>
                <div class="row">
                    <div class="small-4 columns">
                        <label for="right-label" class="right inline">Re-enter your Email</label>
                    </div>
                    <div class="small-8 columns">
                        <input type="email" name="ReEmail" id="right-label" required />
                    </div>
                </div>
                <div class="row">
                    <div class="small-4 columns">
                        <label for="right-label" class="right inline">Phone Number</label>
                    </div>
                    <div class="small-8 columns">
                        <input type="text" name="phone" id="right-label" required />
                    </div>
                </div>
                <div class="row">
                    <div class="small-4 columns">
                        <label for="right-label" class="right inline">Enter your Password</label>
                    </div>
                    <div class="small-8 columns">
                        <input type="password" name="Password" id="right-label" required />
                    </div>
                </div>
                <div class="row">
                    <div class="small-4 columns">
                        <label for="right-label" class="right inline">Re-enter your Password</label>
                    </div>
                    <div class="small-8 columns">
                        <input type="password" name="RePassword" id="right-label" required />
                    </div>
                </div>
                <div class="row">
                    <div class="small-4 columns">
                        <label for="right-label" class="right inline">Upload Profile Picture</label>
                    </div>
                    <div class="small-8 columns">
                        <input type='file' name='image' id='right-label' required />
                    </div>
                </div>
                <div class="row">
                    <div class="small-4 columns">



                    </div>
                    <div class="small-8 columns">

                        <input type="submit" class="btn btn-success" value="Register" /> <input type="reset" class="btn btn-success" value="Reset" />
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row" style="margin-top:10px;">
        <div class="small-12">
            <?php
		include ('footer.php');
	?>
        </div>
    </div>



    <!-- jQuery – required for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- All Bootstrap plug-ins file -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Basic AngularJS -->
    <script src="js/angular.min.js"></script>

    <script type="text/javascript">
        window.onload = function() {
            document.getElementsByName("Password").onchange = validatePassword;
            document.getElementByName("RePassword").onchange = validatePassword;
        }

        function validatePassword() {
            var pass2 = document.getElementByName("RePassword").value;
            var pass1 = document.getElementByName("Password").value;
            if (pass1 != pass2)
                document.getElementById("RePassword").setCustomValidity("Passwords Don't Match");
            else
                document.getElementById("RePassword").setCustomValidity('');
        }

    </script>

</body>


</html>
