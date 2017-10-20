<?php
  //Connect to Database
  $erremail = $errpass = $errmobileNo = "";
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "food4all";
  $con = new mysqli($servername, $username, $password, $dbname);
  // SQL Query to check for email
  $sql = "SELECT * FROM Users";
  $result = mysqli_query($con, $sql);
  // Initialising variables
  $passed = true;

  if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['PASSWORD'];
    $cpass = $_POST['cpassword'];
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $mobileNo = $_POST['contactNumber'];

    if ($passed){
      $sql2 = "INSERT INTO Users (userID, username, email, PASSWORD, firstName, lastName, contactNumber) VALUES('11111','$username', '$email', '$pass', '$fname', '$lname', '$mobileNo')";
      if (mysqli_query($con, $sql2)){
        header("location: login.html");
      } else {
        echo "Cannot perform query";
      }
    }
  } else {
    echo "fail";
  }

  mysqli_close($con);
?>
