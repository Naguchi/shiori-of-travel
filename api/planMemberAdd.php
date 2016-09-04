<?php
header("Content-Type: application/json; charset=utf-8");

require_once('../library/sql/connect.php');

$params = $_POST;
$return = array();

$plan_id = $params['plan_id'];
$memberList = explode(',',$params['member']);

if (empty($plan_id)) {
	$return['success'] = false;
	echo json_encode($return);
	exit;
}

foreach ($memberList as $member) {
	$query = 'INSERT INTO `plan_member`(`plan_id`,`member_id`,`attendance_id`)';
	$query.= 'VALUES("' . $plan_id . '","'. $member['id'] .'",0)';

	$result = mysqli_query($link, $query);
}

$return['success'] = $result;

echo json_encode($return);