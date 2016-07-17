<?php
header("Content-Type: application/json; charset=utf-8");

require_once('../library/sql/connect.php');

$query = 'SELECT * FROM plan';
$result = mysqli_query( $link, $query );

$planList = array();
while ($row = mysqli_fetch_assoc($result)) {
	array_push($planList, $row);
}

echo json_encode($planList);