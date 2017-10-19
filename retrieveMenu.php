<?php
  session_start();

  $servername = "localhost";
  $name = "root";
  $password = "";
  $dbname = "food4all";
  $con = new mysqli($servername, $name, $password, $dbname);

  if (isset($_POST['submit'])) {
    $restaurantID = $_POST['submit'];
    $sql = "SELECT * FROM menuitem where restaurantID = '$restaurantID'";
    $result = mysqli_query($con, $sql);
    $_SESSION['arr'] = [];
    foreach ($result as $row) {
      echo $row['foodID'];
      $_SESSION['arr'][] = $row;
    }

    $sql2 = "SELECT restaurantName FROM restaurant WHERE RestaurantID= '$restaurantID'";
    $result2 = mysqli_query($con, $sql2);
    $row = mysqli_fetch_assoc($result2);
    $_SESSION['restaurantName'] = $row['restaurantName'];
    header("location: orders-list.html");
    mysqli_close($con);
  }
?>
