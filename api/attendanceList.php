<?php
header("Content-Type: application/json; charset=utf-8");

require_once('../library/sql/connect.php');

$query = 'SELECT * FROM attendance';
$result = mysqli_query( $link, $query );

$attendanceList = array();
while ($row = mysqli_fetch_assoc($result)) {
	array_push($attendanceList, $row);
}

echo json_encode($attendanceList);