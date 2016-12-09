<div id="page_header">
	<div id="stock_img"> 
		<img src="./resources/restaurant_stock.jpg" />
	</div>
	<div id="login_area">
		<?php if(!isset($_SESSION['username'])):?>
		<form action="php/login.php" method="post">
			<div id="usernameThings" />
				<label id="username_label">Username</label>
				<input id="username_input" name="username_input" type="text">
			</div>
			<div id="passwordThings" />
				<label id="password_label">Password</label>
				<input id="password_input" name="password_input" type="password">
			</div>
			<input id="login_btn" type="submit" value="Login">
		</form>
		<?php else:?>
		<form action="php/logout.php" method="post">
			<label id="user_name"><?php echo $_SESSION['username']; ?></label>
			<input id="login_btn" type="submit" value="Logout" style="position: absolute;top:35%;color:#A0958d;">
			<input id="edit_btn" type="submit" value="Edit Profile">
		</form>
		<?php endif;?>
	</div>
</div>