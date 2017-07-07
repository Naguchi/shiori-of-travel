<?php
header("Content-Type: application/json; charset=utf-8");

require_once('../library/sql/connect.php');

$params = $_POST;
$return = array();

$planner_id = $params['planner_id'];
if (empty($planner_id)) {
	$return['success'] = false;
	$return['params'] = $params;
	$return['message'] = 'プランIDがありません。';
	echo json_encode($return);
	exit;
}
$title = $params['title'];
if (empty($title)) {
	$return['success'] = false;
	$return['message'] = 'タイトルが入力されていません。';
	echo json_encode($return);
	exit;
}
$summary = $params['summary'];
$start = $params['start'];
$end = $params['end'];

$query1 = 'INSERT INTO `plan` (`planner_id`, `title`';
$query2 = 'VALUES ("' . $planner_id . '", "' . $title . '"';

if (! empty($summary)) {
	$query1 .= ', `summary`';
	$query2 .= ', "' . $summary . '"';
}
if (! empty($start)) {
	$query1 .= ', `start`';
	$query2 .= ', "' . $start . '"';
}
if (! empty($end)) {
	$query1 .= ', `end`';
	$query2 .= ', "' . $end . '"';
}
$query1.= ')';
$query2.= ')';

$query = $query1 . $query2;
$result = mysqli_query($link, $query);

$return['success'] = $result;

$return['plan_id'] = mysqli_insert_id($link);

echo json_encode($return);