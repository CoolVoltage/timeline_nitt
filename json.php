<?php
require_once('tmp.php');
function parse_Date($string){
	$date = explode(' ',$string);
	$newString = str_replace('-',',',$date[0]);
	return $newString;
}
$reply = new stdClass;
$reply->timeline = new stdClass;
$reply->timeline->headline='NITT TIMELINE';
$reply->timeline->type='default';
$reply->timeline->text='TIMELINE FOR NITT';
$reply->timeline->date = Array();
$con = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
$result = mysqli_query($con,'SELECT * FROM content_data')
	or die('query error');
while($row = mysqli_fetch_array($result)){
	$tmp = new stdClass;
	$tmp->headline = $row['content_title'];
	$tmp->text = $row['content_desc'];
	$tmp->startDate = parse_Date($row['content_start']);
	$tmp->endDate = parse_Date($row['content_end']);
	$reply->timeline->date[] = $tmp;
}
echo json_encode($reply);
?>
