<?php
    include_once('connectdb.php');
    include_once('users.php');
    function getSelf(){
        return getUser($dbh,$_SESSION['username']);
    }
?>