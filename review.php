<?php
  session_start();

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "food4all";
  $con = new mysqli($servername, $username, $password, $dbname);

  $orderID = $_POST['order-id'];
  $sql = "SELECT firstName, lastName, email, contactNumber FROM users u, foodorder f WHERE u.userID = f.customerID AND f.orderID = '$orderID'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($result);

  $customerArray = array('fullname'=> $row['firstName']." ".$row['lastName'], 'email'=>$row['email'], 'contactNumber'=>$row['contactNumber']);

  $sql2 = "SELECT m.foodName, r.ratingValue FROM menuitem m, rating r, foodorder o, feedback f WHERE m.foodID = r.foodID AND r.feedBackID = f.feedBackID AND f.orderID = o.orderID AND o.orderID = '$orderID'";
  $result2 = mysqli_query($con, $sql2);

  while ($row2 = mysqli_fetch_assoc($result2)) {
    $foodArray[] = array('foodName'=>$row2['foodName'], 'ratingValue'=>$row2['ratingValue']);
  }

  $sql3 = "SELECT comments FROM feedback WHERE orderID = '$orderID'";
  $result3 = mysqli_query($con, $sql3);
  $row3 = mysqli_fetch_assoc($result3);
  $comments = $row3['comments'];

?>
<!DOCTYPE html>
<html>

<head>
  <title>Review</title>
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
  <div class="content review-info">
    <div class="profile-info">
      <div class="container">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <span><b>Reviewer Information</b></span>
            </h4>
          </div>
          <div>
            <div class="panel-body article-wrapper">
              <table class="info-table">
                <tr>
                  <td><b>Customer Name:</b></td>
                  <td><?php echo $customerArray['fullname']; ?></td>
                </tr>
                <tr>
                  <td><b>Customer Email:</b></td>
                  <td><?php echo $customerArray['email']; ?></td>
                </tr>
                <tr>
                  <td><b>Contact Number:</b></td>
                  <td><?php echo $customerArray['contactNumber']; ?></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- reuse bottom code for order booking -->
    <div class="item-rating">
      <div class="container">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <span><b>Menu Item Ratings</b></span>
            </h4>
          </div>
          <div>
            <ul class="list-group">
              <?php
                foreach($foodArray as $food) {
                  echo "
                  <li class='list-group-item'>
                    <p>Food Name: ".$food['foodName']."</p>
                    <p>Rating: ".$food['ratingValue']." stars</p>
                  </li>";
                }
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="order-summary">
      <div class="container">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <span><b>Customer Comment</b></span>
            </h4>
          </div>
          <div>
            <div class="panel-body article-wrapper table-responsive">
              <?php
                echo "<p>".$comments."</p>"
              ?>
            </div>
          </div>
        </div>
        <input class='update-btn btn-update' type="button" value="Return to Profile Page" onClick={window.history.back();} />
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
  <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

</body>

</html>
