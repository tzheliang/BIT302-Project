<?php
  //Connect to Database
  $errorMsg = "";
  $servername = "localhost";
  $name = "root";
  $password = "";
  $dbname = "food4all_register";
  $con = new mysqli($servername, $username, $password, $dbname);

  if (isset($_POST['submit'])){
    $loginUsername = $_POST['email'];
    $loginPass = $_POST['password'];
    $sql = "SELECT * FROM CUSTOMER where email = '$loginUsername' AND password = '$loginPass'";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_num_rows($result);
    if ($rows == 1){
      /*if ($loginUsername == 'admin@admin.com'){
        header("location: admin.php");
      } else{
        header("location:profile.php");
      }*/
      $row = mysqli_fetch_assoc($result);
      $_SESSION['username'] = $row['username'];
      $_SESSION['fullname'] = $row['firstname']." ".$row['lastname'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['contactNumber'] = $row['contactNumber'];
      $_SESSION['is_login'] = 1;
    }
    else{
      $errorMsg = "Invalid Username or password.";
    }

  }

  mysqli_close($con);
?>
