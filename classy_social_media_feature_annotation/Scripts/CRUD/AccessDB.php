<?php

try {
require_once("../Connection/ConnectDB.php");
require_once("Javascript.js");

} catch (Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

$db->selectDatabase();
echo "accessDB running";


function createUser($theUserName, $hashed ,$theFirstName, $theLastName) {
	global $db;
	$sql = "insert into user (userName, password, firstName, lastName) values ('$theUserName', '$hashed', '$theFirstName', '$theLastName')";
	$result = $db->query($sql);
	if ($result){
		echo "<br>added new user<br>";
	}	
}

function createAnAnnotation($theImageID, $theUserID, $theComment, $theAnnotationLocationX,  $theAnnotationLocationY){
	global $db;
	
		$host = 'localhost' ;
$dbUser = 'root' ;
$dbPass = '' ;
$dbName = 'image_annotator';
		$theComment = htmlentities($theComment);#xss attack proof
		$theComment = mysqli_real_escape_string(mysqli_connect( $host, $dbUser , $dbPass , $dbName ) ,$theComment); #sql injection prevention, need to fix mysql class to be mysqli , doesnt work with $db or MYSL class
		
		$sql = "insert into annotation (annotation_comment, annotation_location_x, annotation_location_y, userID_fk, image_id_fk) values ('$theComment', $theAnnotationLocationX,$theAnnotationLocationY, $theUserID, $theImageID)";
		$result = $db->query($sql);
		echo "added new comment";
		$sql = "select * from annotation where image_id_fk='$theImageID'";
		$result = $db->query($sql);
	}

function readElement($elementWanted, $column, $table, $key, $index) {
	global $db;
	$sql = "select $column from $table where $key='$index'";
	$result = $db->query($sql);
	$aRow = $result->fetch();
	sleep(3);
	return "$aRow[$elementWanted]";	
}



function readAllElements( $column, $table) {
	global $db;
	$sql = "select $column from $table";
	$result = $db->query($sql);
	return $result;
}


function updateElement() {
	
}

function deleteElement() {
	
}

//can clean these up
	function getImageAnnotations($theImageID){
		global $db;
		$sql = "select * from annotation where image_id_fk = $theImageID";
		$result = $db->query($sql);
		//displayAnnotations($result);
		displayAnnotationsImages($result);
	}
	
	function displayAnnotationsImages($annotations){
		while ($aRow = $annotations->fetch()){
			$x = $aRow['annotation_location_x']."px";
			$y = $aRow['annotation_location_y']."px";
			$id = $aRow['annotation_id'];
			$comment = $aRow['annotation_comment'];
			;$_POST['commentForDisplay'] = $comment; 

		echo "<image id='$id' src='../../resources/icon.png' style='position:fixed; margin-left:$x; margin-top:$y;' onclick='showUser($id)'></image>";
		}				
	}

