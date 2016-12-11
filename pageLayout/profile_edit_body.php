<div id="register_body">
	<div id="register_area">
        <?php
            include_once('./php/connectdb.php');
            include_once('./php/users.php');
            $dbh = connectdb('./database/database.db');

            $user = getUser($dbh,$_SESSION['username']);
        ?>
        <form id="edit_user" action="php/updateUser.php" method="post">
                <br><br>
                <label >Password</label>
				<input id="input" name="password_input" type="password" placeholder="Type to update" value="">
                <br><br>
                <label >Email</label>
				<input id="input" name="email_input" type="text" value="<?php echo $user['email']; ?>">
                <br><br>
                <label >Name</label>
				<input id="input" name="name_input" type="text" value="<?php echo $user['name']; ?>">
                <br><br>
                <label >Birthdate</label>
				<input id="input" name="birth_input" type="date" value="<?php echo $user['birth']; ?>">
                <br><br>
                <label >City</label>
				<input id="input" name="city_input" type="text" value="<?php echo $user['city']; ?>">
                <br><br>
                <label >Bio</label>
                <br><br>
                <textarea id="description_area" rows="4" cols="45" name="description_input" form="edit_user"><?php echo $user['description'] ?></textarea>
                <br><br>
                <input id="submit_btn" type="submit" value=" Apply "> 
        </form>
    </div>
</div>