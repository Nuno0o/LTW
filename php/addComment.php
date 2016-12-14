<?php
    session_start();
    include_once('connectdb.php');
    include_once('users.php');
    include_once('restaurants.php');
    include_once('reviews.php');
    
    $dbh = connectdb('../database/database.db');

    $currDate = getdate();

    $currDateFormated = $currDate['year'].'-'.$currDate['mon'].'-'.$currDate['mday'];

    $review = getReview($dbh,$_POST['reviewid']);

    $success = postComment($dbh,$_SESSION['username'],$_POST['reviewid'],$currDateFormated,$_POST['input_text']);
    
    if($success == true)
        header('Location: ../restaurant.php?restid='.$review['restaurant_id']);
    else 
        header('Location: ../restaurant.php?restid='.$review['restaurant_id']);
    exit();
?>