<?php 
//connect
$db = mysql_connect("hostname","username","password");
 if (!$db) {
 die("Database connection failed miserably: " . mysql_error());
 }
 mysql_select_db("sdlhub",$db) or die("Database selection also failed miserably: " . mysql_error());
?>