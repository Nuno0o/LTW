<?php
    include_once('connectdb.php');
    include_once('restaurants.php');
    $results = getRestaurantsSearch($dbh,
                                    $_GET['name'],
                                    $_GET['min'],
                                    $_GET['max'],
                                    $_GET['loc'],
                                    $_GET['minr']);
    echo json_encode($results);
    exit();
?>