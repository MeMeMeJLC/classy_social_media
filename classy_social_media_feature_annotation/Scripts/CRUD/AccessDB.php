<?php
require_once("../Connection/ConnectDB.php");


$db->selectDatabase();



function createElement() {
	
}

function readElement($elementWanted, $column, $table, $key, $index) {
	global $db;
	#$sql = "select $column from $table where $key='$index'";
	$sql = "select * from user where userID=1";
	$result = $db->query($sql);
	$aRow = $result->fetch();
	return "$aRow[$elementWanted]";	

}

function updateElement() {
	
}

function deleteElement() {
	
}