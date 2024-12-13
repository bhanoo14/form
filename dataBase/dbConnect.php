<?php

    function dbConnect(){

        $servername = "localhost";
        $username = "root";
        $db_password = "";
        $dbname = "userDB";
    
        $conn = new mysqli($servername, $username, $db_password, $dbname);
    
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn; 
    }
?>