<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}

#modify {
	display: none;
}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

require_once("AccessDB.php");
require_once("../Connection/ConnectDB.php");
require_once('changeAnno.php');

$db->selectDatabase();


$sql="SELECT * FROM annotation WHERE annotation_id = '".$q."'";
$result = $db->query($sql);
session_start();
if(isset($_SESSION["theUserName"], $_SESSION["thePassword"])){
		$theUserName = $_SESSION["theUserName"];
		$thePassword = $_SESSION["thePassword"];
	    $stored_password = getAUserNameAndPassword($db, $theUserName);#turn this into a token check
		
		if(password_verify( $thePassword, $stored_password)){
			echo "<br>you are in!";
			#$userName = getAUser($db, $annoserID);
			
			echo "<table>
			<tr>
			<th>Comment ID</th>
			<th>UserName</th>
			<th>Comment</th>
			<th id='modify'>Modify</th>
			</tr>";

			$row = $result->fetch();
			$theAnnotationID = $row['annotation_id'];
				$annoUser = getAUser($db, $row['userID_fk']);
				$annoUser = $annoUser->fetch();
				$annoUserName = $annoUser['userName'];
				echo "<tr>";
				echo "<td>" . $row['annotation_id'] . "</td>";
				echo "<td>" . $annoUserName . "</td>";
				echo "<td>" . $row['annotation_comment'] . "</td>";
				echo "<td id='modify'><form method='post' id='modify' action='changeAnno.php'>
				New comment:<input type='text' name='newComment'></input>
				<br>
				<input type='hidden' name='annotationID' value='$theAnnotationID'></input><input type='submit'></button>
				</form></td>";


				echo "annoUserName = " . $annoUserName . ", username = " . $theUserName;
				
				#echo "theannotationid = $theAnnotationID";
				
				echo "</tr>";

			echo "</table>";


			
	if($theUserName == $annoUserName){
				echo "username match";
			echo "<style>#modify {display: block;}</style>";

		}
}
}





?>
</body>
</html>