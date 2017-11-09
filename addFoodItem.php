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

    function getRestaurantInfo($ownerID, $con) {
      $sql3 = "SELECT restaurantID FROM restaurant where ownerID = '$ownerID'";
      $result1 = mysqli_query($con, $sql3);
      $row2 = mysqli_fetch_assoc($result1);
      $restaurantArray = array('restaurantID'=> $row2['restaurantID']);
      return $restaurantArray;
    }

    if ($passed){
      while ($row = mysqli_fetch_assoc($result)) {
        $restaurantArray = getRestaurantInfo($row['ownerID'], $con);
        $sql2 = "INSERT INTO MenuItem (foodID, foodName, price, status, restaurantID) VALUES('0000', '$foodName', '$price', '$status', '$restaurantArray['restaurantID']')";
        if (mysqli_query($con, $sql2)){
          header("location: owner-mainPage.html");
        } else {
          echo "Cannot perform query";
        }
      }
    }
  } else {
    echo "Fail";
  }

  mysqli_close($con);

?>
