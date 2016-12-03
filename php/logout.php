<?php
    include('connectdb.php');

    unset($_SESSION['valid']);
    unset($_SESSION['username']);

    session_destroy();
?>