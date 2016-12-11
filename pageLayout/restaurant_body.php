<div id="profile_body">
	<div id="profile_area">

        <?php 
            include_once('./php/connectdb.php');
            include_once('./php/users.php');
            include_once('./php/restaurants.php');
            include_once('./php/reviews.php');

            $dbh = connectdb('./database/database.db');

            $restaurant = getRestaurantFromId($dbh,$_GET['restid']);

            if($restaurant == null){
                echo '<div id="not_found">Restaurant not found</div>';
                
            }else{
        ?>
        <br>
        <div id="restaurant_name">
            <?php echo $restaurant['name'];?>
        </div>
        <div id="restaurant_image">
            aqui vai a imagem
        </div>

        <div id="restaurant_contact">
            <?php 
                if($restaurant['phone'] != null)
                    echo 'Phone:'.$restaurant['phone'];
                if($restaurant['email'] != null && $restaurant['phone'] != null)
                    echo '<br>';
                if($restaurant['email'] != null)
                echo 'Email:'.$restaurant['email'];
            ?>
        </div>
        <div id="restaurant_local">
            <?php 
                if($restaurant['address'] != null)
                    echo $restaurant['address'];
                if($restaurant['address'] != null && $restaurant['city'] != null || $restaurant['address'] != null && $restaurant['country'] != null )
                    echo '<br>';
                if($restaurant['city'] != null)
                    echo $restaurant['city'];
                if($restaurant['city'] != null && $restaurant['country'] != null)
                    echo ', ';   
                if($restaurant['country'] != null)
                    echo $restaurant['country'];
            ?>
        </div>
        <div id="restaurant_avg_price">
            <?php 
                if($restaurant['average_price'] != null)
                    echo 'Average price:'.$restaurant['average_price'];
            ?>
        </div>

        <div id="restaurant_avg_score">
            <?php 
                if($restaurant['average_score'] != null)
                    echo 'Average score:'.$restaurant['average_score'];
            ?>
        </div>
        <div id="restaurant_description">
            <?php 
                if($restaurant['description'] != null)
                    echo $restaurant['description'];
            ?>
        </div>
        <div id="restaurant_reviews">
            <?php
                $reviews = getReviews($dbh,$_GET['restid']);
                echo count($reviews);
                foreach($reviews as &$review){
                    echo '<div class="review">';
                    echo 'ola';
                    echo '</div>';
                }
            ?>
        </div>
        <?php
            if(isset($_SESSION['username'])){
            if($restaurant['owner_id'] == $_SESSION['username']){
            ?>
                <div id="restaurant_edit_btn">
                <form action="restaurant_edit.php" method="post">
                    <input id="edit_profile_btn" type="submit" value=" Edit ">
                </form>
                </div>
        <?php }} ?>
        <?php } ?>
    </div>
</div>