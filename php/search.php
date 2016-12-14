<?php
    session_start();
    include_once('connectdb.php');
    include_once('restaurants.php');
    
    $dbh = connectdb('../database/database.db');

    if($_GET['type'] == 'normal'){
        $results = getRestaurantsSearch($dbh,
                                    $_GET['name'],
                                    $_GET['min'],
                                    $_GET['max'],
                                    $_GET['loc'],
                                    $_GET['minr']);
    }
    if($_GET['type'] == 'lux'){
        $results = getLuxurySelection($dbh);
    }
    echo json_encode($results);
    exit();
?>