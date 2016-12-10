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
            include_once('./php/connectdb.php');
            include_once('./php/users.php');
            $dbh = connectdb('./database/database.db');

            $user = getUser($dbh,$_GET['username']);

            if($user == null){
                echo '<div id="not_found">User not found</div>';
                
            }else{
        ?>
            <br>
            <div id="profile_type">
                <?php echo $user['type'];?>
            </div>
            <div id="profile_username">
                <?php echo '@'.$user['username'];?>
            </div>
            <div id="profile_name">
                <?php 
                    if($user['name'] != null)
                         echo $user['name'];
                    else echo 'Unkown birthday';
                ?>
            </div>
            <div id="profile_image">
                aqui vai a imagem
            </div>
            <div id="profile_email">
                <?php echo $user['email'];?>
            </div>

            <div id="profile_birthdate">
                <?php 
                    if($user['birth'] != null)
                         echo $user['birth'];
                    else echo 'Unkown birthday';
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
            <div id="profile_description">
                <?php 
                    if($user['description'] != null)
                         echo $user['description'];
                    else echo 'This user has no description.';
                ?>
            </div>

        <?php } ?>
    </div>
</div>

