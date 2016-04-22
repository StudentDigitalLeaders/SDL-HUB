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

    <a style="float: right;" href="logout.php">Logout</a>
<!-- display date and time -->
<script type="text/javascript">
    var d = new Date();
    var month = d.getMonth() + 1;
    document.getElementById("date").innerHTML = d.getDate() + "/" + month + "/" + d.getFullYear() ;
</script>

<!-- end -->

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
                    <li class="active"><a href="rotas.php">Rotas</a></li>
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
    <h2 style="text-align: center;">Rotas</h2>
    <p>&nbsp;</p>
    
    <table style="width: auto;">
        <h2><b>Blog</b></h2>
        <tr>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;<h4><b>Blogger</b></h4></th>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;<h4><b>Date</b></h4></th>		
        </tr>
        
        <?php
        //Query
        $blogRota = mysql_query("SELECT * FROM `blogrota`");
        if (!$blogRota) {
            die("Database query failed: " . mysql_error());
        }

        while ($row = mysql_fetch_array($blogRota)) {
            echo "<tr>
                    <td>".$row["Name"]."</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;".$row["Date"]."</td>
                </tr>";
     }  
    ?>
        </table><table style="width: 100%;">
        <h2><b>Genius Bar</b></h2>
            
        <tr>
            <th><h4><b>4A</b></h4></th>
            <th><h4><b>4B</b></h4></th>		
            <th><h4><b>Date</b></h4></th>
        </tr>
        <?php
        //Query
        $geniusBar = mysql_query("SELECT * FROM `geniusbar`");
        if (!$geniusBar) {
            die("Database query failed: " . mysql_error());
        }

        while ($row = mysql_fetch_array($geniusBar)) {
            echo "<tr>
                    <td>".$row["4A"]."</td>
                    <td>".$row["4B"]."</td>
                    <td>".$row["Date"]."</td>
                </tr>";
     }
    ?>
        
    </table>
</div>
    
</body>
</html>