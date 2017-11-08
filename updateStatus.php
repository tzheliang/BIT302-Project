<?php
  session_start();

  if (isset($_POST['update']) && isset($_POST['value'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "food4all";
    $con = new mysqli($servername, $username, $password, $dbname);

    $orderID = $_POST['update'];
    $value = $_POST['value'];
    $sql = "UPDATE foodorder SET deliveryStatus ='$value' WHERE orderID = '$orderID'";
    mysqli_query($con, $sql);

    mysqli_close();
  }
 ?>
