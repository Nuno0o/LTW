<?php
    session_start();
    include_once('connectdb.php');
    include_once('users.php');
    include_once('restaurants.php');
    
    $dbh = connectdb('../database/database.db');

    $success = deleteRestaurant($dbh,$_POST['restid']);

    if($success == true)
        header('Location: ../restaurant.php?restid='.$_POST['restid']);
    else 
        header('Location: ../restaurant_edit.php?restid='.$_POST['restid']);
    exit();
?>