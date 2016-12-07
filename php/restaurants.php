<?php

function getRestaurants($dbh,$string){
    $stmt = $dbh->prepare(
        '
        SELECT *
        FROM restaurant WHERE
        name LIKE \'%?%\' OR
        city LIKE \'%?%\' OR
        address LIKE \'%?%\'
        '
    );
    $stmt->execute(array($string));
    return $stmt->fetchAll();
}
function getRestaurantFromId($dbh,$id){
    $stmt = $dbh->prepare(
        '
        SELECT *
        FROM restaurant WHERE
        id = ?
        '
    );
    $stmt->execute(array($id));
    return $stmt->fetch();
}

?>