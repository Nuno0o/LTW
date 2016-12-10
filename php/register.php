<?php
    session_start();
    include_once('connectdb.php');
    include_once('users.php');
    
    $dbh = connectdb('../database/database.db');
    
    if(isset($_POST['username_input'])){
        $user = $_POST['username_input'];
    }else header('Location: ../register.php');
    
    if(isset($_POST['password_input'])){
        $pass = $_POST['password_input'];
    }else header('Location: ../register.php');

    if(isset($_POST['type_input'])){
        $type = $_POST['type_input'];
    }else header('Location: ../register.php');

    if(isset($_POST['email_input'])){
        $email = $_POST['email_input'];
    }else $email = null;

    if(isset($_POST['name_input'])){
        $name = $_POST['name_input'];
    }else $name = null;

    if(isset($_POST['birth_input'])){
        $birth = $_POST['birth_input'];
    }else $birth = null;

    if(isset($_POST['city_input'])){
        $city = $_POST['city_input'];
    }else $city = null;

    if(isset($_POST['country_input'])){
        $country = $_POST['country_input'];
    }else $country = null;

    $success = newUser($dbh,$user,$pass,$email,$name,$birth,$city,$country,$type);
    if($success == true)
        header('Location: ../index.php');
    else header('Location: ../register.php');
    exit();
?>