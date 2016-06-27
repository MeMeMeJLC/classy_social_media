
<?php
require_once("AccessDB.php");
require_once("../Connection/ConnectDB.php");
require_once("../Security/Token.php");
require_once("Javascript.js");

$db->selectDatabase();
session_start();

$theImageID = $_SESSION['theImageID'];
$theUserID = $_SESSION['theUserID'];
#echo "userid = " . $theUserID."<br>";
#$image = readAllElements('image_id', 'image_id', 'image');

$imageLocation = readElement('image_location', 'image_location', 'image', 'image_id', $theImageID);

readAllElements('*', 'image');
getImageAnnotations($theImageID);

echo "<image onclick=getAnAnnotationLocation(event) src='../../resources/images/$imageLocation'></image>";	
//displayAnImage($image);
//$theAnnotationLocation = displayAnImageToAnnotate($image);


if(isset($_POST['comment'], $_POST['annotationLocationX'], $_POST['annotationLocationY'])){ #prevent xsrf 
		$comment = $_POST['comment'];
		$locationX = $_POST['annotationLocationX'];
		$locationY = $_POST['annotationLocationY'];
		
		if(!empty($comment) && !empty($locationX) && !empty($locationY)){
			if(Token::check($_POST['token'])){
			echo '<h1>Processed note!</h1>';
				$theAnnotationLocationX = " ".$_POST['annotationLocationX'];
	$theAnnotationLocationY = " ".$_POST['annotationLocationY']." ";
	createAnAnnotation($theImageID, $theUserID, $comment, $theAnnotationLocationX, $theAnnotationLocationY);
	header("Refresh:0");
			}
		}
	}

if(isset($_POST['comment']) and ($_POST['annotationLocationX']) and ($_POST['annotationLocationY'])){
	echo "running";
	$theComment = htmlentities($_POST['comment']);#xss attack proof
	#$theComment = mysqli_real_escape_string($db->query($theComment), $theComment); #sql injection prevention
	/*$theAnnotationLocationX = " ".$_POST['annotationLocationX'];
	$theAnnotationLocationY = " ".$_POST['annotationLocationY']." ";
	addAnAnnotation($db, $theImageID, $theUserID, $theComment, $theAnnotationLocationX, $theAnnotationLocationY);
	header("Refresh:0");*/
}


?>
<html>
<body>
<image id="image" src=''></image>
<br>
<div id="txtHint"><b>Comment will be here...</b></div>

<form method='post' action='annotate.php'>
	Add an annotation:<br> <input type='text' name='comment'></input><br>Then click the location on the image.
	<input type='hidden' id='annotationLocationX' name='annotationLocationX' value=''></input>
	<input type='hidden' id='annotationLocationY' name='annotationLocationY' value=''></input>
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>"></input>
	<br><input type='submit'></input>
</form>
<h1 id="annotationLocation"></h1>
<a href="UserMenu.php">Return to User Menu</a>
<br><a href="../../Main.php">Return to Main Page</a>
</body>
</html>


