<!DOCTYPE html>
<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    
    <?php 

        //connect
        $db = mysql_connect("localhost","luke.tinnion","LTest"); 
            if (!$db) {
                die("Database connection failed miserably: " . mysql_error());
        }
        
    //select database
    mysql_select_db("blogpoststests",$db) or die("Database selection also failed miserably: " . mysql_error());
 
    ?>
    
<body>
    <h1>Add a new post</h1>
    &nbsp;
    
    <form method="get">
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input name="title" type="text" style="width: 50%" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Content</label>
            <textarea id="content" class="form-control" style="width: 50%" rows="3"></textarea>
        </div>
        <button onclick="insert()" type="submit" class="btn btn-default">Submit</button>
    </form>
    
     <?php

    function insert()
    {
		$Title = $_GET["title"]; 
        echo "<h1>".$Title."</h1>";
    }
    ?>
    
</body>
</html>