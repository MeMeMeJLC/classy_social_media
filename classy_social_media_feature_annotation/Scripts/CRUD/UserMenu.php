<?php

require_once("AccessDB.php");
require_once("../Connection/ConnectDB.php");
require_once("../Display.php");

session_start();

$theUserID = $_SESSION['theUserID'];

$theUserName = readElement('userName', 'userName', 'user', 'userID', $theUserID);

echo "<h1>Welcome to the User Menu, $theUserName</h1>";

$db->selectDatabase();

echo "<h2>Images</h2>";

$images = readAllElements('image_id', '*', 'image');

displayImages($images);

if(isset($_POST["image"])){
	session_start();
	$_SESSION['theImageID'] = $_POST["image"];
	header("Location:annotate.php");
	//echo $_SESSION['imageID'];
}

?>
<html>
<br>
<a href="../../main.php">Return To Main Form</a>

</html>

<html>


</html>