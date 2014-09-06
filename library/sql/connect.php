<?php

global $host, $user, $password, $database, $conn;

$host = "localhost";
$user = "naguchi";
$password = "pass";
$database = "shiori";
$conn = mysqli_connect( $host, $user, $password, $database );



$query = "SELECT * FROM travel_tbl";
$result = mysqli_query( $conn, $query );
$row = mysqli_fetch_array( $result );
echo $row['title'];


/* 接続を閉じます */
//$mysqli_close( $mysqli );
?>
