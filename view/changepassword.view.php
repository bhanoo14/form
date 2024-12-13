<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>
    <div class="list">
        <h3>Change Password</h3>
        <form action="#" method="POST">
            <table border="1">
                <thead>
                    <tr>
                        <th>Old Password</th>
                        <th>New Password</th>
                        <th>Confirm Password</th> 
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="password" placeholder="Enter Old Password" name="oldPassword" required></td>
                        <td><input type="password" placeholder="Enter New Password" name="newPassword" required></td>
                        <td><input type="password" placeholder="Confirm Password" name="confirmPassword" required></td>
                    </tr>
                </tbody>
            </table>
            <button type="submit">Confirm Changes</button>
        </form>
    </div>
    <form action="http://localhost/p/list/allusers.php">
        <button type="submit">Go Back</button>
    </form>
</body>
</html>