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
        width: 95%;
        word-wrap: break-word;
    
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

    $messages = mysql_query("SELECT Title,Message,Author,Date FROM messagefeed ORDER BY Date DESC");
        if (!$messages) {
            die("Database query failed: " . mysql_error());
        }
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
                    <li class="active"><a href="messages.php">Messages</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    
    <h1 style="text-align: center;">SDL Messages<button class="btn btn-default" style="float: right; margin-right: 5%;" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><span class="glyphicon glyphicon-plus" style="color: #333333;"></span></button></h1>
    
    <div class="collapse" id="collapseExample" style="width: 80%; margin-left: 10%;">
        <div class="well">
        <form method="post" action="writeMessage.php">
            <input style="margin-top: 5%; margin-left: 30%; width: 40%" name="header" type="text" class="form-control" placeholder="Title" aria describedby="basic-addon1" required>
            <textarea style="margin-top: 2%; margin-left: 30%; margin-bottom: 3%; width: 40%" name="messageContent" class="form-control" placeholder="message" aria-describedby="basic-addon1" required></textarea>
          <input style="margin-top: 3%; margin: auto; margin-bottom: 5%; width: 50%;" type="submit" class="form-control"  aria-describedby="basic-addon1">
      </form>
     </div>
  </div>
    
    <?php
    $numMessage = 1 ;
                    
                    while ($row = mysql_fetch_array($messages)) { //convert sql query results into php array, this while statement is ran until all the message table has been queried.
                            ++$numMessage;
                            //---find and format any links in a message---//

                            // The Regular Expression filter
                            $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
                            // The Text you want to filter for urls
                            $text = $row["Message"];

                                // Check if there is a url in the text
                                if(preg_match($reg_exUrl, $text, $url)) {
                                    // make the urls hyper links
                                    $formattedMessage = preg_replace($reg_exUrl, "<a href='{$url[0]}''>{$url[0]}</a> ", $text);
                                } else {
                                    // if no urls in the text just return the text
                                    $formattedMessage = $row["Message"];
                                }
                            //end of link formatting
        //display message -
     echo "<div class='list-group-item' id='panel'><h4 id='list-group-item-heading'>".$row["Title"]." <p id='author'>Author:".$row["Author"]."</p></h4><p id='message'>".$formattedMessage."</p><a href='#".$numMessage."' data-toggle='collapse'>Comments</a></div>"
     ?><div id="<?= $numMessage ?>" class="collapse">
        <?php echo "<form method='post' action='writeComment.php' class='input-group' style='width: 90%; margin-left: 5%;'><input type='text' name='comment' class='form-control' placeholder='Make a comment...'><span class='input-group-btn'><button class='btn btn-default' type='submit'>Go!</button></span><input name='messageId' type='hidden' value='".$text."'></form>";
    
    
    
            $dbcomments = mysql_query("SELECT comments,author FROM comments WHERE messageId='$text' ORDER BY date DESC"); // query comments table for comments relating to the current message of this while statement run.
            //display any comments for the message
            while ($rowComments = mysql_fetch_array($dbcomments)) {
                if (isset($rowComments["comments"])) { //if comments are returned for the message, display them.
                echo "<li class='list-group-item list-group-item-info' style='width: 90%; margin-left: 5%; color: black;'>".$rowComments["comments"]."<span style='float: right; color: red;'>".$rowComments["author"]."</span></li>";
            }
    }?></div><?php
}
?>
</body>
</html>