<?php
  session_start();

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "food4all";
  $con = new mysqli($servername, $username, $password, $dbname);

  $ownerID = $_SESSION['userID'];
  if (!isset($_SESSION['restaurantID'])) {
    $_SESSION['restaurantID'] = $_POST['restaurantID'];
  }
  $restaurantID = $_SESSION['restaurantID'];
  $sql = "SELECT * FROM MenuItem WHERE restaurantID = '$restaurantID'";

  $result = mysqli_query($con, $sql);
  $counter = mysqli_num_rows($result);
  if ($counter == 0) {
    $hasMenu = 0;
  } else {
    $hasMenu = 1;
  }

  $options = array('Available', 'Out of Stock');

 ?>
<!DOCTYPE html>
<html>

<head>
  <title>Food4All - Your Store</title>
  <link rel="icon" href="images/Icon.ico" type="image/x-icon">
  <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery.min.js"></script>
  <!-- Custom Theme files -->
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
  <!-- Custom Theme files -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="application/x-javascript">
    addEventListener("load", function() {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <!--webfont-->
  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Lobster+Two:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
  <!--Animation-->
  <script src="js/wow.min.js"></script>
  <link href="css/animate.css" rel='stylesheet' type='text/css' />
  <script>
    new WOW().init();
  </script>
  <script src="js/simpleCart.min.js">
  </script>
  <script type="text/javascript" src="js/move-top.js"></script>
  <script type="text/javascript" src="js/easing.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $(".scroll").click(function(event) {
        event.preventDefault();
        $('html,body').animate({
          scrollTop: $(this.hash).offset().top
        }, 1200);
      });
    });
  </script>
</head>

<body>
  <!-- header-section-starts -->
  <div class="header">
    <div class="container">
      <div class="top-header">
        <div class="logo">
          <a href="viewMenu.php"><img src="images/logo.png" class="img-responsive" alt="" /></a>
        </div>
        <div class="queries">
          <p>Questions? Call us !<span>+60125201314 </span><label>(10AM to 10PM)</label></p>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="menu-bar">
      <div class="container">
        <div class="login-section">
          <ul>
            <?php
               if (!isset($_SESSION['is_login'])){
                 echo "<li><a href='login.html'>Log In</a></li>";
                 echo "<li><h3>|</h3></li>";
                 echo "<li><a href='register.html'>Register</a></li>";
               }
               else {
                 echo "<li><a href='ownerProfile.php'>Logged in as ".$_SESSION['username']."</a></li>";
                 echo "<li><h3>|</h3></li>";
                 echo "<li><a href='signout.php'>Sign Out</a></li>";
               }
             ?>
            <div class="clearfix"></div>
          </ul>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <!-- header-section-ends -->
  <!-- content-section-starts -->
  <div class="content">
    <a class="acount-btn" href="owner-addfooditem.html">Add New Menu</a>
    <div class="order-summary">
      <div class="container">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <span><b>Your Menu Items</b></span>
            </h4>
          </div>
          <div>
            <div class="panel-body article-wrapper table-responsive">

              <?php
                if (!$hasMenu) {
                  echo "
                    <div class='no-orders'>
                      <h2>You have no menu item for your restaurant.</h2>
                      </div>
                  ";
                } else {
                  $menuCount = 0;
                  while ($row = mysqli_fetch_assoc($result)) {
                    $collapseDivID = "restaurant".$row['restaurantID'];
                    $divID = "collapse".$row['restaurantID'];
                    $divIDTarget = "#".$divID;
                    echo "
                      <table class='table table-hover profile-table' id=".$row['restaurantID'].">
                        <tr>
                          <th>Item no.</th>
                          <th>Date Created</th>
                          <th>Item Price</th>
                          <th>Food Name</th>
                          <th>Food Rating</th>
                          <th>Food Status</th>
                          <th></th>
                          <th></th>
                        </tr>
                        <tr>
                          <td>".++$menuCount."</td>
                          <td>".date('d-m-Y',strtotime($row['timestamp']))."</td>
                          <td>".$row['price']."</td>
                          <td>".$row['foodName']."</td>
                          <td>".$row['avgRating']."</td>
                          <td>
                          <select>";
                          foreach ($options as $option) {
                            $selected = $row['status'] == $option ? 'selected' : '';
                            echo "<option ".$selected.">".$option."</option>";
                          }
                          echo "</select>
                          </td>
                          <form action='review.php' method='post'>
                            <td><input type='button' value='Update' class='update-btn updatebtn'/></td>
                          </form>
                          <form action='deleteMenu.php' method='post'>
                            <td><input type='button' value='DELETE' class='update-btn deletebtn'/></td>
                          </form>
                        </tr>
                      </table>
                      <div class='panel-group'>
                        <div class='panel panel-default'>
                          <div id=".$divID." class='panel-collapse collapse order-panel'>";
                          foreach ($foodArray as $food) {
                            echo "<div class='panel-body'>";
                            echo "<p>";
                            echo "Food name: ";
                            echo $food['foodName'];
                            echo "</p>";
                            echo "<p>";
                            echo "Quantity: ";
                            echo $food['quantity'];
                            echo "</p>";
                            echo "<p>";
                            echo "Price: RM";
                            echo $food['price'];
                            echo "</p>";
                            echo "</div>";
                          }
                          echo "
                          </div></div></div>";
                        }
                      }
                      ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-section-ends -->
  <!-- footer-section-starts -->
  <div class="footer">
    <div class="container">
      <p class="wow fadeInLeft" data-wow-delay="0.4s">&copy; 2017 All rights Reserved | Food4All</p>
    </div>
  </div>
  <!-- footer-section-ends -->
  <script type="text/javascript">
    $(document).ready(function() {
      /*
  var defaults = {
  containerID: 'toTop', // fading element id
  containerHoverID: 'toTopHover', // fading element hover id
  scrollSpeed: 1200,
  easingType: 'linear'
};
*/

      $().UItoTop({
        easingType: 'easeOutQuart'
      });

    });
  </script>
  <script>
    $(document).ready(function () {
      $(".menu-panel").click(function() {
        $(this).find('i').toggleClass("fa-chevron-circle-down");
      });
    });

    $(document).ready(function () {
      $(".updatebtn").click(function() {
        $.ajax({
          type: 'POST',
          url: 'updateMenuStatus.php',
          data: {
            update: $(this).closest('table').attr('id'),
            value: $(this).closest('table').find('select').val()
          }
        })
        .done(function() { alert("Status Successfully Updated."); })
        .fail(function() { alert("Status not updated."); })
      });
    });

    $(document).ready(function () {
      $(".deletebtn").click(function() {
        $.ajax({
          type: 'POST',
          url: 'deleteMenu.php',
          data: {
            update: $(this).closest('table').attr('id'),
            value: $(this).closest('table').find('select').val()
          }
        })
        .done(function() { alert("Menu deleted from the system database."); })
        .fail(function() { alert("Deletion failed."); })
      });
    });

  </script>
  <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

</body>

</html>
