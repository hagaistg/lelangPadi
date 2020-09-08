<?php
function doConnect() {
	global $config;
	$link = new mysqli('127.0.0.1', 'root', '')or die(mysqli_error());

	mysqli_select_db($link, 'mydb');
	return $link;
}

function dbRresultToArray($result) {
	$res_array = array();

	for($count=0;$row = mysqli_fetch_array($result);$count++) {
		$res_array[$count] = $row;
	}
	return $res_array;
}
?>