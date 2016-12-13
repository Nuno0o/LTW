<?php
    session_start();
    include_once('connectdb.php');
    include_once('users.php');
    include_once('restaurants.php');
    
    $dbh = connectdb('../database/database.db');
    
    $owner = $_SESSION['username'];

    $name = $_POST['name_input'];
    
    if(isset($_POST['phone_input'])){
        $phone = $_POST['phone_input'];
    }else $phone = null;

    if(isset($_POST['email_input'])){
        $email = $_POST['email_input'];
    }else $email = null;

    $address = $_POST['address_input'];
    $city = $_POST['city_input'];
    $country = $_POST['country_input'];
    $price = $_POST['price_input'];

    $success = addRestaurant($dbh,$owner,$name,$phone,$email,$address,$city,$country,$price);

    if($success == true)
        header('Location: ../index.php');
    else header('Location: ../register_rest.php');
    exit();
?>