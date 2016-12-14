<?php
    session_start();
    include_once('connectdb.php');
    include_once('users.php');
    include_once('restaurants.php');
    include_once('reviews.php');
    
    $dbh = connectdb('../database/database.db');

    $currDate = getdate();

    $success = addReviewToRest($dbh,$_SESSION['username'],$_POST['restid'],$currDate['year'].'-'.$currDate['mon'].'-'.$currDate['mday'],$_POST['input_text'],$_POST['input_score']);

    if($success == true)
        header('Location: ../restaurant.php?restid='.$_POST['restid']);
    else 
        header('Location: ../restaurant_edit.php?restid='.$_POST['restid']);
    exit();
?>