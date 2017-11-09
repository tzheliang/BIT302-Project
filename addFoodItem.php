<?php
  //Connect to Database
  session_start();

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "food4all";
  $con = new mysqli($servername, $username, $password, $dbname);

  $sql = "SELECT * FROM MenuItem";
  $result = mysqli_query($con, $sql);
  // Initialising variables
  $passed = true;

  if (isset($_POST['submit'])){
    $foodName = $_POST['foodName'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $image = $_POST['image'];

    if ($passed){
      $sql2 = "INSERT INTO Users (foodID, foodName, price, status, image, avgRating, restaurantID) VALUES('0000', '$foodName', '$price', '$status', '$image')";
      if (mysqli_query($con, $sql2)){
        header("location: owner-mainPage.html");
      } else {
        echo "Cannot perform query";
      }
    }
  } else {
    echo "Fail";
  }

  mysqli_close($con);

?>
