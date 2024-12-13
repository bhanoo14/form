<?php
require 'dbConnect.php';

$users = [];

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 

    $conn = dbConnect();

    // SQL query to get user data
    $sql = "SELECT id, name, status FROM userTable WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id); 
        $stmt->execute();
        $stmt->bind_result($userId, $name, $status);

        // Fetch result into the `$users` array
        while ($stmt->fetch()) {
            $users[] = [
                'id' => $userId,
                'name' => $name,
                'status' => $status
            ];
        }
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    // Check if the delete form has been submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete']) && $_POST['delete'] === 'yes') {
        // SQL query to update status to '0' (soft delete)
        $deleteSql = "UPDATE userTable SET status = '0' WHERE id = ?";
        $deleteStmt = $conn->prepare($deleteSql);
        var_dump($_POST['delete']);
        if ($deleteStmt) {
            $deleteStmt->bind_param("i", $id);
            
            // Execute the update and check if successful
            if ($deleteStmt->execute()) {
                echo "User marked as deleted successfully.";
                die();
            } else {
                echo "Error marking user as deleted.";
            }
            
            $deleteStmt->close();
        } else {
            echo "Error: " . $conn->error;
        }
    }

    // Close connection
    $conn->close();
}
require './view/delete.view.php';