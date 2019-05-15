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
      $currentPage = 'About the application';
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
          ?>
            <h3>About this application</h3>
            <p>This website is developed to help Style and Smile House to manage their customers bookings easily, analyse their stock and business performances and produce exportable reports of these performances. The table below describes the functionalities done in this website.</p>
          </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <table class="table table-active">
            <thead>
              <tr>
                <th>Functionalities</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Booking Appointments</td>
                <td>Appointments are booked by choosing the services that are provided, the staff member, the date and the time. After being booked, they can also be confirmed, canceled and completed by the staff.</td>
              </tr>
              <tr>
                <td>Shop</td>
                <td>Customers can shop inventory that still has available stock. The item bought will be stored in the cart. Then, the quantity can be added or reduced. After that, the item can be checked out as an order from the customer. Then, the staff can deliver, ship or cancel the order when necessary.</td>
              </tr>
              <tr>
                <td>Customer Profile</td>
                <td>Customers can edit their profile details such as their name, email, phone, password, address and profile picture by changing their details in the website.</td>
              </tr>
              <tr>
                <td>Inventory</td>
                <td>Staff can add, edit and delete inventory that is available in their company building.</td>
              </tr>
              <tr>
                <td>Staff Performance</td>
                <td>Staff performance is shown based on the number of times chosen by the customers. The report is then shown in a bar chart and table and can be exported as a PDF file.</td>
              </tr>
              <tr>
                <td>Sales Performance</td>
                <td>Sales performance is shown based on quantity sold, total profit and date and time ordered. The report is then shown in a pie chart and table and can be exported as a PDF file.</td>
              </tr>
            </tbody>
          </table>
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

  </body>
</html>
