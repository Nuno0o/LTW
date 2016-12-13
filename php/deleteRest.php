<?php
    session_start();
    include_once('connectdb.php');
    include_once('users.php');
    include_once('restaurants.php');
    
    $dbh = connectdb('../database/database.db');

    $restaurant = getRestaurantFromId($dbh,$_POST['restid']);

    if($restaurant['owner_id'] == $_SESSION['username'])
        $success = deleteRestaurant($dbh,$_POST['restid']);
    else $success = true;

    if($success == true)
        header('Location: ../restaurant.php?restid='.$_POST['restid']);
    else 
        header('Location: ../restaurant_edit.php?restid='.$_POST['restid']);
    exit();
?>