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
<!DOCTYPE html>

<html lang="en">

  <head>
      <title>Salon</title>
      <link href="css/bootstrap.min.css" rel="stylesheet" />
      <link rel="stylesheet" type="text/css" href="css/gui.css" />
      <link rel="stylesheet" type="text/css" href="css/foundation.css" />
  </head>
  <header>
      <div class=banner-div>
          <img class="banner" src="images/banner.JPG" alt="banner">
      </div>
  </header>

  <?php
      $currentPage = 'Customer profile';
      include ('nav.php');
  ?>

  <body>
    <div class="container-fluid">
      <div class="row content">
        <div class="col-xs-12 panel panel-default">
            <h3>Customer Profile</h3>
            <?php
          $user = $_SESSION["email"];
          $result = $mysqli->query("SELECT * from users where email='".$user."'");
          if($result) {
            while($obj = $result->fetch_object()) {
              echo "<p><img class='proim' src='images/$obj->image' alt='Profile picture'/></p>";
              echo "<form action='savepicture.php' method='post' enctype='multipart/form-data' autocomplete='off'>";
              echo "<p><input type='hidden' name='email' value='$obj->email'/></p>";
              echo "<p><label for='image'>Change profile picture :</label></p>";
              echo "<p id='profile'><input type='file' name='image' id='image' required/></p>";
              echo "<p><button style='width:100px;'type='submit' class='btn btn-success'>Upload</button></p>";
              echo "</form>";
            ?>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 text-center panel panel-default">
            <?php
              echo "<p>Name: ".$obj->full_name."</p>";
              echo "<p>Email: ".$obj->email."</p>";
              echo "<p>Phone: ".$obj->phone."</p>";
              echo "<p>Address: ".$obj->cust_add."</p>";
              echo "<form action='editprofile.php' method='post'>";
              echo "<p><input type='hidden' name='full_name' value='$obj->full_name'/></p>";                  
              echo "<p><input type='hidden' name='email' value='$obj->email'/></p>";
              echo "<p><input type='hidden' name='phone' value='$obj->phone'/></p>";
              echo "<p><input type='hidden' name='add' value='$obj->cust_add'/></p>";
              echo "<p><input type='hidden' name='password' value='$obj->password'/></p>";
              echo "<p><button style='width:100px;' type='submit' class='btn btn-primary'>Edit</button></p>";
              echo "</form>";
              echo "<p><strong>"; if(isset($_SESSION['profmessage'])) echo $_SESSION['profmessage']; echo "</strong></p>";
            }
          }
          ?>
          </div>
      </div>
    </div>
    
    <?php include ('footer.php'); ?>

    <!-- jQuery – required for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- All Bootstrap plug-ins file -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Basic AngularJS -->
    <script src="js/angular.min.js"></script>
    <script src="js/slideshow.js"></script>
  </body>

</html>
