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
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $add = $_POST['address'];
    $mobileNo = $_POST['contactNumber'];

    if ($passed){
      $sql2 = "INSERT INTO Users (userID, username, email, password, firstName, lastName, address, contactNumber) VALUES('0000','$username', '$email', '$pass', '$fname', '$lname', '$add', '$mobileNo')";
      if (mysqli_query($con, $sql2)){
        header("location: login.html");
      } else {
        echo "Cannot perform query";
      }
    }
  } else {
    echo "Fail";
  }

  mysqli_close($con);
?>
