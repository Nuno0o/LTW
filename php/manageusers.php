<?php
    function newUser($dbh,$user,$password,$email,$name,$birth,$city,$country){
        $stmt = $dbh->prepare('INSERT INTO user VALUES(?,?,?,?,?,?,?)');
        $stmt->execute(array($user,md5($password),$email,$name,$birth,$city,$country));
    }

    function getUser($dbh,$user){
        $stmt = $dbh->prepare('SELECT * FROM user WHERE username = ?');
        $stmt->execute(array($user));

        return $stmt->fetch();
    }
?>