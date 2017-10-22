<?php
  session_start();
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "food4all";
  $con = new mysqli($servername, $username, $password, $dbname);
  $_SESSION['payment'];
  if (isset($_POST['check'])) {
    $_SESSION['payment'] = 0;
  }

  if (isset($_POST['submit'])) {
    $customerID = $_SESSION['userID'];
    $totalPrice = $_POST['total-price'];
    $restaurantID = $_SESSION['restaurantID'];
    $sql = "SELECT ownerID FROM restaurant WHERE restaurantID = '$restaurantID'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $ownerID = $row['ownerID'];
    $sql2 = "SELECT orderID FROM foodorder";
    $result = mysqli_query($con, $sql2);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount == 0) {
      $orderID = 1;
    } else {
      $orderID = $rowCount+= 1;
    }
    $sql3 = "INSERT INTO foodorder(orderID, deliveryStatus, totalPrice, customerID, ownerID) VALUES ('$orderID','Not Delivered', '$totalPrice', '$customerID', '$ownerID')";
    if (mysqli_query($con, $sql3)) {
      foreach ($_SESSION['cart'] as $item) {
        echo $item['item'];
        $foodname = $item['item'];
        $quantity = $item['quantity'];
        $sql4 = "SELECT foodID FROM menuitem WHERE restaurantID = '$restaurantID' AND foodName = '$foodname'";
        $result = mysqli_query($con, $sql4);
        $row = mysqli_fetch_assoc($result);
        $foodID = $row['foodID'];
        $sql5 = "INSERT INTO orderitem (orderID, foodID, quantity) VALUES ('$orderID', '$foodID', '$quantity')";
        mysqli_query($con, $sql5);
      }
    }
    header("location: profile.php");
    $_SESSION['payment'] = 1;
  }
 ?>
