<?php
require_once("../Connection/ConnectDB.php");


$db->selectDatabase();



function createUser($theUserName, $hashed ,$theFirstName, $theLastName) {
	global $db;
	$sql = "insert into user (userName, password, firstName, lastName) values ('$theUserName', '$hashed', '$theFirstName', '$theLastName')";
	$result = $db->query($sql);
	if ($result){
		echo "<br>added new user<br>";
	}	
}

function readElement($elementWanted, $column, $table, $key, $index) {
	global $db;
	$sql = "select $column from $table where $key='$index'";
	#$sql = "select * from user where userID=1";
	$result = $db->query($sql);
	$aRow = $result->fetch();
	echo "$aRow[$elementWanted]";
	sleep(3);
	return "$aRow[$elementWanted]";	

}

function updateElement() {
	
}

function deleteElement() {
	
}