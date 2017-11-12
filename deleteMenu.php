<?php
  session_start();

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "food4all";

  // Create connection
  $con = new mysqli($servername, $username, $password, $dbname);
  // // Check connection
  // if ($con->connect_error) {
  //   die("Connection failed: " . $con->connect_error);
  // }
  //
  // // sql to delete a record
  // $sql = "DELETE FROM MenuItem WHERE foodID = '$foodID'";
  //
  // if ($con->query($sql) === TRUE) {
  //   echo "Record deleted successfully";
  // } else {
  //   echo "Error deleting record: " . $con->error;
  // }
  if (isset($_POST['submit'])) {
    $foodID = $_POST['food-id'];
    $sql = "DELETE FROM MenuItem WHERE foodID = '$foodID'";
    if (!mysqli_query($con, $sql)) {
      $_SESSION['deleteOK'] = 0;
    }
    header('location:viewMenu.php');
  }

  if (isset($_POST['check'])) {
    unset($_SESSION['deleteOK']);
  }

  mysqli_close($con);
?>
