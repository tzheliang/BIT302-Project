<?php
  //Connect to Database
  session_start();

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "food4all";
  $con = new mysqli($servername, $username, $password, $dbname);

  $restaurantID = $_SESSION['userID'];

  $sql = "SELECT * FROM MenuItem";
  $result = mysqli_query($con, $sql);
  // Initialising variables
  $passed = true;

  if (isset($_POST['submit'])){
    $foodName = $_POST['foodName'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    if ($passed){
      $sql2 = "INSERT INTO MenuItem (foodID, foodName, price, status, restaurantID) VALUES('0000', '$foodName', '$price', '$status', '$restaurantID')";
      if (mysqli_query($con, $sql2)){
        header("location: viewMenu.php");
      } else {
        echo "Cannot perform query";
      }
    }
  } else {
    echo "Fail";
  }

  mysqli_close($con);

?>
