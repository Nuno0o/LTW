<!DOCTYPE html>

<?php session_start(); ?>
<html>
	<head>
		<title>Restaurant Reviewer</title>
		<meta charset='UTF-8'>
		<link rel="stylesheet" href="./stylesheets/landing_page.css">
		<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	</head>
	<body>
		<div id="page_header">
			<div id="stock_img"> 
				<img src="./resources/restaurant_stock.jpg" alt="Restaurant Stock Photo">
			</div>
			<div id="login_area">
				<?php if(!isset($_SESSION['username'])):?>
				<form action="php/login.php" method="post">
					<label id="username_label">Username</label>
					<input id="username_input" name="username_input" type="text">
					<label id="password_label">Password</label>
					<input id="password_input" name="password_input" type="password">
					<input id="login_btn" type="submit" value="Login">
				</form>
				<?php else:?>
				<form action="php/logout.php" method="post">
					<label id="user_name"><?php echo $_SESSION['username']; ?></label>
					<input id="login_btn" type="submit" value="Logout">
				</form>
				<?php endif;?>
			</div>
		</div>
		<div id="about">
			<p>LTW 16/17</p> 
			<p>Gonçalo Ribeiro</p>
			<p>Nuno Martins</p>
			<p>Rui Soares</p>
		</div>
		<div id="main_body">
			<div id="latest_reviews">
				<p></p>
			</div>
			<div id="marker"> </div>
			<div id="search_area" >
				<p>Search for a restaurant...</p>
				<p>Best Scoring</p>
				<p>Cheapest</p>
				<p>Most Popular</p>
			</div>
		</div>
	</body>
</html>
