<?php
            include_once('./php/connectdb.php');
            include_once('./php/users.php');
            include_once('./php/restaurants.php');
            $dbh = connectdb('./database/database.db');

            $restaurant = getRestaurantFromId($dbh,$_GET['restid']);

?>

<div id="register_body">
	<div id="register_area">
        <?php
            if($restaurant == null){
                echo '<div id="not_found">Restaurant not found</div>';  
            }else if(isset($_SESSION['username']) && $restaurant['owner_id'] != $_SESSION['username']){
                echo '<div id="not_found">You don\'t own this restaurant</div>'; 
            }
            else{
        ?>
        <form id="edit_rest" enctype="multipart/form-data" action="php/updateRestaurant.php" method="post">
                <input type='hidden' name='restid' value="<?php echo $restaurant['id'];?>"/> 
                <br><br>
                <input id="input" name="fileToUpload" type="file">
                <br><br>
                <label >Name</label>
				<input id="input" name="name_input" type="text" value="<?php echo $restaurant['name']; ?>" required>
                <br><br>
                <label >Phone</label>
				<input id="input" name="phone_input" type="number" value="<?php echo $restaurant['phone']; ?>" >
                <br><br>
                <label >Email</label>
				<input id="input" name="email_input" type="text" value="<?php echo $restaurant['email']; ?>">
                <br><br>
                <label >Average Price</label>
				<input id="input" name="price_input" type="number" value="<?php echo $restaurant['average_price']; ?>" required>
                <br><br>
                <label >Address</label>
				<input id="input" name="address_input" type="text" value="<?php echo $restaurant['address']; ?>" required>
                <br><br>
                <label >City</label>
				<input id="input" name="city_input" type="text" value="<?php echo $restaurant['city']; ?>" required>
                <br><br>
                <label >Bio</label>
                <br><br>
                <textarea id="description_area" rows="4" cols="45" name="description_input" form="edit_rest"><?php echo $restaurant['description'] ?></textarea>
                <br><br>
                <input id="submit_btn" type="submit" value=" Apply "> 
        </form>
            <?php } ?>
    </div>
</div>