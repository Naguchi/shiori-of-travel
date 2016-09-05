<?php
header("Content-Type: application/json; charset=utf-8");

require_once('../library/sql/connect.php');

$params = $_POST;
$plannerId = $params['planner_id'];
$planId = $params['plan_id'];
$return = array();

$query = 'SELECT * FROM `plan` WHERE `id` = ' . $planId . ' AND `planner_id` = ' . $plannerId;
$result = mysqli_query( $link, $query );
$planInfo = mysqli_fetch_assoc($result);

if (count($planInfo) == 0) {
	$return['success'] = false;
	echo json_encode($return);
	exit;
}

$return['planInfo'] = $planInfo;

$query = 'SELECT `name`,`attendance_id`';
$query.= 'FROM `member`';
$query.= 'LEFT JOIN `plan_member` ON `member`.`id`=`plan_member`.`member_id`';
$query.= 'LEFT JOIN `attendance` ON `plan_member`.`attendance_id`=`attendance`.`id`';
$query.= 'WHERE `plan_member`.`plan_id`="' . $planId . '"';
$query.= 'ORDER BY `attendance`.`rank` ASC,`member`.`id` ASC';
$memberList = array();
$result = mysqli_query( $link, $query );
while ($row = mysqli_fetch_assoc($result)) {
	array_push($memberList, $row);
}
$return['memberList'] = $memberList;

$query = '
SELECT `schedule`.*
FROM `schedule`
LEFT JOIN `plan` ON `schedule`.`plan_id` = `plan`.`id`
WHERE `plan`.`id` = ' . $planId . '
ORDER BY `schedule`.`departure_date` ASC, `schedule`.`departure_time` ASC
';
$scheduleList = array();
$result = mysqli_query( $link, $query );
while ($row = mysqli_fetch_assoc($result)) {
	array_push($scheduleList, $row);
}
$return['scheduleList'] = $scheduleList;

$return['success'] = true;

echo json_encode($return);