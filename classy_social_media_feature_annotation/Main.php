<?php

session_save_path("./");
session_start();
session_destroy();
?>
<html>

<a href="Data/setUpDB.php">Build The Database</a>
<br /><br />

<a href="data/displayallTables.php">Display All Tables</a>
<br /><br />

<a href="Scripts/CRUD/login.php">Login</a>

<br /><br />

<a href="Scripts/CRUD/addImage.php">Add Image</a>

</html>