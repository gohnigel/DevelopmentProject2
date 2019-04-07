<?php
if(isset($_POST['submit'])){
    $service = $_POST['services'];
  if(empty($service))
  {
      echo("Nothing Selected.");
  }
  else
  {
      $N = count($service);

      echo("You selected $N service(s):");
          for($i=0; $i < $N; $i++)
          {
              echo($service[$i] . " ");
          }
  }
}

?>
