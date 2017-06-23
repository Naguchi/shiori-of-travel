<?php
header("Content-Type: application/json; charset=utf-8");

require_once('../library/sql/connect.php');

$params = $_POST;
$return = array();

$plannerId = $params['planner_id'];

if (empty($plannerId)) {
	$return['success'] = false;
	$return['message'] = "プランナーIDがありません。";
	$return['params'] = $params;
	echo json_encode($return);
	exit;
}

$query = 'SELECT * FROM `member`';
$query.= 'WHERE `planner_id` = ' . $plannerId;
$result = mysqli_query( $link, $query );

$memberList = array();
while ($row = mysqli_fetch_assoc($result)) {
	array_push($memberList, $row);
}
$return['memberList'] = $memberList;

$return['success'] = true;

echo json_encode($return);