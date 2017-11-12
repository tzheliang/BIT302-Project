<?php
  //Connect to Database
  session_start();

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "food4all";
  $con = new mysqli($servername, $username, $password, $dbname);

  $restaurantID = $_SESSION['restaurantID'];
  $folderName = array('', 'pizza_hut', 'subway', 'barista', 'papa_johns', 'dominos', 'kfc');

  $target_dir = "images/".$folderName[$restaurantID]."/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

  if (isset($_POST['submit'])){
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    $foodName = $_POST['foodName'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $image = $target_file;

    if ($uploadOk){
      $sql2 = "INSERT INTO MenuItem (foodName, price, status, image, restaurantID) VALUES('$foodName', '$price', '$status', '$image', '$restaurantID')";
      if (mysqli_query($con, $sql2)){
        header("location: viewMenu.php");
      } else {
        echo "Cannot perform query";
      }
    }
  } else {
    echo "Fail";
  }

  mysqli_close($con);

?>
