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

    //Atualiza dados excepto pass e imagem
    $success = updateUser($dbh,$user,$pass,$email,$name,$birth,$city,$description);
    
    //Se foi inserida uma imagem
    if(isset($_FILES['fileToUpload']['name']) && !empty($_FILES['fileToUpload']['name'])){
        include_once('saveImage.php');
        $success2 = updateImage($dbh,$user,$new_path_parts['basename']);
    }else{
        $uploadOk = true;
        $success2 = true;
    }
    //Se foi inserida uma pass nova
    if($pass != ""){
        $success3 = updateUserPassword($dbh,$user,$pass);
    }else $success3 = true;

    //Se tudo correu bem, volta ao perfil, senao volta a edit
    if($uploadOk == true && $success == true && $success2 == true && $success3 == true)
        header('Location: ../profile.php?username='.$user);
    else 
        header('Location: ../profile_edit.php');

    exit();
?>