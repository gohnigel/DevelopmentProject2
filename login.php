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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
        $currentPage = 'Login';
		include ('nav.php');
	?>

  
    <form method="POST" action="verify.php" style="margin-top:100px">
        <div class="row">
            <h3 class="text-center">Enter Your Registered Email and Password</h3>
                <div class="small-10">
                <div class="row">
                    <div class="small-4 columns">
                        <label for="right-label" class="right inline" placeholder="Staff@Salon.com">Email</label>
                    </div>
                    <div class="small-8 columns">
                        <input type="email" name="email" id="right-label" required />
                    </div>
                </div>
                <div class="row">
                    <div class="small-4 columns">
                        <label for="right-label" class="right inline">Password</label>
                    </div>
                    <div class="small-8 columns">
                        <input type="password" name="password" id="right-label" required />
                    </div>
                </div>
                <div class="row">
                    <div class="small-4 columns">
                    </div>
                    <div class="small-8 columns">

                        <input type="submit" class="btn btn-primary" value="Log in" id="right-label" /> <input type="reset" class="btn btn-primary" value="Reset" id="right-label" />
                    </div>
                </div>
            </div>
        </div>

    </form>
    <div class="row" style="margin-top:10px;">
        <div class="small-12">



            <!-- jQuery – required for Bootstrap's JavaScript plugins) -->
            <script src="js/jquery.min.js"></script>
            <!-- All Bootstrap plug-ins file -->
            <script src="js/bootstrap.min.js"></script>
            <!-- Basic Angular
</div>JS -->
            <script src="js/angular.min.js"></script>

            <?php
		include ('footer.php');
	?>
        </div>
    </div>
</body>

</html>
