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

function addReviewToRest($dbh,$user,$restid,$date,$text,$score){
    $stmt = $dbh->prepare('INSERT INTO reviews (username,restaurant_id,review_date,review_text,score) VALUES(?,?,?,?,?)');
    $stmt->execute(array($user,$restid,$date,$text,$score));

    return $stmt->rowCount() ? true : false;
}

function getComments($dbh,$review_id){
    $stmt = $dbh->prepare('SELECT * FROM comments WHERE review_id = ? ORDER BY comment_date ASC');
    $stmt->execute(array($review_id));

    return $stmt->fetchAll();
}

function postComment($dbh,$user,$review_id,$comment_date,$comment_text){
    $stmt = $dbh->prepare('INSERT INTO comments (username,review_id,comment_date,comment_text) VALUES (?,?,?,?)');
    $stmt->execute(array($user,$review_id,$comment_date,$comment_text));

    return $stmt->rowCount() ? true : false;
}   

?>