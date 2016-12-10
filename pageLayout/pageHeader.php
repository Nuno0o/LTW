<div id="page_header">
	<a href="index.php">
		<div id="stock_img"> 
			<img src="./resources/restaurant_stock.jpg" />
		</div>
	</a>
	<div id="login_area">
		<?php if(!isset($_SESSION['username'])):?>
		<form action="php/login.php" method="post">
			<div id="usernameThings" />
				<label id="username_label">Username</label>
				<input id="username_input" name="username_input" type="text" required>
			</div>
			<div id="passwordThings" />
				<label id="password_label">Password</label>
				<input id="password_input" name="password_input" type="password" required>
			</div>
			<?php if(isset($_GET['invalidacc'])): ?>
			<label id="incorrect">Incorrect username/password</label><br>
			<?php endif;?>
			<input id="login_btn" type="submit" value="Login">

		</form>
		<input id="register_btn" type="button" onclick="window.location = 'register.php';" value="Register">
		<?php else:?>
		<form action="php/logout.php" method="post">
			<label id="user_name"><?php echo $_SESSION['username']; ?></label>
			<input id="logout_btn" type="submit" value="Logout">
		</form>
		<form action="profile.php" method="post">
			<input id="edit_btn" type="submit" value="My Profile">
		</form>
		<?php endif;?>
	</div>
</div>