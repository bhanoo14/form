<?php

require './dataBase/dbConnect.php';



if (isset($_GET['id'])){
    $id = intval($_GET['id']); 

    $conn = dbConnect(); //calling dbConnect function to stablish connection

    // SQL query to select user data based on ID
    $sql = "SELECT name, email, phone FROM userTable WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id); // Bind the ID as an integer parameter
        $stmt->execute();
        $stmt->bind_result($name, $email, $phone); // Bind the result variables

        // Fetch the result
        if (!$stmt->fetch()) {
            echo "User not found.";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    // Update user data after form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $phone = $_POST['phone'] ?? '';

        // Correct SQL query for updating user data
        $updateSql = "UPDATE userTable SET name = ?, email = ?, phone = ? WHERE id = ?";
        $updateStmt = $conn->prepare($updateSql);

        if ($updateStmt) {
            $updateStmt->bind_param('sssi', $name, $email, $phone, $id); // Correct binding with integer for $id
            if ($updateStmt->execute()){
                echo "User data updated successfully.";
            } else {
                echo "Error updating data.";
            }
            $updateStmt->close();
        } else {
            echo "Error preparing update statement: " . $conn->error;
        }
    }

    // Close connection
    $conn->close();
}

// Include the HTML form
require './view/edit.view.php';