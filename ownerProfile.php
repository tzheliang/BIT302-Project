<?php
  session_start();

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "food4all";
  $con = new mysqli($servername, $username, $password, $dbname);

  $ownerID = $_SESSION['userID'];
  $sql = "SELECT * FROM foodorder WHERE ownerID = '$ownerID'";

  $result = mysqli_query($con, $sql);
  $counter = mysqli_num_rows($result);
  if ($counter == 0) {
    $hasOrder = 0;
  } else {
    $hasOrder = 1;
  }

  function getRestaurantInfo($ownerID, $con) {
    $sql2 = "SELECT restaurantName, location FROM restaurant where ownerID = '$ownerID'";
    $result2 = mysqli_query($con, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $restaurantArray = array('restaurantName'=>$row2['restaurantName'], 'location'=> $row2['location']);
    return $restaurantArray;
  }

  function getFoodInfo($orderID, $con) {
    $sql3 = "SELECT f.foodName, f.price, o.quantity FROM menuitem f, orderitem o WHERE f.foodID = o.foodID AND o.orderID = '$orderID'";
    $result3 = mysqli_query($con, $sql3);
    while ($row3 = mysqli_fetch_assoc($result3)) {
      $foodArray[] = array('foodName'=>$row3['foodName'],'price'=>$row3['price'], 'quantity'=>$row3['quantity']);
    }
    return $foodArray;
  }

?>
<!DOCTYPE html>
<html>

<head>
  <title><?php echo $_SESSION['firstName']?>'s Profile</title>
  <link rel="icon" href="images/Icon.ico" type="image/x-icon">
  <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="./js/jquery-1.9.1.js"></script>
  <script src="./js/bootstrap.js"></script>
  <!-- Custom Theme files -->
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
  <link href="./css/font-awesome.css" rel="stylesheet" type="text/css" media="all"  />
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
  <script>
    var check = <?php
    $check = isset($_SESSION['payment']) ? 1 : 0;
    echo $check;
    ?> ;
    if (check) {
      console.log(check);
      alert("Payment Successful. Thank you for choosing us.");
      simpleCart.empty();
      simpleCart.save();
      $.ajax({
        type: 'POST',
        url: 'payment.php',
        data: {check: 0}
      });
    }
  </script>
</head>

<body>
  <!-- header-section-starts -->
  <div class="header">
    <div class="container">
      <div class="top-header">
        <div class="logo">
          <a href="owner-mainPage.html"><img src="images/logo.png" class="img-responsive" alt="" /></a>
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
    <div class="profile-info">
      <div class="container">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <span><b>Your Business Information</b></span>
            </h4>
          </div>
          <div>
            <div class="panel-body article-wrapper">
              <table class="info-table">
                <tr>
                  <td><b>Owner Name:</b></td>
                  <td><?php echo $_SESSION['fullname']; ?></td>
                </tr>
                <tr>
                  <td><b>Business Email:</b></td>
                  <td><?php echo $_SESSION['email']; ?></td>
                </tr>
                <tr>
                  <td><b>Restaurant Area:</b></td>
                  <td><?php echo $_SESSION['address']; ?></td>
                </tr>
                <tr>
                  <td><b>Contact Number:</b></td>
                  <td><?php echo $_SESSION['contactNumber']; ?></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- reuse bottom code for order booking -->
    <div class="order-summary">
      <div class="container">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <span><b>Your Order Bookings</b></span>
            </h4>
          </div>
          <div>
            <div class="panel-body article-wrapper table-responsive">
              <?php
                if (!$hasOrder) {
                  echo "
                    <div class='no-orders'>
                      <h2>You have no order for your restaurant.</h2>
                      </div>
                  ";
                } else {
                  $orderCount = 0;
                  while ($row = mysqli_fetch_assoc($result)) {
                    $restaurantArray = getRestaurantInfo($row['ownerID'], $con);
                    $collapseDivID = "order".$row['orderID'];
                    $divID = "collapse".$row['orderID'];
                    $divIDTarget = "#".$divID;
                    echo "
                      <table class='table table-hover profile-table'>
                        <tr>
                          <th>Order no.</th>
                          <th>Order Date</th>
                          <th>Total Price</th>
                          <th>Restaurant</th>
                          <th>Restaurant Location</th>
                          <th>Delivery Status</th>
                        </tr>
                        <tr>
                          <td>".++$orderCount."</td>
                          <td>".date('d-m-Y',strtotime($row['timestamp']))."</td>
                          <td>".$row['totalPrice']."</td>
                          <td>".$restaurantArray['restaurantName']."</td>
                          <td>".$restaurantArray['location']."</td>
                          <td>".$row['deliveryStatus']."</td>
                        </tr>
                      </table>
                      <div class='panel-group'>
                        <div class='panel panel-default'>
                          <div id=".$collapseDivID." class='panel-heading menu-panel' href=".$divIDTarget." data-toggle='collapse'>
                            <p>Ordered Items List</p>
                            <i class='pull-right fa fa-chevron-circle-down fa-chevron-circle-up'></i>
                            <div class='clearfix'></div>
                          </div>
                          <div id=".$divID." class='panel-collapse collapse order-panel'>";
                          $foodArray = getFoodInfo($row['orderID'], $con);
                          // $foodCount = 0;
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
        <a class="acount-btn" href="owner-mainPage.html">Proceed to your restaurant</a>
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
    //   console.log(div);
    //   div.click(function() {
    //     div.find("i").toggleClass("fa-chevron-circle-down");
    //     // if (div.find("i").hasClass('fa-chevron-circle-down')) {
    // //       div.find("i").removeClass('fa-chevron-circle-down').addClass('fa-chevron-circle-up');
    // //       console.log('one');
    // //     } else {
    // //       div.find("i").addClass('fa-chevron-circle-down').removeClass('fa-chevron-circle-up');
    // //       console.log('two');
    // //     }
    //   });



  </script>
  <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

</body>

</html>
