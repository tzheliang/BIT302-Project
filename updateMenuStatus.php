<?php
  session_start();

  if (isset($_POST['update']) && isset($_POST['value'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "food4all";
    $con = new mysqli($servername, $username, $password, $dbname);

    $foodID = $_POST['update'];
    $value = $_POST['value'];
    $sql = "UPDATE MenuItem SET status ='$value' WHERE foodID = '$foodID'";
    mysqli_query($con, $sql);

    mysqli_close();
  }
 ?>
