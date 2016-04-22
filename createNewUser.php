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
    //connect
    $db = mysql_connect("localhost","LTest","Yasmine123"); 
        if (!$db) {
            die("Database connection failed miserably: " . mysql_error());
        }
        mysql_select_db("sdlhub",$db) or die("Database selection also failed miserably: " . mysql_error());

?>
    
<body>
    <!--This file is to be used for adding new users to the member table in the SDL database. Insert a sample password such as "123" and a hash* will automatically be generated. The username, sample password and hash will be added to the database. The user can then change their password from the profile page when they login with the sample password you created.

    *the hash is used to automatically encrypt the password so that it cannot be seen by those who view the database-->
    <h1 style="text-align: center;">Insert sample password</h1>
    <p>&nbsp;</p>
    
    <h3 style="text-align: center;">New User...</h3>
        <form method="post" autocomplete="off">
            <input name="username" type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1" style="width: 35%; margin-left: 32.5%" required>
            <input name="password" type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1" style="width: 35%; margin-left: 32.5%" required>
            <input name="insertUser" type="submit" class="form-control" placeholder="Submit" aria-describedby="basic-addon1" style="width: 35%; margin-top: 1%; margin-left: 32.5%;">
    </form>
    
    <?php 
    // Turn off error reporting
    error_reporting(0); 
    
    $intermediateSalt = md5(uniqid(rand(), true)); //create a relatively safe salt
    $salt = substr($intermediateSalt, 0, 20); //create a very safe salt using the previously generated variable
            
    
    if(isset($_POST['insertUser'])){ //check if button has been clicked 
        
        $newName = $_POST['username']; //create variables and make them equal to the form inputs that have been submitted
        $password = $_POST['password'];
        $encrPassword = crypt($password, $salt); //encrypt password
        
        $sql = "INSERT INTO members (username, password, hash) VALUES ('$newName', '$encrPassword', '$salt')";

        if (mysql_query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . mysql_error();
        
        };
    }
?>

    
</body>
</html>