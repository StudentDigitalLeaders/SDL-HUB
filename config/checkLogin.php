<?php 
//connect
$db = mysql_connect("hostname","username","password");
 if (!$db) {
 die("Database connection failed miserably: " . mysql_error());
 }
 mysql_select_db("sdlhub",$db) or die("Database selection also failed miserably: " . mysql_error());
 

session_start();
$name = $_SESSION['user']; // store username in the browser

if (isset($_SESSION['user'])) {
    //check if there is a user stored in the browser
 } else {
    echo "<p>Your are not logged in";
    header("Location: index.php");
 };
?>