<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
    
include ('config.php');

if(!isset($_SESSION["email"])) {
  header("location:login.php");
}

if($_SESSION["role"]!="admin") {
  header("location:index.php");
}

$result = $mysqli->query("SELECT order_desc,sum(qty) as number from orders group by order_desc");




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
  $currentPage = 'Sales performance';
  include ('nav.php');
?>

<body>
    <div class="container-fluid" id="HTMLtoPDF">
        <div class="row content">
            <div class="col-xs-12">


                <div style="width:900px;">
                    <h3 align="center">Sales Performance</h3>
                    <br />
                    <div id="piechart" style="width: 900px; height: 500px;"></div>
                </div>
                <H2> Detailed View</H2>
                <table id="myTable" class="table table-active">
                    <tr class="header">
                        <th style="width:60%;">Item Name</th>
                        <th style="width:60%;">Item Code</th>
                        <th style="width:60%;">Qty</th>
                        <th style="width:40%;">Total Price</th>
                    </tr>
                    <?php
          $user = $_SESSION["email"];
          $result1 = $mysqli->query("SELECT * from orders");
          if($result1) {
            while($obj = $result1->fetch_object()) {
			  echo '<tr>';
              echo '<td>'.$obj->order_desc.'</td>';
              echo '<td>'.$obj->item_code.'</td>';
			  echo '<td>'.$obj->qty.'</td>';
			  echo '<td>'.$obj->total.'</td>';
			  

			  echo'</tr>';

            }
          }
        ?>
                </table>
                <button type="button" class="btn btn-primary" onclick="HTMLtoPDF()">Export Sales Performance to PDF</button>




            </div>
        </div>

    </div>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Gender', 'Number'],
                <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["order_desc"]."', ".$row["number"]."],";  
                          }  
                          ?>
            ]);
            var options = {
                title: 'Percentage of the items sold',
                is3D: true,
                pieHole: 0.4
            };
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
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
