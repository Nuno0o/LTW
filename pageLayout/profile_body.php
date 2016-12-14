<?php
    include_once('./php/connectdb.php');
    include_once('./php/users.php');
    include_once('./php/restaurants.php');
    include_once('./php/reviews.php');

    $dbh = connectdb('./database/database.db');

    $user = getUser($dbh,$_GET['username']);

    $self_profile = $_GET['username'] == $_SESSION['username'];
?>

<div id="profile_body">
	<div id="profile_area">
        <br>
        <div id="user_search_area">
            <form id="search_form" action="profile.php" method="get">
                <input id="search_user_submit" type="submit" value="Search">
                <input class='norm_input' name="username" type="text" placeholder="insert username..." required>
		    </form>
        </div>
        <?php 
            if($user == null){
                echo '<div id="not_found">User not found</div>';         
            }else{
        ?>
        <div id = "details_area">
            <div id="username_and_edit">
                <div id="profile_username">
                    <?php echo '@'.$user['username'];?>
                </div>
                <?php
                if($self_profile){?>
                    <div id="user_edit_profile_btn">
                    <a id="edit_profile_btn" href="profile_edit.php" > &nbspEdit Profile&nbsp </a>
                    <?php if($user['type'] == 'owner'){ ?>
                    <a id="edit_profile_btn" href="register_rest.php" > &nbspNew Restaurant&nbsp </a>
                    <?php } ?>
                    </div>
                <?php } ?>  
            </div>
            <div id= "account" />
                <div id="profile_image">
                    <img src="resources/<?php echo $user['image'];?>" style="width:300px;height:90%;">
                </div>
                <div id="account_details">
                    <div id="account_header">
                        Account Details:
                    </div>
                    <div id="profile_type">
                        <?php echo $user['type'];?>
                    </div>
                    <div id="profile_name">
                        <?php 
                            if($user['name'] != null)
                                 echo $user['name'];
                            else echo 'Unknown';
                        ?>
                    </div>
                    <div id="profile_email">
                        <?php 
                            if($user['email'] != null)
                                 echo $user['email'];
                            else echo 'Unknown';
                        ?>
                    </div>

                    <div id="profile_birthdate">
                        <?php 
                            if($user['birth'] != null)
                                 echo $user['birth'];
                            else echo 'Unknown';
                        ?>
                    </div>
                    <div id="profile_place">
                        <?php 
                            if($user['city'] != null)
                                 echo $user['city'];
                            if($user['city'] != null && $user['country'] != null)
                                echo ', ';
                            if($user['country'] != null)
                                echo $user['country'];
                        ?>
                    </div>
                </div>
                <div id="profile_description">
                    <?php 
                        if($user['description'] != null)
                             echo $user['description'];
                        else echo 'This user has no description.';
                    ?>
                </div>
            </div>
            <div id="owned_or_reviews">
                <?php
                    //Se o utilizador for um owner, imprime todos os seus restaurantes, caso seja um reviewer, imprime todos os seus reviews
                    if($user['type'] == 'owner'){
                        echo '<label id="profile_list_header">OWNED RESTAURANTS</label>';
                        $owned_restaurants = getRestaurantsByUser($dbh,$_GET['username']);
                        foreach($owned_restaurants as $owned_restaurant){
                            echo '<div class="searched_res">';
                            echo '<label class="name">' . $owned_restaurant['name'] . '</label>';
                            echo '<br>';
                            echo '<label class="rating">' . $owned_restaurant['average_score'] . '</label>';
                            echo '<br>';
                            echo '<label class="address">' . $owned_restaurant['address'] . ', '. $owned_restaurant['city'] . ', ' . $owned_restaurant['country'] . '</label>';
                            echo '<a class="resultAnchor" href="restaurant.php?restid=' . $owned_restaurant['id'] .'">Go to restaurant </a>';
                            echo '</div>';
                        }
                    }else{
                        echo '<label id="profile_list_header">POSTED REVIEWS</label>';
                        $posted_reviews = getReviewsByUser($dbh,$_GET['username']);
                        foreach($posted_reviews as $posted_review){
                            echo '<div class="searched_res">';
                            echo '<label class="name">' . $posted_review['username']. '</label>';
                            echo '<br>';
                            echo '<label class="review_rating">' . $posted_review['score']. '</label>';
                            echo '<br>';
                            echo '<label class="review_date">' . $posted_review['review_date']. '</label>';
                            echo '<br>';
                            echo '<label class="review_text">' . $posted_review['review_text'] . '</label>';
                            echo '<a class="resultAnchor" href="restaurant.php?restid=' . $posted_review['restaurant_id'] .'">Go to restaurant </a>';
                            echo '</div>';
                        }
                    }
                ?>
            </div>
            
        </div>
        <?php } ?>
    </div>
</div>

