<?php
header("Content-Type: application/json; charset=utf-8");

require_once('../library/sql/connect.php');

$params = $_POST;
$plannerName = $params['planner_name'];
$return = array();

$query = 'SELECT id FROM planner WHERE name = "' . $plannerName . '"';
$result = mysqli_query( $link, $query );

$planner = array();
while ($row = mysqli_fetch_assoc($result)) {
	array_push($planner, $row);
}

$return['success'] = true;
$return['plannerId'] = $planner[0]['id'];

echo json_encode($return);
