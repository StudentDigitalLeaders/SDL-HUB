<?php
include('config/checkLogin.php');

        $messageId = $_POST['messageId'];
        $comment = $_POST['comment'];
        $dateSent = date("Y-m-d H:i:s");
        
        $sql = "INSERT INTO comments (comments, messageId, author, date) VALUES ('$comment', '$messageId', '$name', '$dateSent')";
        //mysql_query($sql);
        
        if (mysql_query($sql) === TRUE) {
            echo "New record created successfully";
            header('Location: messages.php');
        } else {
        echo "Error: " . $sql . "<br>" . mysql_error();
        
        };
?>