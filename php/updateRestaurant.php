<?php
    session_start();
    include_once('connectdb.php');
    include_once('users.php');
    include_once('restaurants.php');
    
    $dbh = connectdb('../database/database.db');

    if(isset($_POST['name_input'])){
        $name = $_POST['name_input'];
    }else $name = null;

    if(isset($_POST['phone_input'])){
        $phone = $_POST['phone_input'];
    }else $phone = null;

    if(isset($_POST['email_input'])){
        $email = $_POST['email_input'];
    }else $email = null;

    if(isset($_POST['price_input'])){
        $price = $_POST['price_input'];
    }else $price = null;

    if(isset($_POST['address_input'])){
        $address = $_POST['address_input'];
    }else $address = null;

    if(isset($_POST['city_input'])){
        $city = $_POST['city_input'];
    }else $city = null;

    if(isset($_POST['description_input'])){
        $description = $_POST['description_input'];
    }else $description = null;

    //Atualiza dados excepto imagem
    $success = updateRestaurant($dbh,$_POST['restid'],$name,$phone,$email,$price,$address,$city,$description);
    
    //Se foi inserida uma imagem
    if(isset($_FILES['fileToUpload']['name']) && !empty($_FILES['fileToUpload']['name'])){
        include_once('saveImage.php');
        $success2 = updateRestImage($dbh,$_POST['restid'],$new_path_parts['basename']);
    }else{
        $uploadOk = true;
        $success2 = true;
    }
    //Se correu tudo bem, volta a restaurante, senão volta a edit
    if($uploadOk == true && $success == true && $success2 == true)
        header('Location: ../restaurant.php?restid='.$_POST['restid']);
    else 
        header('Location: ../restaurant_edit.php?restid='.$_POST['restid']);

    exit();
?>