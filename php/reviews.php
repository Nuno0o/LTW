<?php

function getReviews($dbh,$restaurant){
    $stmt = $dbh->prepare(
        '
        SELECT *
        FROM reviews WHERE
        restaurant_id = ?
        ORDER BY review_date ASC
        '
    );
    $stmt->execute(array($restaurant));
    return $stmt->fetchAll();
}

function getReviewsByUser($dbh,$user){
    $stmt = $dbh->prepare(
        '
        SELECT *
        FROM reviews WHERE
        username = ?
        ORDER BY review_date DESC
        '
    );
    $stmt->execute(array($user));
    return $stmt->fetchAll();
}

function addReviewToRest($dbh,$user,$restid,$date,$text,$score){
    $stmt = $dbh->prepare('INSERT INTO reviews (username,restaurant_id,review_date,review_text,score) VALUES(?,?,?,?,?)');
    $stmt->execute(array($user,$restid,$date,$text,$score));

    return $stmt->rowCount() ? true : false;
}

?>