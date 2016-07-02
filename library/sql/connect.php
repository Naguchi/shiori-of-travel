<?php

global $host, $user, $password, $database, $link;

$user = 'root';
$password = 'root';
/*
$user = 'naguchi';
$password = 'ickikazuki';
*/
$db = 'shiori';
$host = 'localhost';
$port = 3306;
$link = mysqli_connect(
	$host,
	$user,
	$password,
	$db
);

if (!$link) {
	echo "Error: Unable to connect to MySQL." . PHP_EOL;
	die( "Debugging error: " . mysqli_connect_error() );
}
//echo "Success: Mysql Connection OK." . PHP_EOL;

mysqli_set_charset($link, "UTF8");

/* 接続を閉じます */
//$mysqli_close( $mysqli );
?>
