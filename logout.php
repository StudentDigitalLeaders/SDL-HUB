<!DOCTYPE html>
<html lang="en">
<head>
  <title>SDL Hub</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

    <?php 
include('config/config.inc.php');

session_start(); //start the session on this page
session_destroy(); // destroy the session from the browser
?>
    
<body>

    <div class="panel panel-default" style="width: 50%; margin-left: 25%">
        <h1 style="text-align: center;">You have logged out</h1>
        <p>&nbsp;</p>
        <a type="button" href="index.php" style="text-align: center;">Login</a>
    </div>
</body>
</html>