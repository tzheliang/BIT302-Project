<?php
  //Connect to Database
  $erremail = $errpass = $errmobileNo = "";
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "food4all_register";
  $con = new mysqli($servername, $username, $password, $dbname);
  // SQL Query to check for email
  $sql = "SELECT * FROM CUSTOMER";
  $result = mysqli_query($con, $sql);
  // Initialising variables
  $passed = true;

  if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $mobileNo = $_POST['contactNumber'];
    $test = $mobileNo;
    if (!$result){
      if ($pass != $cpass && $pass < 8){
        $errpass = "*Passwords don't match and is below 8 characters.";
        $passed = false;
      }
      else if ($pass != $cpass){
        $errpass = "*Passwords do not match!";
        $passed = false;
      }
      else if ($pass < 8){
        $errpass = "*Password do not meet minimum 8 characters.";
        $passed = false;
      }
      if (!preg_match("/\d{3}-\d{7}/", $mobileNo)){
        $errmobileNo = "*Mobile number must have 000-0000000 pattern.";
        $passed = false;
      }
    }
    else{
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          if ($row['email'] == $email){
            $erremail = "*Email address has been taken by someone else.";
            $passed = false;
          }
        }
      }
      if ($pass != $cpass && strlen($pass) < 8){
        $errpass = "*Passwords don't match and is below 8 characters.";
        $passed = false;
      }
      else if ($pass != $cpass){
        $errpass = "*Passwords do not match!";
        $passed = false;
      }
      else if (strlen($pass) < 8){
        $errpass = "*Password do not meet minimum 8 characters.";
        $passed = false;
      }
      if (!preg_match("/\d{3}-\d{7}/", $mobileNo)){
        $errmobileNo = "*Mobile number must have 000-0000000 pattern.";
        $passed = false;
      }
    }

    if ($passed){
      $sql2 = "INSERT INTO CUSTOMER VALUES('$username', '$email', '$pass', '$fname', '$lname', '$mobileNo')";
      if (mysqli_query($con, $sql2)){
        header("location: login.php");
      }
    }
  }

  mysqli_close($con);
?>
