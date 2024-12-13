<?php 

if (isset($_GET['action']) && $_GET['action'] === 'toggleActiveInActive') {
    toggleActiveInActive();
}
    // To get All User
    function fetchAllUser(){
        $conn = dbConnect();

        $sql = "SELECT * FROM userTable";
        $result = $conn->query($sql);
        
        $usersData = [];
        
        if ($result->num_rows > 0) {
            // Fetch all rows and store them in the $users array
            while ($row = $result->fetch_assoc()) {
                $usersData[] = $row;
            }
        }
        $conn->close();
        return $usersData;
    }

    // To Toggle Active to InActive user
    function toggleActiveInActive(){
        $conn = dbConnect();
        echo "test 1";
        
        $deleteSql = "UPDATE userTable SET status = ? WHERE id = ?";
        $deleteStmt = $conn->prepare($deleteSql);
        echo "test 2";
        if ($deleteStmt) {
            $deleteStmt->bind_param("ii", intval($_POST['name'] ? 1 : 0), intval($_POST['id']));
            echo "test 3";
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

        $conn->close();
    } 
?>