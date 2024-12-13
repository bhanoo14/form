<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All User Data</title>
</head>
<body>
    <div class="list">
        <h3>Want to delete this user?</h3>
        <table border="1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php if (!empty($users)){ ?>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?= htmlspecialchars($user['name']) ?></td>
                        <td><?= $user['status'] ? 'Active' : 'Inactive' ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="delete" value="yes">
                                <?php echo $user['status'] ? "<button type='submit'>Delete</button>" : ''; ?>
                            </form>
                        </td>
                    </tr>
                <?php }; ?>
            <?php }else { ?>
                <tr>
                    <td colspan="3">No user found</td>
                </tr>
            <?php  } ; ?>
            </tbody>
        </table>
    </div>
    <form action="http://localhost/p/list/allUsers.php">
        <button type="submit">Go Back</button>
    </form>
</body>
</html>
