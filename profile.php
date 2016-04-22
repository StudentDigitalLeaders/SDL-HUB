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
include('config/checkLogin.php');
?>
    
<body>

     <!-- Navigation -->
    <nav class="navbar navbar-inverse">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="profile.php">SDL HUB-<?php echo "<span>$name"?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="rotas.php">Rotas</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="messages.php">Messages</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    
    <h1 style="text-align: center;">Your Profile</h1>
    <p>&nbsp;</p>
    <h3 style="text-align: center;">Username:<?php echo "<span>$name"?></h3>
    <h3 style="text-align: center;">Change password</h3>
        <form method="post">
            <input name="password" type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1" style="width: 35%; margin-left: 32.5%">
            <input name="changeP" type="submit" class="form-control" placeholder="Submit" aria-describedby="basic-addon1" style="width: 35%; margin-top: 1%; margin-left: 32.5%;">
    </form>
    
    <?php 
    
    $intermediateSalt = md5(uniqid(rand(), true));
    $salt = substr($intermediateSalt, 0, 20);
                    
    if(isset($_POST['changeP'])){ // button name
        
        $password = $_POST['password'];
        $encrPassword = crypt($password, $salt);
        
        $sql = "UPDATE members SET password='$encrPassword', hash='$salt' WHERE username='$name'";
        mysql_query($sql);
    } else {
        echo "unexpected error occurred" . mysql_error();
    };
?>

    
</body>
</html>