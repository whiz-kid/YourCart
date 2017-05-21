<!doctype html>
<html>
<head>
	<title>YourCart</title>
	<link rel="stylesheet" href="css/materialize.css">
	<link rel="stylesheet" href="css/styles.css">
	<link href="css/nav.css" rel="stylesheet">
	<link href="css/jquery.bxslider.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
		<script src="js/jquery-1.11.2.min.js"></script>
</head>

<body class="">

	<div class="overlay overlay-contentpush">
		<span type="button" class="overlay-close"></span>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="books.php">Books</a></li>
			<li><a href="electronics.php">Electronics</a></li>
			<li><a href="other.php">Accessories</a></li>
		</ul>
	</div>

	<div class="row" id="page">

		<div class="row" id="top-bar">
			<div class="col s3 left">
				<p class="brand-logo"><a href="index.php" class="white-text">YourCart</a></p>
			</div>
			<div class="col s9 full-height">
				<div class="col s1 offset-s10 center-align icons" id="account">
					<?php
						ob_start();
						if(!isset($_SESSION))
							session_start();
						if(isset($_SESSION['type'])) {
					?>
							<a href="javscript:void(0)" data-target=""><i class="material-icons waves-effect">account_circle</i></a>
							<ul class="" id="account-opts">
								<?php
									if($_SESSION['type']=='member') {
								?>
									<li><a href="userprofile.php" class=""><i class="material-icons left prefix">person</i><?php echo $_SESSION['name']; ?></a></li>
									<li id = "cart-no-of-items"><i class="material-icons left">shopping_cart</i><span id="cart_items_no">
										<?php
											include('php/cart_items.php');
											echo mysqli_num_rows($result);
										?>
									</span> items in cart</li>
								<?php
									} if($_SESSION['type']=='staff') {
								?>
									<li><a href="staffprofile.php" class=""><i class="material-icons left prefix">person</i><?php echo $_SESSION['name']; ?></a></li>
								<?php
									}
								?>
								<li class="center-align">
									<form action="php/logout.php" class="center-align">
										<button type="submit" value="logout" class="btn waves-effect waves-light">Log out</button>
									</form>
								</li>
							</ul>
						<?php
							} else {
						?>
							<a href="login.php"><i class="material-icons waves-effect">account_circle</i></a>
					<?php
						}
					?>
				</div>
				<div class="col s1 center-align icons" id="menu">
					<i class="material-icons waves-effect">menu</i>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
		<div class="slide-wrap">
			<section class="slider">
				<ul class="slider1">
					<li><img src="images/1.png"></li>
					<li><img src="images/2.jpg"></li>
					<li><img src="images/3.jpg"></li>
					<li><img src="images/4.jpg"></li>
					<li><img src="images/5.jpg"></li>
				</ul>
			</section>
		</div>
		<script type="text/javascript">
			$('.slider1').bxSlider({
				mode: 'fade',
				captions: false,
				auto:true,
				pager:false,

			});
			$('.slider2').bxSlider({
				pager:false,
				captions: true,
				maxSlides: 3,
				minSlides: 1,
				slideWidth: 230,
				slideMargin: 10
			});
			$('.slider3').bxSlider({
				mode: 'fade',
				captions: false,
				auto:true,
				pager:false,
				controls:false,
			});
		</script>

		<div class="row showcase" id="home-showcase">

			<div class="col m10 offset-m1 s12 case" id="books">
				<p class="col s12 valign-wrapper">
					<a href="books.php" class="black-text tooltipped" data-tooltip="Click for more items" data-position="right">
						Books<i class="right material-icons small valign">keyboard_arrow_right</i>
					</a>
				</p>
				<?php
					require_once('php/books.php');
					for($i=0;$i<4;$i++) {
						if(isset($row[$i])) {
							echo "<a class='col s2-5 white hoverable item center-align black-text' href='itempage.php?id=".$row[$i]['i_id']."'>
									<img src='images/itemimages/".$row[$i]['i_id']."/1.jpg' class='responsive-img'>
									<p class='item-name'>".$row[$i]['name']."</p>
									<p class='item-desc no-margin'>".$row[$i]['description']."</p>
									<p class='item-price green-text'>Rs. ".$row[$i]['price']."</p>
									<button class='btn-floating btn-large green white-text' id='buy-btn' type='submit' data-id='".$row[$i]['i_id']."'>
										<i class='material-icons waves-effect waves-light'>add_shopping_cart</i>
									</button>
								</a>";
						}
						else
							break;
					}
				?>
			</div>

			<div class="col m10 offset-m1 s12 case" id="electronics">
				<p class="col s12 valign-wrapper">
					<a href="electronics.php" class="black-text tooltipped" data-tooltip="Click for more items" data-position="right">
						Electronics<i class="right material-icons small valign">keyboard_arrow_right</i>
					</a>
				</p>
				<?php
					require_once('php/electronics.php');
					for($i=0;$i<4;$i++) {
						if(isset($row[$i])) {
							echo "<a class='col s2-5 white hoverable item center-align black-text' href='itempage.php?id=".$row[$i]['i_id']."'>
									<img src='images/itemimages/".$row[$i]['i_id']."/1.jpg' class='responsive-img'>
									<p class='item-name'>".$row[$i]['name']."</p>
									<p class='item-desc no-margin'>".$row[$i]['description']."</p>
									<p class='item-price green-text'>Rs. ".$row[$i]['price']."</p>
									<button class='btn-floating btn-large green white-text' id='buy-btn' type='submit' data-id='".$row[$i]['i_id']."'>
										<i class='material-icons waves-effect waves-light'>add_shopping_cart</i>
									</button>
								</a>";
						}
						else
							break;
					}
				?>
			</div>

			<div class="col m10 offset-m1 s12 case" id="new-products">
				<p class="col s12 valign-wrapper">
					<a href="other.php" class="black-text tooltipped" data-tooltip="Click for more items" data-position="right">
						Accessories<i class="right material-icons small valign">keyboard_arrow_right</i>
					</a>
				</p>
				<?php
					require_once('php/others.php');
					for($i=0;$i<4;$i++) {
						if(isset($row[$i])) {
							echo "<a class='col s2-5 white hoverable item center-align black-text' href='itempage.php?id=".$row[$i]['i_id']."'>
									<img src='images/itemimages/".$row[$i]['i_id']."/1.jpg' class='responsive-img'>
									<p class='item-name'>".$row[$i]['name']."</p>
									<p class='item-desc no-margin'>".$row[$i]['description']."</p>
									<p class='item-price green-text'>Rs. ".$row[$i]['price']."</p>
									<button class='btn-floating btn-large green white-text' id='buy-btn' type='submit' data-id='".$row[$i]['i_id']."'>
										<i class='material-icons waves-effect waves-light'>add_shopping_cart</i>
									</button>
								</a>";
						}
						else
							break;
					}
				?>
			</div>

		</div>


	</div>

	<footer class="row">
		<div class="col s8 offset-s2">
			<div class="col m4 section">
				<p class="white-text">Overview</p>
				<ul>
					<li><a href="#">About Us</a></li>
					<!-- <li><a href="#">FAQs</a></li> -->
					<li><a href="#">Terms</a></li>
					<!-- <li><a href="#">Privacy</a></li> -->
				</ul>
			</div>
			<div class="col m4 section">
				<p class="white-text">Account</p>
				<ul>
					<li><a href="login.php">Create Account</a></li>
					<li><a href="login.php">Login</a></li>
				</ul>
			</div>
			<div class="col m4 section">
				<p class="white-text">Address</p>
				<ul>
					<li>IIIT Allahabad,</li>
					<li>Jhalwa,</li>
					<li>Allahabad - 211012</li>
				</ul>
			</div>
		</div>
	</footer>


<!-- scripts go here -->
<script src="js/jquery-1.12.2.js"></script>
<script src="js/materialize.js"></script>
<script src="js/scripts.js"></script>
<script>

</script>
</body>
</html>
