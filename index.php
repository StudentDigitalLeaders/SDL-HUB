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
?>
    
<body>

    &nbsp;
    &nbsp;
    &nbsp;
<div class="panel panel-default" style="width: 70%; margin-left: 15%">
  <div class="panel-body">
    <h1 style="text-align: center">SDL Hub</h1>
      <form method="post" action="login.php">
            <input style="margin-top: 5%; margin-left: 20%; width: 60%" name="username" type="text" class="form-control" placeholder="Username" aria describedby="basic-addon1">
            <input style="margin-top: 2%; margin-left: 20%; margin-bottom: 0%; width: 60%" name="password" type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
          <input style="margin-top: 2%; margin-left: 35%; margin-bottom: 5%; width: 30%" type="submit" class="form-control"  aria-describedby="basic-addon1">
      </form>
  </div>
</div>

</body>
</html>