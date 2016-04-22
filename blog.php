<!DOCTYPE html>
<html lang="en">
<head>
  <title>SDL Hub</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
    <style>
    #title {
        font-size: 1.8em;
        font-weight: bold;
        float: left;
    }
    #message {
        font-size: 1.3em;
        clear: both;
    }
    #panel {
        width: 90%;
        margin-left: 5%;
    }
    #author {
        float: right;
        margin-right: 7%;
    }
    
</style>
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
                    <li class="active"><a href="blog.php">Blog</a></li>
                    <li><a href="messages.php">Messages</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    
    <!-- 16:9 aspect ratio -->
<div class="embed-responsive embed-responsive-16by9" style="padding-bottom: 100%;">
  <iframe class="embed-responsive-item" src="https://lythamhighsdl.wordpress.com/"></iframe>
</div>
    
</body>
</html>