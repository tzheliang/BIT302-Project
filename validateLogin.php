<?php
  //Connect to Database
  session_start();

  $errorMsg = "";
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "food4all";
  $con = new mysqli($servername, $username, $password, $dbname);

  if (isset($_POST['submit'])){
    $loginUsername = $_POST['email'];
    $loginPass = $_POST['password'];
    $sql = "SELECT * FROM Users where email = '$loginUsername' AND password = '$loginPass'";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_num_rows($result);
    if ($rows == 1){

      $row = mysqli_fetch_assoc($result);
      $_SESSION['userID'] = $row['userID'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['fullname'] = $row['firstName']." ".$row['lastName'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['contactNumber'] = $row['contactNumber'];
      $_SESSION['address'] = $row['address'];
      $_SESSION['isCustomer'] = $row['isCustomer'];
      $_SESSION['is_login'] = 1;
      $_SESSION['firstName'] = $row['firstName'];

      if ($_SESSION['isCustomer'] == 1){
        header("location:profile.php");
      }
      else {
        header("location:ownerProfile.php");
      }

    }
    else{
      echo "Invalid username or password.";
      /*$errorMsg = "Invalid username or password.";*/
    }

  }

  mysqli_close($con);
?>
