<?php
  $servername = "localhost";
  $name = "root";
  $password = "";
  $dbname = "food4all";
  $con = new mysqli($servername, $name, $password, $dbname);

  $sql = "SELECT * FROM Restaurant";
  $result = mysqli_query($con, $sql);
  $_SESSION['restaurant'] = $result;

  mysqli_close($con);
?>
