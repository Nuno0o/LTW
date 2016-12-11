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

?>