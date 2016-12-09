<?php
    include('connectdb.php');

    unset($_SESSION['username']);

    session_destroy();

    header('Location: ../index.php');
    exit();
?>