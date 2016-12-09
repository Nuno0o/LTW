<?php

function addRestaurant($dbh,$name,$address,$city,$country,$description){
    $stmt = $dbh->prepare('INSERT INTO restaurant (name,address,city,country,description) VALUES (?,?,?,?,?)');
    $stmt->execute(array($name,$address,$city,$country,$description));

    return $stmt->rowCount() ? true : false;
}

function changeRestDescription($dbh,$id,$description){
    $stmt = $dbh->prepare('UPDATE restaurant SET description = ? WHERE id = ?');
    $stmt->execute(array($description,$id));
}

function changeRestPhone($dbh,$id,$phone){
    $stmt = $dbh->prepare('UPDATE restaurant SET phone = ? WHERE id = ?');
    $stmt->execute(array($phone,$id));
}

function changeRestEmail($dbh,$id,$email){
    $stmt = $dbh->prepare('UPDATE restaurant SET email = ? WHERE id = ?');
    $stmt->execute(array($email,$id));
}

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
    $stmt->execute(array($string,$string,$string));
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
function getAllRestaurants($dbh){
    $stmt = $dbh->prepare(
        '
        SELECT *
        FROM restaurant
        '
    );
    $stmt->execute(array());
    return $stmt->fetchAll();
}

?>