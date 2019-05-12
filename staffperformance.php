<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
    
include ('config.php');

if(!isset($_SESSION["email"])) {
  header("location:login.php");
}

if($_SESSION["role"]!="admin") {
  header("location:index.php");
}
$result = $mysqli->query("SELECT full_name, COUNT(full_name) as StaffCount
FROM booking
GROUP BY full_name");

?>
<!DOCTYPE html>

<html lang="en">

<head>
    <title>Salon</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/gui.css" />
    <link rel="stylesheet" type="text/css" href="css/foundation.css" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


</head>
<header>
    <div class="banner-div">
        <img class="banner" src="images/banner.JPG" alt="banner">
    </div>
</header>

<?php
  $currentPage = 'Staff performance';
  include ('nav.php');
?>

<body>
  <div class="container-fluid" id="HTMLtoPDF"> 
    <div class="row content">
        <div class="col-xs-12">
            <!--Dont Remove This line(Displays the users name)-->
            <?php echo '<h3>Hi ' .$_SESSION['full_name'] .'</h3>'; ?>
            <h5> Staff Mode</h5>
            <p><b>Your Currently viewing all Staff Performance</b></p>
            <div id="barchart_values" style="width: 1100px; height: 300px;"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2" style="text-align:center;">
           <br>
            <table id="myTable" class="table table-active">
                <tr class="header">
                    <th>Staff Name</th>
                    <th>Number of times chosen by Customer </th>
                </tr>
                <?php
          $user = $_SESSION["email"];
        $result1 = $mysqli->query("SELECT full_name, COUNT(full_name) as StaffCount FROM booking GROUP BY full_name");
                
          if($result1) {
            while($obj = $result1->fetch_object()) {
			  echo '<tr>';
              echo '<td>'.$obj->full_name.'</td>';
              echo '<td>'.$obj->StaffCount.'</td>';
			  echo'</tr>';
            }
          }
        ?>
            </table>
            <button type="button" class="btn btn-primary" onclick="HTMLtoPDF()">Export PDF</button>
        </div>
    </div>
  </div>
    
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Name', 'Times Chosen'],
                <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row['full_name']."', '".$row['StaffCount']."'],";  
                          }  
                          ?>
            ]);
            
        var options = {
        chart: {
            width: 5000,
            height: 500
        }
      };
            var chart = new google.charts.Bar(document.getElementById("barchart_values"));
      chart.draw(data, google.charts.Bar.convertOptions(options));
        }

    </script>
    <!-- jQuery – required for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- All Bootstrap plug-ins file -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Basic AngularJS -->
    <script src="js/angular.min.js"></script>
    <script src="js/slideshow.js"></script>
    <script src="js/jquery-2.1.3.js"></script>
    <script src="js/pdfFromHTML.js"></script>
    <script src="js/jspdf.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</body>
<?php
		include ('footer.php');
	?>

</html>
