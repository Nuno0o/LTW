<?php

	include('./php/users.php');
	session_start();
	$full_path = getcwd().'/database/database.db';
	try{
		$dbh = new PDO('sqlite:'.$full_path);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	}
	catch(PDOException $e){
		echo 'Connection failed: ', $e->getMessage();
	}
?>