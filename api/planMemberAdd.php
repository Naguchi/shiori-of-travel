<?php
header("Content-Type: application/json; charset=utf-8");

require_once('../library/sql/connect.php');

$params = $_POST;
$return = array();

$planId = $params['plan_id'];
$memberId = $params['member_id'];
$attendanceId = $params['attendance_id'];

if (empty($planId)) {
	$return['success'] = false;
	$return['message'] = "プランIDがありません。";
	echo json_encode($return);
	exit;
}

if (empty($attendanceId)) {
	$return['success'] = false;
	$return['message'] = "出欠情報がありません。";
	echo json_encode($return);
	exit;
}

$query = 'INSERT INTO `plan_member`(`plan_id`,`member_id`,`attendance_id`)';
$query.= 'VALUES("' . $planId . '","'. $memberId .'","'.$attendanceId.'")';

if (! mysqli_query($link, $query)){
	$return['success'] = false;
	$return['message'] = "DB登録が失敗しました。";
	echo json_encode($return);
	exit;
}

$return['success'] = true;
echo json_encode($return);