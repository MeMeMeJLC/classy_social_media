<?php

require_once("../CRUD/AccessDB.php");
require_once("../Connection/ConnectionDetails.php");

function LoginAuthentication($db, $theUserName, $thePassword){
	if(isset($theUserName, $thePassword)){
			echo "<br>login authentication running";
			$theUserName = $_POST["theUserName"];
			$thePassword = $_POST["thePassword"];
			$stored_password = readElement( 'password', 'password', 'user', 'userName', $theUserName);
			echo "entered pword: $thePassword , storedpword: $stored_password";
			#sleep(2);
			
			if(password_verify( $thePassword, $stored_password)){
				echo "<br>you are in!";
				$theUserID = readElement( 'userID', 'userID', 'user', 'userName', $theUserName);

			session_start();
		  // register the session variables and load the next page
			$_SESSION['theUserID'] = $theUserID;
			#sleep(1);
			header ("Location:../CRUD/UserMenu.php") ;
			exit;
	   
			} else{
				echo "<br>not valid login info";
			}	
	} else {
		echo "<br>Please enter username and password";
	}
		

}