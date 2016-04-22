<?php
include('config/checkLogin.php');

$header = $_POST["header"];
$messageContent = $_POST["messageContent"];
$User = $_SESSION['user'];
$dateSent = date("Y-m-d H:i:s");
    
$sql = "INSERT INTO messagefeed (Title, Message, Author, Date)
VALUES ('$header', '$messageContent', '$User', '$dateSent')";

if (mysql_query($sql) === TRUE) {
    header("Location: messages.php");
} else {
    echo "Error: " . $sql . "<br>" . mysql_error();
}

?>