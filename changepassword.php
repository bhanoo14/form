<?php

require './dataBase/dbConnect.php';

$oldDbPassword = ''; // Variable to hold the existing password from the database

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize the ID to prevent SQL injection

    
    $conn = dbConnect();

    // Check if form was submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $oldPassword = $_POST['oldPassword'] ?? '';
        $newPassword = $_POST['newPassword'] ?? '';
        $confirmPassword = $_POST['confirmPassword'] ?? '';

        // SQL query to select the current password based on ID
        $sql = "SELECT password FROM userTable WHERE id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("i", $id); 
            $stmt->execute();
            $stmt->bind_result($oldDbPassword); 
            $stmt->fetch(); // Fetch the result into $oldDbPassword
            $stmt->close();

            // Check if the entered old password matches the stored password
            if ($oldDbPassword === $oldPassword){
                // Check if new password and confirm password match
                if ($newPassword === $confirmPassword){
                    // Prepare the SQL UPDATE statement to update the password
                    $updateSql = "UPDATE userTable SET password = ? WHERE id = ?";
                    $updateStmt = $conn->prepare($updateSql);
                    $updateStmt->bind_param("si", $newPassword, $id);

                    if ($updateStmt->execute()) {
                        echo "Password updated successfully.";
                    } else {
                        echo "Error updating password.";
                    }
                    $updateStmt->close();
                } else {
                    echo "New password and confirm password do not match!";
                }
            } else {
                echo "Old password is incorrect!";
            }
        } else {
            echo "Error: " . $conn->error;
        }
    }
    // Close connection
    $conn->close();
}
require './view/changepassword.view.php';