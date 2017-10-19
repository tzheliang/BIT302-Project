<?php
  $servername = "localhost";
  $name = "root";
  $password = "";
  $dbname = "food4all";
  $con = new mysqli($servername, $name, $password, $dbname);

  if (isset($_POST['submit'])) {
    // $restaurantID = $_POST['submit'];
    // $sql = "SELECT * FROM menuitem WHERE restaurantID = '$restaurantID'";
    // $result = mysqli_query($con, $sql);
    $sql = "SELECT * FROM Restaurant";
    $result = mysqli_query($con, $sql);
    $_SESSION['abc'] = $result;
    header("location: orders-list.html");
    mysqli_close($con);
  }
?>
