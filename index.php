<?php

include 'coder.php';

if (isset ($_GET['link'])) {
	include 'db.php';
	
	$id = $_GET['link'];
	
	$r = mysql_query("SELECT * FROM url WHERE processed = '$id'");
	
	if(mysql_num_rows($r)) {	
		$arr = mysql_fetch_array($r);
		mysql_close($link);
		header("location: $arr[1]");
		exit;		
	}	
}

include 'print_form.php';
