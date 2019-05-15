<!DOCTYPE html>
<html lang="en">

  <head>
      <title>Salon</title>
      <link href="css/bootstrap.min.css" rel="stylesheet" />
      <link rel="stylesheet" type="text/css" href="css/gui.css" />
      <link rel="stylesheet" type="text/css" href="css/foundation.css" />

  </head>
  <header>
      <div class="banner-div">
          <img class="banner" src="images/banner.JPG" alt="banner">
      </div>
  </header>

  <body>
    
    <?php
      $currentPage = 'Home';
      include ('nav.php');
      $_SESSION['profmessage'] = '';
      $_SESSION['bookmessage'] = '';
    ?>
   
    <div class="container-fluid">
      <div class="row content">
        <div class="col-xs-12">
          <?php
          if(session_id() == '' || !isset($_SESSION)){session_start();}

          include ('config.php');

          if(!isset($_SESSION["email"])) {
              header("location:login.php");
          }

          if($_SESSION["role"]=="admin") {
              $user = $_SESSION["email"];
              $result = $mysqli->query("SELECT * from products");
              if($result) {
                while($obj = $result->fetch_object()) {
                  if($obj->qty < 5) {
                    echo '<div class="alert warning" style="padding: 20px;
                            background-color: orange;
                            color: white;
                            margin-bottom: 15px;">';
                    echo '<span class="closebtn" style="margin-left: 15px;
                            color: white;
                            font-weight: bold;
                            float: right;
                            font-size: 22px;
                            line-height: 20px;
                            cursor: pointer;
                            transition: 0.3s;">&times;</span>';
                    echo'<strong>Warning! </strong>'.$obj->product_name.' is in Low stock';
                    echo '</div>';
                  }
                }
              }
            }
            ?>
            <h3>Welcome to Hair Salon Online Booking</h3>
            <p>We have many features to work on for this website itself</p>
          </div>
      </div>
      <div class="row">
          <div class="col-xs-12">
              <div class="slideshow-container">

                  <div class="mySlides fade">
                      <div class="numbertext">1 / 3</div>
                      <img src="images/slide1.jpg" style="width:100%">
                      <div class="text">Caption Text</div>
                  </div>

                  <div class="mySlides fade">
                      <div class="numbertext">2 / 3</div>
                      <img src="images/slide12.jpg" style="width:100%">
                      <div class="text">Caption Two</div>
                  </div>

                  <div class="mySlides fade">
                      <div class="numbertext">3 / 3</div>
                      <img src="images/slide13.jpg" style="width:100%">
                      <div class="text">Caption Three</div>
                  </div>

                  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                  <a class="next" onclick="plusSlides(1)">&#10095;</a>

                  <div class="text-center">
                      <span class="dot" onclick="currentSlide(1)"></span>
                      <span class="dot" onclick="currentSlide(2)"></span>
                      <span class="dot" onclick="currentSlide(3)"></span>
                  </div>
              </div>
          </div>
      </div>
    </div>

    <script>
        var close = document.getElementsByClassName("closebtn");
        var i;

        for (i = 0; i < close.length; i++) {
          close[i].onclick = function() {
            var div = this.parentElement;
            div.style.opacity = "0";
            setTimeout(function() {
                div.style.display = "none";
            }, 600);
          }
        }

        setTimeout(function() {
          $('.alert,warning').slideUp("slow");
          }, 5000);
    </script>

   <?php include ('footer.php'); ?>  

    <!-- jQuery – required for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- All Bootstrap plug-ins file -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Basic AngularJS -->
    <script src="js/angular.min.js"></script>
    <script type="text/javascript" src="js/slideshow.js"></script>

  </body>
</html>
