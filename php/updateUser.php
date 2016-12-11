<?php
    session_start();
    include_once('connectdb.php');
    include_once('users.php');
    
    $dbh = connectdb('../database/database.db');
    
    $user = $_SESSION['username'];
    
    if(isset($_POST['password_input'])){
        $pass = $_POST['password_input'];
    }else $pass = "";

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

    if(isset($_POST['description_input'])){
        $description = $_POST['description_input'];
    }else $description = null;

    $success = updateUser($dbh,$user,$pass,$email,$name,$birth,$city,$description);

    if($success == true)
        header('Location: ../profile.php?username='.$_SESSION['username']);
    else header('Location: ../register.php');
    exit();
?>