<?php

require_once("../Connection/ConnectDB.php");
require_once("AccessDB.php");

$db->selectDatabase();

echo "<h2>register new user</h2>";

	if(isset($_POST["theUserName"], $_POST["thePassword"])){
		$theUserName = $_POST["theUserName"];
		$thePassword = $_POST["thePassword"];
		$theFirstName = $_POST["theFirstName"];
		$theLastName = $_POST["theLastName"];
		$hashed = password_hash($thePassword, PASSWORD_BCRYPT, array('cost' => 12));
		echo "$theUserName, $hashed, $theFirstName, $theLastName";
		createUser($theUserName, $hashed ,$theFirstName, $theLastName);


		sleep(5);
        header ("Location:login.php") ;
		exit;

   
		} else {
	echo "<br>Please enter firstname, lastname, username and password";
}	

?>
<html>
<form action="RegisterNewUser.php" method="post">
	First name:<input type="text" name="theFirstName"><br>
	Last Name:<input type="text" name="theLastName"><br>
	User name:<input type="text" name="theUserName"><br>
	Password:<input type="text"  name="thePassword"><br>
	<button type="submit">Register new user</button>
</form>

<br /><br />
<a href="../../main.php">Return To Main Form</a>

</html>