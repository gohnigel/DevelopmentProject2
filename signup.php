<!DOCTYPE html>

<html lang="en">
    <head>
      <title>Salon</title>
      <link href="css/bootstrap.min.css" rel="stylesheet" />
      <link rel="stylesheet" type="text/css" href="css/gui.css" />
    </head>

  <body>
     <div class="container-fluid">
     
      <header class="row">
          <div class="col-xs-12">
            <h1 id="MainHeading">Hair Salon Online Booking</h1>
         </div>
      </header>
      
       <?php
		include ('nav.php');
	?>
     
     <div class="row content">
        <div class="col-xs-12">
         <form  method="POST" action="newregister.php">
            <div id="login">
                <p><label for="fullname">Full name :</label></p>
                <p><input type="text" name="full_name" id="fullname"/></p>
                <p><label for="Email">Enter your Email :</label></p>
                <p><input type="email" name="Email" id="Email"/></p>
                <p><label for="ReEmail">Re-enter your Email :</label></p>
                <p><input type="email" name="ReEmail" id="ReEmail"/></p>
                <p><label for="Phone">Phone Number :</label></p>
                <p><input type="text" name="phone" id="phone"/></p>
                <p><label for="Password">Enter your Password :</label></p> 
                <p><input type="password" name="Password" id="Password"/></p>
                <p><label for="RePassword">Re-enter your Password :</label></p>
                <p><input type="password" name="RePassword" id="RePassword"/></p>
            </div>
            <p><input type="submit" class="button" value="Register"/></p>
          </form>
         </div>
       </div>


      <footer class="row">
        <div class="col-xs-12">
          <p>&copy; All rights reserved.</p>
          <p>This website is not for commercial use. It is for a university project in Swinburne University Technology of Sarawak</p>
        </div>
      </footer>
      
    </div>
    
    <!-- jQuery – required for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- All Bootstrap plug-ins file -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Basic AngularJS -->
    <script src="js/angular.min.js"></script>
  </body>
</html>