<?php
    function newUser($dbh,$user,$password,$email,$name,$birth,$city,$country,$type){
        try {
            $stmt = $dbh->prepare('INSERT INTO account (username,password,email,name,birth,city,country,type) VALUES(?,?,?,?,?,?,?,?)');
            return $stmt->execute(array($user,md5($password),$email,$name,$birth,$city,$country,$type));
        }
        catch( PDOException $Exception ) {
        
        }
    }

    function updateUser($dbh,$user,$password,$email,$name,$birth,$city,$description){
        if($password == ""){
             $stmt = $dbh->prepare('UPDATE account SET email=?,name=?,birth=?,city=?,description=? WHERE username=?');
             return $stmt->execute(array($email,$name,$birth,$city,$description,$user));
        }else {
            $stmt = $dbh->prepare('UPDATE account SET password=?,email=?,name=?,birth=?,city=?,description=? WHERE username=?');
            return $stmt->execute(array(md5($password),$email,$name,$birth,$city,$description,$user));
        }
    }

    function getUser($dbh,$user){
        $stmt = $dbh->prepare('SELECT * FROM account WHERE username = ?');
        $stmt->execute(array($user));

        return $stmt->fetch();
    }

    function changeUserPassword($dbh,$user,$password){
        $stmt = $dbh->prepare('UPDATE account SET password = ? WHERE username = ?');
        $stmt->execute(array(md5($password),$user));

        return $stmt->rowCount() ? true : false;
    }

    function changeUserEmail($dbh,$user,$email){
        $stmt = $dbh->prepare('UPDATE account SET email = ? WHERE username = ?');
        $stmt->execute(array($email,$user));

        return $stmt->rowCount() ? true : false;
    }

    function searchUsers($dbh,$string){
        $stmt = $dbh->prepare('SELECT * FROM account WHERE username LIKE \'%?%\' OR email LIKE \'%?%\'');
        $stmt->execute(array($string,$string));

        return $stmt->fetchAll();
    }

    function addDescription($dbh,$user,$description){
        $stmt = $dbh->prepare('UPDATE account SET description = ? WHERE user = ?');
        $stmt->execute(array($description,$user));

        return $stmt->rowCount() ? true : false;
    }
?>