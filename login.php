 <?php 
include('config/config.inc.php');
?>

<?php
session_start();      

    $myusername=mysql_real_escape_string($_POST['username']); //filter username and password for SQL queries to prevent SQL injection
    $checkPassword=mysql_real_escape_string($_POST['password']);

    $result = mysql_query("SELECT * FROM members WHERE username='$myusername'");
    $row = mysql_fetch_array($result); 
 
    $hash = $row["hash"]; //make hash = to hash field on the row of the username...
    $dbPassword = $row["password"];
 
    if(crypt($checkPassword, $hash) === $dbPassword){ //re-encrypt the password and see if it matches the encrypted password held in the db.
         $_SESSION['user'] = $myusername; //store username in browser.
        header("Location: home.php"); //re-direct to home page.
}else{
    echo "invalid password/username" . mysql_error();
}
    
?>