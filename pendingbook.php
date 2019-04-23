<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
    
include ('config.php');

if(!isset($_SESSION["email"])) {
  header("location:login.php");
}

if($_SESSION["role"]!="admin") {
  header("location:index.php");
}
?>
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
    <button onclick="goBack()" style="margin-left:20px;" class="btn btn-info">&laquo; Back</button>
    <div class="container-fluid">
    <div class="row content">
        <div class="col-xs-12">
            <!--Dont Remove This line(Displays the users name)-->
            <p><?php echo '<h3>Hi ' .$_SESSION['full_name'] .'</h3>'; ?></p>
            <h5> Staff Mode</h5>
            <p><strong>Your Currently viewing all pending appointments</strong></p>
            <p><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Customer Name" style="margin-top:20px;width:50%"></p>
        </div>
      </div>
    <div class="row">       
        <div class="col-xs-12">
            <table id="myTable" class="table table-active">
                <tr class="header">
                    <th style="width:40%;">Booking ID</th>
                    <th style="width:40%;">Customer Name</th>
                    <th style="width:60%;">Date</th>
                    <th style="width:60%;">Time</th>
                    <th style="width:40%;">Status</th>
                    <th style="width:60%;">Confirm Appointment</th>
                    <th style="width:60%;">Reshedule Appointment</th>
                    <th style="width:60%;">Cancel Appointment</th>
                </tr>
                <?php
          $user = $_SESSION["email"];
          $result = $mysqli->query("SELECT      `booking`.bookingid, `users`.`full_name`, `booking`.`date`, `booking`.`time`, `booking`.`status`, `booking`.`email`
FROM        `booking`
INNER JOIN  `users` ON `booking`.email = `users`.email
WHERE `status` = 'pending' OR `status` = 'Please Reshedule' OR `status` = 'Resheduled'
ORDER BY    `booking`.bookingid
");
          if($result) {
            while($obj = $result->fetch_object()) {
			  echo '<tr>';
              echo '<td>'.$obj->bookingid.'</td>';
              echo '<td>'.$obj->full_name.'</td>';
			  echo '<td>'.$obj->date.'</td>';
			  echo '<td>'.$obj->time.'</td>';
			  echo '<td>'.$obj->status.'</td>';
            echo '<td><a href="bookconfirm.php?bookingid=' .$obj->bookingid. '&email='.$obj->email. '&full_name='.$obj->full_name.'&status='.$obj->status.'"><button class="btn btn-primary">Confirm</button></a>';
			  echo '<td><a href="staffreshedule.php?bookingid=' .$obj->bookingid. '&email='.$obj->email. '&full_name='.$obj->full_name.'&status='.$obj->status.'"><button class="btn btn-warning">Reschedule</button></a>';
                echo '<td><a  href="bookcancel.php?bookingid=' .$obj->bookingid. '&email='.$obj->email. '&full_name='.$obj->full_name.'&status='.$obj->status.'"><button class="btn btn-danger">Cancel </button></a>';
			  

			  echo'</tr>';

            }
          }
        ?>
            </table>




        </div>
    </div>
  </div>

    <script>
        function myFunction() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function goBack() {
            window.history.back();
        }

    </script>





    <!-- jQuery – required for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- All Bootstrap plug-ins file -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Basic AngularJS -->
    <script src="js/angular.min.js"></script>
    <script src="js/slideshow.js"></script>

</body>
<?php
		include ('footer.php');
	?>

</html>
