<?php

require './dataBase/dbConnect.php';

        // Initialize error and data variables
        $nameErr = $emailErr = $phoneErr = $passwordErr = "";
        $name = $email = $phone = $password = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (empty($_POST["name"])) {
                $nameErr = "Name is required";
            } else {
                $name = test_input($_POST["name"]);
            }

            if (empty($_POST["email"])) {
                $emailErr = "Email is required";
            } else {
                $email = test_input($_POST["email"]);
            }

            if (empty($_POST["phone"])) {
                $phoneErr = "Phone is required";
            } else {
                $phone = test_input($_POST["phone"]);
            }

            if (empty($_POST["password"])) {
                $passwordErr = "Password is required";
            } else {
                $password = test_input($_POST["password"]);
            }

            // Only proceed if there are no validation errors
            if (empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($passwordErr)) {
                // Database credentials
                
                $conn = dbConnect();

                // Directly insert data into the table (unsafe: no prepared statements)
                $sqlInsert = "INSERT INTO usertable (name, email, phone, password, reg_date) 
                              VALUES ('$name', '$email', '$phone', '$password', NOW())";

                // Execute query directly
                if ($conn->query($sqlInsert) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $conn->error;
                }

                // Close connection
                $conn->close();
            }
        }

        // Function to sanitize input
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
require "./view/index.view.php";