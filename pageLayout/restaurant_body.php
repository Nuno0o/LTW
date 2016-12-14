<?php 
            include_once('./php/connectdb.php');
            include_once('./php/users.php');
            include_once('./php/restaurants.php');
            include_once('./php/reviews.php');

            $dbh = connectdb('./database/database.db');

            $restaurant = getRestaurantFromId($dbh,$_GET['restid']);

            if(isset($_SESSION['username']))
                $user = getUser($dbh,$_SESSION['username']);
            else $user = null;

            $userInPage = isset($_SESSION['username']);

            $reviewerInPage = $user != null && $user['type'] == 'reviewer';
 
            $ownerInPage = $restaurant['owner_id'] == $user['username'];
?>

<div id="profile_body">

	<div id="profile_area">
        <!-- Perfil do restaurante -->

        <?php 
            if($restaurant == null){
                echo '<div id="not_found">Restaurant not found</div>';  
            }else{
        ?>
        <br>
        <div id="restaurant_name_and_edit">
            <div id="restaurant_name">
                <?php echo $restaurant['name'];?>
            </div>
            <?php
                if($ownerInPage){
            ?>
                    <form action="php/deleteRest.php" method="post" style="float:right;">
                        <input type='hidden' name='restid' value="<?php echo $restaurant['id'];?>"/> 
                        <input id="edit_profile_btn" type="submit" value=" Delete " onclick="if (!confirm('Are you sure?')) return false;"> 
                    </form>
                    <div id="restaurant_edit_btn">
                        <a href="restaurant_edit.php?restid=<?php echo $restaurant['id']; ?>" id="edit_profile_btn"> &nbspEdit Restaurant&nbsp </a>
                    </div>
            <?php } ?>
        </div>
         <div id= "restaurant_area">   
            <div id="restaurant_image">
                <img src="resources/<?php echo $restaurant['image'];?>" style="width:190px;height:190px;">
            </div>
            <br>
            <div id="google_maps_div" style="height:200px;width:200px;border: 1px solid white;padding:0;margin:0;text-align:left;">
            
            </div>
            <br>
            <div id="restaurant_information">
                <div id="restaurant_header">
                        Restaurant Details:
                </div>
                <div id="restaurant_contact">
                    <?php 
                        echo '<a id="restaurant_owner" href="profile.php?username=' . $restaurant['owner_id'] .'">'. $restaurant['owner_id'] . '</a>';
                        echo '<br>';
                        if($restaurant['phone'] != null)
                            echo '<label id="restaurant_phone">'.$restaurant['phone']."</label>";
                        if($restaurant['email'] != null && $restaurant['phone'] != null)
                            echo '<br>';
                        if($restaurant['email'] != null)
                        echo '<label id="restaurant_email">'.$restaurant['email']."</label>";
                    ?>
                </div>
                <div id="restaurant_local">
                    <?php 
                        if($restaurant['address'] != null)
                             echo '<label id="restaurant_address">'.$restaurant['address']."</label>";
                        if($restaurant['address'] != null && $restaurant['city'] != null || $restaurant['address'] != null && $restaurant['country'] != null )
                            echo ', ';
                        if($restaurant['city'] != null)
                             echo '<label id="restaurant_city">'.$restaurant['city']."</label>";
                        if($restaurant['city'] != null && $restaurant['country'] != null)
                            echo ', ';   
                        if($restaurant['country'] != null)
                             echo '<label id="restaurant_country">'.$restaurant['country']."</label>";
                    ?>
                </div>
                <div id="restaurant_avg_price">
                    <?php 
                        if($restaurant['average_price'] != null)
                            echo '<label id="restaurant_avgprice">'.$restaurant['average_price']."</label>";
                    ?>
                </div>

                <div id="restaurant_avg_score">
                    <?php 
                        if($restaurant['average_score'] != null)
                             echo '<label id="restaurant_avgscore">'.$restaurant['average_score']."</label>";
                    ?>
                </div>
                <div id="restaurant_description">
                    <?php 
                        if($restaurant['description'] != null)
                            echo '<label id="restaurant_bio">'.$restaurant['description']."</label>";
                    ?>
                </div>
            </div>
        </div>

        <!-- Reviews do restaurante -->

        <div id="restaurant_reviews">
            <?php
            if($reviewerInPage){ ?>
            <form id="post_review" action="php/addReview.php" method="post">
                <label>Post a review: </label>
                <input type='hidden' name='restid' value="<?php echo $restaurant['id'];?>"/> 
                <input id="input" type="number" name="input_score" min="0" max="10" placeholder="1-10" required><br>
                <textarea id="description_area" rows="4" cols="45" name="input_text" form="post_review" required></textarea><br>
                <input type="submit" value=" Send " id="edit_profile_btn"> 
            </form>
            <?php } ?>

            
            
            
            <?php
                echo '<label id="review_list_header">USER SUBMITED REVIEWS</label>';
                $reviews = getReviews($dbh,$_GET['restid']);
                foreach($reviews as &$review){
                    echo '<div class="searched_res">';
                    if($reviewerInPage || $ownerInPage)
                        echo '<button id="replybutton' . $review['id'] . '" class="reply_button">Reply</button>';
                    
                    $reviewUser = getUser($dbh,$review['username']);
                    echo '<img src="resources/' . $reviewUser['image'] . '" width="40px" height="40px" style="border-radius: 50%;">';
                    
                    echo '<a class="name" href="profile.php?username=' . $review['username'] . '"> ' . $review['username'] . '</a>';
                    echo '<br>';
                    echo '<label class="review_rating">' . $review['score']. '</label>';
                    echo '<br>';
                    echo '<label class="review_date">' . $review['review_date']. '</label>';
                    echo '<br>';
                    echo '<label class="review_text">' . $review['review_text'] . '</label>';
					$comments = getComments($dbh,$review['id']);
					if($comments != null){
                    echo '<div class="comment">';
						foreach($comments as $comment){

							echo '<div class="searched_res" style="margin-left:2%; width: 70%;">';

                            $commentUser = getUser($dbh,$comment['username']);
                            echo '<img src="resources/' . $commentUser['image'] . '" width="20px" height="20px" style="border-radius: 50%;">';

							echo '<a class="name" href="profile.php?username=' . $comment['username'] . '"> ' . $comment['username'] . '</a>';
                            if($comment['username'] == $restaurant['owner_id'])
                                echo '<font color="DeepSkyBlue">(Owner)</font>';
							echo '<br>';
							echo '<label class="review_date">' . $comment['comment_date']. '</label>';
							echo '<br>';
							echo '<label class="review_text">' . $comment['comment_text'] . '</label>';
							echo '</div>';
						}
						echo '</div>';
					}
                    echo '</div>';
                }
            ?>
        </div>
        <?php } ?>
    </div>
</div>