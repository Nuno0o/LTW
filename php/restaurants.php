<?php

function addRestaurant($dbh,$user,$name,$phone,$email,$address,$city,$country,$price){
    $stmt = $dbh->prepare('INSERT INTO restaurants (owner_id,name,phone,email,address,city,country,average_price) VALUES (?,?,?,?,?,?,?,?)');
    $stmt->execute(array($user,$name,$phone,$email,$address,$city,$country,$price));

    return $stmt->rowCount() ? true : false;
}

function updateRestaurant($dbh,$id,$name,$phone,$email,$price,$address,$city,$description){
    $stmt = $dbh->prepare('UPDATE restaurants SET name=?,phone=?,email=?,average_price=?,address=?,city=?,description=? WHERE id=?');
    return $stmt->execute(array($name,$phone,$email,$price,$address,$city,$description,$id));
}

function updateRestImage($dbh,$id,$image){
    $stmt = $dbh->prepare('UPDATE restaurants SET image = ? WHERE id = ?');
    $stmt->execute(array($image,$id));

    return $stmt->rowCount() ? true : false;
}

function deleteRestaurant($dbh,$id){
    $stmt = $dbh->prepare('DELETE FROM restaurants WHERE id=?');
    $stmt->execute(array($id));

    return $stmt->rowCount() ? true : false;
}


function getRestaurantsByUser($dbh,$user){
    $stmt = $dbh->prepare(
        '
        SELECT *
        FROM restaurants WHERE
        owner_id = ?
        '
    );
    $stmt->execute(array($user));
    return $stmt->fetchAll();
}



function getRestaurantsSearch($dbh,$name,$minprice,$maxprice,$location,$rating){
    $stmt = $dbh->prepare(
        '
        SELECT *
        FROM restaurants WHERE
        name LIKE ? AND
        (city LIKE ? OR
        address LIKE ? OR
        country LIKE ?) AND
        average_price >= ? AND
        average_price <= ? AND
        average_score >= ?
        '
    );
    $stmt->execute(array('%'.$name.'%','%'.$location.'%','%'.$location.'%','%'.$location.'%',$minprice,$maxprice,$rating));
    return $stmt->fetchAll();
}

function getRestaurantFromId($dbh,$id){
    $stmt = $dbh->prepare(
        '
        SELECT *
        FROM restaurants WHERE
        id = ?
        '
    );
    $stmt->execute(array($id));
    return $stmt->fetch();
}
?>