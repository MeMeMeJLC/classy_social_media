<?php

require_once("../Connection/ConnectDB.php");
require_once("../Security/Authentication.php");

echo "Login";
if(isset($_POST["theUserName"], $_POST["thePassword"])){
	$theUserName = $_POST["theUserName"]; 
	$thePassword = $_POST["thePassword"];
	$authenticated = LoginAuthentication($db, $theUserName, $thePassword);
	echo $authenticated;
	
	if ($authenticated){
	    echo "authenticated";
    }
}

 
?>

<form action="Login.php" method="post">
	Enter User Name:<input type="text" name="theUserName"><br>
	Enter Password:<input type="text" name="thePassword"><br>
	<button type="submit" name="Login">Login User In</button>
</form>
<a href="registerNewUser.php">Register new user<a>

<html>
<body>
<br><br>
<a href="../../main.php">Return To Main Form</a>
</body>
</html>