<?php
header("Content-Type: application/json; charset=utf-8");

require_once('../library/sql/connect.php');

$params = $_POST;
$plannerId = $params['planner_id'];
$return = array();

$query = 'SELECT * FROM plan WHERE planner_id = ' . $plannerId;
$result = mysqli_query( $link, $query );

$planList = array();
while ($row = mysqli_fetch_assoc($result)) {
	array_push($planList, $row);
}

$return['success'] = true;
$return['planList'] = $planList;
$return['sql'] = $query;

echo json_encode($return);