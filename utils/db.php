<?
	$link = mysql_connect('127.0.0.1', 'root', 'root');
	if ($link === FALSE) {
		die('нет подключения к серверу');
	}

	mysql_select_db('car_db');
	mysql_query('SET NAMES `UTF8`');
	
