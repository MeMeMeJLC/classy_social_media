<?php

require_once("AccessDB.php");
require_once("../Connection/ConnectDB.php");

$db->selectDatabase();

			if (isset($_POST['newComment'])){
				$newComment = $_POST['newComment'];
				$theAnnotationID = $_POST['annotationID'];
				updateAnnotation($db, $theAnnotationID, $newComment);
				header("location:annotate.php");
			}