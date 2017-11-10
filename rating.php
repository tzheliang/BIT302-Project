<?php
  session_start();

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "food4all";
  $con = new mysqli($servername, $username, $password, $dbname);

  $orderID = $_SESSION['order-id'];

  if (isset($_POST['check'])) {
    unset($_SESSION['reviewed']);
  }

  if (isset($_POST['submit'])) {
    if ($_POST['comments'] == '') {
      $comments = "No comments given.";
    } else {
      $comments = $_POST['comments'];
    }
    $sql = "SELECT feedBackID FROM feedback";
    $result = mysqli_query($con, $sql);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount == 0) {
      $feedBackID = 1;
    } else {
      $feedBackID = $rowCount+= 1;
    }

    $sql2 = "INSERT INTO feedback(feedBackID, comments, orderID) VALUES('$feedBackID', '$comments', '$orderID')";
    mysqli_query($con, $sql2);

    $counter = 1;
    foreach ($_POST['foodname'] as $food) {
      $value = $_POST['star'][$counter];
      $sql3 = "INSERT INTO rating(ratingValue, feedBackID, foodID) VALUES('$value', '$feedBackID', '$food')";
      mysqli_query($con, $sql3);
      $counter++;

      $sql4 = "SELECT avg(ratingValue) AS avgValue FROM rating WHERE foodID = '$food'";
      $result4 = mysqli_query($con, $sql4);
      $row = mysqli_fetch_assoc($result4);
      $avgValue = $row['avgValue'];
      $sql5 = "UPDATE menuitem set avgRating = '$avgValue' WHERE foodID = '$food'";
      mysqli_query($con, $sql5);
    }

      $_SESSION['reviewed'] = 1;
  }
  mysqli_close($con);
  header('location:profile.php');
?>
