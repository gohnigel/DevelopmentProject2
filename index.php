<!DOCTYPE html>

<html lang="en">

<head>
    <title>Salon</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/gui.css" />
</head>
<header>
    <div class=banner-div>
        <img class="banner" src="images/banner.JPG" alt="banner">
    </div>
</header>

<?php
		include ('nav.php');
    
?>



<body>


  <div class="container-fluid">
    <div class="row content">
      <div class="col-xs-12">
        <h2>Welcome to Hair Salon Online Booking</h2>
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

    <div class="row content">
      <div class="col-xs-12">   
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus cursus commodo nulla, non dignissim arcu tincidunt maximus. Nulla eget vestibulum mi. In condimentum lectus eget tellus egestas ultrices. Aenean aliquet tempus neque, sed rutrum nulla lacinia et. Etiam volutpat enim eu vestibulum egestas. Etiam luctus quis diam ut bibendum. Aliquam tortor odio, suscipit quis efficitur at, congue pretium tellus. Morbi ullamcorper accumsan ligula in laoreet. Vestibulum blandit massa in purus mollis molestie. Curabitur elementum massa ut quam faucibus, sed egestas mauris tincidunt. Vestibulum faucibus massa laoreet pharetra dignissim. Nam eget eleifend nulla. Maecenas fringilla tellus eget odio volutpat, eu gravida mi blandit. Mauris a faucibus neque, sit amet tristique felis.</p>
      </div>
    </div> 
  </div>





    <!-- jQuery – required for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- All Bootstrap plug-ins file -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Basic AngularJS -->
    <script src="js/angular.min.js"></script>
    <script type="text/javascript" src="js/slideshow.js"></script>

</body>
    <?php
		include ('footer.php');
	?>
</html>
