<?php
header("Content-Type: application/json; charset=utf-8");

require_once('../library/sql/connect.php');

$params = $_POST;
$planId = $params['planId'];
$return = array();

$query = 'SELECT * FROM plan WHERE id = ' . $planId;
$result = mysqli_query( $link, $query );

$return['planInfo'] = mysqli_fetch_assoc($result);

$query = 'SELECT name, attendance_id FROM member LEFT JOIN plan_member ON member.id = plan_member.member_id';
$query.= ' WHERE plan_member.plan_id = ' . $planId;
$memberList = array();
$result = mysqli_query( $link, $query );
while ($row = mysqli_fetch_assoc($result)) {
	array_push($memberList, $row);
}

$return['memberList'] = $memberList;
$return['success'] = true;

echo json_encode($return);