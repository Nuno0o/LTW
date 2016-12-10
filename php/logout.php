<?php
    session_start();
    include_once('connectdb.php');

    $dbh = connectdb('../database/database.db');

    unset($_SESSION['username']);

    session_destroy();

    header('Location: ../index.php');
    exit();
?>