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
                    <li class="active"><a href="home.php">Home</a></li>
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
    
    <div style="width: 88%; float: left;" class="well well-lg">
        <h2>Information - <?php echo date("d/m/Y") . "<br>"; ?></h2>
        <p>&nbsp;</p>
    
    <?php 
        /* get next meeting date */
        $date = date('Y/m/d'); //get current date
        $blogRota = mysql_query("SELECT * FROM `blogrota` WHERE Date >= '$date' LIMIT 1"); //select 1 row of data that is bigger than the date.
    
        if (!$blogRota) {
            die("Database query failed: " . mysql_error());
        }

        while ($blogRow = mysql_fetch_array($blogRota)) { //convert sql query into php array
            echo "<tr>
                    <h4><b>Blogger on:&nbsp;".$blogRow["Date"]."</b></h4> 
                    <h4>".$blogRow["Name"]."</h4>
                </tr>";
     }
?>
        <h3><u>Genius Bar</u></h3>
    
    <?php 
        /* get next meeting date */
        $geniusBar = mysql_query("SELECT * FROM `geniusbar` WHERE Date >= '$date' LIMIT 1");
    
        if (!$geniusBar) {
            die("Database query failed: " . mysql_error());
        }

        while ($GenBarRow = mysql_fetch_array($geniusBar)) {
            echo "<tr>
                    <h4><b>Date:&nbsp;</b>".$GenBarRow["Date"]."</h4>
                    <h4><b>4A:&nbsp;</b>".$GenBarRow["4A"]."</h4>
                    <h4><b>4B:&nbsp;</b>".$GenBarRow["4B"]."</h4>
                </tr>";
     }
?>
    
        <h3><u>Links</u></h3>
        <h4>Meistertask: <a href="https://www.meistertask.com/">https://www.meistertask.com/</a></h4>
        <h4>Office365: <a href="https://login.microsoftonline.com/login.srf?wa=wsignin1.0&rpsnv=4&ct=1456675588&rver=6.7.6640.0&wp=MCMBI&wreply=https%3a%2f%2fportal.office.com%2flanding.aspx%3ftarget%3d%252fdefault.aspx%253fwa%253dwsignin1.0&lc=1033&id=501392&msafed=0&client-request-id=795e4052-531b-4bf7-94cb-e4c955a9d8cf">https://login.microsoftonline.com/login.srf</a></h4>
</div>
    
</body>
</html>