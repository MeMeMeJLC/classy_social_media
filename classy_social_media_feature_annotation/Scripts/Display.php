<?php

function displayImages($images){
	$path = '../../resources/images/';
	echo "<table border=1><tr><td>Image ID</td><td>Image Location</td><td>image</td><td>Annotate</td></tr>";
	while ( $aRow =  $images->fetch() )
	{
		$outputLine = "<tr><td>$aRow[image_id]</td>";
		$outputLine .= "<td>$aRow[image_location]</td>";
		$outputLine .= "<td><img src='$path$aRow[image_location]'</td>";
		$outputLine .= "<td>
		<form method='post' action='UserMenu.php'>
			<input type='submit' value='$aRow[image_id]' name='image'>
		</form></td></tr>"; //link to image id
		echo $outputLine;
	}
	echo "</table>";
}