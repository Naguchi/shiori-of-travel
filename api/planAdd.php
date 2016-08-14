<?php
header("Content-Type: application/json; charset=utf-8");

require_once('../library/sql/connect.php');

$params = $_POST;
$return = array();

$title = $params['title'];
$summary = $params['summary'];
$start = $params['start'];
$end = $params['end'];

if (empty($title)) {
	$return['success'] = false;
	echo json_encode($return);
	exit;
}

$query1 = 'INSERT INTO `plan` (`title`';
$query2 = 'VALUES ("' . $title . '"';

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

echo json_encode($return);