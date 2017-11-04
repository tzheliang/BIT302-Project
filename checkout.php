<?php
  session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <title>Food4All - Payment</title>
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
          <a href="index.html"><img src="images/logo.png" class="img-responsive" alt="" /></a>
        </div>
        <div class="queries">
          <p>Questions? Call us !<span>+60125201314 </span><label>(10AM to 10PM)</label></p>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="menu-bar">
      <div class="container">
        <div class="top-menu">
          <ul>
            <li class="active"><a href="index.html">Home</a></li>|
            <li><a href="popular-restaurants.html">Popular Restaurants</a></li>|
            <li><a href="contact.html">contact</a></li>
            <div class="clearfix"></div>
          </ul>
        </div>
        <div class="login-section">
          <ul>
            <?php
               if (!isset($_SESSION['is_login'])){
                 echo "<li><a href='login.html'>Log In</a></li>";
                 echo "<li><h3>|</h3></li>";
                 echo "<li><a href='register.html'>Register</a></li>";
               }
               else {
                 echo "<li><a href='profile.php'>Logged in as ".$_SESSION['username']."</a></li>";
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
    <div class="container">
      <div class="payment-confirmation">
        <div class="table-responsive">
          <table class="customer-table">
            <tr>
              <th>Full Name: </th>
              <td><?php echo $_SESSION['fullname'];?></td>
            </tr>
            <tr>
              <th>Contact Number: </th>
              <td><?php echo $_SESSION['contactNumber']; ?></td>
            </tr>
          </table>
        </div>
        <div class="table-responsive">
          <table class="table table-hover table-payment">
            <thead>
              <tr class="row-header">
                <th class="row-name">Item Name</th>
                <th class="row-price">Price</th>
                <th class="row-quantity">Quantity</th>
              </tr>
            </thead>
            <?php
              $count = $_POST['itemCount'];
              $items = [];
              for ($i = 1 ; $i<=$count;$i++){
                $items[] = array('item'=>$_POST['item_name_'.$i],'quantity'=>$_POST['item_quantity_'.$i]);
                echo "<tr>";
                echo "<td>".$_POST['item_name_'.$i]."</td>";
                echo "<td>".$_POST['item_price_'.$i]."</td>";
                echo "<td>".$_POST['item_quantity_'.$i]."</td>";
                echo "</tr>";
              }
              $_SESSION['cart'] = $items;
            ?>
            <tr>
              <td></td>
              <td>Total:</td>
              <td>
                <?php
                $total =0;
                for ($i = 1 ; $i<=$count;$i++) {
                  $total += ($_POST['item_price_'.$i] * $_POST['item_quantity_'.$i]);
                }
                echo "RM".$total;
                ?>
              </td>
            </tr>
          </table>
        </div>
        <div>
          <form action="payment.php" method="POST">
            <input type="number" class="total-price" name="total-price" value='<?php echo $total; ?>'/>
            <a class="pay-btn" href="index.html">Cancel</a>
            <button type='submit' name='submit' class=' pay-btn'>Pay now</button>
          </form>
        </div>
      </div>
    </div>
    <div class="contact-section" id="contact">
      <div class="container">
        <div class="contact-section-grids">
          <div class="col-md-3 contact-section-grid wow fadeInLeft" data-wow-delay="0.4s">
            <h4>Site Links</h4>
            <ul>
              <li><i class="point"></i></li>
              <li class="data"><a href="aboutUs.html">About Us</a></li>
            </ul>
            <ul>
              <li><i class="point"></i></li>
              <li class="data"><a href="contact.html">Contact Us</a></li>
            </ul>
            <ul>
              <li><i class="point"></i></li>
              <li class="data"><a href="privacyPolicy.html">Privacy Policy</a></li>
            </ul>
            <ul>
              <li><i class="point"></i></li>
              <li class="data"><a href="terms.html">Terms of Use</a></li>
            </ul>
          </div>
          <div class="clearfix"></div>
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
  <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

</body>
</html>
