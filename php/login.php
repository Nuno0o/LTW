<?php
    include('connectdb.php');
    include('manageusers.php');

    $user = $_POST['username'];
    $pass = $_POST['password'];
    $hashed_pass = md5($pass);

    $retrieved_user = getUser($dbh,$user);

    if($retrieved_user['password'] === $hashed_pass){
        $_SESSION['username'] = $username;
        $_SESSION['valid'] = true;
    }
?>