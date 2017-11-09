<?php
  session_start();

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "food4all";
  $con = new mysqli($servername, $username, $password, $dbname);

  $customerID = $_SESSION['userID'];
  $orderID = $_POST['order-id'];
  $_SESSION['order-id'] = $orderID;

  function getOrderInfo($orderID, $con) {
    $sql = "SELECT r.restaurantName, o.timestamp FROM restaurant r, foodorder o WHERE o.ownerID = r.ownerID AND o.orderID = '$orderID'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $orderArray = array('restaurantName'=>$row['restaurantName'], 'timestamp'=> $row['timestamp']);
    return $orderArray;
  }

  function getFoodInfo($orderID, $con) {
    $sql2 = "SELECT m.foodID, m.foodName FROM menuitem m, orderitem i, foodorder o WHERE o.orderID = '$orderID' AND i.orderID = o.orderID AND i.foodID = m.foodID";
    $result2 = mysqli_query($con, $sql2);
    while ($row2 = mysqli_fetch_assoc($result2)) {
      $foodArray[] = array('foodID'=>$row2['foodID'], 'foodName'=>$row2['foodName']);
    }
    return $foodArray;
  }

 ?>
<!DOCTYPE html>
<html>

<head>
	<title>Food4All - Review</title>
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
	<script src="js/simpleCart.min.js">
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
					<p>Questions? Call us!<span>+60125201314 </span><label>(10AM to 10PM)</label></p>
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
		<!-- header-section-ends -->
		<div class="contact-section-page">
			<div class="contact-head">
				<div class="container">
					<h3>Order Feedback</h3>
				</div>
			</div>
			<div class="contact_top">
				<div class="container">
					<div class="col-md contact_left wow fadeInRight feedback_left" data-wow-delay="0.4s">
						<h4>Feedback Form</h4>
						<p>Rate the food you ordered! Suggestions welcomed.</p>
						<form method="post" action="rating.php">
							<div class="form_details">
                <h5 class="order_details">Order details</h5>
                <?php
                $orderArray = getOrderInfo($orderID, $con);
                echo "<span>Restaurant: ".$orderArray['restaurantName']."</span>";
                echo "<span class='details_date'>Order Date: ".date('d-m-Y',strtotime($orderArray['timestamp']))."</span>";
                ?>
                <p>
                  You ordered (click stars to rate the food):
                </p>
                <?php
                $foodArray = getFoodInfo($orderID, $con);
                $counter = 0;
                foreach ($foodArray as $food) {
                  echo "
                  <div class='stars'>
                    <p>
                      ".++$counter.") ".$food['foodName']."
                      <input type='hidden' name='foodname[]' value=".$food['foodID']." />
                      <input class='star star-5' id='".$counter."star-5' type='radio' name='star[".$counter."]' value='5'/>
                      <label class='star star-5' for='".$counter."star-5'></label>
                      <input class='star star-4' id='".$counter."star-4' type='radio' name='star[".$counter."]' value='4'/>
                      <label class='star star-4' for='".$counter."star-4'></label>
                      <input class='star star-3' id='".$counter."star-3' type='radio' name='star[".$counter."]' value='3' checked/>
                      <label class='star star-3' for='".$counter."star-3'></label>
                      <input class='star star-2' id='".$counter."star-2' type='radio' name='star[".$counter."]' value='2'/>
                      <label class='star star-2' for='".$counter."star-2'></label>
                      <input class='star star-1' id='".$counter."star-1' type='radio' name='star[".$counter."]' value='1'/>
                      <label class='star star-1' for='".$counter."star-1'></label>
                      <div class='clearfix'></div>
                    </p>
                  </div>";
                }
                 ?>
								<!-- <input type="text" class="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}">
								<input type="text" class="text" value="Email Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email Address';}">
								<input type="text" class="text" value="Subject" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject';}"> -->
                <p>General comments (400 characters max)</p>
								<textarea placeholder="Comments" maxlength="400" name='comments'></textarea>
								<div class="clearfix"> </div>
								<div class="sub-button" data-wow-delay="0.4s">
									<input name="submit" type="submit" value="Submit Feedback">
                  <input type="button" value="Return to Profile Page" onClick={window.history.back();} />
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>
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
