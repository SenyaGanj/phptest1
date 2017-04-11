<?php

$name='address';
$host='localhost';
$user='root';
$password='';

$link = mysql_connect($host, $user, $password) or die("Невозможно подключиться к базе");
$db = mysql_select_db($name, $link);

if (!mysql_query("SELECT * FROM url")){ 
	$r = mysql_query(
		"CREATE TABLE url(
		id int NOT NULL AUTO_INCREMENT,
		URL VARCHAR(255),
		processed VARCHAR(255),
		flag int,
		PRIMARY KEY (id))"
		) 
		or die(mysql_error());
}
