<?php
$host = 'localhost';
$dbUser ='root';
$dbPass ='';
$dbName ='image_annotator';

// create a new database object and connect to server
$db = new TheMySQLi( $host, $dbUser, $dbPass, $dbName );

$db->selectDatabase();

	