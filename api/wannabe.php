<?php
header("Content-Type: application/json; charset=utf-8");

require_once('../library/sql/connect.php');

$query = 'SELECT * FROM plan';
$result = mysqli_query( $link, $query );
$row = mysqli_fetch_array( $result );

echo json_encode($row["title"]);