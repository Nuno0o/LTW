<?php

function getReviews($dbh,$restaurant){
    $stmt = $dbh->prepare(
        '
        SELECT *
        FROM reviews WHERE
        restaurant_id = ?
        ORDER BY review_date DESC
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


?>