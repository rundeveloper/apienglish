<?php

	$DB_HOST = 'bjeinhljkvgjxtnufqej-mysql.services.clever-cloud.com';
	$DB_USER = 'uohtx3roycvhvief';
	$DB_PASS = 'SBCu4PUBWCZoEAwXkE9P';
	$DB_NAME = 'bjeinhljkvgjxtnufqej';
	
	try{
		$DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
		$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
	
