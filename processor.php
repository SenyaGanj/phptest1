<?php

include 'coder.php';
include 'db.php';

if (isset($_GET['go'])) {
	
	if (isset($_GET['desire']) && strlen($_GET['desire']) > 0) {
		$des = $_GET['desire'];
		$r = mysql_query("SELECT * FROM url WHERE processed = '$des'");
		
		if (mysql_num_rows($r)) {
			echo 'К сожалению такое сокращение уже существует, попробуйте ввести другое';
			
		} else {
			$site = $_GET['go'];
			$r = mysql_query("INSERT INTO url (URL, processed, flag) VALUES ('$site', '$des', 1)");
			$r = mysql_query("SELECT * FROM url WHERE processed = '$des' AND flag = 1");
			$arr = mysql_fetch_array($r);
			echo 'http://proj8.ru/'.$arr[2];
		}
		
	} else {
		$site = $_GET['go'];
		$r = mysql_query("SELECT * FROM url WHERE URL = '$site' AND flag = 0");
		
		if (mysql_num_rows($r)) {
			$arr = mysql_fetch_array($r);
			echo 'http://proj8.ru/'.$arr[2];	
        } else {
			while (1) {
				$c = mysql_query("SELECT COUNT(1) FROM url");
				$carr = mysql_fetch_array($c);
				$count = 1 + $carr[0];
				$code = coder($count);
				$r = mysql_query("SELECT * FROM url WHERE processed = '$code'");
				
				if(mysql_num_rows($r) > 0) {
					$r = mysql_query("INSERT INTO url (URL, processed, flag) VALUES ('', '', 0)");
				} else {
					break;
				}
			}
			
			$r = mysql_query("INSERT INTO url (URL, processed, flag) VALUES ('$site', '$code', 0)");
			$r = mysql_query("SELECT * FROM url WHERE URL = '$site' AND flag = 0");
			$arr = mysql_fetch_array($r);
			echo 'http://proj8.ru/'.$arr[2];
		}
	}
}
