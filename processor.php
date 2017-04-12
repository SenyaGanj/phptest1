<?php

if (isset($_GET['go'])) {
	$url = parse_url($_GET['go']);
	if ($url['host'] == 'proj8.ru'){
		echo 'Введите корректный URL';
		die;
	}
	
	if (!filter_var($_GET['go'], FILTER_VALIDATE_URL)) {
		echo 'Введите корректный URL';
		die;
	}
	
	if (!($stat = @get_headers($_GET['go']))){
		echo 'такого адреса не существует';
		die;
	} 
	
	include 'coder.php';
	include 'db.php';
	
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
					$r = mysql_query("DELETE FROM url WHERE id = $count");
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
	mysql_close($link);
}
